<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Таблица позиция</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <?php
        include "functions.php";

        $tableName = "position";
        selectAll($tableName);
        backToIndexButton();
        ?>
    </body>
</html>
