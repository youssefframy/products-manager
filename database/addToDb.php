<?php 
    require_once('./config.php');
    require('./product-class.php');

    if(isset($_POST["sku"])){
        try{ 
          $SKU = $_POST["sku"];
          $Name = $_POST["name"];
          $Price = $_POST["price"];
          $Type = $_POST["productType"];
          $Size = $_POST["size"];
          $Weight = $_POST["weight"];
          $Width = $_POST["width"];
          $Height = $_POST["height"];
          $Length = $_POST["length"];
      
          $Product = new Products();
          $Product->setProducts($conn, $SKU, $Name, $Price, $Height, $Width, $Length, $Weight, $Size, $Type);
          header("refresh:0;url=/products-manager");
          
        } catch(PDOException $e){
          echo "Error: " . $e->getMessage;
        }
      }

?>
