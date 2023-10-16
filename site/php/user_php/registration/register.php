<?php
    //Запускаем сессию
    session_start();

    //Добавляем файл подключения к БД
    require_once("dbconnect.php");

    //Объявляем ячейку для добавления ошибок, которые могут возникнуть при обработке формы.
    $_SESSION["error_messages"] = '';

    //Объявляем ячейку для добавления успешных сообщений
    $_SESSION["success_messages"] = '';

    /*
        Проверяем была ли отправлена форма, то есть была ли нажата кнопка зарегистрироваться. Если да, то идём дальше, если нет, значит пользователь зашёл на эту страницу напрямую. В этом случае выводим ему сообщение об ошибке.
    */
    if(isset($_POST["btn_submit_register"]) && !empty($_POST["btn_submit_register"])){

        
        //Проверяем полученную капчу
        //Обрезаем пробелы с начала и с конца строки
        $captcha = trim($_POST["captcha"]);

        if(isset($_POST["captcha"]) && !empty($captcha)){

            //Сравниваем полученное значение с значением из сессии. 
            if(($_SESSION["rand"] != $captcha) && ($_SESSION["rand"] != "")){
                
                // Если капча не верна, то возвращаем пользователя на страницу регистрации, и там выведем ему сообщение об ошибке что он ввёл неправильную капчу.
                $error_message = "<p class='mesage_error'><strong>Ошибка!</strong> Вы ввели неправильную капчу </p>";

                // Сохраняем в сессию сообщение об ошибке. 
                $_SESSION["error_messages"] = $error_message;

                //Возвращаем пользователя на страницу регистрации
                header("HTTP/1.1 301 Moved Permanently");
                header("Location: ".$address_site."/form_register.php");

                //Останавливаем скрипт
                exit();
            }

            
            // Проверяем если в глобальном массиве $_POST существуют данные отправленные из формы и заключаем переданные данные в обычные переменные.
            if(isset($_POST["name"])){
                
                //Обрезаем пробелы с начала и с конца строки
                $name = trim($_POST["name"]);

                //Проверяем переменную на пустоту
                if(!empty($name)){
                    // Для безопасности, преобразуем специальные символы в HTML-сущности
                    $name = htmlspecialchars($name, ENT_QUOTES);
                }else{
                    // Сохраняем в сессию сообщение об ошибке. 
                    $_SESSION["error_messages"] .= "<p class='mesage_error'>Укажите Ваше имя</p>";

                    //Возвращаем пользователя на страницу регистрации
                    header("HTTP/1.1 301 Moved Permanently");
                    header("Location: ".$address_site."/form_register.php");

                    //Останавливаем скрипт
                    exit();
                }
				
            }else{
                // Сохраняем в сессию сообщение об ошибке. 
                $_SESSION["error_messages"] .= "<p class='mesage_error'>Отсутствует поле с именем</p>";

                //Возвращаем пользователя на страницу регистрации
                header("HTTP/1.1 301 Moved Permanently");
                header("Location: ".$address_site."/form_register.php");

                //Останавливаем скрипт
                exit();
            }

            if(isset($_POST["password"])){

                //Обрезаем пробелы с начала и с конца строки
                $password = trim($_POST["password"]);

                if(!empty($password)){
                    $password = htmlspecialchars($password, ENT_QUOTES);

                    //Шифруем папроль
                    $password = md5($password."top_secret"); 
                }else{
                    // Сохраняем в сессию сообщение об ошибке. 
                    $_SESSION["error_messages"] .= "<p class='mesage_error'>Укажите Ваш пароль</p>";
                    
                    //Возвращаем пользователя на страницу регистрации
                    header("HTTP/1.1 301 Moved Permanently");
                    header("Location: ".$address_site."/form_register.php");

                    //Останавливаем  скрипт
                    exit();
                }

            }else{
                // Сохраняем в сессию сообщение об ошибке. 
                $_SESSION["error_messages"] .= "<p class='mesage_error'>Отсутствует поле для ввода пароля</p>";
                
                //Возвращаем пользователя на страницу регистрации
                header("HTTP/1.1 301 Moved Permanently");
                header("Location: ".$address_site."/form_register.php");

                //Останавливаем  скрипт
                exit();
            }

            // (4) Место для кода добавления пользователя в БД

            //Запрос на добавления пользователя в БД
			$result_check_password = $mysqli->query("SELECT * FROM `students` WHERE `password` = '{$_POST['password']}'");
			$count = mysqli_num_rows($result_check_password);
			$result_check_password->close();
			if ($count > 0){
				$_SESSION["error_messages"] .= "<p class='mesage_error'>Этот пароль занят</p>";
                    
                //Возвращаем пользователя на страницу регистрации
                header("HTTP/1.1 301 Moved Permanently");
                header("Location: ".$address_site."/form_register.php");

                //Останавливаем  скрипт
                exit();
			}
			
			$result_check_passport = $mysqli->query("SELECT * FROM `students` WHERE `passport` = '{$_POST['passport_id']}'");
			$count2 = mysqli_num_rows($result_check_passport);
			$result_check_passport->close();
			if ($count2 > 0){
				$_SESSION["error_messages"] .= "<p class='mesage_error'>Пользователь с такими пасспортными данными уже существует!</p>";
                    
                //Возвращаем пользователя на страницу регистрации
                header("HTTP/1.1 301 Moved Permanently");
                header("Location: ".$address_site."/form_auth.php");

                //Останавливаем  скрипт
                exit();
			}
			
			$result_count_rows = $mysqli->query("SELECT * FROM `students`");
			$rows = mysqli_num_rows($result_count_rows);
			$result_count_rows->close();
			
            $result_query_insert = $mysqli->query("INSERT INTO `students` (id, name, telephone, passport, gender, date_of_birth, place_of_birth, city, region, password) VALUES ($rows, '{$_POST['name']}', '{$_POST['telephone']}', '{$_POST['passport_id']}', '{$_POST['gender']}', '{$_POST['date_of_birth']}', '{$_POST['place_of_birth']}', '{$_POST['city']}', '{$_POST['region']}', '{$_POST['password']}')");

            if(!$result_query_insert){
                // Сохраняем в сессию сообщение об ошибке. 
                $_SESSION["error_messages"] .= "<p class='mesage_error' >Ошибка запроса на добавления пользователя в БД</p>";
                
                //Возвращаем пользователя на страницу регистрации
                header("HTTP/1.1 301 Moved Permanently");
                header("Location: ".$address_site."/form_register.php");

                //Останавливаем  скрипт
                exit();
            }else{

                $_SESSION["success_messages"] = "<p class='success_message'>Регистрация прошла успешно!!! <br />Теперь Вы можете авторизоваться используя Ваш логин и пароль.</p>";

                //Отправляем пользователя на страницу авторизации
                header("HTTP/1.1 301 Moved Permanently");
                header("Location: ".$address_site."/form_auth.php");
            }

            /* Завершение запроса */
            $result_query_insert->close();

            //Закрываем подключение к БД
            $mysqli->close();
            
        }else{
            //Если капча не передана либо оно является пустой
            exit("<p><strong>Ошибка!</strong> Отсутствует проверечный код, то есть код капчи. Вы можете перейти на <a href=".$address_site."> главную страницу </a>.</p>");
        }

    }else{

        exit("<p><strong>Ошибка!</strong> Вы зашли на эту страницу напрямую, поэтому нет данных для обработки. Вы можете перейти на <a href=".$address_site."> главную страницу </a>.</p>");
    }
?>