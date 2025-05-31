<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $host = 'localhost';
        $user = 'root';
        $password = '';
        $database = 'MusicShop';
        $link = mysqli_connect($host, $user, $password, $database);
        if(!$link){
            die("Connection failed: " . mysqli_connect_error());
        }
        // else{
        //     echo "Connected to database $database<br>";
        // }
        ?>
    </body>
</html>
