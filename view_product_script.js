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
            url: "controller.php",
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


document.getElementById('add').onclick =() => {
    window.location.href = window.location.origin+"/add_product.php";
}