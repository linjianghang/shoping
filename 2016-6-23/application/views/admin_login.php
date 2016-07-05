<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>管理员登录</title>
    <link rel="stylesheet" type="text/css" href="http://localhost/2016-6-23/style/login.css" />
</head>

<body>
<?php echo form_open('User_publish'); ?>
<div class="login">管理员登录</div>
<div class="xingxi">
    <ul>
        <li>用 户 名：<input name="user" id="user" value="<?php set_value('user');?>"/></li>
        <div class="error" id="usererror"><?php echo form_error('user'); ?></div>
        <li>密&nbsp;&nbsp;码：<input type="password" name="pass" id="pass"/></li>
        <div class="error" id="usererror"><?php echo form_error('pass'); ?></div>
    </ul>
    <input type="submit" value="立 即 登 陆" class="submit"/></div>
</form>
</body>
</html>