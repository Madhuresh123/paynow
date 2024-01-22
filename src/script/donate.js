function openPopup() {
    document.getElementById('popup').style.display = 'block';
    document.getElementById('overlay').style.display = 'block';
    document.body.style.overflowY = "hidden";

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

  var currentPlaceholder = "";

  function clearPlaceholder(element) {
      currentPlaceholder = element.placeholder;
      element.placeholder = '';
  }

  function restorePlaceholder(element) {
      element.placeholder = currentPlaceholder;
  }