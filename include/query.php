<?php 
include('data/connection.php');

if ($page=="home"){
    $sql = "SELECT count(*) FROM `users` WHERE `is_active`=1";
    $result=$db -> query($sql);
    $row=$result->fetch(PDO::FETCH_ASSOC);


    $sql2 = "SELECT count(*) FROM `contents` WHERE `is_active`=1";
    $result2=$db -> query($sql2);
    $row2=$result2->fetch(PDO::FETCH_ASSOC);
}






?>