<?php 

    namespace Classes\Crud;

    //Extend to Fetch Class to access the properties within getData() method

    class Show extends \Classes\Crud\Fetch {
        
        public function showData () {
          
            $datas = $this->getData();
            
            //Display contents if datas are found in the Database

            if ($datas) {

             foreach ($datas as  $data) {
                 
                 //Spit out results

                include "content.php";

                }

                } else {

                    return FALSE;

                }
            
            }
        
        }
