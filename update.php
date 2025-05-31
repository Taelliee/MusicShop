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
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $table = $_POST['table'];
            $id = $_POST['id'];
            unset($_POST['table'], $_POST['id']);

            $tableId = $table . "_id";

            $setClause = "";
            foreach ($_POST as $column => $value) {
                $setClause .= "$column = ?, ";
            }
            $setClause = rtrim($setClause, characters: ", ");

            $query = "UPDATE $table SET $setClause WHERE $tableId = ?";
            $stmt = $link->prepare($query);

            $types = str_repeat("s", count($_POST)) . "i";
            $values = array_values($_POST);
            $values[] = $id;

            $stmt->bind_param($types, ...$values);
            if ($stmt->execute()) {
                echo "<span style='color: white;margin-bottom: 20px;'>Record updated successfully!</span>";
                selectAll($table);
            } else {
                echo "Error updating record.";
            }
            backToIndexButton();
        }
        ?>
    </body>
</html>
