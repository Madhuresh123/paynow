<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./src/style/style.donate.css">

  <title>Donate Now</title>
</head>
<body>

  <!-- Donate Now Button -->
  <button onclick="openPopup()">Donate Now</button>

  <!-- Popup Overlay -->
  <div class="overlay" id="overlay"></div>

  <!-- Donation Form Popup -->
  <div class="popup" id="popup">
    <span class="close-btn" onclick="closePopup()">X</span>
    <h2>Donation Form</h2>
    <form>
      <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
      </div>
      <div class="form-group">
        <label for="pan">PAN Number:</label>
        <input type="text" id="pan" name="pan" required>
      </div>
      <div class="form-group">
        <label for="email">Email Address:</label>
        <input type="email" id="email" name="email" required>
      </div>
      <div class="form-group">
        <label for="contact">Contact Number:</label>
        <input type="tel" id="contact" name="contact" required>
      </div>
      <div class="form-group">
        <button type="button" onclick="submitForm()">Submit</button>
      </div>
    </form>
  </div>

  <script src="./src/script/script.donate.js" defer></script>
</body>
</html>
