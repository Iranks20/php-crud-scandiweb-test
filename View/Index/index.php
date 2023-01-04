<!DOCTYPE html>

<?php 

    require_once "../../Autoload/Autoloader/Autoload.php";

    $massDelete = new Classes\Crud\Delete;
    $massDelete->deleteData();  

    include_once "../List/head.php";
    include_once "../Shared/footer.php";

?>