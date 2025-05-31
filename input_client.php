<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Въвеждане на клиент</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <form action="" method="post">
            Име на клиент: <input type="text" name="client_name"> <br>
            Адрес: <input type="text" name="address"><br>
            Телефон: <input type="text" name="phone"><br>
            <input type="submit" name="submit" value="Добави">

        </form>
        <?php
        include "functions.php";
        include "config.php";
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $client_name = $_POST["client_name"];
            $address = $_POST["address"];
            $phone = $_POST["phone"];
            
            $tableName = "client";

            if(!empty($client_name) && !empty($address) && !empty($phone)){
                $sql = "INSERT INTO $tableName (client_name, address, phone)
                        VALUES ('$client_name', '$address', '$phone')";
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
