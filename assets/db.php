<?php 
    $con = new mysqli('localhost','root','','store');
//for user informationa making available for all pages

    $array = $con->query("select * from godownuser where id ='$_SESSION[userId]'");
    $user = $array->fetch_assoc();

	$base_path = "http://localhost/dev.test/medical";
?>