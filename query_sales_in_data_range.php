<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <form action="" method="post">
            Стартова дата:<br>
            <input type="date" name="start_date"> <br>
            Крайна дата:<br>
            <input type="date" name="end_date"> <br>
            <input type="submit" name="submit" value="Търси">
        </form>
        <?php
        include 'config.php';
        include "functions.php";

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $start = $_POST['start_date'] ?? '2024-01-01';
            $end = $_POST['end_date'] ?? date('Y-m-d');

            $query = "
                SELECT c.client_name, i.item_title, s.date_of_sale
                FROM sale s
                JOIN sale_item si ON s.sale_id = si.sale_id
                JOIN item i ON si.item_id = i.item_id
                JOIN client c ON s.client_id = c.client_id
                WHERE s.date_of_sale BETWEEN ? AND ?
                ORDER BY c.client_name, s.date_of_sale;
            ";

            $stmt = $link->prepare($query);
            $stmt->bind_param("ss", $start, $end);
            $stmt->execute();
            $result = $stmt->get_result();

            echo "<h3>Продажби от $start до $end</h3><table border='1'>";
            echo "<tr><th>Client</th><th>Item</th><th>Date</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>{$row['client_name']}</td><td>{$row['item_title']}</td><td>{$row['date_of_sale']}</td></tr>";
            }
            echo "</table>";

            backToIndexButton();
        }    
        ?>
    </body>
</html>