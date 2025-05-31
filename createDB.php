<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <?php
        include "functions.php";
        $host = 'localhost';
        $user = 'root';
        $password = '';
        $database = 'MusicShop';
        
        $link = mysqli_connect($host, $user, $password);
        if(!$link){
            die("Connection failed: " . mysqli_connect_error());
        }
        
        $sqlDB = "CREATE DATABASE $database";
        
        if(mysqli_query($link, $sqlDB)){
            echo "Database $database created successfully!<br>";
        }
        else{
            echo "Error creating $database database: " . mysqli_connect_error() . "<br>";
        }
        mysqli_select_db($link, $database);
        mysqli_close($link);
        ?>
    </body>
</html>