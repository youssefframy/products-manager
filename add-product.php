<?php 
    require_once('./models/Product.php');
    require_once('./models/Book.php');
    require_once('./models/Dvd.php');
    require_once('./models/Furniture.php');
    require('./controllers/ProductController.php');

    $productController = new ProductController;

    if(isset($_POST['sku']) && isset($_POST['name']) && isset($_POST['price']) && isset($_POST['type'])){
        if(!empty($_POST['sku']) && !empty($_POST['name']) && !empty($_POST['price']) && !empty($_POST['type'])){
            if ($_POST['type'] == 'dvd'){
                $dvd = new Dvd;
                $dvd->sku = $_POST['sku'];
                $dvd->name = $_POST['name'];
                $dvd->price = $_POST['price'];
                $dvd->type = $_POST['type'];
                $dvd->size_mb = $_POST['size'];
                
                if($productController->setDvd($dvd)){
                    header("location:/products-manager");
                }else{
                    echo"Something went wrong with adding product";
                }
            }

            if ($_POST['type'] == 'book'){
                $book = new Book;
                $book->sku = $_POST['sku'];
                $book->name = $_POST['name'];
                $book->price = $_POST['price'];
                $book->type = $_POST['type'];
                $book->weight_kg = $_POST['weight'];
                
                if($productController->setBook($book)){
                    header("location:/products-manager");
                }else{
                    echo"Something went wrong with adding product";
                }
            }

            if ($_POST['type'] == 'furniture'){
                $furniture = new Furniture;
                $furniture->sku = $_POST['sku'];
                $furniture->name = $_POST['name'];
                $furniture->price = $_POST['price'];
                $furniture->type = $_POST['type'];
                $furniture->height = $_POST['height'];
                $furniture->width = $_POST['width'];
                $furniture->length = $_POST['length'];
                
                if($productController->setFurniture($furniture)){
                    header("location:/products-manager");
                }else{
                    echo"Something went wrong with adding product";
                }
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/ico" href="./assets/favicon.ico">
    <link rel="stylesheet" href="./styles/styles.css">
    <title>Add Product</title>
    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href );
        }
    </script>
</head>
<body>
    <!-- HEADER -->
    <div class="header">
          <h1 id="title">Product Add</h1>
          <a href="/products-manager/" id="back">CANCEL</a>
          <button type="submit" id="save" form="product_form" value="save">Save</button>
    </div>
    <!-- FORM -->
    <div class="add-product">
        <form method="post" id="product_form" class="form-group">
            <div class="group">
              <label for="sku">SKU</label>
              <input type="text" id="sku" name="sku" class="form-input" required/>
            </div>
            <br>
            <div class="group">
              <label for="name">Name</label>
              <input type="text" name="name" id="name" class="form-input" required/>
            </div>
            <br>
            <div class="group">
              <label for="price">Price ($)</label>
              <input type="number" id="price" name="price" step="any" class="form-input" required/>
            </div>
            <br>
            <div class="switch">
              <label for="type">Type Switcher</label>
              <select name="type" class="select-product" id="productType" onchange="typeSwitcher(this)">
                  <option value="0" disabled selected></option>
                  <option value="dvd">DVD</option>
                  <option value="book">Book</option>
                  <option value="furniture">Furniture</option>
              </select>
            </div>
            
                <div class="dvd-input group" id="DVD">
                    <label for="size">Size (MB)</label>
                    <input type="number" id="size" name="size" step="any" class="form-input">
                    <br>
                    <label class="warning-label">Please, provide disk space size in MB.</label>
                </div>
                    
                <div class="dimensions group" id="Furniture">
                    <div class="dimensions-attribute">
                        <label for="height">H (CM)</label>
                        <input type="number" id="height" name="height" step="any" class="form-input">
                    </div>

                    <div class="dimensions-attribute">
                        <label for="width">W (CM)</label>
                        <input type="number" id="width" name="width" step="any" class="form-input">
                    </div>

                    <div class="dimensions-attribute">
                        <label for="length">L (CM)</label>
                        <input type="number" id="length" name="length" step="any" class="form-input">
                    </div>
                    <label class="warning-label">Please, provide furniture dimensions in CM.</label>
                </div>

                <div class="book-input group" id="Book">
                   <label for="weight">Weight(KG)</label>
                   <input type="number" id="weight" name="weight" step="any" class="form-input">
                   <br>
                   <label class="warning-label">Please, provide book weight in KG.</label>
                </div>
        </form>
    </div>

    <!-- FOOTER -->
    <?php include('./components/footer.php')?>
</body>
<script src="./script.js" charset="utf-8"></script>
</html>