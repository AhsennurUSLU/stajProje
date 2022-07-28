
<!DOCTYPE html>
<html>
<head>

	<title>PHP ve MySQL Kayıt Sistemi</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
	
	

<?php
session_start();
if(isset($_SESSION['login'])){
	header('Location: ../index.php');
} 




?>
<body>
  
	<div class="header">
	
	<i class="fas fa-user login-icon" aria-hidden="true" ></i>
		
	</div>
	<form method="POST" action="functions.php">

	  
    

		<div class="input-group">
			<label>Kullanıcı Adı</label>
			<input type="text" name="user" >
		</div>
		<div class="input-group">
			<label>Parola</label>
			<input type="password" name="password">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="login_btn">Giriş Yap</button>
			
		</div>
		
	</form>
</body>
</html>