<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Въвеждане на продажба</title>
        <link rel="stylesheet" href="../style.css">
    </head>
    <body>
        <form action="" method="post">
            Клиент:
            <select name="client_id">
                <?php 
                    include "../config.php";

                    $result2 = mysqli_query($link, "SELECT client_id, client_name FROM client");
                    while ($row = mysqli_fetch_array($result2)) {
                        echo "<option value=\"".$row["client_id"]."\">".$row["client_name"]."</option>";
                    }
                ?>
            </select><br>
            Служител:
            <select name="employee_id">
                <?php 
                    include "../config.php";

                    $result2 = mysqli_query($link, "SELECT employee_id, employee_name FROM employee");
                    while ($row = mysqli_fetch_array($result2)) {
                        echo "<option value=\"".$row["employee_id"]."\">".$row["employee_name"]."</option>";
                    }
                ?>
            </select><br>
            Дата:
            <input type="date" name="date_of_sale"> <br>
            <input type="submit" name="submit" value="Добави">
        </form>
        <?php
        include "../functions.php";
        include "../config.php";
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $client_id = $_POST["client_id"];
            $employee_id = $_POST["employee_id"];
            $date_of_sale = $_POST["date_of_sale"];

            $tableName = "sale";

            if(!empty($client_id) && !empty($employee_id) && !empty($date_of_sale)){
                $sql = "INSERT INTO $tableName (client_id, employee_id, date_of_sale)
                        VALUES ($client_id, $employee_id, '$date_of_sale')";
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
