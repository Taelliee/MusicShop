<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <form action="" method="post">
            Клиент:
            <select name="client_id">
                <?php 
                    include "config.php";

                    $result2 = mysqli_query($link, "SELECT client_id, client_name FROM client");
                    while ($row = mysqli_fetch_array($result2)) {
                        echo "<option value=\"".$row["client_id"]."\">".$row["client_name"]."</option>";
                    }
                ?>
            </select><br>
            <input type="submit" name="submit" value="Провери">
        </form>
        <?php
        include 'config.php';
        include "functions.php";
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $client_id = $_POST['client_id'] ?? 1;

            $query = "
            SELECT i.item_title, toi.type_name, si.item_count, s.date_of_sale
            FROM sale s
            JOIN sale_item si ON s.sale_id = si.sale_id
            JOIN item i ON si.item_id = i.item_id
            JOIN type_of_item toi ON i.type_of_item_id = toi.type_of_item_id
            WHERE s.client_id = ?
            ORDER BY toi.type_name, s.date_of_sale;
            ";

            $stmt = $link->prepare($query);
            $stmt->bind_param("i", $client_id);
            $stmt->execute();
            $result = $stmt->get_result();

            echo "<h3>Стоки, закупени от клиент №$client_id</h3><table border='1'>";
            echo "<tr><th>Стока</th>
            <th>Вид</th>
            <th>Брой</th>
            <th>Дата</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>{$row['item_title']}</td>
                <td>{$row['type_name']}</td>
                <td>{$row['item_count']}</td>
                <td>{$row['date_of_sale']}</td></tr>";
            }
            echo "</table>";

            backToIndexButton();  
        }
        ?>
    </body>
</html>