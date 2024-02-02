<?php

use Dompdf\Css\Style;

require_once('TCPDF-main/tcpdf.php');
global $wpdb, $table_prefix;
$wp_donation = $table_prefix . 'donation';

// Assuming you have a variable containing the user ID, replace '1' with the actual user ID you want to fetch
$user_id_to_fetch = 1;

// Query to fetch the user data
$q = "SELECT * FROM `$wp_donation` ORDER BY ID DESC LIMIT 1";
$results = $wpdb->get_results($q);

// Check if the query was successful
if ($results) {
  $user_data = $results[0];

  $donor_name = $user_data->full_name;
  $pan_number = $user_data->PAN;
  $email_address = $user_data->email;
  $contact_details = $user_data->contact;
  $amount = $user_data->amount;
  $id = $user_data->id;
  $status = $user_data->status;

  ob_start();

  if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['download_pdf'])) {
    // Create a new TCPDF instance
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

    // Set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Your Name');
    $pdf->SetTitle('Donation Receipt');
    $pdf->SetSubject('Donation Receipt');
    $pdf->SetKeywords('Donation, Receipt, PDF');

    // Add a page
    $pdf->AddPage();

    $logo_path = 'https://i0.wp.com/rgtfoundation.org/wp-content/uploads/2023/08/rgt-ngo-logo.png?fit=2033%2C487&ssl=1';
    $pdf->Image($logo_path, $pdf->GetX(), $pdf->GetY(), 50);
    // Output content to PDF
    // Desired width and height
    // $newWidth = 50;
    // $newHeight = 50;

    // // Add the logo to the PDF
    // $pdf->Image($logo_path, $pdf->GetX(), $pdf->GetY(), $newWidth, $newHeight);
    $pdf->SetFont('helvetica', 'B', 16);
    $pdf->Cell(0, 10, 'Donation Receipt', 0, 1, 'C');

    // Donor Details
    $pdf->Ln(10);
    $pdf->SetFont('helvetica', 'B');
    $pdf->Cell(0, 10, 'Donor Details', 0, 1, 'C');

    // Create a table for donor details
    $pdf->SetFont('helvetica', '', 12,);
    $pdf->SetFillColor(200, 220, 255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0, 0, 0);
    $pdf->SetLineWidth(0.1);
    // Get the width and height of the page
    $pageWidth = $pdf->getPageWidth();
    // $pageHeight = $pdf->getPageHeight();

    // Calculate the x and y coordinates to center the table
    $centerX = ($pageWidth - 160) / 2; // Assuming each cell has a width of 80 (2 cells)
    // $centerY = ($pageHeight - 20) / 2; // Assuming the total height of the table is 20

    $pdf->SetX($centerX,); // Set the x and y coordinates to center the table
    $pdf->SetFont('', 'B');
    $pdf->Cell(80, 10, 'Donor Name', 1, 0, 'C', 1);
    $pdf->Cell(80, 10, 'PAN Number', 1, 1, 'C', 1);
    $pageWidth = $pdf->getPageWidth();
    // $pageHeight = $pdf->getPageHeight();

    // Calculate the x and y coordinates to center the table
    $centerX = ($pageWidth - 160) / 2; // Assuming each cell has a width of 80 (2 cells)
    // $centerY = ($pageHeight - 20) / 2; // Assuming the total height of the table is 20

    $pdf->SetX($centerX,);
    $pdf->SetFont('');
    $pdf->Cell(80, 10, $donor_name, 1, 0, 'C');
    $pdf->Cell(80, 10, $pan_number, 1, 1, 'C');

    $pdf->Ln(5);
    $pageWidth = $pdf->getPageWidth();
    // $pageHeight = $pdf->getPageHeight();

    // Calculate the x and y coordinates to center the table
    $centerX = ($pageWidth - 160) / 2; // Assuming each cell has a width of 80 (2 cells)
    // $centerY = ($pageHeight - 20) / 2; // Assuming the total height of the table is 20

    $pdf->SetX($centerX,);

    $pdf->SetFont('helvetica', '', 12);
    $pdf->Cell(80, 10, 'Email Address', 1, 0, 'C', 1);
    $pdf->Cell(80, 10, 'Contact Details', 1, 1, 'C', 1);
    $pageWidth = $pdf->getPageWidth();
    // $pageHeight = $pdf->getPageHeight();

    // Calculate the x and y coordinates to center the table
    $centerX = ($pageWidth - 160) / 2; // Assuming each cell has a width of 80 (2 cells)
    // $centerY = ($pageHeight - 20) / 2; // Assuming the total height of the table is 20

    $pdf->SetX($centerX,);
    $pdf->SetFont('');
    $pdf->Cell(80, 10, $email_address, 1, 0, 'C');
    $pdf->Cell(80, 10, $contact_details, 1, 1, 'C');

    // Donation Details
    $pdf->Ln(10);
    $pdf->SetFont('helvetica', 'B', 14);
    $pdf->Cell(0, 10, 'Donation Details', 0, 1, 'C');

    // Create a table for donation details
    $pdf->SetFont('helvetica', '', 12);
    $pdf->SetFillColor(200, 220, 255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0, 0, 0);
    $pdf->SetLineWidth(0.1);
    $pageWidth = $pdf->getPageWidth();
    // $pageHeight = $pdf->getPageHeight();

    // Calculate the x and y coordinates to center the table
    $centerX = ($pageWidth - 160) / 2; // Assuming each cell has a width of 80 (2 cells)
    // $centerY = ($pageHeight - 20) / 2; // Assuming the total height of the table is 20

    $pdf->SetX($centerX,);
    $pdf->SetFont('', 'B');
    $pdf->Cell(80, 10, 'Payment Status', 1, 0, 'C', 1);
    $pdf->Cell(80, 10, 'Payment Method', 1, 1, 'C', 1);
    $pageWidth = $pdf->getPageWidth();
    // $pageHeight = $pdf->getPageHeight();

    // Calculate the x and y coordinates to center the table
    $centerX = ($pageWidth - 160) / 2; // Assuming each cell has a width of 80 (2 cells)
    // $centerY = ($pageHeight - 20) / 2; // Assuming the total height of the table is 20

    $pdf->SetX($centerX,);
    $pdf->SetFont('');
    $pdf->Cell(80, 10, 'Completed', 1, 0, 'C');
    $pdf->Cell(80, 10, 'Test Donation', 1, 1, 'C');

    $pdf->Ln(5);
    $pageWidth = $pdf->getPageWidth();
    // $pageHeight = $pdf->getPageHeight();

    // Calculate the x and y coordinates to center the table
    $centerX = ($pageWidth - 160) / 2; // Assuming each cell has a width of 80 (2 cells)
    // $centerY = ($pageHeight - 20) / 2; // Assuming the total height of the table is 20

    $pdf->SetX($centerX,);
    $pdf->SetFont('helvetica', 'B', 12);
    $pdf->Cell(80, 10, 'Donation Amount', 1, 0, 'C', 1);
    $pdf->Cell(80, 10, 'Donation Total', 1, 1, 'C', 1);
    $pageWidth = $pdf->getPageWidth();
    // $pageHeight = $pdf->getPageHeight();

    // Calculate the x and y coordinates to center the table
    $centerX = ($pageWidth - 160) / 2; // Assuming each cell has a width of 80 (2 cells)
    // $centerY = ($pageHeight - 20) / 2; // Assuming the total height of the table is 20

    $pdf->SetX($centerX,);
    $pdf->SetFont('dejavusans'); // Use a font that supports the ₹ symbol
    $pdf->Cell(80, 10, '₹' . $amount, 1, 0, 'C');
    $pdf->Cell(80, 10, '₹' . $amount, 1, 1, 'C');
    // Set content to center for logo and signature
    $pdf->SetY($pdf->GetY() + 20);

    // Company Logo
    $logo_path = 'https://i0.wp.com/rgtfoundation.org/wp-content/uploads/2023/08/rgt-ngo-logo.png?fit=2033%2C487&ssl=1';
    $pdf->Image($logo_path, $pdf->GetX(), $pdf->GetY(), 50);

    // Signature
    // $signature_path = 'https://i0.wp.com/rgtfoundation.org/wp-content/uploads/2023/08/rgt-ngo-logo.png?fit=2033%2C487&ssl=1';
    // $pdf->Image($signature_path, $pdf->GetX() + 120, $pdf->GetY(), 50);
    // $pdf->Ln(10); // Add some space

    // Add the current date in place of the signature

    date_default_timezone_set('Asia/Kolkata');

    // Add the current date and time separately
    $pdf->SetFont('helvetica', 'B', 12);
    $pdf->Cell(0, 10, 'Date : ' . date('Y-m-d'), 0, 1, 'R');
    $pdf->Cell(0, 10, 'Time : ' . date('H:i:s'), 0, 1, 'R');

    // Set the appropriate headers for PDF download
    header('Content-Type: application/pdf');
    header('Content-Disposition: attachment; filename="donation_receipt.pdf"');

    // Output the PDF content
    echo $pdf->Output('donation_receipt.pdf', 'S');

    // Exit to prevent further HTML output
    exit;
  }
?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Open Graph meta tags for Facebook sharing -->
    <meta property="og:url" content="<?php echo $your_canonical_url; ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Your Page Title" />
    <meta property="og:description" content="Your Page Description" />
    <meta property="og:image" content="Your Image URL" />

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  </head>
  <style>
    .check_circle {
      color: #78B598;
      font-size: 60px;
    }

    .spread {
      /* width: 100%; */
      font-size: 20px;
      padding: 5px;
      font-weight: 400;
      line-height: 24.2px;
      font-family: inter;
    }

    .linked-button {
      width: 230px;
      height: 50px;
      background-color: rgb(24, 49, 83);
      color: #fff;
      margin-left: 60px;
    }

    .twitter-button {
      width: 230px;
      height: 50px;
      color: #fff;
      margin-right: 60px;
    }

    .don_det {
      margin-left: 63px;
    }

    .round-button {
      border-radius: 50%;
      /* Makes the button perfectly round */
      width: 40px;
      /* Adjust the width as needed for your desired size */
      height: 40px;
      /* Set the height equal to the width for a circle */
      padding: 0;
      /* Remove default padding to avoid text truncation */
    }

  </style>

  <body>
    <section class="container d-flex flex-column justify-content-center align-items-center" style="margin-top: -14rem;">

      <main class="form_main">
        <div class=" p-5">
          <div class="text-center check_circle">
            <i class="fa-regular fa-circle-check"></i>
          </div>
          <h5 class="text-center" style="color:#78B598; font-weight:600; font-size:30px; line-height:36.31px">A Great Big Thank You!</h5>
          <p class="text-center" style="width: 803px; height:108px; font-weight:400; font-size:20px; line-height:24.2px;color:#242424"><?php echo $donor_name . ' '; ?>Your Contribution means a lot and will be put to good use in making a difference We've sent your donation reciept to <?php echo $email_address; ?></p>
        </div>
        <div class=" text-center" style="height:100px">
          <!-- <h5 class="spread">Help Spread the word by sharing your support with your friends and followers</h5> -->
          <div class="row">
            <!-- <div class="col-md-6"> -->
            <!-- Share on LinkedIn -->
            <!-- <button type="button" class="btn btn-primary linked-button" onclick="shareOnFacebook()">Share on facebook<i class="fa-brands fa-facebook" style="margin-left: 5px;"></i></button> -->
          </div>
          <!-- <div class="col-md-6"> -->
          <!-- Share on Twitter -->
          <!-- <button type="button" class="btn btn-info twitter-button" onclick="shareOnTwitter()">Share on Twitter<i class="fa-brands fa-twitter" style="margin-left: 5px;"></i></button> -->

          <!-- </div> -->
          <!-- </div> -->
        </div>
        <div class="row" style="margin-left: 7%;">
         
        </div>
        <!-- <hr>
        <div class="text-center mb-4">
          <div class="row don_det">
            <div class="col-md-6 d-flex align-items-center">
              <i class="fa-solid fa-user"></i> DONOR NAME
            </div>
            <div class="col-md-6 d-flex align-items-center">
              <?php echo $donor_name; ?>
            </div>
          </div>
          <div class="row don_det">
            <div class="col-md-6 d-flex align-items-center">
              <i class="fa-solid fa-user"></i> PAN NUMBER
            </div>
            <div class="col-md-6 d-flex align-items-center">
              <?php echo $pan_number; ?>
            </div>
          </div>
          <div class="row don_det">
            <div class="col-md-6 d-flex align-items-center">
              <i class="fa-solid fa-envelope"></i> EMAIL ADDRESS
            </div>
            <div class="col-md-6 d-flex align-items-center">
              <?php echo $email_address; ?>
            </div>
          </div>
          <div class="row don_det">
            <div class="col-md-6 d-flex align-items-center">
              <i class="fa-solid fa-address-book"></i> CONTACT DETAILS
            </div>
            <div class="col-md-6 d-flex align-items-center">
              <?php echo $contact_details; ?>
            </div>
          </div>
        </div> -->
        <!-- <h4 class="text-center mt-2">Donation Details</h4> -->
        <!-- <hr> -->
        <div class="text-center mb-4" style="margin-top: -19%;">
          <!-- <div class="row don_det">
            <div class="col-md-6 d-flex align-items-center">
              PAYMENT STATUS  
            </div>
            <div class="col-md-6 d-flex align-items-center">
              Complete
            </div>
          </div>
          <div class="row don_det">
            <div class="col-md-6 d-flex align-items-center">
              PAYMENT METHOD
            </div>
            <div class="col-md-6 d-flex align-items-center">
              Test Donation
            </div>
          </div>
          <div class="row don_det">
            <div class="col-md-6 d-flex align-items-center">
              DONATION AMOUNT
            </div>
            <div class="col-md-6 d-flex align-items-center">
              ₹<?php echo $amount; ?>
            </div>
          </div>
          <div class="row don_det">
            <div class="col-md-6 d-flex align-items-center">
              </i> DONATION TOTAL
            </div>
            <div class="col-md-6 d-flex align-items-center">
              ₹<?php echo $amount; ?>
            </div>
          </div> -->
          <div style=" overflow-x: hidden; width:504px; margin:auto">
            <table class="table table-bordered" style="border-color: black;">
              <thead>
                <tr class="bg-success">
                  <div class="row" style="background-color: #78B598; height:57px; font-family: 'Inter', sans-serif; display:flex; justify-content:center; align-items:center; border-radius:10px">
                    <div class="col-md-6 d-flex align-items-center">
                      <!-- <th scope="col" colspan="2" class="text-center" style="color: #fff;">Donation Details<div class="dropdown"> -->
                      <h4 class="text-left" style="position: absolute; top: -8px;color: #fff; left: 32%; font-size:20px">Donation Details</h4>
                    </div>
                    <div class="col-md-6 ">
                      <!-- <th scope="col" colspan="2" class="text-center" style="color: #fff;">Donation Details<div class="dropdown"> -->
                      <i class="fa-solid fa-ellipsis-vertical" id="ellipsisIcon" data-toggle="dropdown" style="position: absolute; top: -5px; color:#fff; font-size:20px; cursor:pointer; left:82%"></i>
                      <div class="dropdown-menu" style="padding:10px;">
                        <form method="post" action="" onsubmit="handleDownload()">
                          <div class="row">
                            <div class="col-md-3">
                              <div class="download_btn">
                                <button type="submit" name="download_pdf" class="btn btn-success round-button" style="background-color: #00A86B; color:#fff">
                                  <i class="fa-solid fa-download"></i>
                                </button>
                              </div>
                            </div>
                            <div class="col-md-3">

                              <button type="button" class="btn btn-primary round-button" onclick="shareOnFacebook()">
                                <i class="fa-brands fa-facebook"></i></button>
                              </button>

                            </div>
                            <div class="col-md-3">
                              <div class="download_btn">
                                <button type="button" class="btn btn-info round-button" onclick="shareOnTwitter()">
                                  <i class="fa-brands fa-twitter"></i></button>
                                </button>
                              </div>
                            </div>

                            <div class="col-md-3">
                              <div class="download_btn">
                                <button type="button" class="btn btn-primary round-button" onclick="shareOnLinkedIn()">
                                  <i class="fa-brands fa-linkedin"></i></button>
                                </button>
                              </div>
                            </div>
                          </div>

                        </form>
                      </div>
                    </div>
                  </div>
          </div>
          </th>
          </tr>
          </thead>
          <tbody>
            <tr style="margin-right:20px;">
              <td class="align-items-center">Donor Name</td>
              <td class="text-center align-middle"><?php echo $donor_name; ?></td>
            </tr>
            <tr>
              <td class="text-center align-middle">Email Address</td>
              <td class="text-center align-middle"><?php echo $email_address; ?></td>
            </tr>
            <tr>
              <td class="text-center align-middle">Contact Number</td>
              <td class="text-center align-middle"><?php echo $contact_details; ?></td>
            </tr>
            <tr>
              <td class="text-center align-middle">Payment Status</td>
              <td class="text-center align-middle"><?php echo $status == 1 ? "Completed" : "Pending"; ?></td>
            </tr>
            <tr>
              <td class="text-center align-middle">Payment Method</td>
              <td class="text-center align-middle">Offline</td>
            </tr>
            <tr>
              <td class="text-center align-middle">Donation Amount</td>
              <td class="text-center align-middle"><?php echo  "₹ " . $amount; ?></td>
            </tr>
            <tr>
              <td class="text-center align-middle">Payment Id</td>
              <td class="text-center align-middle"><?php echo "RGTWF0" . $id; ?></td>
            </tr>
          </tbody>
          </table>
        </div>
        <div class="text-center" style="margin-bottom: -23px; height:50px; margin-top:20px">
          <div>
            <h5 class="spread">Help Spread the word by sharing your support with your friends and followers</h5>
          </div>
          <!-- <h5 class="p-3"><i class="fa-solid fa-lock" style="margin-right: 4px;"></i>secure donation</h5> -->
          <button style="width:422px; height:70px; border-radius:10px; padding:15px; gap:10px; background-color:#78B598; color:#fff; border:none;
          font-weight: 700; font-size:20px; align-items:center; line-height:24.2px; font-family: 'Inter', sans-serif; margin-top:2%">Done</button>
        </div>
        </div>
      </main>
    </section>
    <script>
      function shareOnFacebook() {
        // Get the current page's URL
        var currentURL = window.location.href;

        console.log(currentURL, 'currenturl');

        // Construct the Facebook sharing URL with the current page's URL
        var facebookURL = 'https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent(currentURL);

        console.log(facebookURL, 'facebook');

        // Open the Facebook sharing URL in a new tab
        window.open(facebookURL, '_blank');
      }

      function shareOnTwitter() {
        // Define the content to share on Twitter
        var shareContent = "Just donated ₹" + <?php echo $amount; ?> + " to RGT Welfare Foundation. #RGTWelfareFoundation #Donate";
        console.log(shareContent, 'Twitter');
        // Construct the Twitter sharing URL with the pre-defined message
        var twitterURL = 'https://twitter.com/intent/tweet?text=' + encodeURIComponent(shareContent);
        // Open the Twitter sharing URL in a new tab
        window.open(twitterURL, '_blank');
      }

      function shareOnLinkedIn() {
        // Define the content to share on LinkedIn
        var shareContent = "Just donated ₹" + <?php echo $amount; ?> + " to RGT Welfare Foundation. #RGTWelfareFoundation #Donate";
        console.log(shareContent, 'LinkedIn');

        // Construct the LinkedIn sharing URL with the pre-defined message
        var linkedinURL = 'https://www.linkedin.com/shareArticle?mini=true&url=' + encodeURIComponent(window.location.href) + '&title=' + encodeURIComponent('Donation to RGT Welfare Foundation') + '&summary=' + encodeURIComponent(shareContent);

        // Open the LinkedIn sharing URL in a new tab
        window.open(linkedinURL, '_blank');
      }


      $(document).ready(function() {
        $("#ellipsisIcon").click(function() {
          $(".dropdown-menu").toggle();
        });

        // Close the dropdown when clicking outside of it
        $(document).on("click", function(e) {
          if (!$(e.target).closest(".dropdown").length) {
            $(".dropdown-menu").hide();
          }
        });
      });

      function handleDownload() {
        // Add your download logic here
        alert("Download PDF logic goes here");
      }

    </script>
  </body>

  </html>
<?php
  ob_end_flush();
} else {
  // Query failed
  echo 'Error fetching user data from the database.';
}
?>