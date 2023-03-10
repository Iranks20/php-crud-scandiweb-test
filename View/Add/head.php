<?php include_once "../../Classes/Crud/Insert.php"; 

$dvd = new DVD;
$dvd->insertData();

$furniture = new Furniture;
$furniture->insertData();

$book = new Book;
$book->insertData();

?>

<html>
    <head>
        <meta charset="utf-8">
        <title>Add Products</title>
        <link rel="stylesheet" type="text/css" href="../../Public/CSS/Style.css">
        <link rel="icon" type="image/x-icon" href="../../Public/CSS/favicon.png">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.2/jquery.min.js"></script>
        <h2>Add Products</h2>
    </head>
    <body>
        <form id="product_form" action="" method="POST">
            <div class="buttons">
                <button type="submit" name="save" class="save-btn"><a href=""><b>Saveeeee</b></a>
                </button>
                <button type="button" name="cancel" class="cancel-btn"><a href="index.php"><b>Cancel</b></a>
                </button>
            </div>
            <hr>
            
            <!-- Textfields -->
            
            <div id="fields">
                <div class="textfields">
                    <div class="error">
                        <small><?php echo $errors['sku'] ?? '' ?></small>
                    </div>
                    <label for="sku" name="sku" type="text" class="label">SKU:</label>
                    <input type="text" id="sku" name="sku" ><br><br>
                    <div class="error">
                        <small><?php echo $errors['name'] ?? '' ?></small>
                    </div>
                    <label for="name" name="name" type="text" class="label">Name:</label>
                    <input type="text" id="name" name="name" ><br><br>
                    <div class="error">
                        <small><?php echo $errors ['price'] ?? '' ?></small>
                    </div>
                    <label for="price" name="price" type="text" class="label">Price ($):</label>
                    <input type="text" id="price" name="price" ><br><br>
                </div>
            </div> 
            
            <!-- Type Switcher -->
            
            <div id="productTypes"> 
                <div class="error-switcher">
                    <small><?php echo $errors['selector'] ?? '' ?></small>
                </div>
                <label for="product-switcher" name="product-switcher" class="productType">Type Switcher:</label>
                <select name="selector" id="productType">
                    <option></option>
                    <option name="DVD" value="DVD">DVD</option>
                    <option name="furniture" value="Furniture" >Furniture</option>
                    <option name="books" value="Books">Book</option>
                </select>
                <br><br>
                <div id="typeAttributes">
                    
                    <!--DVD-->
                    
                    <div class="dvdAttribute" id="dvdDetails">
                        <div class="errorDvd">
                            <small><?php echo $errors ['dvd'] ?? '' ?></small>
                        </div>
                        <label class="dvdLabel">Size (MB):</label>
                        <input type="text" name="dvd" class="dvdInput" id="size">
                        <p>Please provide size</p>
                    </div>
                    
                    <!--Furniture-->
                    
                    <div class="furnitureAttribute" id="furnitureDetails">
                        <div class="errorFurniture">
                            <small><?php echo $errors ['height'] ?? '' ?></small>
                        </div>
                        <label class="heightLabel">Height (CM):</label>
                        <input type="text" name="height" class="heightInput" id="height"><br><br>
                        <div class="errorFurniture">
                            <small><?php echo $errors ['width'] ?? '' ?></small>
                        </div>
                        <label class="widthLabel">Width (CM):</label>
                        <input type="text" name="width" class="widthInput" id="width"><br><br>
                        <div class="errorFurniture">
                            <small><?php echo $errors ['length'] ?? '' ?></small>
                        </div>
                        <label class="lengthLabel">Length (CM):</label>
                        <input type="text" name="length" class="lengthInput" id="length">
                        <p>Please provide dimensions</p>
                    </div>
                    
                    <!--Books-->
                    
                    <div class="booksAttribute" id="booksDetails">
                        <div class="errorBooks">
                            <small><?php echo $errors ['books'] ?? '' ?></small>
                        </div>
                        <label class="booksLabel">Weight (KG):</label>
                        <input type="text" name="books" class="booksInput" id="weight">
                        <p>Please provide weight</p>
                    </div>
                </div>
            </div>
        </form>
        <script src="../../Public/JQuery/productSwitcher.js"></script>
        </body>
