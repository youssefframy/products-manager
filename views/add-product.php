<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/ico" href="../assets/favicon.ico">
    <link rel="stylesheet" href="../styles/styles.css">
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
        <form action="../database/addToDb.php" method="post" id="product_form"  class="form-group">
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
              <label for="productType">Type Switcher</label>
              <select name="productType" class="select-product" id="productType" onchange="typeSwitcher(this)">
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
    <?php include('../components/footer.php')?>
</body>
<script src="../script.js" charset="utf-8"></script>
</html>