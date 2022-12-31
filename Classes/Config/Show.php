<?php 

    namespace Classes\Config;

    require_once "Insert.php";

    class Show extends \Classes\Config\Insert {
        
        public function showData () {
          
            $datas = $this->getData();

            if ($datas) {

             foreach ($datas as  $data) {

                include "content.php";

                }

                } else {

                    return FALSE;

                }
            
            }
        
        }
