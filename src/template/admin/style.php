<style>
  .action_popup {
display: none;
position: fixed;
width: 35rem;
height: 25rem;
top: 50%;
left: 50%;
transform: translate(-50%, -50%);
padding: 20px 3rem;
background: #fff;
box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
border-radius: 8px;
z-index: 1000;
}
.overlay {
  display: none;
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0, 0, 0, 0.5);
  z-index: 999;
}
.form-group {
 margin-bottom: 15px;
  margin-right: 1rem;
}
.close-btn {
position: absolute;
top: 10px;
right: 10px;
cursor: pointer;
}  

.action_btn{
  width: 4rem;
  height: 2rem;
  background-color: lightblue;
  color: white;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  font-weight: bold;
}

.donate_btn:hover{
  background-color: rgb(121, 94, 148);
}

.wp-list-table{
  font-size:20px;
}

.status-style{
  width: 5rem;
  background-color: #E4FFE5;
  text-align:center;
  border-radius:5px;
  height: 2rem;
  display:flex;
  justify-content:center;
  align-items:center;
  color:black;
  font-weight:500;
}

.completed {
    background-color: #E4FFE5;
}

.pending {
    background-color: #FBECB7;
}

.row-cell{
  width:8rem;
  height:3rem;
  color:black;
  font-weight:400;
  padding-top:1rem;
  font-size:14px;
}

.donation-history-title > h1{
  font-family: Inter;
  font-weight: 600;
  line-height: 36px;
  letter-spacing: 0em;
  text-align: left;
  color: #78B598;
}

.my_search_word{
    width:20rem;
    height:2rem;
  }

  .my_search_btn{
  width: 4rem;
  height: 2rem;
  background-color: #78B598;
  color: white;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  font-weight: bold;
  margin-left:1rem;
}

.my_search_btn:hover{
  background-color: #709583;
}

/* donation delete php_check_syntax */
.delete-opt{
    width: 6rem;
    display: flex;
    justify-content:space-between;
}

.donate_btn{
  width: 4rem;
  height: 2rem;
  background-color: #78B598;
  color: white;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  font-weight: bold;
}

.donate_btn:hover{
  background-color: #709583;
}

/* donation edit php */
.form-group {
 margin-bottom: 15px;
  margin-right: 1rem;
}

.donate_btn{
  width: 8rem;
  height: 3rem;
  background-color: #78B598;
  color: white;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  font-weight: bold;
}

.donate_btn:hover{
  background-color: #709583;
}

    .donor-input{
  width: 23rem;
  height: 3rem;
  border-radius: 5px;
  border: 1px solid lightgrey;
  outline: none;
  padding-left: 10px;
}

.first-info{
  display: flex;
  margin-bottom: 1rem;
}

.donor-input::placeholder {
  position: absolute;
  pointer-events: none;
  transition: opacity 0.3s ease-in-out;
  opacity: 1;
  color: black;
}

</style>

<script>
jQuery(document).ready(function($){
    let search_form = $('#my-search-form');

    search_form.submit(function(event){
      event.preventDefault();
      let search_word = $('#my_search_word').val(); // Added '#' to the selector
      let formData = new FormData();
      formData.append('action','my_search_func');
      formData.append('search_word',search_word);


      $.ajax({
        url: ajaxUrl,
        type: 'post',
        data: formData,
        processData: false,
        contentType: false,
        success: function(response){
          $('#my-table-results').html(response);
        },
        error: function(){
          console.log('error');
        }
      })

    });
});
</script>