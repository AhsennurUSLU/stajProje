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
	$job = $_POST['job'] ; 
	if ($name != null && $surname != null && $email != null && $password != null ) {
		$sql = "INSERT INTO `users` (`first_name`, `last_name`, `email`, `password`,`users_job`) VALUES('$name', '$surname', '$email', '$password','$job')";
        $db -> query($sql);
		header('location: /register.php');
	}
	}

// içerik oluşturma

else if (isset($_POST['kaydet'])){

	$title = $_POST['title'] ;
	$content = $_POST['content'] ; 
	
	if ($title != null && $content != null) {
		$sql = $db->prepare("INSERT INTO `contents` (`title`,`content`) VALUES('$title','$content')");
        $sql->execute();
	    $cikti = $sql->fetch(PDO::FETCH_ASSOC);
	    header('location: /contentlist.php');
	}
	}


// içerik düzenle/sil işlemleri
else if (isset($_POST['content-update'])){

		 $id = $_POST['id'] ; 
		 $title = $_POST['title'] ; 
		 $content = $_POST['content'] ;
		if ($title != null && $content != null) {
			echo $sql = "UPDATE `contents` SET `title`='$title' , `content`= '$content' WHERE `id`='$id'";
			$db -> query($sql);
			header('location: /contentlist.php');
		}
		}

else if (isset($_POST['content_sil'])){

	$id = $_POST['id'] ;
	if ($id != null  ) {
		$sql = "UPDATE `contents` SET `is_active`= 0 WHERE `id`='$id'";
		$db -> query($sql);
		header('location: /contentlist.php');
	} 
	
}
// kişileri düzenle/sil işlemleri
else if (isset($_POST['user_update'])){

	$id = $_POST['id']; 
	$name = $_POST['first_name'] ; 
	$surname = $_POST['last_name'] ;
	$email = $_POST['email'] ; 
	$password = $_POST['password'] ;
	$job = $_POST['users_job'] ;
    if ($name != null && $surname != null && $email != null && $password != null) {
	   $sql = $db->exec("UPDATE `users` SET `first_name` = '$name', `last_name` = '$surname', `email`= '$email', `password`= '$password',`users_job`= '$job' WHERE `id` = '$id'");
	   $db -> prepare($sql);
	   header('location: /users_list.php');
    }
}

else if (isset($_POST['user_sil'])){

	$id = $_POST['id'] ;
	if ($id != null ) {
   		$sql = "UPDATE `users` SET `is_active`= 0 WHERE `id`='$id'";
   		$db -> query($sql);
   		header('location: /users_list.php');
	} 

}

else
{
	session_destroy();
	header('Location: admin_login1.php');
}


// mail gönderme fonksiyonu

/*
function mailgonder(){
	
    require "inc/class.phpmailer.php"; // PHPMailer dosyamızı çağırıyoruz  
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->From     = "deneme@mesutd.com"; //Gönderen kısmında yer alacak e-mail adresi  
    $mail->Sender   = "deneme@mesutd.com";
    $mail->FromName = "Web Mesaj";
    $mail->Host     = "mail.mesutd.com"; //SMTP server adresi  
    $mail->SMTPAuth = true;
    $mail->Username = "deneme@mesutd.com"; //SMTP kullanıcı adı  
    $mail->Password = "*****"; //SMTP şifre  
    $mail->SMTPSecure="";
    $mail->Port = "587";
    $mail->CharSet = "utf-8";
    $mail->WordWrap = 50;
    $mail->IsHTML(true); //Mailin HTML formatında hazırlanacağını bildiriyoruz.  
    $mail->Subject  = "Konu";

    $mail->Body = "mesaj";
    $mail->AltBody = strip_tags("mesaj");
    $mail->AddAddress("deneme@mesutd.com");
    return ($mail->Send())?true:false;
    $mail->ClearAddresses();
    $mail->ClearAttachments();
}

if(mailgonder()) echo "başarılı";
else echo "olmadı";


*/















?>