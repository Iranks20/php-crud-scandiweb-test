<html>
    <meta charset="utf-8">
    <head>
        <title>Products List</title>
        <link rel="stylesheet" type="text/css" href="../../Public/CSS/Style.css">
         <link rel="icon" type="image/x-icon" href="../../Public/CSS/favicon.png">
         <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.2/jquery.min.js"></script>
        <h2>Products List</h2>
    </head>
    <body>  
        <form id="form" action="<?php $_SERVER["PHP_SELF"];?>" method="POST">
            <div class="buttons">
                <button type="button" value="add" name="add" id="add-product-btn" method="post"><a href="add.php"><b>ADD</b></a>
                </button>
                <button type="submit" value="mass-delete" name="mass-delete" id="delete-product-btn" method="POST" action=""><a href='#'><b>MASS DELETE</b></a></button>
            </div>
            <hr>
            <?php 
                $show = new Classes\Crud\Show;
                $data = $show->showData(); 
            ?>
        </form>    
    </body>
