<?php 

    namespace Classes\Validation;

    //Extend to Fetch Class to reuse checkSkuDuplicate() method

    class Validation extends \Classes\Crud\Fetch {

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
            $sku = empty($val) == TRUE;
            $validateSku = $this->checkSkuDuplicate() == TRUE;
            $redirect = empty ($this->fields) == TRUE;
            
            //Validate if SKU field is filled out. If empty, throw an error
            
            if ($sku == TRUE) {
                
                $this->addError('sku', 'Please submit required data');
                
            }
            
            //Validate if SKU already exists. If duplicate is found, throw an error
            
            if ($validateSku == TRUE) {
                
                $this->addError('sku', 'SKU already exists');
                
            }
            
            //If all conditions are met, redirect to List page
            
            if ($redirect !== TRUE) {
                
                $this->redirect();
                
            }
            
        }

        public function validateName () {

            $val = (trim($this->data ['name']));
            $name = empty($val) == TRUE;
            $redirect = empty ($this->fields) == TRUE;
            
            //Validate if Name field is filled out. If empty, throw an error

            if ($name == TRUE) {
                
                $this->addError ('name', 'Please submit required data');
            }
            
            //If all conditions are met, redirect to List page.
            
            if ($redirect !== TRUE) {
                
                $this->redirect();
            }
 
        }

        public function validatePrice () {

            $val = (trim($this->data ['price']));
            
            //Validate if Price field is filled out

            if (empty($val)) {

               $this->addError ('price', 'Please submit required data');

            } else {
                
                //Validate if format is correct. Only numbers and decimals are valid datas. 
                
                if (!preg_match('/^[0-9]+(\.[0-9]{1,2})?$/', $val)) {
                    
                    $this->addError ('price', 'Price must be a number');
                }
                
            }
            
            //If all conditions are met, redirect to List page.
            
            if (!empty($fields)) {
                
                $this->redirect();
            }
                
 
        }

        public function validateSelector () {
                
            $val = ($this->data ['selector']);
            $selector = empty($val) == TRUE;
            $redirect = empty($this->fields) == TRUE;
            
            //Validate that the user selected an option in the dropdown menu. If nothing has been selected, throw an error
                
            if ($selector == TRUE) {
                
                $this->addError('selector', 'Please submit required data');
                
            }
            
            //If all conditions are met, redirect to List page. 
            
            if ($redirect !== TRUE) {
                
                $this->redirect();
            }
            
        }
        
        public function validateDvd () {

            $dvd = $_POST['selector'];
            
            //If DVD option is selected, conditions below must be met
            
            if ($dvd === 'DVD') {
               
                $val = ($this->data['dvd']);
                
                //If DVD input field is left empty, throw an error
            
                if (empty($val)) {

                    $this->addError ('dvd', 'Please provide the data of the indicated type');

                } else {
                    
                    //Only numbers and decimals are valid datas
                   
                    if (!preg_match('/^[0-9]+(\.[0-9]{1,2})?$/', $val)) {

                    $this->addError ('dvd', 'Size must be a number');

                    }
     
                }

            }
  
        }
        
        public function validateFurniture () {
            
            $furniture = $_POST['selector'];
            
            //If Furniture option is selected, conditions below must be met
            
            if ($furniture === 'Furniture') {
                
                $val = ($this->data['height']);
                
                //All fields must not be empty
                
                if (empty($val)) {
                    
                    $this->addError ('height', 'Please provide the data of the indicated type');
                    
                } else {
                    
                    //Only numbers and decimals are valid datas
                   
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
            
            //If Books option is selected, conditions below must be met
            
            if ($books === 'Books') {
                
                //Books field must not be empty. Otherwise, throw an error
                
                $val = ($this->data['books']);
                
                if (empty($val)) {
                    
                    $this->addError('books', 'Please provide the data of the indicated type');
                    
                } else {
                    
                    //Only numbers and decimals are valid datas
                    
                    if (!preg_match('/^[0-9]+(\.[0-9]{1,2})?$/', $val)) {
                    
                    $this->addError ('books', 'Weight must be a number');
                        
                    }
                    
                }
                
            }
     
        }
        
        private function addError ($key, $val) {
            
            //Throw an error per field that does not meet condition

            $this->errors[$key] = $val;
                
        }
        
        private function redirect () {
            
        //If Save button is clicked and all conditions are met, redirect to List page
                
          if (isset ($_POST['save'])) {
             
              if (!$this->errors) {
    
                echo "<script>location='index.php'</script>";
   
               }
              
            }   
            
        }
        
    }
