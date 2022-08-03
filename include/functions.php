<?php 
include('../data/connection.php');

session_start();




if(isset($_POST['login_btn'])){

	
	$user = $_POST['user'];
	$password = $_POST['password'];  
	//$errors   = array(); 


	$sql="SELECT *,count(*) FROM `admin_tablo` WHERE `mail`='$user' AND `password`='$password' AND  `is_active`=1";
	$result=$db -> query($sql);
	$row=$result->fetch(PDO::FETCH_ASSOC);

	if($row['count(*)']>0){
	
		$_SESSION['login']=TRUE;
		$_SESSION['mail']=$user;     
		//print_r($_SESSION);
		header('Location: ../index.php');
	}
	else
	{

		session_destroy();
		header('Location: admin_login1.php');
	}


}
else if (isset($_POST['btn'])){

	$name = $_POST['name'] ; 
	$surname = $_POST['surname'] ; 
	$email = $_POST['email'] ; 
	$password = $_POST['password'] ; 
	if ($name != null && $surname != null && $email != null && $password != null ) {
		$sql = "INSERT INTO `users` (`first_name`, `last_name`, `email`, `password`) VALUES('$name', '$surname', '$email', '$password')";
        $db -> query($sql);
		header('location: /register.php');
	}
	}





else
{
	session_destroy();
	header('Location: admin_login1.php');
}










?>