<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>首页</title>
    <link rel="stylesheet" type="text/css" href="http://localhost/2016-6-23/style/home.css" />
    <script type="text/javascript" src="http://localhost/2016-6-23/js/jquery.js"></script>
    <script type="text/javascript" src="http://localhost/2016-6-23/js/home.js"></script>
</head>

<body>
<div id="top">
    <div id="user_show"><?php
        if(!$this->input->cookie('username')){
            echo '<a href="http://localhost/2016-6-23/index.php/user/login">登陆</a> &nbsp;<a href="http://localhost/2016-6-23/index.php/user/login">注册</a>';
        }else{
            echo "欢迎，您&nbsp;&nbsp;&nbsp;".$this->input->cookie('username')."&nbsp;&nbsp;<a href='http://localhost/2016-6-23/index.php/user/off'>注销</a>";
        }
        ?></div>
</div>
</body>
</html>