<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Въвеждане на изпълнител</title>
        <link rel="stylesheet" href="../style.css">
    </head>
    <body>
        <form action="" method="post">
            Име: <input type="text" name="artist_name"> <br>
            Музикална компания: <br>
            <select name="label_id">
                <?php 
                    include "../config.php";

                    $result2 = mysqli_query($link, "SELECT label_id, label_title FROM label");
                    while ($row = mysqli_fetch_array($result2)) {
                        echo "<option value=\"".$row["label_id"]."\">".$row["label_title"]."</option>";
                    }
                ?>
            </select><br>
            <input type="submit" name="submit" value="Добави">
        </form>
        <?php
        include "../functions.php";
        include "../config.php";
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $artist_name = $_POST["artist_name"];
            $label_id = $_POST["label_id"];

            $tableName = "artist";

            if(!empty($artist_name) && !empty($label_id)){
                $sql = "INSERT INTO $tableName (artist_name, label_id)
                        VALUES ('$artist_name', $label_id)";
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
