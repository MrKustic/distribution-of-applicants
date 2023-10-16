<html>
    <body>
        <?php
            $servername = "localhost";
            $username = "f0585302_app_wordpress_0";
            $password = "1cGWdBfq82";
            $dbname = "f0585302_app_wordpress_0";
            $conn = mysqli_connect($servername,$username,$password,$dbname);
            $sql_count_str = "SELECT * FROM `extra_score` WHERE `university_id` = '{$_POST['univ1']}' AND `passport` = '{$_POST['passport']}'";
            $count_str = $conn->query($sql_count_str);
            $count = mysqli_num_rows($count_str);
            if ($count != 0){
                $sql_upd = "UPDATE `extra_score` SET
                score = '{$_POST['ball']}'
                WHERE `university_id` = '{$_POST['univ1']}' AND `passport` = '{$_POST['passport']}'";
                $res = $conn->query($sql_upd);
            } else {
                $sql = "INSERT INTO `extra_score` (university_id, name_, passport, score) VALUES ('{$_POST['univ1']}', '{$_POST['name']}', '{$_POST['passport']}', '{$_POST['ball']}')";
                $res = $conn->query($sql);
            }
            echo "successfully";
        ?>
    </body>
</html>