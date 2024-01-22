<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../style/donate.css">
  <title>Donate Now</title>

</head>
<body>

  <!-- Donate Now Button -->
  <button class="donate_btn" onclick="openPopup()">Donate Now</button>

  <!-- Popup Overlay -->
  <div class="overlay" id="overlay"></div>

  <!-- Donation Form Popup -->
  <div class="popup" id="popup">
    <span class="close-btn" onclick="closePopup()">X</span>
    <h2>Personal Info</h2>
    <form>
      
      <div class="form-group">
        <label for="name">Full Name<span class="required-symbol">*</span></label><br>
        <input class="donor-input" type="text" id="name" name="name" placeholder="Full Name" onfocus="clearPlaceholder(this)" onblur="restorePlaceholder(this)" required>
      </div>
      <div class="form-group">
        <label for="pan">PAN Number<span class="required-symbol">*</span></label><br>
        <input  class="donor-input" type="text" id="pan" name="pan"  placeholder="PAN Number"  onfocus="clearPlaceholder(this)" onblur="restorePlaceholder(this)"  required>
      </div>
      <div class="form-group">
        <label for="email">Email Address<span class="required-symbol">*</span></label><br>
        <input  class="donor-input" type="email" id="email" name="email" placeholder="Email Address" onfocus="clearPlaceholder(this)" onblur="restorePlaceholder(this)"  required>
      </div>
      <div class="form-group">
        <label for="contact">Contact Number<span class="required-symbol">*</span></label><br>
        <input class="donor-input"  type="tel" id="contact" name="contact"  placeholder="Contact Number"  onfocus="clearPlaceholder(this)" onblur="restorePlaceholder(this)" required>
      </div>

      <div>
      <p>To make an offline donation toward this cause, follow these steps:</p>

<ol>
    <li>Write a check payable to "RGT Welfare Foundation"</li>
    <li>On the memo line of the check, indicate that the donation is for "RGT Welfare Foundation"</li>
    <li>Mail your check to:</li>
</ol>

<address>
    RGT Welfare Foundation<br>
    Noida, India<br>
    Electronic City<br>
    Ground Floor, Pinnacle Tower,<br>
    A-42/6 Sector 62 Noida (UP) 201301
</address>

<p>Your tax-deductible donation is greatly appreciated!</p>

<p><strong>Donation Total:</strong> ₹100.00</p>

</div>
      <div class="form-group">
        <button class="donate_btn" type="button" onclick="submitForm()">Submit</button>
      </div>
    </form>

  </div>
</body>
</html>
