<?php 

    namespace Classes\Config;

    require_once "Fetch.php";

    class Insert extends \Classes\Config\Fetch {
        
        public function insertData () {
            
            if (isset ($_POST['save'])) {

                $sku = $_POST['sku'];
                $name = $_POST['name'];
                $price = $_POST['price'];
                $type = $_POST['selector'];
                $dvd = $_POST['dvd'];
                $height = $_POST['height'];
                $width = $_POST['width'];
                $length = $_POST['length'];
                $books = $_POST ['books'];
                
                if ($this->checkSkuDuplicate() == TRUE) {
                    
                    return TRUE;
                    
                }
                
                //DVD
                
                else if (!empty($sku) && ($name) && (preg_match('/^[0-9]+(\.[0-9]{1,2})?$/', $price)) && ($type) && (preg_match('/^[0-9]+(\.[0-9]{1,2})?$/', $dvd))) {
                    
                    $sql = "INSERT INTO scandiweb (sku, name, price, type, dvd, height, width, length, books) VALUES ('$sku', '$name', '$price', '$type', '$dvd', '$height', '$width', '$length', '$books')";
                    
                    $insert = $this->connect();
                    mysqli_query($insert, $sql);

                }
                
                //Furniture
                
                else if (!empty($sku) && ($name) && (preg_match('/^[0-9]+(\.[0-9]{1,2})?$/', $price)) && ($type) && (preg_match('/^[0-9]+(\.[0-9]{1,2})?$/', $height)) && (preg_match('/^[0-9]+(\.[0-9]{1,2})?$/', $width)) && (preg_match('/^[0-9]+(\.[0-9]{1,2})?$/', $length))) {
                    
                     $sql = "INSERT INTO scandiweb (sku, name, price, type, dvd, height, width, length, books) VALUES ('$sku', '$name', '$price', '$type', '$dvd', '$height', '$width', '$length', '$books')";
                    
                    $insert = $this->connect();
                    mysqli_query($insert, $sql);
                    
                }
                
                //Books
                
                else if (!empty($sku) && ($name) && (preg_match('/^[0-9]+(\.[0-9]{1,2})?$/', $price)) && ($type) && (preg_match('/^[0-9]+(\.[0-9]{1,2})?$/', $books))) {
                    
                    $sql = "INSERT INTO scandiweb (sku, name, price, type, dvd, height, width, length, books) VALUES ('$sku', '$name', '$price', '$type', '$dvd', '$height', '$width', '$length', '$books')";
                    
                    $insert = $this->connect();
                    mysqli_query($insert, $sql);
                    
                }
                
            } else { 
            
                return FALSE;
                
            }
                    
        }
          
    }