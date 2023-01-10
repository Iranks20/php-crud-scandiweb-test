<?php 

    namespace Classes\Crud;

    //Extend to Fetch Class to check for SKU duplicates using checkSkuDuplicate() method

    class Insert extends \Classes\Crud\Fetch {
        
        public function insertData () {
            
            if (isset ($_POST['save'])) {
                
                $skuField = $_POST['sku'];
                $nameField = $_POST['name'];
                $priceField = $_POST['price'];
                $typeField = $_POST['selector'];
                $dvdField = $_POST['dvd'];
                $heightField = $_POST['height'];
                $widthField = $_POST['width'];
                $lengthField = $_POST['length'];
                $booksField = $_POST['books'];

                $sku = !empty(trim($skuField));
                $name = !empty(trim($nameField));
                $price = !empty(trim(preg_match('/^[0-9]+(\.[0-9]{1,2})?$/', $priceField)));
                $type = !empty($typeField);
                $dvd= !empty(trim(preg_match('/^[0-9]+(\.[0-9]{1,2})?$/', $dvdField)));
                $height = !empty(trim(preg_match('/^[0-9]+(\.[0-9]{1,2})?$/', $heightField)));-
                $width = !empty(trim(preg_match('/^[0-9]+(\.[0-9]{1,2})?$/', $widthField)));
                $length = !empty(trim(preg_match('/^[0-9]+(\.[0-9]{1,2})?$/', $lengthField)));
                $books = !empty(trim(preg_match('/^[0-9]+(\.[0-9]{1,2})?$/', $booksField)));
                
                //Check for any duplicate SKU
                
                if ($this->checkSkuDuplicate() == TRUE) {
                    
                    return TRUE;
                    
                    //DVD
                    
                } else if ($sku && $name && $price && $type && $dvd == TRUE) {
                    
                    $sql = "INSERT INTO scandiweb (sku, name, price, type, dvd, height, width, length, books) VALUES ('$skuField', '$nameField', '$priceField', '$typeField', '$dvdField', '$heightField', '$widthField', '$lengthField', '$booksField')";
                    
                    $insert = $this->connect();
                    mysqli_query($insert, $sql);
                    
                    //Furniture

                } else if ($sku && $name && $price && $type && $height && $width && $length == TRUE) {
                    
                    $sql = "INSERT INTO scandiweb (sku, name, price, type, dvd, height, width, length, books) VALUES ('$skuField', '$nameField', '$priceField', '$typeField', '$dvdField', '$heightField', '$widthField', '$lengthField', '$booksField')";
                    
                    $insert = $this->connect();
                    mysqli_query($insert, $sql);
                    
                    //Books
                    
                } else if ($sku && $name && $price && $type && $books == TRUE) {
                    
                    $sql = "INSERT INTO scandiweb (sku, name, price, type, dvd, height, width, length, books) VALUES ('$skuField', '$nameField', '$priceField', '$typeField', '$dvdField', '$heightField', '$widthField', '$lengthField', '$booksField')";
                    
                    $insert = $this->connect();
                    mysqli_query($insert, $sql);
                    
                }
                
            } 
            
        }
        
    }
