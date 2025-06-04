<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>
        .back-button {
            width: 5%;
            padding: 8px 10px;
            margin: 20px auto;
            border: 1px solid #aaa;
            border-radius: 5px;
            font-size: 14px;
            background: linear-gradient(to bottom right,
                rgb(222, 104, 74),
                rgb(36, 112, 188));
            color: white;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
            display: block;
        }

        .back-button:hover {
                background: linear-gradient(to bottom right,
                rgb(10, 51, 117),
                rgb(20, 70, 150));
        }
        </style>
    </head>
    <body>
        <?php
        function createTable($link, $sql){
            if(mysqli_query($link, $sql)){
                echo "Table created successfully!<br>";
            }
            else{
                echo "Error creating table " . mysqli_error($link) . "<br>";
            }
        }
        
        function selectAll($tableName) {
            include "config.php";
        
            $tableName = mysqli_real_escape_string($link, $tableName);
        
            $query = "SELECT * FROM `$tableName`";
            $result = mysqli_query($link, $query);
        
            if (!$result) {
                echo "Error executing query: " . mysqli_error($link);
                return;
            }
        
            if (mysqli_num_rows($result) == 0) {
                echo "<span style='color: white;'>No records found in table '$tableName'.</span>";
                return;
            }
        
            echo "<table border=\"1\"><tr>";
        
            //table headers
            while ($fieldInfo = mysqli_fetch_field($result)) {
                echo "<th>" . htmlspecialchars($fieldInfo->name) . "</th>";
            }
            echo "</tr>";
        
            //table rows
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                foreach ($row as $cell) {
                    echo "<td>" . htmlspecialchars($cell) . "</td>";
                }
                echo "</tr>";
            }
        
            echo "</table>";
        }


        function backToIndexButton() {
            echo '<button onclick="window.location.href=\'../index.php\'" class="back-button">Начало</button>';
        }

        function generateUpdateForm($tableName, $id, $tableId): void {
            include "config.php";
            $query = "SELECT * FROM $tableName WHERE $tableId = ?";
            $stmt = $link->prepare($query);
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();

            if (!$row) {
                echo "No record found!";
                return;
            }

            echo "<form method='post' action='update.php'>";
            foreach ($row as $column => $value) {
                echo "<label for='$column'>$column:</label>";
                echo "<input type='text' name='$column' value='$value'><br>";
            }
            echo "<input type='hidden' name='table' value='$tableName'>";
            echo "<input type='hidden' name='id' value='$id'>";
            echo "<input type='submit' value='Редактирай'>";
            echo "</form>";
        }

        function generateUpdateFormComposite($tableName, $id, $id2, $tableId) { //tableId1 and tableId2
            include "config.php";
            $query = "SELECT * FROM $tableName WHERE $id = ? AND $id2 = ?";
            $stmt = $link->prepare($query);
            $stmt->bind_param("ii", $id, $id2);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();

            if (!$row) {
                echo "No record found!";
                return;
            }

            echo "<form method='post' action=''>";
            foreach ($row as $column => $value) {
                echo "<label for='$column'>$column:</label>";
                echo "<input type='text' name='$column' value='$value'><br>";
            }
            echo "<input type='hidden' name='table' value='$tableName'>";
            echo "<input type='hidden' name='id' value='$id'>";
            echo "<input type='submit' value='Редактирай'>";
            echo "</form>";
        }

        ?>

    </body>
</html>
