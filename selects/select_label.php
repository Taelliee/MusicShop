<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Таблица изпълнител</title>
        <link rel="stylesheet" href="../style.css">
    </head>
    <body>
        <?php
        include "../functions.php";

        $tableName = "label";
        selectAll($tableName);
        backToIndexButton();
        ?>
    </body>
</html>
