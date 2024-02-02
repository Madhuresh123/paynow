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
  </head>
  <style>
    .check_circle {
      color: green;
      font-size: 60px;
    }

    .spread {
      /* width: 100%; */
      font-size: 15px;
      padding: 5px;
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

    table {
      border-collapse: collapse;
    }

    table,
    th,
    td {
      border: none;
    }

    .don_det {
      margin-left: 63px;
    }
  </style>

  <body>
    <section class="main_container container d-flex flex-column justify-content-center align-items-center">

      <main class="form_main bg-info-subtle" style="box-shadow: 0px 0px 2px 2px;">
        <div class=" p-5">
          <div class="text-center check_circle">
            <i class="fa-regular fa-circle-check"></i>
          </div>
          <h5 class="text-center">A great Big Thank You!</h5>
          <p class="text-center">Losium 50 Tablet is a medicine used to treat high blood pressure and heart failure. Lowering blood pressure helps to prevent future heart attacks and stroke. This medicine is also effective in preserving kidney function in patients with diabetes</p>
        </div>
        <div class="bg-primary-subtle text-center" style="height:100px">
          <h5 class="spread">Help Spread the word by sharing your support with your friends and followers</h5>
          <div class="row">
            <div class="col-md-6">
              <button type="button" class="btn btn-primary linked-button" onclick="shareOnLinkedIn()">
                Share on LinkedIn<i class="fa-brands fa-linkedin" style="margin-left: 5px;"></i>
              </button>
            </div>
            <div class="col-md-6">
              <button type="button" class="btn btn-info twitter-button">Share on Twitter<i class="fa-brands fa-twitter" style="margin-left: 5px;"></i></button>
            </div>
          </div>
        </div>
        <h4 class="text-center mt-2">DONOR DETAILS</h4>
        <hr>
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
        </div>
        <h4 class="text-center mt-2">Donation Details</h4>
        <hr>
        <div class="text-center mb-4">
          <div class="row don_det">
            <div class="col-md-6 d-flex align-items-center">
              <i class="fa-solid fa-user"></i>PAYMENT STATUS
            </div>
            <div class="col-md-6 d-flex align-items-center">
              Complete
            </div>
          </div>
          <div class="row don_det">
            <div class="col-md-6 d-flex align-items-center">
              <i class="fa-solid fa-user"></i> PAYMENT METHOD
            </div>
            <div class="col-md-6 d-flex align-items-center">
              Test Donation
            </div>
          </div>
          <div class="row don_det">
            <div class="col-md-6 d-flex align-items-center">
              <i class="fa-solid fa-envelope"></i> DONATION AMOUNT
            </div>
            <div class="col-md-6 d-flex align-items-center">
              ₹<?php echo $amount; ?>
            </div>
          </div>
          <div class="row don_det">
            <div class="col-md-6 d-flex align-items-center">
              <i class="fa-solid fa-address-book"></i> DONATION TOTAL
            </div>
            <div class="col-md-6 d-flex align-items-center">
              ₹<?php echo $amount; ?>
            </div>
          </div>
          <form method="post" action="">
            <button type="submit" name="download_pdf" class="btn btn-primary">DOWNLOAD PDF</button>
          </form>

          <div class="bg-primary-subtle text-center" style="margin-bottom: -23px; height:50px; margin-top:20px">
            <h5 class="p-3"><i class="fa-solid fa-lock" style="margin-right: 4px;"></i>secure donation</h5>
          </div>

        </div>
      </main>
    </section>

  </body>

  </html>
<?php
  ob_end_flush();
} else {
  // Query failed
  echo 'Error fetching user data from the database.';
}
?>