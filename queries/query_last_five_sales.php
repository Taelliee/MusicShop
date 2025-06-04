<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="../style.css">
    </head>
    <body>
        <?php
        include '../config.php';
        include '../functions.php';

        $thisYear = date("Y");
        $lastYear = $thisYear - 1;

        $query = "
        SELECT i.year, s.date_of_sale, i.item_title, e.employee_name AS employee_name
        FROM sale s
        JOIN sale_item si ON s.sale_id = si.sale_id
        JOIN item i ON si.item_id = i.item_id
        JOIN employee e ON s.employee_id = e.employee_id
        WHERE i.year = ? OR i.year = ?
        ORDER BY s.date_of_sale DESC
        LIMIT 5;
        ";

        $stmt = $link->prepare($query);
        $stmt->bind_param("ii", $thisYear, $lastYear);
        $stmt->execute();
        $result = $stmt->get_result();

        echo "<h3>Последни 5 продажби на стоки, издени в последната година</h3><table border='1'>";
        echo "<tr><th>Година на стока</th><th>Дата на продажба</th><th>Стока</th><th>Служител</th></tr>";
        while ($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>{$row['year']}</td>
            <td>{$row['date_of_sale']}</td>
            <td>{$row['item_title']}</td>
            <td>{$row['employee_name']}</td>
        </tr>";
        }
        echo "</table>";

        backToIndexButton();        
        ?>
    </body>
</html>