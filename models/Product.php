<?php

class Product {
  protected $SKU;
  protected $productName;
  protected $productPrice;
  protected $type;

  function __construct() {
  // The empty constructor of the class
  }

  function validate($conn, $SKU, $Name, $Price, $Height, $Width, $Length, $Weight, $Size, $Type) {
      try {
        $sql = $conn->query("INSERT INTO `products` (`SKU`, `ProductName`, `ProductPrice`, `Height`, `Width`, `Length`, `Weight`, `Size`,`Type`)  VALUES ('$SKU', '$Name', $Price, $Height, $Width, $Length, $Weight, $Size, '$Type');");
        return $sql;

      } catch (PDOException $error) {
        echo $error->getMessage();
      }
  }

  public function deleteProducts($conn, $selectedProducts){
      $selectProducts = array();
      foreach($selectedProducts as $selectedProduct){ 
      array_push($selectProducts,"'".$selectedProduct."'");
      }
      $deleteProducts = implode(",",$selectProducts);
      $statement= $conn->query("DELETE FROM `products` WHERE `products`.`SKU` IN($deleteProducts)");
      return $statement;
  }

  //Gets all the product that exists in the database
  function getProducts($conn){
    try {
      $sql = $conn->query("SELECT * FROM products");
      return $sql;
    } catch (PDOException $error) {
      echo $error->getMessage();
    }
  }
}
?>