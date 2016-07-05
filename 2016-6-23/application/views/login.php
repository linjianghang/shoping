<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>用户登录</title>
    <link rel="stylesheet" type="text/css" href="http://localhost/2016-6-23/style/login.css" />
</head>

<body>
<?php echo form_open('user/login'); ?>
<div class="login">用户登陆</div>
<div class="xingxi">
    <ul>
        <li>用 户 名：<input name="user" id="user" value="<?php set_value('user');?>"/></li>
        <div class="error" id="usererror"><?php echo form_error('user'); ?></div>
        <li>密&nbsp;&nbsp;码：<input type="password" name="pass" id="pass"/></li>
        <div class="error" id="usererror"><?php echo form_error('pass'); ?></div>
    </ul>
    <input type="submit" value="立 即 登 陆" class="submit"/>
    <div class="zj"><a href="http://localhost/2016-6-23/index.php/user/register">返回注册页面</a></div>
</div>
</form>
</body>
</html>