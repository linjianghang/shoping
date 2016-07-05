<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>商品编辑</title>
    <link rel="stylesheet" type="text/css" href="http://localhost/2016-6-23/style/publish.css" />
    <script type="text/javascript" src="http://localhost/2016-6-23/js/jquery.js"></script>
</head>
<body>
<?php echo form_open_multipart('user_publish/revise'); ?>
<div id="top">
    <div id="user_show">
        <a href="http://localhost/2016-6-23/index.php/user/home">返回首页</a>
        <a href="http://localhost/2016-6-23/index.php/user_publish/publish">返回发布</a>
        <a href="http://localhost/2016-6-23/index.php/user_publish/edit">返回编辑</a>
    </div>
</div>
<div class="publish">商品编辑</div>
<div id="content">
    <ul>
        <li>商品图片：<input type="file" name="publish_img" ></li>
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
    <input type="submit" value="修 改 商 品" id="submit">
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