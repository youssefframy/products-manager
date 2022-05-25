
<!DOCTYPE html>
<html lang="en">
        <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/ico" href="../assets/favicon.ico">
        <link rel="stylesheet" href="./styles/styles.css">
        <title>Product Manager</title>
        <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href );
        }
        </script>
	</head>
	<body>
    <form action="" method="post" class="homepage">
      <div class="header">
            <h1 id="title">Product List</h1>
            <button type="submit" id="delete" name="deleteBtn">MASS DELETE</button>
            <a href="add-product.php" id="add">ADD</a>
        </div>
        <div class="product-preview">
          <div class="preview">
      <?php
        $productController = new ProductController;
        $products = $productController->getProducts();
        foreach ($products as $product){
      ?>
             <div class="product-item">
                <input type="checkbox" class="delete-checkbox" name="checkbox[]" value="<?php echo $product['id'] ?>" >
                <ul>
                <?php
                    echo "<li>" . $product['sku'] . "</li>";
                    echo "<li>" . $product['name'] . "</li>";
                    echo "<li>" . $product['price']. ".00 $" . "</li>";
                ?>
                <li>
                    <?php
                    switch($product['type']){
                        case 'dvd':
                        echo "Size: " . $product['size_mb'] . " MB";
                        break;
                        case 'furniture':
                        echo "Dimension: " . $product['height'] . "x" . $product['width'] . "x" . $product['length'];
                        break;
                        case 'book':
                        echo "Weight: " . $product['weight_kg'] . " KG";
                        break;
                    }
                    ?>
                </li>
                </ul>
            </div>  
            <?php
        }
        ?>
        </div>
      </div>
    </form>
        <?php include('./components/footer.php') ?>
	</body>
</html>

<?php
  if (isset($_POST['deleteBtn'])) {
    try {
      $checkBoxes = $_POST['checkbox'];
      foreach ($checkBoxes as $checkBox) {
        $deleteProduct = $productController->deleteProducts($checkBox);
      }
    } catch (PDOException $error) {
      echo $error->getMessage();
    }
    header("location:/products-manager");
  }
?>
