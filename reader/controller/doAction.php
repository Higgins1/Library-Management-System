<?php
$act = $_GET['act'];
$iduser = addslashes($_POST['iduser']);
$password = addslashes($_POST['password']);
$status = '0';
$rememberUser = $_POST["rememberUser"];

if ($act === 'login') {
	session_start();
    $_session['iduser'] = $iduser;	$_SESSION['true_name']="小桥流水";
	$link=mysqli_connect("localhost","root","root","library");
  	$query = mysqli_query($link,"select * from user where iduser='$iduser' and password='$password'");
				$num_row = mysqli_num_rows($query);
				$row = mysqli_fetch_array($query);
    if ($num_row > 0) {
        echo '<script>window.location.href="../view/index.php";</script>';
    } else {		//echo $_session['iduser'];
        echo '<script language="JavaScript">window.alert("账号或密码错误"),location.href="../view/login.php";</script>';
    }
} 

?>