<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Въвеждане на позиция</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <form action="" method="post">
            Позиция: <input type="text" name="position_title"> <br>
            <input type="submit" name="submit" value="Добави">
        </form>
        <?php
        include "functions.php";
        include "config.php";
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $position_title = $_POST["position_title"];
            
            $tableName = "position";

            if(!empty($position_title)){
                $sql = "INSERT INTO $tableName (position_title)
                        VALUES ('$position_title')";
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
