 <?php 
    require('./controllers/DBController.php');
    

    class ProductController {
        protected $db;

        // 1. Open Connection
        // 2. Run query & logic
        // 3. Close Connection
        public function getProducts(){
            $this->db = new DBController;
            if($this->db->openConnection()){
                $query = "SELECT * FROM `products`";
                return $this->db->select($query);
            }else {
                echo "No Connection";
                return false;
            }
        }

        public function deleteProducts($id){
            $this->db = new DBController;
            if($this->db->openConnection()){
                $query = "DELETE FROM `products` WHERE id = $id";
                return $this->db->delete($query);
            }else {
                echo "No Connection";
                return false;
            }
        }

        public function setDvd($dvd){  
            $this->db = new DBController;
            if($this->db->openConnection()){
                $query = "INSERT INTO `products` (sku, name, price, type, size_mb) VALUES('$dvd->sku', '$dvd->name', $dvd->price, '$dvd->type', $dvd->size_mb)";
                return $this->db->insert($query);
            }else {
                echo "No Connection";
                return false;
            }
        }

        public function setBook($book){  
            $this->db = new DBController;
            if($this->db->openConnection()){
                $query = "INSERT INTO `products` (sku, name, price, type, weight_kg) VALUES('$book->sku', '$book->name', $book->price, '$book->type', $book->weight_kg)";
                return $this->db->insert($query);
            }else {
                echo "No Connection";
                return false;
            }
        }

        public function setFurniture($furniture){  
            $this->db = new DBController;
            if($this->db->openConnection()){
                $query = "INSERT INTO `products` (sku, name, price, type, height, width, length) VALUES('$furniture->sku', '$furniture->name', $furniture->price, '$furniture->type', $furniture->height, $furniture->width, $furniture->length)";
                return $this->db->insert($query);
            }else {
                echo "No Connection";
                return false;
            }
        }

    } 
 ?>