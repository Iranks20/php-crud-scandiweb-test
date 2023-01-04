<!DOCTYPE html>

<?php 

    include_once "../../Autoload/Autoloader/Autoload.php";

    $db = new Classes\Database\Database;
    $db->connect();

    $fetch = new Classes\Crud\Fetch;
    $fetch->getData();
  
    if (isset($_POST['save'])) {

        $validation = new Classes\Validation\Validation($_POST);
        $errors = $validation->validateForm();
        
    } 

    $add = new Classes\Crud\Insert;
    $add->insertData();

    include_once "../Add/head.php";
    include_once "../Shared/footer.php";
    
?>
