<!DOCTYPE html>
<html lang="bg">
    <head>
        <meta charset="UTF-8">
        <title>Главно Меню</title>
        <style>
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to bottom right,
                rgb(222, 104, 74),
                rgb(62, 134, 89),
                rgb(36, 112, 188),
                rgb(201, 76, 76) );
        }

        .main-title {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        font-size: 30px;
        color:rgb(255, 255, 255);
        text-align: center;
        text-shadow: 2px 2px 4px rgba(201, 77, 0, 0.55);
        letter-spacing: 2px;
        }
        
        .menu-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }

        .menu {
            background-color: rgba(250, 248, 235, 0.76);
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(24, 13, 13, 0.2);
            padding: 15px 40px;
            width: 250px;
        }

        .menu h1 {
            font-size: 20px;
            margin-bottom: 20px;
            color: #333;
            text-align: center;
        }

        .menu a {
            display: block;
            padding: 10px 15px;
            margin-bottom: 10px;
            color: white;
            text-decoration: none;
            border-radius: 6px;
            transition: background-color 0.3s;
        }

        .menu1 a { background-color:rgb(222, 104, 74); }
        .menu1 a:hover { background-color:rgb(204, 61, 4); }

        .menu2 a { background-color:rgb(62, 134, 89); }
        .menu2 a:hover { background-color:rgb(26, 88, 48); }

        .menu3 a { background-color:rgb(36, 112, 188); }
        .menu3 a:hover { background-color:rgb(18, 54, 98); }

        .menu4 a { background-color:rgb(201, 76, 76); }
        .menu4 a:hover { background-color:rgb(165, 61, 61); }

        .menu5 a { background-color:rgb(4, 137, 137); }
        .menu5 a:hover { background-color:rgb(1, 70, 79); }

        </style>
    </head>
    <body>
    <!-- TODO: soft delete - hide the deleted entity
    join the data from other tables in the selects -->
    <h1 class="main-title">Музикален магазин</h1>
    <div class="menu-container">
        <div class="menu menu1">
            <h1>Таблици</h1>
            <a href="select_type_of_item.php">Вид стока</a><br>
            <a href="select_genre.php">Жанр</a><br>
            <a href="select_label.php">Музикална компания</a><br>
            <a href="select_artist.php">Изпълнител</a><br> 
            <a href="select_item.php">Стока</a><br>
            <a href="select_client.php">Клиент</a><br>
            <a href="select_position.php">Позиция</a><br>
            <a href="select_employee.php">Служител</a><br>
            <a href="select_sale.php">Продажба</a><br>
            <a href="select_sale_item.php">Продажби и Стоки</a><br>
        </div>
        <div class="menu menu2">
            <h1>Меню за въвеждане</h1>
            <a href="input_type_of_item.php">Въвеждане на вид стока</a><br>
            <a href="input_genre.php">Въвеждане на жанр</a><br>
            <a href="input_label.php">Въвеждане на музикална компания</a><br>
            <a href="input_artist.php">Въвеждане на изпълнител</a><br>
            <a href="input_item.php">Въвеждане на стока</a><br>
            <a href="input_client.php">Въвеждане на клиент</a><br>
            <a href="input_position.php">Въвеждане на позиция</a><br>
            <a href="input_employee.php">Въвеждане на служител</a><br>
            <a href="input_sale.php">Въвеждане на продажба</a><br>
            <a href="input_sale_item.php">Въвеждане на Продажби и Стоки</a><br>
        </div>
        <div class="menu menu3">
            <h1>Меню за редактиране</h1>
            <a href="update_type_of_item.php">Редактиране на вид стока</a><br>
            <a href="update_genre.php">Редактиране на жанр</a><br>
            <a href="update_label.php">Редактиране на музикална компания</a><br>
            <a href="update_artist.php">Редактиране на изпълнител</a><br>
            <a href="update_item.php">Редактиране на стока</a><br>
            <a href="update_client.php">Редактиране на клиент</a><br>
            <a href="update_position.php">Редактиране на позиция</a><br>
            <a href="update_employee.php">Редактиране на служител</a><br>
            <a href="update_sale.php">Редактиране на продажба</a><br>
            <a href="update_sale_item.php">Редактиране на Продажби и Стоки</a><br>
        </div>
        <div class="menu menu4">
            <h1>Меню за изтриване</h1>
            <a href="delete_type_of_item.php">Изтриване на вид стока</a><br>
            <a href="delete_genre.php">Изтриване на жанр</a><br>
            <a href="delete_label.php">Изтриване на музикална компания</a><br>
            <a href="delete_artist.php">Изтриване на изпълнител</a><br>
            <a href="delete_item.php">Изтриване на стока</a><br>
            <a href="delete_client.php">Изтриване на клиент</a><br>
            <a href="delete_position.php">Изтриване на позиция</a><br>
            <a href="delete_employee.php">Изтриване на служител</a><br>
            <a href="delete_sale.php">Изтриване на продажба</a><br>
            <a href="delete_sale_item.php">Изтриване на Продажби и Стоки</a><br>
        </div>
        <div class="menu menu5">
            <h1>Меню за справки</h1>
            <a href="query_sale_count_per_emp.php">Брой продажби на служители</a><br>
            <a href="query_montly_turnover_by_genre.php">Месечен оборот по жанрове / музикална компания</a><br>
            <a href="query_last_five_sales.php">Последните 5 издадени стоки по служител</a><br>
            <a href="query_item_sold_to_client.php">Закупени стоки от клиент</a><br>
            <a href="query_sales_in_data_range.php">Закупени стоки за период</a><br>
            <h1>Търсене</h1>
            <a href="search.php">Търсене (CD/DVD)</a><br>
            <h1>Създаване</h1>
            <a href="createDB.php">Създаване на база MusicShop</a><br>
            <a href="createTables.php">Създаване на таблици</a><br>
        </div>
    </div>
</body>
</html>
