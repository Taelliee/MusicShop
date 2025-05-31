<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <?php
        include 'config.php';
        include "functions.php";

        $query = "
        SELECT e.employee_id, e.employee_name, COUNT(s.sale_id) AS total_sales
        FROM sale s
        JOIN employee e ON s.employee_id = e.employee_id
        GROUP BY e.employee_id
        ORDER BY total_sales DESC;
        ";
        
        $result = mysqli_query($link, $query);

        echo "<h3>Продажби по служители</h3><table border='1'>";
        echo "<tr><th>Име</th><th>Общо продажби</th></tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                <td>{$row['employee_name']}</td>
                <td>{$row['total_sales']}</td>
            </tr>";
        }
    
        echo "</table>";
        backToIndexButton();
        
        ?>
    </body>
</html>