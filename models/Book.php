<?php

  class Book extends Product
  {
    /** Attributes **/
    protected $weight;

    /** Methods **/
    function __construct($sku, $name, $price, $size, $weight, $height, $width, $length)
    {
      $this->sku = $sku;
      $this->name = $name;
      $this->price = $price;
      $this->size = $size;
      $this->weight = $weight;
      $this->height = $height;
      $this->width = $width;
      $this->length = $length;
    }
    
    //Gets the books records in the database
    protected function getBook($conn){
    try {
      $sql = $conn->query("SELECT * FROM `products` WHERE `sku` = $this->sku AND `type` = 'book'");

      return $sql;

    } catch (PDOException $error) {
      echo $error->getMessage();
    }
  }
    
  }
?>
