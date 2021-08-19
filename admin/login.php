<?
if(isset($_POST['btn'])){
	$con=mysqli_connect('localhost', 'root', '')  or die ("html>script language='JavaScript'>alert('Не удается подключиться к базе данных. Повторите попытку позже.'),history.go(-1)/script>/html>") ;
	mysqli_select_db($con, 'blog');

	$login = $_POST['login'];
	$password = $_POST['password'];

	$query = "SELECT * From users";

	$result = mysqli_query($con, $query);
	
	while ($row = mysqli_fetch_assoc($result)) {
   		if ($row["login"] == $login && $password == $row["password"]){
   			header("Location: admin_panel.php");
   		}else{
   			echo "<h1>Логин или пароль не верный</h1>";
   		}
}
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>login to admin panel</title>
	<link rel="stylesheet" type="text/css" href="/style/admins_styles.css">

</head>
<body>

<div class="auth">
<form class="form-4" action="login.php" method="POST">
   
    <p>
       
        <input type="text" name="login" placeholder="Логин или email" required>
    </p>
    <p>
       
        <input type="password" name='password' placeholder="Пароль" required>
    </p>
 
    <p>
        <input type="submit" name="btn" value="Продолжить">
    </p>      
</form>
</div>
</body>
</html>

