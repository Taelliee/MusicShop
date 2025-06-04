<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="../style.css">
    </head>
    <body>
        <form action="" method="post">
        Вид групиране:
        <select name="type_name">
            <option value="genre">жанр</option>;
            <option value="label">музикална компания</option>;                 
        </select><br>
        Месец: <br>
        <select name="month">
            <?php
            foreach (range(1, 12) as $i) {
                $monthName = date("F", mktime(0, 0, 0, $i, 1));
                printf('<option value="%02d">%s</option>', $i, $monthName);
            }
            ?>
        </select>
        Година: <br>
        <select name="year">
            <?php
            $currentYear = date("Y");
            foreach (range($currentYear, $currentYear - 4) as $year) {
                echo "<option value=\"$year\">$year</option>";
            }
            ?>
        </select>
        <input type="submit" name="submit" value="Групирай">
        </form>
        <?php
        include '../config.php';
        include '../functions.php';

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $month = $_POST['month'] ?? "January";
            $year = $_POST['year'] ?? 2025;
            $groupBy = $_POST['type_name'] ?? 'genre'; // 'genre' or 'label'

            if ($groupBy == 'genre') {
                $query = "
                    SELECT genre.genre_title AS group_name, SUM(sale_item.item_count * item.price) AS turnover
                    FROM sale
                    JOIN sale_item ON sale.sale_id = sale_item.sale_id
                    JOIN item ON sale_item.item_id = item.item_id
                    JOIN genre ON item.genre_id = genre.genre_id
                    WHERE MONTH(sale.date_of_sale) = ? AND YEAR(sale.date_of_sale) = ?
                    GROUP BY genre.genre_title
                    ORDER BY turnover ASC;
                ";
            } else if ($groupBy == 'label'){
                $query = "
                    SELECT label.label_title AS group_name, SUM(sale_item.item_count * item.price) AS turnover
                    FROM sale
                    JOIN sale_item ON sale.sale_id = sale_item.sale_id
                    JOIN item ON sale_item.item_id = item.item_id
                    JOIN artist ON artist.artist_id = item.artist_id
                    JOIN label ON artist.label_id = label.label_id
                    WHERE MONTH(sale.date_of_sale) = ? AND YEAR(sale.date_of_sale) = ?
                    GROUP BY label.label_title
                    ORDER BY turnover ASC;
                ";
            }

            $stmt = $link->prepare($query);
            $stmt->bind_param("ii", $month, $year);
            $stmt->execute();
            $result = $stmt->get_result();

            echo "<h3>Месечен оборот</h3><table border='1'>";
            if ($groupBy == "label") {
                echo "<tr><th>Музикална компания</th>";
            }
            else if ($groupBy == "genre"){
                echo "<tr><th>Жанр</th>";
            }
            echo "<th>Оборот</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>{$row['group_name']}</td><td>{$row['turnover']}</td></tr>";
            }
            echo "</table>";
            backToIndexButton();
        }
        ?>
    </body>
</html>