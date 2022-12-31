<?php 

    namespace Classes\Config;

    class Fetch extends \Classes\Database\database {
        
        public function getData () {
                        
            $sql = "SELECT * FROM scandiweb";
            $result = $this->connect()->query($sql);
            $numRows = $result->num_rows;
            
            if ($numRows > 0) {
                
                while ($row = $result->fetch_assoc()) {
                    
                    $data[] = $row;
                }
                
                return $data;
                
            }
            
            $this->checkSkuDuplicate();
        }
        
        public function checkSkuDuplicate () {
            
            if (isset($_POST['save'])) {
                
            $checkSku = $_POST['sku'];
            $checkRecord = "SELECT sku FROM scandiweb WHERE sku = '$checkSku'";
            $checkResult = $this->connect()->query($checkRecord);
            $checkNumRows = $checkResult->num_rows;

            if ($checkNumRows > 0) {

                $checkRow = $checkResult->fetch_assoc();

                return $checkRow;
                
                }

            }

        }
        
    }
