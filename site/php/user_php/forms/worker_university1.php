<html>
    <body>
        <?php
            $servername = "localhost";
            $username = "f0585302_app_wordpress_0";
            $password = "1cGWdBfq82";
            $dbname = "f0585302_app_wordpress_0";
            $conn = mysqli_connect($servername,$username,$password,$dbname);
            $sql_count_str = "SELECT * FROM `university_params` WHERE `university_id` = '{$_POST['univ1']}'";
            $count_str = $conn->query($sql_count_str);
            $count = mysqli_num_rows($count_str);
            if ($count != 0){
                $sql_upd = "UPDATE `university_params` SET
                quota = '{$_POST['kolab']}',
                min_score = '{$_POST['ball']}'
                WHERE `university_id` = '{$_POST['univ1']}'";
                $res = $conn->query($sql_upd);
            } else {
                $sql = "INSERT INTO `university_params` (university_id, quota, min_score) VALUES ('{$_POST['univ1']}', '{$_POST['kolab']}', '{$_POST['ball']}')";
                $res = $conn->query($sql);
            }
            echo "successfully";
        ?>
    </body>
</html>