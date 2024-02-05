
function openPopup() {
    document.getElementById('popup').style.display = 'block';
    document.getElementById('overlay').style.display = 'block';
    document.body.style.overflowY = "hidden";

  }

  function closePopup() {
    document.getElementById('popup').style.display = 'none';
    document.getElementById('overlay').style.display = 'none';
    document.body.style.overflowY = "scroll";
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

        // Function to format number in Indian numbering system (1,00,000 format)
        function formatIndianNumber(amount) {
          return amount.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
      }
  
      // Update donation total when input changes
      document.getElementById('Amount').addEventListener('input', function() {
          var amount = parseFloat(this.value.replace('₹', '')) || 0; // Remove '₹' symbol and convert to number
          var formattedAmount = formatIndianNumber(amount.toFixed(2)); // Format amount in Indian numbering system
          document.getElementById('donationTotal').innerText = ' ₹' + formattedAmount; // Update total with formatted amount
      });

  jQuery.validator.addMethod("noSpecialChars", function(value, element) {
    return this.optional(element) || /^[a-zA-Z\s]*$/.test(value); // Allows only letters and spaces
  });


  jQuery.validator.addMethod("onlyTenDigits", function(value, element) {
    return this.optional(element) || /^\d{10}$/.test(value); // Allows only exactly 10 digits
  });

  jQuery.validator.addMethod("validPAN", function(value, element) {
    return this.optional(element) || /^[A-Z]{5}[0-9]{4}[A-Z]{1}$/.test(value); // Validates PAN format
  });

  jQuery.validator.addMethod("validAmount", function(value, element) {
    // Check if the value contains only digits and is less than 1 lakh
    return this.optional(element) || (/^\d+$/).test(value) && parseInt(value) < 100000;
  });


    jQuery("#donation-form").validate({
      rules:{
        full_name: {
          noSpecialChars:true
        },
        contact:{
          onlyTenDigits:true,
        },
        pan:{
          validPAN:true
        },
        amount:{
          validAmount:true
        }
      },
      messages:{
        full_name:{
          noSpecialChars:"Please enter only letters and spaces"
        },
        contact:{
          onlyTenDigits:"Please enter valid phone number",
        },
        pan:{
          validPAN:"Please enter a valid PAN number"
        },
        amount:{
          validAmount:"Please enter a valid amount less than 1 lakh"
        }
      }
    });




//donation table ajax call
// jQuery(document).ready(function($){
//   let search_form = $('#my-search-form');

//   search_form.submit(function(event){
//     event.preventDefault();
//     let search_word = $('#my_search_word').val(); // Added '#' to the selector
//     let formData = new FormData();
//     formData.append('action','my_search_func');
//     formData.append('search_word',search_word);


//     $.ajax({
//       url: ajaxUrl,
//       type: 'post',
//       data: formData,
//       processData: false,
//       contentType: false,
//       success: function(response){
//         console.log(response);
//       },
//       error: function(){
//         console.log('error');
//       }
//     })

//   });
// });