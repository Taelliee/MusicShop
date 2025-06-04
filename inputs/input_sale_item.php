<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Въвеждане на продажби и стоки</title>
        <link rel="stylesheet" href="../style.css">
    </head>
    <body>
        <form action="" method="post">
            Продажба:
            <select name="sale_id">
                <?php 
                    include "../config.php";

                    $result2 = mysqli_query($link, "SELECT sale_id FROM sale");
                    while ($row = mysqli_fetch_array($result2)) {
                        echo "<option value=\"".$row["sale_id"]."\">".$row["sale_id"]."</option>";
                    }
                ?>
            </select><br>
            Стока:
            <select name="item_id">
                <?php 
                    include "../config.php";

                    $result2 = mysqli_query($link, "SELECT item_id, item_title FROM item");
                    while ($row = mysqli_fetch_array($result2)) {
                        echo "<option value=\"".$row["item_id"]."\">".$row["item_title"]."</option>";
                    }
                ?>
            </select><br>
            Бройка: <input type="text" name="item_count"> <br>
            <input type="submit" name="submit" value="Добави">
        </form>
        <?php
        include "../functions.php";
        include "../config.php";
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $sale_id = $_POST["sale_id"];
            $item_id = $_POST["item_id"];
            $item_count = $_POST["item_count"];

            $tableName = "sale_item";

            if(!empty($sale_id) && !empty($item_id) && !empty($item_count)){
                $sql = "INSERT INTO $tableName (sale_id, item_id, item_count)
                        VALUES ($sale_id, $item_id, $item_count)";
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
