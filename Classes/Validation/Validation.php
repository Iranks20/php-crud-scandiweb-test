<?php 

    namespace Classes\Validation;

    class Validation extends \Classes\Config\Fetch {

        private $data;
        private $errors = [];
        private static $fields = ['sku', 'name', 'price', 'selector'];

        public function __construct ($post_data) {

            $this->data = $post_data;
            
        }

        public function validateForm () {

            foreach (self::$fields as $field) {

                if (!array_key_exists($field, $this->data)) {

                   trigger_error("$field is not present in data.");
                   return;

            }
                
        }

            $this->validateSku ();
            $this->validateName ();
            $this->validatePrice ();
            $this->validateSelector ();
            $this->validateDvd ();
            $this->validateFurniture ();
            $this->validateBooks ();
            $this->redirect ();

            return $this->errors;

    }

        public function validateSku () {

            $val = (trim($this->data ['sku']));

            if (empty($val)) {

               $this->addError ('sku', 'Please submit required data');

            } else {
              
                if ($this->checkSkuDuplicate() == TRUE) {
                
                $this->addError('sku', 'SKU already exists');
                
                }
                
            }
            
            if (!empty($fields)) {
                
                $this->redirect();
            }
            
        }

        public function validateName () {

            $val = (trim($this->data ['name']));

            if (empty($val)) {

               $this->addError ('name', 'Please submit required data');

            }
            
            if (!empty($fields)) {
                
                $this->redirect();
            }
 
        }

        public function validatePrice () {

             $val = (trim($this->data ['price']));

            if (empty($val)) {

               $this->addError ('price', 'Please submit required data');

            } else {
                
                if (!preg_match('/^[0-9]+(\.[0-9]{1,2})?$/', $val)) {
                    
                    $this->addError ('price', 'Price must be a number');
                }
                
            }
            
            if (!empty($fields)) {
                
                $this->redirect();
            }
 
        }

        public function validateSelector () {
                
            $val = ($this->data ['selector']);

            if (empty ($val)) {

                $this->addError ('selector', 'Please provide the data of indicated type');

            }
            
            if (!empty($fields)) {
                
                $this->redirect();
            }
            
        }
        
        public function validateDvd () {
            
            $dvd = $_POST['selector'];
            
            if ($dvd === 'DVD') {
               
                $val = ($this->data['dvd']);
            
                if (empty($val)) {

                    $this->addError ('dvd', 'Please provide the data of the indicated type');

                } else {
                   
                    if (!preg_match('/^[0-9]+(\.[0-9]{1,2})?$/', $val)) {

                    $this->addError ('dvd', 'Size must be a number');

                    }
     
                }

            }
  
        }
        
        public function validateFurniture () {
            
            $furniture = $_POST['selector'];
            
            if ($furniture === 'Furniture') {
                
                $val = ($this->data['height']);
                
                if (empty($val)) {
                    
                    $this->addError ('height', 'Please provide the data of the indicated type');
                    
                } else {
                   
                    if (!preg_match('/^[0-9]+(\.[0-9]{1,2})?$/', $val)) {
                    
                    $this->addError ('height', 'Height must be a number');
                        
                    }
                    
                }
                
            }
            
            if ($furniture === 'Furniture') {
                
                $val = ($this->data['width']);
                
                if (empty($val)) {
                    
                    $this->addError ('width', 'Please provide the data of the indicated type');
                    
                } else {
                    
                    if (!preg_match('/^[0-9]+(\.[0-9]{1,2})?$/', $val)) {
                    
                    $this->addError ('width', 'Width must be a number');
                    
                    }
                    
                }
                
            }
            
            if ($furniture === 'Furniture') {
                
                $val = ($this->data['length']);
                
                if (empty($val)) {
                    
                    $this->addError ('length', 'Please provide the data of the indicated type');
                    
                } else {
                    
                    if (!preg_match('/^[0-9]+(\.[0-9]{1,2})?$/', $val)) {
                    
                    $this->addError ('length', 'Length must be a number');
                    
                    }
                    
                }
                
            }
   
        }
        
        public function validateBooks () {
            
            $books = $_POST['selector'];
            
            if ($books === 'Books') {
                
                $val = ($this->data['books']);
                
                if (empty($val)) {
                    
                    $this->addError('books', 'Please provide the data of the indicated type');
                    
                } else {
                    
                    if (!preg_match('/^[0-9]+(\.[0-9]{1,2})?$/', $val)) {
                    
                    $this->addError ('books', 'Weight must be a number');
                        
                    }
                    
                }
                
            }
     
        }
        
        private function addError ($key, $val) {

            $this->errors[$key] = $val;
                
        }
        
        private function redirect () {
                
          if (isset ($_POST['save'])) {
             
              if (!$this->errors) {
    
                echo "<script>location='index.php'</script>";
   
               }
              
            }   
            
        }
        
    }
