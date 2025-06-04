<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Таблица жанр</title>
        <link rel="stylesheet" href="../style.css">
    </head>
    <body>
        <?php
        include "../functions.php";

        $tableName = "genre";
        selectAll($tableName);
        backToIndexButton();
        ?>
    </body>
</html>
