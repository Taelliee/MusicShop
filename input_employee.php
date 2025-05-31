<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Въвеждане на служител</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <form action="" method="post">
            Служител: <input type="text" name="employee_name"> <br>
            Позиция: <br>
            <select name="position_id">
                <?php 
                    include "config.php";

                    $result2 = mysqli_query($link, "SELECT position_id, position_title FROM position");
                    while ($row = mysqli_fetch_array($result2)) {
                        echo "<option value=\"".$row["position_id"]."\">".$row["position_title"]."</option>";
                    }
                ?>
            </select><br>
            Телефон: <input type="text" name="phone"> <br>
            Заплата: <input type="text" name="salary"> <br>
            <input type="submit" name="submit" value="Добави">
        </form>
        <?php
        include "functions.php";
        include "config.php";
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $employee_name = $_POST["employee_name"];
            $position_id = $_POST["position_id"];
            $phone = $_POST["phone"];
            $salary = $_POST["salary"];
            
            $tableName = "employee";

            if(!empty($employee_name) && !empty($position_id) && !empty($phone) && !empty($salary)){
                $sql = "INSERT INTO $tableName (employee_name, position_id, phone, salary)
                        VALUES ('$employee_name', $position_id, '$phone', $salary)";
                $result = mysqli_query($link, $sql);
                if(!$result){
                    die("Error with query" . mysqli_error($link));
                }
                selectAll($tableName);
            }
            else{
                echo "Cannot have empty values!";
            }
            backToIndexButton();
        }
        ?>
    </body>
</html>
