<?php 
$page_title = 'Add Product';
include('layouts/header.php');
?>
<body>
    <form name="product_form" id="product_form" method="post" >
        <h1>Add Product</h1>
        <button type="button" id="cancel">cancel</button>
        <button type="submit" id="Save">Save</button>
        <br>
        <hr/>
        <div class="formcontainer">
            <div class="container">
                <label for="sku"><strong>SKU</strong></label>
                <input type="text" placeholder="Enter Product Sku" name="sku" id="sku" required="true">
                <div class="error" id="skuerror" ></div>
                <label for="name"><strong>Name</strong></label>
                <input type="text" placeholder="Enter Product Name" name="name" id="name" required="true">
                <div class="error" id="nameerror"></div>
                <label for="price"><strong>Price</strong></label>
                <input type="number" placeholder="Enter Product Price" name="price" id="price" required="true" min=0 >
                <div class="error" id="priceerror"></div>
                <label for="type-switcher"><strong>Type Switcher</strong></label>
                <select id="productType"  name="productType" required="true">
                    <option disabled selected value> Select Product Type </option>
                    <option value="Dvd">DVD </option>
                    <option value="Book">Book </option>
                    <option value="Furniture">Furniture </option>
                </select>
            </div>
            <div class="container" id="productcontainer"></div>
            <div class="error" id="producterror"></div>
    </form>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU="
        crossorigin="anonymous"></script>
    <script src='./add_product_script.js'></script>
</body>
<?php
include('layouts/footer.php');
?>
</html>