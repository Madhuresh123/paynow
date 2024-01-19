<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../style/donate.css">
  <title>Donate Now</title>

  <style>
    body {
    font-family: Arial, sans-serif;
  }
  .popup {
    display: none;
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    padding: 20px;
    background: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    z-index: 1001;
  }
  .overlay {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 10rem;
    background: rgba(0, 0, 0, 0.5);
    z-index: 1000;
  }
  .form-group {
    margin-bottom: 15px;
  }
  .close-btn {
    position: absolute;
    top: 10px;
    right: 10px;
    cursor: pointer;
  }  

  </style>
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

  <script>
    function openPopup() {
    document.getElementById('popup').style.display = 'block';
    document.getElementById('overlay').style.display = 'block';
  }

  function closePopup() {
    document.getElementById('popup').style.display = 'none';
    document.getElementById('overlay').style.display = 'none';
  }

  function submitForm() {
    // Add your form submission logic here
    alert('Form submitted successfully!');
    closePopup();
  }
  </script>
</body>
</html>
