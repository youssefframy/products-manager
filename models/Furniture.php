<?php
  class Furniture extends Product
  {
    /** Attributes **/
    protected $height;
    protected $width;
    protected $length;

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
    
    //Gets all furniture records in the database
    protected function getFurniture($conn){
      try {
        $sql = $conn->query("SELECT * FROM `products` WHERE `sku` = $this->sku AND `type` = 'furniture';");

        return $sql;

      } catch (PDOException $error) {
        echo $error->getMessage();
      }
    }
  }
?>