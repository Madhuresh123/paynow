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

    // $pdf->writeHTML("Donor Name: $donor_name<br>PAN Number: $pan_number<br>Email Address: $email_address<br>Contact Details: $contact_details<br>");
    //   $pdf->writeHTML(
    //     "
    //   <table style='width:100%; border-collapse: collapse;'>
    //   <tr>
    //     <td style='border: 1px solid #ddd; padding: 8px;'>Donor Name:</td>
    //     <td style='border: 1px solid #ddd; padding: 8px;'>$donor_name</td>
    //   </tr>
    //   <tr>
    //     <td style='border: 1px solid #ddd; padding: 8px;'>PAN Number:</td>
    //     <td style='border: 1px solid #ddd; padding: 8px;'>$pan_number</td>
    //   </tr>
    //   <tr>
    //     <td style='border: 1px solid #ddd; padding: 8px;'>Email Address:</td>
    //     <td style='border: 1px solid #ddd; padding: 8px;'>$email_address</td>
    //   </tr>
    //   <tr>
    //     <td style='border: 1px solid #ddd; padding: 8px;'>Contact Details:</td>
    //     <td style='border: 1px solid #ddd; padding: 8px;'>$contact_details</td>
    //   </tr>
    // </table>"
    //   );

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


    .col_1 {
      color: #fff;
      /* margin-left: -29px; */
      position: absolute;
      top: 4%;
      left: 12%;
      font-size: 20px;
    }

    .col_2 {
      position: absolute;
      color: #fff;
    }

    .triple_dot {
      position: absolute;
      top: -23px;
      color: #fff;
      font-size: 20px;
      cursor: pointer;
      left: 10rem;
    }

    .table-bordered thead td,
    .table-bordered thead th {
      border-bottom-width: 2px;
      height: 59px;
    }

    .don_det {
      margin-left: 63px;
    }

    .round-button {
      border-radius: 50%;
      width: 40px;
      height: 40px;
      padding: 0;
      color: #78B598;
      background: #fff;
      border: 1px solid #A9A9A9;
      box-shadow: 0px 4px 4px 0px #00000040;

    }

    .round-button:hover {
      border-radius: 50%;
      width: 40px;
      height: 40px;
      padding: 0;
      color: #78B598;
      background: #fff;
      border: 1px solid #A9A9A9;
      box-shadow: 0px 4px 4px 0px #00000040;

    }

    .round-button:not(:hover) {
      border-radius: 50%;
      width: 40px;
      height: 40px;
      padding: 0;
      color: #78B598;
      background: #fff;
      border: 1px solid #A9A9A9;
      box-shadow: 0px 4px 4px 0px #00000040;

    }

    .table-bordered td,
    .table-bordered th {
      border: none;
    }

    .table-bordered>:not(caption)>*>* {
      border-width: none;
    }

    .table .td1 {
      padding: 0.75rem;
      vertical-align: top;
      border-top: none;
      margin-left: 36px;
    }


    .table-bordered {
      border: 1px solid #D9D5EC;
      border-color: none;
    }

    .bg-success {
      background-color: #78B598 !important;
      height: 45px;
    }

    .dropdown-menu {
      padding: 20px;
      position: absolute;
      width: 237px;
      height: 80px;
      gap: 20px;
      border-radius: 5px;
      box-shadow: 0px 4px 20px 0px #0000000F;
      border: none;
      transform: translate3d(160px, -3px, 0px);
      top: -3px;
      left: -3px;
      will-change: transform;
    }

    .right {
      /* color: red; */
      position: relative;
      text-align: start;
      left: 15px;
    }
  </style>

  <body>
    <section class="container d-flex flex-column justify-content-center align-items-center" style="margin-top: -14rem;">

      <main class="form_main">
        <div class=" p-5" style="margin-bottom: -19%;">
          <div class="text-center check_circle">
            <i class="fa-regular fa-circle-check"></i>
          </div>
          <h5 class="text-center" style="color:#78B598; font-weight:600; font-size:30px; line-height:36.31px">A Great Big Thank You!</h5>
          <p class="text-center" style="width: 803px; height:108px; font-weight:400; font-size:20px; line-height:24.2px;color:#242424"><?php echo $donor_name . ' '; ?>Your Contribution means a lot and will be put to good use in making a difference We've sent your donation reciept to <?php echo $email_address; ?></p>
        </div>
        <div class=" text-center" style="height:100px">
          <div class="row">
          </div>
        </div>
        <div class="row">
          <div style="width:504px; margin:auto; position:relative">
            <table class="table table-bordered ">
              <thead class="bg-success" style="border-radius: 12px !important;">
                <tr>
                  <th class="text-center">
                    <h4 class="col_1">Donation Details</h4>
                  </th>
                  <th class="text-center">
                    <h4 class="col_2">
                      <div class="col-md-6">
                        <i class="fa-solid fa-ellipsis-vertical triple_dot" id="ellipsisIcon" data-toggle="dropdown"></i>
                        <div class="dropdown-menu">
                          <form method="post" action="">
                            <div class="row" style="gap:14px">
                              <div class="col-md-2">
                                <div class="download_btn">
                                  <button type="submit" name="download_pdf" class="btn  round-button">
                                    <i class="fa-solid fa-download"></i>
                                  </button>
                                </div>
                              </div>
                              <div class="col-md-2">
                                <button type="button" class="btn  round-button" onclick="shareOnFacebook()">
                                  <i class="fa-brands fa-facebook"></i></button>
                                </button>
                              </div>
                              <div class="col-md-2">
                                <div class="download_btn">
                                  <button type="button" class="btn  round-button" onclick="shareOnTwitter()">
                                    <i class="fa-brands fa-twitter"></i></button>
                                  </button>
                                </div>
                              </div>
                              <div class="col-md-2">
                                <div class="download_btn">
                                  <button type="button" class="btn  round-button" onclick="shareOnLinkedIn()">
                                    <i class="fa-brands fa-linkedin"></i></button>
                                  </button>
                                </div>
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>
                    </h4>
                  </th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="d-flex align-items-center td1">Donor Name</td>
                  <td class="text-left right"><?php echo $donor_name; ?></td>
                </tr>
                <tr>
                  <td class="d-flex align-items-center td1">Email Address</td>
                  <td class="text-left right"><?php echo $email_address; ?></td>
                </tr>
                <tr>
                  <td class="d-flex align-items-center td1">Contact Number</td>
                  <td class="text-left right"><?php echo $contact_details; ?></td>
                </tr>
                <tr>
                  <td class="d-flex align-items-center td1">Payment Status</td>
                  <td class="text-left right"><?php echo $status == 1 ? "Completed" : "Pending"; ?></td>
                </tr>
                <tr>
                  <td class="d-flex align-items-center td1">Payment Method</td>
                  <td class="text-left right">Offline</td>
                </tr>
                <tr>
                  <td class="d-flex align-items-center td1">Donation Amount</td>
                  <td class="text-left right"><?php echo  "₹" . $amount; ?></td>
                </tr>
                <tr>
                  <td class="d-flex align-items-center td1">Payment Id</td>
                  <td class="text-left right"><?php echo "RGTWF0" . $id; ?></td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="text-center" style="margin-bottom: -23px; height:50px; margin-top:20px">
            <div>
              <h5 class="spread">Help Spread the word by sharing your support with your friends and followers</h5>
            </div>
            <button style="width:422px; height:70px; border-radius:10px; padding:15px; gap:10px; background-color:#78B598; color:#fff; border:none;
          font-weight: 700; font-size:20px; align-items:center; line-height:24.2px; font-family: 'Inter', sans-serif; margin-top:2%">Done</button>
          </div>
        </div>
      </main>
    </section>
    <script>
      function shareOnFacebook() {
        var shareContent = "Just donated ₹" + <?php echo $amount; ?> + " to RGT Welfare Foundation. #RGTWelfareFoundation #Donate";
        console.log(shareContent, 'Facebook');

        var facebookURL = 'https://www.facebook.com/dialog/share?app_id=YOUR_ACTUAL_APP_ID&display=popup&href=' + encodeURIComponent(window.location.href) + '&quote=' + encodeURIComponent(shareContent);

        window.open(facebookURL, '_blank', 'width=600,height=400,scrollbars=yes');
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