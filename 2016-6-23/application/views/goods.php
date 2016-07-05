<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>收货人信息</title>
    <link rel="stylesheet" type="text/css" href="http://localhost/2016-6-23/style/publish.css" />
    <script type="text/javascript" src="http://localhost/2016-6-23/js/jquery.js"></script>
</head>
<body>
<?php echo form_open_multipart('user/goods'); ?>
<div id="top">
    <div id="user_show">
        <a href="http://localhost/2016-6-23/index.php/user/home">返回首页</a>
        <a href="http://localhost/2016-6-23/index.php/user_publish">返回登录</a>
    </div>
</div>
<div class="publish">收货人信息</div>
<div id="content">
    <ul>
        <li style="width: 550px">收货人：<input type="text" name="name" style="margin-left: 55px"></li>
        <div id="error"><?php echo form_error('name'); ?></div>
        <li style="width: 550px">收货人电话：<input type="text" name="phone" ></li>
        <div id="error"><?php echo form_error('phone'); ?></div>
        <li style="width: 550px">收货地址：<input type="text" name="take" style="margin-left: 35px"></li>
        <div id="error"><?php echo form_error('take'); ?></div>
        <li style="width: 550px">邮箱：<input type="text" name="email" style="margin-left: 65px"></li>
        <div id="error"><?php echo form_error('email'); ?></div>
    </ul>
    <input type="submit" value="完 成 编 辑" id="submit" style="width: 580px;">
</div>

</form>
<script>
    $(document).ready(function() {
        $("#type").focus(function () {
            //todo save 表
            url = 'http://localhost/2016-6-23/index.php/type';
            save = $.ajax({url: url, dataType: 'text', type: 'post', async: false});
            $("#type").html(save.responseText);
        });

        $("#type").change(function () {
            var types=$("#type").val();
            url = 'http://localhost/2016-6-23/index.php/min_type';
            data = {
                'name': types
            };
            market = $.ajax({url: url, data: data, dataType: 'text', type: 'post', async: false});
            $("#min_type").html(market.responseText);

        });
        $("#min_type").focus(function () {
            var types=$("#type").val();
            url = 'http://localhost/2016-6-23/index.php/min_type';
            data = {
                'name': types
            };
            market = $.ajax({url: url, data: data, dataType: 'text', type: 'post', async: false});
            $("#min_type").html(market.responseText);

        });
    })
</script>
</body>
</html>