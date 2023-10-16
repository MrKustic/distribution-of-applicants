<?php
	require_once("header.php");
?>
  <script src="1.js" defer=""></script>
      <form method="POST" action="worker_university1.php">
        <p>Название вуза</p>
        <select name="univ1" id="inputSet1" onchange="setValue1()">
            <option value="">Выберите вуз</option>
            <option value="1">МГУ</option>
            <option value="2">ВШЭ</option>
            <option value="3">СПбГУ</option>
        </select>
        <select name="facultymgu1" id="f11" style="display: none;">
            <option value="">Выберите факультет</option>
            <option value="01">Механико–математический факультет</option>
            <option value="02">Юридический факультет</option>
        </select>
        <select name="facultyhse1" id="f12" style="display: none;">
			<option value="">Выберите факультет</option>
            <option value="01">Факультет экономических наук</option>
            <option value="02">Факультет гуманитарных наук</option>
        </select>
        <select name="facultyhspbgu1" id="f13" style="display: none;">
			<option value="">Выберите факультет</option>
            <option value="01">Факультет психологии</option>
            <option value="02">Факультет математики и компьютерных наук</option>
        </select>
        <hr>
        <p>Пороговый балл</p>
        <input type="number" placeholder="200" name="ball">
        <hr>
        <p>Число абитуриентов</p>
        <input type="number" placeholder="200" name="kolab">
        <hr>
        <p> Соглашаюсь на обработку данных <input onclick="f()" type="checkbox"></p>
        <input id="gg" style="pointer-events: none; opacity: 0.5;" type="submit" value="Отправить">
      </form>
      <br>
      <br>
      <br>
	</body>
</html>