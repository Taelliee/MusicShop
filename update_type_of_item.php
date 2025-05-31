<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="style.css">
    </head>
    <?php 
        include 'functions.php';
        $tableName = "type_of_item";
        $tableId = $tableName . "_id";

        selectAll($tableName);
    ?>
    <form action="" method="post">
        Пореден номер на вид стока: <input type="number" name="id"> <br>
        <input type="submit" name="submit" value="Избери">
    </form>
    <body>
        <?php
        include 'config.php';

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $idToRedact = $_POST["id"];

            if(!empty($idToRedact)){
                generateUpdateForm($tableName, $idToRedact, $tableId);
            }
            else{
                echo "Cannot have empty values!";
            }
            backToIndexButton();
        }
        ?>
    </body>
</html>
