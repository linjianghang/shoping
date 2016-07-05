<html  lang="en">
<head>
    <meta charset="UTF-8">
    <title>用户注册</title>
<link rel="stylesheet" type="text/css" href="http://localhost/2016-6-23/style/register.css" />
<script type="text/javascript" src="http://localhost/2016-6-23/js/jquery.js"></script>
</head>
<body>

<?php echo form_open('user/register'); ?>
    <div class="register">用户注册</div>
    <div class="xingxi">
            <div class="li">用 户 名：<input name="username" id="username" placeholder="手机号/邮箱" value="<?php set_value('username');?>" class="x"/></div>
            <div class="error" id="usererror"><?php echo form_error('username'); ?></div>
            <div class="li">密&nbsp;&nbsp;码：<input type="password" id="password" name="password" value="<?php set_value('password');?>" class="x"/></div>
            <div class="error"><?php echo form_error('password'); ?></div>
            <div class="li">邮&nbsp;&nbsp;箱：<input type="text" id="email" name="email" value="<?php set_value('email');?>" class="x"/></div>
            <div class="error"><?php echo form_error('email'); ?></div>

        <div class="licode">验 证 码：<input name="code" class="code" value="<?php set_value('code');?>"/></div>
        <img id="code" src="http://localhost/2016-6-23/index.php/verify"  style="position: absolute;margin-top:-50px;margin-left: 465px;width: 80px;height: 50px">
        <div class="error" style="margin-left: 50px"><?php echo form_error('code'); ?></div>
        <input type="submit" value="立 即 注 册" class="submit"/>
        <div class="zj"><a href="http://localhost/2016-6-23/index.php/user/login">已有用户，直接登录</a></div>

    </div>
</form>
<script>
    $("document").ready(function(){
        $("#code").click(function(){
            $("#code").attr('src', 'http://localhost/2016-6-23/index.php/verify');
        })
    })
</script>
</body>
</html>