<?php
ob_start();
include "validation.donate.php";
?>

  <div class="container">

  <!-- Donate Now Button -->
  <button class="donate_btn" onclick="openPopup()">Donate Now</button>

  <!-- Popup Overlay -->
  <div class="overlay" id="overlay"></div>

  <!-- Donation Form Popup -->
  <div class="popup" id="popup">
    <span class="close-btn" onclick="closePopup()">X</span>
    <h2>Personal Info</h2>

    <form action="" method="post" id="donation-form">
      
    
    <div class="first-info">
      <div class="form-group">
        <label for="name">Full Name<span class="required-symbol">*</span></label><br>
        <input class="donor-input" type="text" id="name" name="full_name" placeholder="Full Name" onfocus="clearPlaceholder(this)" onblur="restorePlaceholder(this)" required>
        <label id="full_name-error" class="error" for="name"></label>
      </div>
      <div class="form-group">
        <label for="email">Email Address<span class="required-symbol">*</span></label><br>
        <input  class="donor-input" type="email" id="email" name="email" placeholder="Email Address" onfocus="clearPlaceholder(this)" onblur="restorePlaceholder(this)"  required>
      </div>
    </div>

    <div class="first-info">

      <div class="form-group">
        <label for="contact">Contact Number<span class="required-symbol">*</span></label><br>
        <input class="donor-input"  type="tel" id="contact" name="contact"  placeholder="Contact Number"  onfocus="clearPlaceholder(this)" onblur="restorePlaceholder(this)" required>
      </div>
      <div class="form-group">
        <label for="pan">PAN Number</label><br>
        <input  class="donor-input" type="text" id="pan" name="pan"  placeholder="PAN Number"  onfocus="clearPlaceholder(this)" onblur="restorePlaceholder(this)">
      </div>
</div>
<div class="form-group">
        <label for="Amount">Amount<span class="required-symbol">*</span></label><br>
        <input  class="donor-input" type="text" id="Amount" name="amount"  placeholder="₹0"  onfocus="clearPlaceholder(this)" onblur="restorePlaceholder(this)" required>
        <label id="amount-error" class="error" for="Amount"></label>
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

<p><strong>Donation Total:</strong><span id="donationTotal"> ₹00.00</span></p>

</div>
      <div class="form-group">
        <input type="submit" class="donate_btn" name="register" value="Submit">
      </div>
    </form>

  </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/jquery.validate.min.js" integrity="sha512-WMEKGZ7L5LWgaPeJtw9MBM4i5w5OSBlSjTjCtSnvFJGSVD26gE5+Td12qN5pvWXhuWaWcVwF++F7aqu9cvqP0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <?php
ob_end_flush();
?>
