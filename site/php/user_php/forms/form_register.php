<?php
    //Подключение шапки
    require_once("header.php");
?>
<!-- Блок для вывода сообщений -->
<div class="block_for_messages">
    <?php
        //Если в сессии существуют сообщения об ошибках, то выводим их
        if(isset($_SESSION["error_messages"]) && !empty($_SESSION["error_messages"])){
            echo $_SESSION["error_messages"];
 
            //Уничтожаем чтобы не выводились заново при обновлении страницы
            unset($_SESSION["error_messages"]);
        }
 
        //Если в сессии существуют радостные сообщения, то выводим их
        if(isset($_SESSION["success_messages"]) && !empty($_SESSION["success_messages"])){
            echo $_SESSION["success_messages"];
             
            //Уничтожаем чтобы не выводились заново при обновлении страницы
            unset($_SESSION["success_messages"]);
        }
    ?>
</div>
 
<?php
    //Проверяем, если пользователь не авторизован, то выводим форму регистрации, 
    //иначе выводим сообщение о том, что он уже зарегистрирован
    if(!isset($_SESSION["password"])){
?>
        <div id="form_register">
            <h2>Форма регистрации</h2>
 
            <form action="register.php" method="post" name="form_register">
                <table>
                    <thead><tr>
                        <td> ФИО: </td>
                        <td>
                            <input type="text" name="name" required="required">
                        </td>
                    </tr>
					
					<tr>
                        <td> Телефон: </td>
                        <td>
                            <input type="text" name="telephone" required="required">
                        </td>
                    </tr></thead>
					
					<tbody><tr>
                        <td> Серия и номер паспорта (слитно): </td>
                        <td>
                            <input type="text" name="passport_id" required="required">
                        </td>
                    </tr>
					
					<tr>
						<td> Пол: </td>
						<td><input id="female" type="radio" name="gender" value="woman" required="required"></td>
						<td> Женский </td>
						<td><input id="male" type="radio" name="gender" value="man" required="required"></td>
						<td><label for="male"> Мужской </label></td>
					</tr>
					
					<tr>
						<td> Дата рождения </td>
						<td>
						<input id='date_of_birth' type="date" name="date_of_birth" required="required"></td>
					</tr>
					
					<tr>
                        <td> Место рождения (как в паспорте): </td>
                        <td>
                            <input type="text" name="place_of_birth" required="required">
                        </td>
                    </tr>
					
					<tr>
						<td> Введите ваш город: </td>
						<td><input type="text" placeholder="Челябинск" name="city" required="required"></td>
					</tr>
					
					<tr>
						<td> Выберите регион: </td>
						<td>
						<?php
                        require_once("list_of_regions.php");
						?>
						</td>
                    </tr>
              
                    <tr>
                        <td> Пароль: </td>
                        <td>
                            <input type="password" name="password" placeholder="минимум 6 символов" required="required"><br>
                            <span id="valid_password_message" class="mesage_error"></span>
                        </td>
                    </tr>
                    <tr>
                        <td> Введите капчу: </td>
                        <td>
                            <p>
                                <img src="captcha.php" alt="Капча" /> <br><br>
                                <input type="text" name="captcha" placeholder="Проверочный код" required="required">
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="submit" name="btn_submit_register" value="Зарегистрироваться!">
                        </td>
                    </tr>
                </tbody></table>
            </form>
        </div>
<?php
    }else{
?>
        <div id="authorized">
            <h2>Вы уже зарегистрированы</h2>
        </div>
<?php
	}
?>
</body>
</html>