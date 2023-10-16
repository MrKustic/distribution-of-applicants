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
    Проверяем была ли отправлена форма, то есть была ли нажата кнопка Войти. Если да, то идём дальше, если нет, то выведем пользователю сообщение об ошибке, о том что он зашёл на эту страницу напрямую.
    */
    if(isset($_POST["btn_submit_auth"]) && !empty($_POST["btn_submit_auth"])){
     
        //(1) Место для следующего куска кода

        //Проверяем полученную капчу
        if(isset($_POST["captcha"])){
         
            //Обрезаем пробелы с начала и с конца строки
            $captcha = trim($_POST["captcha"]);
         
            if(!empty($captcha)){
         
                //Сравниваем полученное значение с значением из сессии. 
                if(($_SESSION["rand"] != $captcha) && ($_SESSION["rand"] != "")){
                     
                    // Если капча не верна, то возвращаем пользователя на страницу авторизации, и там выведем ему сообщение об ошибке что он ввёл неправильную капчу.
         
                    $error_message = "<p class='mesage_error'><strong>Ошибка!</strong> Вы ввели неправильную капчу </p>";
         
                    // Сохраняем в сессию сообщение об ошибке. 
                    $_SESSION["error_messages"] = $error_message;
         
                    //Возвращаем пользователя на страницу авторизации
                    header("HTTP/1.1 301 Moved Permanently");
                    header("Location: ".$address_site."/form_auth.php");
         
                    //Останавливаем скрипт
                    exit();
                }
         
            }else{
         
                $error_message = "<p class='mesage_error'><strong>Ошибка!</strong> Поле для ввода капчи не должна быть пустой. </p>";
         
                // Сохраняем в сессию сообщение об ошибке. 
                $_SESSION["error_messages"] = $error_message;
         
                //Возвращаем пользователя на страницу авторизации
                header("HTTP/1.1 301 Moved Permanently");
                header("Location: ".$address_site."/form_auth.php");
         
                //Останавливаем скрипт
                exit();
         
            }
             
            //(3) Место для обработки пароля
            if(isset($_POST["password"])){
 
                //Обрезаем пробелы с начала и с конца строки
                $password = trim($_POST["password"]);
             
                if(!empty($password)){
                    $password = htmlspecialchars($password, ENT_QUOTES);
             
                    //Шифруем пароль
                    $password = md5($password."top_secret");
                }else{
                    // Сохраняем в сессию сообщение об ошибке. 
                    $_SESSION["error_messages"] .= "<p class='mesage_error' >Укажите Ваш пароль</p>";
                     
                    //Возвращаем пользователя на страницу регистрации
                    header("HTTP/1.1 301 Moved Permanently");
                    header("Location: ".$address_site."/form_auth.php");
             
                    //Останавливаем скрипт
                    exit();
                }
                 
            }else{
                // Сохраняем в сессию сообщение об ошибке. 
                $_SESSION["error_messages"] .= "<p class='mesage_error' >Отсутствует поле для ввода пароля</p>";
                 
                //Возвращаем пользователя на страницу регистрации
                header("HTTP/1.1 301 Moved Permanently");
                header("Location: ".$address_site."/form_auth.php");
             
                //Останавливаем скрипт
                exit();
            }

            //(4) Место для составления запроса к БД
            //Запрос в БД на выборке пользователя.
			$role = $_POST['role'];
			if ($role == "student"){
				$result_query_select = $mysqli->query("SELECT * FROM `students` WHERE name = '{$_POST['name']}' AND password = '{$_POST['password']}'");
             
				if(!$result_query_select){
					// Сохраняем в сессию сообщение об ошибке. 
					$_SESSION["error_messages"] .= "<p class='mesage_error' >Ошибка запроса на выборке пользователя из БД</p>";
					 
					//Возвращаем пользователя на страницу регистрации
					header("HTTP/1.1 301 Moved Permanently");
					header("Location: ".$address_site."/form_auth.php");
				 
					//Останавливаем скрипт
					exit();
				}else{
				 
					//Проверяем, если в базе нет пользователя с такими данными, то выводим сообщение об ошибке
					if($result_query_select->num_rows == 1){
						 
						// Если введенные данные совпадают с данными из базы, то сохраняем логин и пароль в массив сессий.
						$_SESSION['password'] = $password;
						$_SESSION['name'] = $_POST['name'];
						//Возвращаем пользователя на главную страницу
						header("HTTP/1.1 301 Moved Permanently");
						header("Location: ".$address_site."/?page_id=14");
				 
					}else{
						 
						// Сохраняем в сессию сообщение об ошибке. 
						$_SESSION["error_messages"] .= "<p class='mesage_error' >Неправильный логин и/или пароль</p>";
						 
						//Возвращаем пользователя на страницу авторизации
						header("HTTP/1.1 301 Moved Permanently");
						header("Location: ".$address_site."/form_auth.php");
				 
						//Останавливаем скрипт
						exit();
					}
				}
			} else if ($role == "university"){
				$result_query_select = $mysqli->query("SELECT * FROM `universities` WHERE name = '{$_POST['name']}' AND password = '{$_POST['password']}'");
             
				if(!$result_query_select){
					// Сохраняем в сессию сообщение об ошибке. 
					$_SESSION["error_messages"] .= "<p class='mesage_error' >Ошибка запроса на выборке пользователя из БД</p>";
					 
					//Возвращаем пользователя на страницу регистрации
					header("HTTP/1.1 301 Moved Permanently");
					header("Location: ".$address_site."/form_auth.php");
				 
					//Останавливаем скрипт
					exit();
				}else{
				 
					//Проверяем, если в базе нет пользователя с такими данными, то выводим сообщение об ошибке
					if($result_query_select->num_rows == 1){
						 
						// Если введенные данные совпадают с данными из базы, то сохраняем логин и пароль в массив сессий.
						$_SESSION['password'] = $password;
						$_SESSION['name'] = $_POST['name'];
						//Возвращаем пользователя на главную страницу
						header("HTTP/1.1 301 Moved Permanently");
						header("Location: university_form1.php");
				 
					}else{
						 
						// Сохраняем в сессию сообщение об ошибке. 
						$_SESSION["error_messages"] .= "<p class='mesage_error' >Неправильный логин и/или пароль</p>";
						 
						//Возвращаем пользователя на страницу авторизации
						header("HTTP/1.1 301 Moved Permanently");
						header("Location: ".$address_site."/form_auth.php");
				 
						//Останавливаем скрипт
						exit();
					}
				}
			} else {
				$result_query_select = $mysqli->query("SELECT * FROM `admins` WHERE name = '{$_POST['name']}' AND password = '{$_POST['password']}'");
             
				if(!$result_query_select){
					// Сохраняем в сессию сообщение об ошибке. 
					$_SESSION["error_messages"] .= "<p class='mesage_error' >Ошибка запроса на выборке пользователя из БД</p>";
					 
					//Возвращаем пользователя на страницу регистрации
					header("HTTP/1.1 301 Moved Permanently");
					header("Location: ".$address_site."/form_auth.php");
				 
					//Останавливаем скрипт
					exit();
				}else{
				 
					//Проверяем, если в базе нет пользователя с такими данными, то выводим сообщение об ошибке
					if($result_query_select->num_rows == 1){
						 
						// Если введенные данные совпадают с данными из базы, то сохраняем логин и пароль в массив сессий.
						$_SESSION['password'] = $password;
						$_SESSION['name'] = $_POST['name'];
						//Возвращаем пользователя на главную страницу
						header("HTTP/1.1 301 Moved Permanently");
						header("Location: ".$address_site."/main_admin.php");
				 
					}else{
						 
						// Сохраняем в сессию сообщение об ошибке. 
						$_SESSION["error_messages"] .= "<p class='mesage_error' >Неправильный логин и/или пароль</p>";
						 
						//Возвращаем пользователя на страницу авторизации
						header("HTTP/1.1 301 Moved Permanently");
						header("Location: ".$address_site."/form_auth.php");
				 
						//Останавливаем скрипт
						exit();
					}
				}
			}
            
        }else{
            //Если капча не передана
            exit("<p><strong>Ошибка!</strong> Отсутствует проверочный код, то есть код капчи. Вы можете перейти на <a href=".$address_site."> главную страницу </a>.</p>");
        }

     
    }else{
        exit("<p><strong>Ошибка!</strong> Вы зашли на эту страницу напрямую, поэтому нет данных для обработки. Вы можете перейти на <a href=".$address_site."> главную страницу </a>.</p>");
    }