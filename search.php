<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
         <form action="" method="post">
            Вид стока:
            <select name="type_name">
                <option value="cd">CD</option>;
                <option value="dvd">DVD</option>;                 
            </select><br>

            Изпълнител:
            <select name="artist_id">
                <option value="" selected>None</option>
                <?php 
                    include "config.php";
                    $result2 = mysqli_query($link, "SELECT artist_id, artist_name FROM artist");
                    while ($row = mysqli_fetch_array($result2)) {
                        echo "<option value=\"".$row["artist_id"]."\">".$row["artist_name"]."</option>";
                    }
                ?>
            </select><br>
            Жанр:
            <select name="genre_id">
                <option value="" selected>None</option>
                <?php 
                    include "config.php";

                    $result2 = mysqli_query($link, "SELECT genre_id, genre_title FROM genre");
                    while ($row = mysqli_fetch_array($result2)) {
                        echo "<option value=\"".$row["genre_id"]."\">".$row["genre_title"]."</option>";
                    }
                ?>
            </select><br>
            Година: <input type="text" name="year"> <br>
            Музикална компания: <br>
            <select name="label_id">
                <option value="" selected>None</option>
                <?php 
                    include "config.php";

                    $result2 = mysqli_query($link, "SELECT label_id, label_title FROM label");
                    while ($row = mysqli_fetch_array($result2)) {
                        echo "<option value=\"".$row["label_id"]."\">".$row["label_title"]."</option>";
                    }
                ?>
            </select><br>
            <input type="submit" name="submit" value="Търси">

        </form>
        <?php
        include 'config.php';
        include "functions.php";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $type_name = $_POST['type_name'];
            $artist_id = $_POST['artist_id'];
            $genre_id = $_POST['genre_id'];
            $year = $_POST['year'];
            $label_id = $_POST['label_id'];
            unset($_POST['table'], $_POST['id']);
    
            $type_param = "s";
            $params = [];
            array_push($params, $type_name);
            $query = "
            SELECT item.item_title ,type_of_item.type_name, item.year, artist.artist_name, genre.genre_title, label.label_title
            FROM item
            JOIN type_of_item ON item.type_of_item_id = type_of_item.type_of_item_id
            JOIN artist ON item.artist_id = artist.artist_id
            JOIN label ON artist.label_id = label.label_id
            JOIN genre ON item.genre_id = genre.genre_id
            WHERE type_of_item.type_name = ?\n";
            if($genre_id) {
                $query.="AND genre.genre_id = ?\n";
                $type_param.="i";
                array_push($params, $genre_id);
            }
            if($artist_id) {
                $query.="AND artist.artist_id = ?\n";
                $type_param.="i";
                array_push($params, $artist_id);
            }
            if($label_id ){
                $query.="AND label.label_id = ?\n";
                $type_param.="i";
                array_push($params, $label_id);
            }
            if($year) {
                $query.="AND item.year = ?\n";
                $type_param.="i";
                array_push($params, $year);
            }

            $stmt = $link->prepare($query);
            $stmt->bind_param(
                ...array_merge([$type_param], $params),
            );

            $stmt->execute();
            $result = $stmt->get_result();
        
            if (!$result) {
                echo "Error executing query: " . mysqli_error($link);
                return;
            }
        
            if (mysqli_num_rows($result) == 0) {
                echo "<span style='color: white;'>No records found.</span>";
                return;
            }
        
            echo "<table border=\"1\"><tr>";
        
            //table headers
            while ($fieldInfo = mysqli_fetch_field($result)) {
                echo "<th>" . htmlspecialchars($fieldInfo->name) . "</th>";
            }
            echo "</tr>";
        
            //table rows
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                foreach ($row as $cell) {
                    echo "<td>" . htmlspecialchars($cell) . "</td>";
                }
                echo "</tr>";
            }
        
            echo "</table>";
            backToIndexButton();
        }
        ?>
    </body>
</html>