<?php
//开启session
session_id("login");
session_start();
date_default_timezone_set('PRC');
header('content-type:text/html;charset=utf-8');

//1.包含所需文件
error_reporting(0);
require_once '../model/PdoMySQL.class.php';
require_once '../model/config.php';


//对输入的转义
if (!function_exists(get_magic_quotes_gpc) || !get_magic_quotes_gpc()) {
    foreach (array('_COOKIE', '_POST', '_GET') as $v) {
        foreach ($$v as $kk => $vv) {
            $kk{0} != '_' && $$v[$kk] = addslashes($vv);
        }
    }
}

//2.接收信息
$act = $_GET['act'];
$iduser = addslashes($_POST['iduser']);
$password = addslashes($_POST['password']);
$status = '0';
$rememberUser = $_POST["rememberUser"];
//$rememberUser=='on'用户选择了记住密码

if ($act === 'login') {

    $_SESSION["iduser"] = $iduser;
    $_SESSION["password"] = $password;
    //记住密码,自动登录

	$link=mysqli_connect("localhost","root","root","library");
  	$query = mysqli_query($link,"select * from administrator where idadministrator='$iduser' and password='$password'");
				$num_row = mysqli_num_rows($query);
				$row = mysqli_fetch_array($query);
    if ($num_row > 0) {		//echo"$allrows[0]['$iduser']";
        echo '<script>window.location.href="../view/index.php";</script>';
    } else {
        echo '<script language="JavaScript">window.alert("账号或密码错误"),location.href="../view/login.php";</script>';
    }

} else if ($act === "reg") {
    if ($iduser == "") {
        echo '<script language="JavaScript">window.alert("请输入用户名"),location.href="../view/login.php?viewFlag=signup-box";</script>';
    } else if ($password == "") {
        echo '<script language="JavaScript">window.alert("请输入密码"),location.href="../view/login.php?viewFlag=signup-box";</script>';
    }
    //	$regtime= date('Y-m-d H:i:s');
    $data = compact('iduser', 'password');
    $res = $PdoMySQL->add($data, "user");
    $lastInsertId = $PdoMySQL->getLastInsertId();
    if ($res) {
        echo '<script language="JavaScript">window.alert("注册成功，请登陆"),location.href="../view/login.php";</script>';
    }
} else if ($act === 'seek') {
    if ($email == "") {
        echo '<script language="JavaScript">window.alert("请注册时的邮箱便于您找回密码"),location.href="../view/login.php?viewFlag=forgot-box";</script>';
    }
    try {
        echo '<script language="JavaScript">window.alert("try1");</script>';
        $pdo = new PdoMySQL();
        $sql = "select * from projector where email=?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array($email));
        echo '<script language="JavaScript">window.alert("try2");</script>';

        while ($row = $stmt->fetch()) {
            $iduser1 = $row['iduser'];
            $password = base64_decode($row['password']);
        }
        echo '<script language="JavaScript">window.alert("try3");</script>';
        echo '<script language="JavaScript">window.alert($iduser1);</script>';
        echo '<script language="JavaScript">window.alert($password);</script>';
        //发送邮件，以QQ邮箱为例
        //配置邮件服务器，得到传输对象

    } catch (PDOException $e) {
        echo $e->getMessage();
    }

}
?>