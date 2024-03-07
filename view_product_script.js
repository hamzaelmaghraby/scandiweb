$(document).ready(function() {
    $.ajax({
      url: './controller/controller.php?products=1', // Replace 'your-endpoint-url' with the URL you are requesting.
      type: 'GET', // or 'POST', depending on your requirements
      success: function(response) {
        // Handle success. 'response' contains the data returned from the server.
        document.getElementById('result').innerHTML=response;
      },
      error: function(xhr, status, error) {
        // Handle error.
        console.error(error);
      }
    });
  });

$("#productform").submit(function(e) {
    e.preventDefault(); // avoid to execute the actual submit of the form.
    var option_id = [];
    $(':checkbox:checked').each(function(i){
        option_id[i] = $(this).val();
    });
    if(option_id.length === 0) {
        console.log("please selecet at least 1 product")
    }
    else{
        $.ajax({
            type: "POST",
            url: "controller/controller.php",
            data: {
               'deleteproduct': 1,
               option_id:option_id
            },
            success: function(data){
                location.reload();
            },
            error: function(xhr, status, error){
            console.error(xhr);
            }
        });
    }
    
});


$('#add').on('click', function(){
    window.location.href = window.location.href+'add_product.php';
});