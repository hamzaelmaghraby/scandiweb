function validateForm() {
    const skuPattern = /^[A-Za-z0-9]*$/;
    const namePattern= /^[A-Za-z0-9]*$/;
    let sku1 = document.forms["product_form"]["sku"].value;
    let name1 = document.forms["product_form"]["name"].value;
    let skuError = document.getElementById('skuerror');
    let nameError = document.getElementById('nameerror');
    let priceError = document.getElementById('priceerror');
    let productError = document.getElementById('producterror');
    skuError.style.display = "none";
    nameError.style.display = "none";
    priceError.style.display = "none";
    productError.style.display = "none";
    if(sku1 == "" || sku1.trim()==""){
        document.getElementById('skuerror').innerHTML ='sku cant be empty';
        document.getElementById('skuerror').style.display = "block";
        return false;
    }
    if(!sku1.match(skuPattern)){
        document.getElementById('skuerror').innerHTML ='"Please, include only letters, numbers or the combination of both in the SKU.';
        document.getElementById('skuerror').style.display = "block";
        return false;
    }
    if(name1 == "" || name1.trim()==""){
        document.getElementById('nameerror').innerHTML ='name cant be empty';
        document.getElementById('nameerror').style.display = "block";
        return false;
    }
    if(!name1.match(namePattern)){
        document.getElementById('nameerror').innerHTML ='"Please, include only letters in the name.';
        document.getElementById('nameerror').style.display = "block";
        return false;
    }
    return true;
}



$("#product_form").submit(function(e) {
    x = validateForm();
    if(x){
        e.preventDefault(); // avoid to execute the actual submit of the form.
        const sku = $('#sku').val();
        const name = $('#name').val();
        const price = $('#price').val();
        const type = $('#productType').val();
        const size = $('#size').val();
        const weight = $('#weight').val();
        const height = $('#height').val();
        const width = $('#width').val();
        const length = $('#length').val(); 
        $.ajax({
            type: "POST",
            url: "controller/controller.php",
            data: {
                'saveproduct': 1,
                'sku':sku,
                'name':name,
                'price':price,
                'type':type,
                'size':size,
                'weight':weight,
                'height':height,
                'width':width,
                'length':length,
    
            },
            success: function(){
                window.location.href = window.location.origin;
                return true;
            },
            error: function(xhr, status, error){
            console.error(xhr);
            return false;
            }
            });
    }
    else{
        return false;
    }
    
});


let dropdownList = document.getElementById('productType');
dropdownList.onchange = () =>{
    if(dropdownList.options[dropdownList.selectedIndex].text == "DVD" ){
        document.getElementById("productcontainer").innerHTML = '<strong>Please, provide size</strong>'
        +'<br><br>'
        +'<label><strong>Size</strong></label>'
        +'<input type="number" required="true" min=0 placeholder="Enter DVD Size" name="size" id="size" >';
    }
    else if(dropdownList.options[dropdownList.selectedIndex].text == "Book" ){
        document.getElementById("productcontainer").innerHTML = '<strong>Please, provide weight</strong>'
        +'<br><br>'
        +'<label for="weight"><strong>Weight</strong></label>'
        +'<input type="number" required="true" name="weight" placeholder="Enter Book Weight" id="weight" min="0">';
    }
    else{
        document.getElementById("productcontainer").innerHTML = '<strong>Please, provide Dimensions</strong>'
        +'<br><br>'
        +'<label for="height"><strong>Height</strong></label>'
        +'<input type="number" required="true"  name="height" placeholder="Enter Furniture Height" id="height" min="0">'
        +'<label for="width"><strong>Width</strong></label>'
        +'<input type="number" required="true"  name="width" placeholder="Enter Furniture Width" id="width" min="0">'
        +'<label for="length"><strong>Length</strong></label>'
        +'<input type="number" required="true" name="length" placeholder="Enter Furniture Length" id="length" min="0">';    
    }
}
document.getElementById('sku').onchange =() => {
    const str = $('#sku').val();
    if (str.length != 0 && str.trim().length != 0) {
        const xmlhttp = new XMLHttpRequest();
        xmlhttp.onload = function() {
            if(this.responseText==0){
                document.getElementById("skuerror").innerHTML ="SKU FOUND PLEASE USE ANOTHER ONE";
                document.getElementById('skuerror').style.display = "block";
                document.getElementById("Save").disabled = true;
            }
            else{
                document.getElementById('skuerror').style.display = "none";
                document.getElementById("Save").disabled = false;
            }
        }
        xmlhttp.open("GET", "controller/controller.php?sku=" + str.trim());
        xmlhttp.send();
    
      }
}

document.getElementById('cancel').onclick =() => {
    window.location.href = window.location.origin;
}