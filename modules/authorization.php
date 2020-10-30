<?php
include $_SERVER['DOCUMENT_ROOT']."/configs/db.php";
?>
<form method="POST" class="form-inline" id="login-form">
    <div class="form-group mx-sm-3 mb-2">
        <label for="staticEmail2" class="sr-only" >Email</label>
        <input type="text" class="form-control" id="staticEmail2" placeholder="Email" name="email">
        </div>
        <div class="form-group mx-sm-3 mb-2">
        <label for="inputPassword2" class="sr-only">Password</label>
        <input type="password" class="form-control" id="inputPassword2" placeholder="Password" name="password">
    </div>
        <button type="submit" onclick="event.preventDefault()" class="btn btn-primary mb-2" name="login" id="btn-login">Enter</button>
</form>

<?php
//если введены логин и пароль и они не пусты и была нажата кнопка войти
if (
	isset($_POST["email"]) && isset($_POST["password"])
	&& $_POST["email"] != "" && $_POST["password"] != "" && isset($_POST["login"])
) {
	// делаем запрос к бд выбрать user таблицу где емайл  и пароль равны введенному 
	$sql = "SELECT * FROM `users` WHERE `email` LIKE '" . $_POST["email"] . "' AND `password` LIKE '" . $_POST["password"] . "'";
	//выполняем запрос к базе данных
	$result = mysqli_query($connect, $sql);
	//получаем число результатов
    $count_users = mysqli_num_rows($result);
	//если число результатов равно 1(было найдено совпадение с введенными данными)	
	if ($count_users == 1) {
		//извлекаем результат в запроса
        $user = mysqli_fetch_assoc($result);
		//создаем куки для хранения данных пользователя
		setcookie("id", $user["id"], time() + 3600);
		mysqli_query($connect, $sql); //выполняем запрос
	} else { //если нет то
		echo "<h2>Login or password is not correct</h2>";
	}
}
?>