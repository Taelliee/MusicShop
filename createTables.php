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
        include "config.php";
        
        $sql = "CREATE TABLE type_of_item(
                type_of_item_id INT NOT NULL AUTO_INCREMENT,
                type_name VARCHAR(30) NOT NULL,
                PRIMARY KEY (type_of_item_id)
                ) ENGINE = InnoDB DEFAULT CHARSET=utf8;";
        createTable($link, $sql);

        $sql = "CREATE TABLE genre(
                genre_id INT NOT NULL AUTO_INCREMENT,
                genre_title VARCHAR(20) NOT NULL,
                PRIMARY KEY (genre_id)
                ) ENGINE = InnoDB DEFAULT CHARSET=utf8;";
        createTable($link, $sql);

        $sql = "CREATE TABLE label(
                label_id INT NOT NULL AUTO_INCREMENT,
                label_title VARCHAR(30) NOT NULL,
                PRIMARY KEY (label_id)
                ) ENGINE = InnoDB DEFAULT CHARSET=utf8;";
        createTable($link, $sql);
        
        $sql = "CREATE TABLE artist(
                artist_id INT NOT NULL AUTO_INCREMENT,
                artist_name VARCHAR(20) NOT NULL,
                label_id INT NOT NULL,
                PRIMARY KEY (artist_id),
                FOREIGN KEY (label_id) REFERENCES label(label_id)
                ) ENGINE = InnoDB DEFAULT CHARSET=utf8;";
        createTable($link, $sql);

        $sql = "CREATE TABLE item(
                item_id INT NOT NULL AUTO_INCREMENT,
                type_of_item_id INT NOT NULL,
                year INT,
                item_title VARCHAR(30) NOT NULL,
                artist_id INT NOT NULL,
                genre_id INT NOT NULL,
                price DEC(5, 2),
                stock INT,
                PRIMARY KEY (item_id),
                FOREIGN KEY (type_of_item_id) REFERENCES type_of_item(type_of_item_id),
                FOREIGN KEY (artist_id) REFERENCES artist(artist_id),
                FOREIGN KEY (genre_id) REFERENCES genre(genre_id)
                ) ENGINE = InnoDB DEFAULT CHARSET=utf8;";
        createTable($link, $sql);

        $sql = "CREATE TABLE client(
                client_id INT NOT NULL AUTO_INCREMENT,
                client_name VARCHAR(20),
                address VARCHAR(40),
                phone CHAR(13),
                PRIMARY KEY (client_id)
                ) ENGINE = InnoDB DEFAULT CHARSET=utf8;";
        createTable($link, $sql);

        $sql = "CREATE TABLE `position` (
                position_id INT NOT NULL AUTO_INCREMENT,
                position_title VARCHAR(20) NOT NULL,
                PRIMARY KEY (position_id)
                ) ENGINE = InnoDB DEFAULT CHARSET=utf8;";
        createTable($link, $sql);

        $sql = "CREATE TABLE employee (
                employee_id INT NOT NULL AUTO_INCREMENT,
                employee_name VARCHAR(20),
                position_id INT NOT NULL,
                phone CHAR(13),
                salary DEC(7, 2),
                PRIMARY KEY (employee_id),
                FOREIGN KEY (position_id) REFERENCES `position`(position_id)
                ) ENGINE = InnoDB DEFAULT CHARSET=utf8;";
        createTable($link, $sql);

        $sql = "CREATE TABLE sale (
                sale_id INT NOT NULL AUTO_INCREMENT,
                client_id INT NOT NULL,
                employee_id INT NOT NULL,
                date_of_sale DATE,
                PRIMARY KEY (sale_id),
                FOREIGN KEY (client_id) REFERENCES client(client_id),
                FOREIGN KEY (employee_id) REFERENCES employee(employee_id)
                ) ENGINE = InnoDB DEFAULT CHARSET=utf8;";
        createTable($link, $sql);

        $sql = "CREATE TABLE sale_item(
                sale_id INT NOT NULL,
                item_id INT NOT NULL,
                item_count INT NOT NULL,
                PRIMARY KEY (sale_id, item_id),
                FOREIGN KEY (sale_id) REFERENCES sale(sale_id),
                FOREIGN KEY (item_id) REFERENCES item(item_id)
                ) ENGINE = InnoDB DEFAULT CHARSET=utf8;";
        createTable($link, $sql);
        
        mysqli_close($link);
        ?>
    </body>
</html>
