<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Въвеждане на вид стока</title>
        <link rel="stylesheet" href="../style.css">
    </head>
    <body>
        <form action="" method="post">
            Вид стока: <input type="text" name="type_name"> <br>
            <input type="submit" name="submit" value="Добави">
        </form>
        <?php
        include "../functions.php";
        include "../config.php";

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $type_name = $_POST["type_name"];

            $tableName = "type_of_item";

            if(!empty($type_name)){
                $sql = "INSERT INTO $tableName (type_name)
                        VALUES ('$type_name')";
                $result = mysqli_query($link, $sql);
                if(!$result){
                    die("Error with query" . mysqli_error($link));
                }
                selectAll($tableName);
            }
            else{
                echo "Cannot have empty values!";
            }
            backToIndexButton();
        }
        ?>
    </body>
</html>
