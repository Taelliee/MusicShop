<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Таблица изпълнител</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <?php
        include "functions.php";

        $tableName = "type_of_item";
        selectAll($tableName);
        backToIndexButton();
        ?>
    </body>
</html>
