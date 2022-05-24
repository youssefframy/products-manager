<?php
  require('./models/Product.php');
  require_once('./database/config.php');
?>
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
            <a href="views/add-product.php" id="add">ADD</a>
        </div>
        <div class="product-preview">
          <div class="preview">
      <?php
        $Product = new Product();
        $rows = $Product->getProducts($connection);
        foreach ($rows as $row){
      ?>
             <div class="product-item">
                <input type="checkbox" class="delete-checkbox" name="checkbox[]" value="<?php echo $row['sku'] ?>" >
                <ul>
                <?php
                    echo "<li>" . $row['sku'] . "</li>";
                    echo "<li>" . $row['name'] . "</li>";
                    echo "<li>" . $row['price']. ".00 $" . "</li>";
                ?>
                <li>
                    <?php
                    switch($row['type']){
                        case 'dvd':
                        echo "Size: " . $row['size_mb'] . " MB";
                        break;
                        case 'furniture':
                        echo "Dimension: " . $row['height'] . "x" . $row['width'] . "x" . $row['length'];
                        break;
                        case 'book':
                        echo "Weight: " . $row['weight_kg'] . " KG";
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
      
        $Product->deleteProducts($conn, $checkBoxes);
      
      
    } catch (PDOException $error) {
      echo $error->getMessage();
    }
    header('refresh:0');
  }
?>
