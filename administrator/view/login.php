<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>图书信息管理系统</title>
    <meta name="keywords" content="一个用于图书借阅和管理的系统"/>
    <meta name="author" content="Liuxiaoyu_SDU_201705130119"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <!--引入基本css样式-->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="assets/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="assets/css/select2.css"/>
    <!--主框架style-->
    <link rel="stylesheet" href="assets/css/ace.min.css"/>
    <link rel="stylesheet" href="assets/css/ace-rtl.min.css"/>
    <script language="JavaScript">
        window.onload = function () {
            var url = location.search; //获取url中"?"符后的字串
            if (url.indexOf("?") != -1) {    //判断是否有参数
                var str = url.substr(1); //从第一个字符开始 因为第0个是?号 获取所有除问号的所有符串
                strs = str.split("=");   //用等号进行分隔 （因为知道只有一个参数 所以直接用等号进分隔 如果有多个参数 要用&号分隔 再用等号进行分隔）
                //alert(strs[1]);          //直接弹出第一个参数 （如果有多个参数 还要进行循环的）
                show_box(strs[1]);
            }
        }
    </script>
    <script type="text/javascript">
        function showHint(str) {
            $.ajax({
                dataType: "json",
                type: "get",
                url: "../controller/fetchpwd.php?iduser=" + str,
                success: function(data) {
                    console.log(data);
                    if(data.data != ""){
                        document.getElementById("searchResult").innerHTML = data.data;
                    }else{
                        document.getElementById("searchResult").innerHTML = data.message;
                    }
                },
                error: function() {
                    document.getElementById("searchResult").innerHTML = "请检查网络后重试";
                }
            });
        }
    </script>

    <script type="text/javascript">
        function showUser(str) {
            var xmlhttp;
            if (str.length == 0) {
                document.getElementById("userResult").innerHTML = "";
                return;
            }
            if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else {// code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("userResult").innerHTML = xmlhttp.responseText;
                }
            }
            xmlhttp.open("GET", "../controller/checkuser.php?iduser=" + str, true);
            xmlhttp.send();
        }
    </script>
    <script type="text/javascript">
        function showEmail(str) {
            var xmlhttp;
            if (str.length == 0) {
                document.getElementById("emailResult").innerHTML = "";
                return;
            }
            if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else {// code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("emailResult").innerHTML = xmlhttp.responseText;
                }
            }
            xmlhttp.open("GET", "../controller/checkemail.php?email=" + str, true);
            xmlhttp.send();
        }
    </script>
</head>
<body class="login-layout">
<div class="main-container">
    <div class="main-content">
        <div class="row">
            <div class="col-xm-10 col-sm-10 col-md-10 col-sm-offset-1">
                <div class="login-container">
                    <div class="center">
                        <h1>
                            <i class="icon-leaf green"></i>
                            <span class="red">图书信息管理</span>
                            <span class="white">系统</span>
                        </h1>
                    </div>

                    <div class="space-6"></div>

                    <div class="position-relative">
                        <div id="login-box" class="login-box visible widget-box no-border">
                            <div class="widget-body">
                                <div class="widget-main">
                                    <h4 class="header blue lighter bigger">
                                        <i class="icon-coffee green"></i>
                                        管理员登录
                                    </h4>

                                    <div class="space-6"></div>
                                    <!--登陆表单-->
                                    <form action="../controller/doAction.php?act=login" autocomplete="on" method="post">
                                        <fieldset>
                                            <label class="block clearfix">
														<span class="block input-icon input-icon-right">
		<input type="text" id="iduser" name="iduser" class="form-control" placeholder="账号" required="required"/>
															<i class="icon-user"></i>
														</span>
                                            </label>

                                            <label class="block clearfix">
														<span class="block input-icon input-icon-right">
	<input type="password" id="password" name="password" class="form-control" placeholder="密码" required="required"/>
															<i class="icon-lock"></i>
														</span>
                                            </label>

                                            <div class="clearfix">
                                                <label class="inline">
                                                    <input type="checkbox" class="ace" id="rememberUser"
                                                           name="rememberUser"/>
                                                    <span class="lbl"> 记住</span>
                                                </label>
                                                <input type="submit" value="登录" class="width-35 pull-right btn btn-sm btn-primary"/>

                                            </div>

                                            <div class="space-4"></div>
                                        </fieldset>
                                    </form>


                                </div><!-- /widget-main -->

                           
                            </div><!-- /widget-body -->
                        </div><!-- /login-box -->

                    </div><!-- /position-relative -->
                </div>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
</div><!-- /.main-container -->


<script type="text/javascript">
    window.jQuery || document.write("<script src='assets/js/jquery-2.0.3.min.js'>" + "<" + "/script>");
</script>

<script type="text/javascript">
    if ("ontouchend" in document) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
</script>

<script type="text/javascript">
    function show_box(id) {
        jQuery('.widget-box.visible').removeClass('visible');
        jQuery('#' + id).addClass('visible');
    }
</script>
<div style="display:none"></div>
</body>
</html>
