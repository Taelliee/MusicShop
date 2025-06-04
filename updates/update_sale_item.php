<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="../style.css">
    </head>
    <?php 
        include '../functions.php';
        $tableName = "sale_item";
        // $tableId = $tableName . "_id"; //? composite
        selectAll($tableName);
    ?>
    <form action="" method="post">
        Пореден номер на продажба: <input type="number" name="id1"> <br>
        Пореден номер на стока: <input type="number" name="id2"> <br>
        <input type="submit" name="submit" value="Избери">
    </form>
    <body>
        <?php
        include '../config.php';

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $idToRedact1 = $_POST["id1"];
            $idToRedact2 = $_POST["id2"];

            if(!empty($idToRedact1) && !empty($idToRedact2)){
                generateUpdateFormComposite($tableName, $idToRedact1, $idToRedact2, $tableId);
            }
            else{
                echo "Cannot have empty values!";
            }
            backToIndexButton();
        }
        ?>
    </body>
</html>
