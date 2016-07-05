<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>商品发布</title>
    <link rel="stylesheet" type="text/css" href="http://localhost/2016-6-23/style/publish.css" />
    <script type="text/javascript" src="http://localhost/2016-6-23/js/jquery.js"></script>
</head>
<body>
<?php echo form_open_multipart('user_publish/publish'); ?>
<div id="top">
    <div id="user_show">
        <a href="http://localhost/2016-6-23/index.php/user/home">返回首页</a>
        <a href="http://localhost/2016-6-23/index.php/user_publish">返回登录</a>
        <a href="http://localhost/2016-6-23/index.php/user_publish/edit">编辑商品</a>
    </div>
</div>
<div class="publish">商品发布</div>
<div id="content">
    <ul>
        <li>商品类型：
            <select name="type" id="type"><option>-选择商品类别-</option></select>
            <select name="min_type" id="min_type"><option>-选择商品子类-</option></select>
        </li>
        <li>商品图片：<input type="file" name="publish_img" style="margin-bottom: 10px"></li>
        <div id="error"><?php echo form_error('publish_img'); ?></div>
        <li>商品名称：<input type="text" name="publish_id" id="publish_id"></li>
        <div id="error"><?php echo form_error('publish_id'); ?></div>
        <li>商品价格：<input type="text" name="publish_cost" id="publish_cost"></li>
        <div id="error"><?php echo form_error('publish_cost'); ?></div>
        <li>商品简介：<textarea name="publish_message" id="publish_message"></textarea></li>
        <div id="error"><?php echo form_error('publish_message'); ?></div>
        <li>详细信息：<textarea name="content" id="publish_message"></textarea></li>
        <div id="error"><?php echo form_error('content'); ?></div>
    </ul>
    <input type="submit" value="上 传 商 品" id="submit">
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