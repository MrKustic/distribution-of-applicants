<html>
    <body>
        <?php
            $servername = "localhost";
            $username = "f0585302_app_wordpress_0";
            $password = "1cGWdBfq82";
            $dbname = "f0585302_app_wordpress_0";
            $conn = mysqli_connect($servername,$username,$password,$dbname);
            $sql_count_str = "SELECT * FROM `students` WHERE `name_` = '{$_GET['name']}'";
            $count_str = $conn->query($sql_count_str);
            $count = mysqli_num_rows($count_str);
            if ($count != 0){
                $sql_upd = "UPDATE `people` SET
                telephone = '{$_GET['phone']}',
                age = '{$_GET['age']}',
                gender = '{$_GET['gender']}', 
                date_of_birth = '{$_GET['date_of_birth']}',
                region = '{$_GET['region']}',
                univ1 = '{$_GET['univ1']}',
                univ2 = '{$_GET['univ2']}',
                univ3 = '{$_GET['univ3']}'
                WHERE `name_` = '{$_GET['name']}'";
                $res = $conn->query($sql_upd);
            } else {
                $sql = "INSERT INTO `students` (id, name_, telephone, age, gender, date_of_birth, region, univ1, univ2, univ3) VALUES ('{$_GET['id']}', '{$_GET['name']}', '{$_GET['phone']}', '{$_GET['age']}', '{$_GET['gender']}', '{$_GET['date_of_birth']}', '{$_GET['region']}', '{$_GET['univ1']}', '{$_GET['univ2']}', '{$_GET['univ3']}')";
                $res = $conn->query($sql);
            }
            echo "successfully";
        ?>
    </body>
</html>