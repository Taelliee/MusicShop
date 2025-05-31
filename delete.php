<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style.css">
        <title></title>
    </head>
    <body>
        <?php
            include 'config.php';
            include 'functions.php';

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $table = $_POST['table'];
                $id = $_POST['id'];

                // Dynamic primary key column (e.g., "item" → "item_id")
                $tableId = $table . "_id";
                if($table == "sale_item"){
                    $tableId = "sale_id";
                }
                
                $query = "DELETE FROM `$table` WHERE `$tableId` = ?";
                $stmt = $link->prepare($query);

                if (!$stmt) {
                    echo "Prepare failed: " . $link->error;
                    backToIndexButton();
                    exit;
                }

                $stmt->bind_param("i", $id);
                if ($stmt->execute()) {
                    echo "<span style='color: white;margin-bottom: 20px;'>Record deleted successfully!</span>";
                    selectAll($table);
                } else {
                    echo "Error deleting record.";
                }

                $stmt->close();
                backToIndexButton();
            }
        ?>

    </body>
</html>
