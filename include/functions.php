<?php 
include('../data/connection.php');

session_start();




if(isset($_POST['login_btn'])){

	
	$user = $_POST['user'];
	$password = $_POST['password'];  
	//$errors   = array(); 


	$sql="SELECT *,count(*) FROM `admin_tablo` WHERE `mail`='$user' AND `password`='$password' AND  `is_active`=1";
	$result=$db -> query($sql);
	$row=$result->fetch_assoc();

	if($row['count(*)']>0){
	
		$_SESSION['login']=TRUE;
		$_SESSION['mail']=$user;     
		//print_r($_SESSION);
		header('Location: ../index.php');
	}
	else
	{

		session_destroy();
		header('Location: admin_login.php');
	}


}
else
{
	session_destroy();
	header('Location: admin_login.php');
}





?>