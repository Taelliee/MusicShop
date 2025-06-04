<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Въвеждане на стока</title>
        <link rel="stylesheet" href="../style.css">
    </head>
    <body>
        <form action="" method="post">
            Вид стока:
            <select name="type_of_item_id">
                <?php 
                    include "../config.php";

                    $result2 = mysqli_query($link, "SELECT type_of_item_id, type_name FROM type_of_item");
                    while ($row = mysqli_fetch_array($result2)) {
                        echo "<option value=\"".$row["type_of_item_id"]."\">".$row["type_name"]."</option>";
                    }
                ?>
            </select><br>
            Година: <input type="text" name="year"> <br>
            Название на стока: <input type="text" name="item_title"> <br>
            Изпълнител:
            <select name="artist_id">
                <?php 
                    include "../config.php";

                    $result2 = mysqli_query($link, "SELECT artist_id, artist_name FROM artist");
                    while ($row = mysqli_fetch_array($result2)) {
                        echo "<option value=\"".$row["artist_id"]."\">".$row["artist_name"]."</option>";
                    }
                ?>
            </select><br>
            Жанр:
            <select name="genre_id">
                <?php 
                    include "../config.php";

                    $result2 = mysqli_query($link, "SELECT genre_id, genre_title FROM genre");
                    while ($row = mysqli_fetch_array($result2)) {
                        echo "<option value=\"".$row["genre_id"]."\">".$row["genre_title"]."</option>";
                    }
                ?>
            </select><br>
            Цена: <input type="text" name="price"> <br>
            Бройки: <input type="text" name="stock"> <br>
            <input type="submit" name="submit" value="Добави">

        </form>
        <?php
        include "../functions.php";
        include "../config.php";
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $type_of_item_id = $_POST["type_of_item_id"];
            $year = $_POST["year"];
            $item_title = mysqli_real_escape_string($link, $_POST["item_title"]);
            $artist_id = $_POST["artist_id"];
            $genre_id = $_POST["genre_id"];
            $price = $_POST["price"];
            $stock = $_POST["stock"];

            $tableName = "item";

            if(!empty($type_of_item_id) && !empty($year) && !empty($item_title) && !empty($artist_id)
            && !empty($genre_id) && !empty($price) && !empty($stock)){
                $sql = "INSERT INTO $tableName (type_of_item_id, year, item_title, artist_id, genre_id, price, stock)
                        VALUES ($type_of_item_id, $year, '$item_title', $artist_id, $genre_id, $price, $stock)";
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
