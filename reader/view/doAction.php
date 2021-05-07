<?php
		session_start();
    	$_SESSION["iduser"] = $_POST['iduser'];
		$iduser = $_POST['iduser'];
		$password = $_POST['password'];

			$link=mysqli_connect("localhost","root","root","library");
  			$query = mysqli_query($link,"select * from user where iduser='$iduser' and password='$password'");
				$num_row = mysqli_num_rows($query);
				$row = mysqli_fetch_array($query);
    		if ($num_row > 0) {
        		echo '<script>window.location.href="../view/index.php";</script>';
    		} else {
        		echo '<script language="JavaScript">window.alert("账号或密码错误"),location.href="../view/login.php";</script>';
    		}
?>