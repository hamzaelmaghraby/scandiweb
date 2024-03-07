<?php 
$page_title = 'Product List';
include('layouts/header.php');
?>
<body>
    <form name="productform" id="productform"  method="post" >
        <h1>Product List</h1>
        <button type="submit" id="MASS DELETE">MASS DELETE</button>
        <button type="button" id="add">ADD</button>
        <br>
        <hr/>
        <div id="result"></div>
    </form>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU="
        crossorigin="anonymous"></script>
    <script src="./view_product_script.js"></script>
</body>
<?php
include('layouts/footer.php');
?>
</html>
