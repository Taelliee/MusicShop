<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Въвеждане на жанр</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <form action="" method="post">
            Жанр: <input type="text" name="genre_title"> <br>
            <input type="submit" name="submit" value="Добави">
        </form>
        <?php
        include "functions.php";
        include "config.php";
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $genre_title = $_POST["genre_title"];
            
            $tableName = "genre";

            if(!empty($genre_title)){
                $sql = "INSERT INTO $tableName (genre_title)
                        VALUES ('$genre_title')";
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
