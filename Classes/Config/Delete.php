<?php 

    namespace Classes\Config;

    require_once "Show.php";

    class Delete extends \Classes\Config\Show {
        
        public function deleteData () {
            
            if (isset($_POST['mass-delete']) && (isset($_POST['checkbox']))) {
                
                $count = count ($_POST['checkbox']);
                
                foreach ($_POST['checkbox'] as $checkbox) {
                   
                    $delete = "DELETE FROM scandiweb WHERE sku = '$checkbox'";
                    $query = $this->connect()->query($delete);

                    $count++;
                    
                }
                
            } else {
                
                if (!isset($_POST['checkbox'])) {
                    
                    return FALSE;
                }
                
            }
            
        } 
             
    }