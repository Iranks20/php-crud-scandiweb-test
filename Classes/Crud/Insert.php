<?php

    interface Insert {
        
        public function insertData();
        
    }

    class Dvd extends \Classes\Crud\Fetch implements Insert {
        
        public function insertData() {
            
          if (isset($_POST['save'])) {
              
            $skuField = $_POST['sku'];
            $nameField = $_POST['name'];
            $priceField = $_POST['price'];
            $typeField = $_POST['selector'];
            $dvdField = $_POST['dvd'];
              
            $sku = !empty(trim($skuField));
            $name = !empty(trim($nameField));
            $price = !empty(trim(preg_match('/^[0-9]+(\.[0-9]{1,2})?$/', $priceField)));
            $type = !empty($typeField);
            $dvd= !empty(trim(preg_match('/^[0-9]+(\.[0-9]{1,2})?$/', $dvdField)));
              
              if ($this->checkSkuDuplicate() == TRUE) {
                  
                  return TRUE;
                  
              } else if ($sku && $name && $price && $type && $dvd == TRUE) {
                  
                $sql = "INSERT INTO scandiweb (sku, name, price, type, dvd, height, width, length, books) VALUES ('$skuField', '$nameField', '$priceField', '$typeField', '$dvdField', '0', '0', '0', '0')";
                    
                $insert = $this->connect();
                mysqli_query($insert, $sql);
                  
                }
              
            }
            
        }
        
    }

    class Furniture extends \Classes\Crud\Fetch implements Insert {
        
        public function insertData() {
          
            if (isset($_POST['save'])) {
                
                $skuField = $_POST['sku'];
                $nameField = $_POST['name'];
                $priceField = $_POST['price'];
                $typeField = $_POST['selector'];
                $heightField = $_POST['height'];
                $widthField = $_POST['width'];
                $lengthField = $_POST['length'];
                
                $sku = !empty(trim($skuField));
                $name = !empty(trim($nameField));
                $price = !empty(trim(preg_match('/^[0-9]+(\.[0-9]{1,2})?$/', $priceField)));
                $type = !empty($typeField);
                $height = !empty(trim(preg_match('/^[0-9]+(\.[0-9]{1,2})?$/', $heightField)));
                $width = !empty(trim(preg_match('/^[0-9]+(\.[0-9]{1,2})?$/', $widthField)));
                $length = !empty(trim(preg_match('/^[0-9]+(\.[0-9]{1,2})?$/', $lengthField)));
                
                if ($this->checkSkuDuplicate() == TRUE) {
                    
                    return TRUE;
                    
                } else if ($sku && $name && $price && $type && $height && $width && $length == TRUE) {
                    
                    $sql = "INSERT INTO scandiweb (sku, name, price, type, dvd, height, width, length, books) VALUES ('$skuField', '$nameField', '$priceField', '$typeField', '0', '$heightField', '$widthField', '$lengthField', '0')";
                    
                    $insert = $this->connect();
                    mysqli_query($insert, $sql);
                    
                }
                
            }
            
        }
        
    }

    class Book extends \Classes\Crud\Fetch implements Insert {
        
        public function insertData() {
            
            if (isset($_POST['save'])) {
                
                $skuField = $_POST['sku'];
                $nameField = $_POST['name'];
                $priceField = $_POST['price'];
                $typeField = $_POST['selector'];
                $booksField = $_POST['books'];
                
                $sku = !empty(trim($skuField));
                $name = !empty(trim($nameField));
                $price = !empty(trim(preg_match('/^[0-9]+(\.[0-9]{1,2})?$/', $priceField)));
                $type = !empty($typeField);
                $books = !empty(trim(preg_match('/^[0-9]+(\.[0-9]{1,2})?$/', $booksField)));
                
                if ($this->checkSkuDuplicate() == TRUE) {
                    
                    return TRUE;
                    
                } else if ($sku && $name && $price && $type && $books == TRUE) {
                    
                    $sql = "INSERT INTO scandiweb (sku, name, price, type, dvd, height, width, length, books) VALUES ('$skuField', '$nameField', '$priceField', '$typeField', '0', '0', '0', '0', '$booksField')";
                    
                    $insert = $this->connect();
                    mysqli_query($insert, $sql);
                    
                }
                
            }
              
        }
        
    }
