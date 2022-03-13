 <?php

 class Products {
      protected $SKU;
      protected $productName;
      protected $productPrice;
    
      protected $height;
      protected $width;
      protected $length;
    
      protected $weight;
    
      protected $size;
      protected $type;

      function __construct() {
          // The empty constructor of the class
      }

      function setProducts($conn,$sku,$name,$price,$height,$width,$length,$weight,$size,$type) {
          try {
            $this->SKU = $sku;
            $this->productName = $name;
            $this->productPrice = $price;
      
            $this->height = $height;
            $this->width = $width;
            $this->length = $length;
      
            $this->weight = $weight;
      
            $this->size = $size;
            $this->type = $type;
            $statement = $conn->query("INSERT INTO products (SKU, ProductName, ProductPrice, Height, Width, Length, Weight, Size, Type)
                                          VALUES ('$sku','$name','$price','$height','$width','$length','$weight','$size','$type')");
      
            return $statement;
      
          } catch (PDOException $e) {
            echo $e->getMessage();
          }
        }
      }
?>