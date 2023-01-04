<?php 

    namespace Classes\Crud;

    //Extend to Database Class to get the Database connection from connect() method

    class Delete extends \Classes\Database\Database {
        
        //Delete the selected item/s if checkbox is ticked
        
        public function deleteData () {
            
            if (isset($_POST['mass-delete']) && (isset($_POST['checkbox']))) {
                
                $count = count ($_POST['checkbox']);
                
                foreach ($_POST['checkbox'] as $checkbox) {
                   
                    $delete = "DELETE FROM scandiweb WHERE sku = '$checkbox'";
                    $query = $this->connect()->query($delete);

                    $count++;
                    
                }
                
            } else {
                
                //If conditions are not met, leave the page as it is
                
                if (!isset($_POST['checkbox'])) {
                    
                    return FALSE;
                }
                
            }
            
        } 
             
    }