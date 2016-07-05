<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>商品编辑</title>
    <link rel="stylesheet" type="text/css" href="http://localhost/2016-6-23/style/edit.css" />
    <script type="text/javascript" src="http://localhost/2016-6-23/js/jquery.js"></script>
    <script type="text/javascript" src="http://localhost/2016-6-23/js/home.js"></script>
</head>

<body>
<div id="top">
    <div id="user_show">
        <a href="http://localhost/2016-6-23/index.php/user_publish/publish">返回发布</a>
        &nbsp;&nbsp;&nbsp;<a href="http://localhost/2016-6-23/index.php/user/home">去首页</a>
    </div>
</div>
<div id="title">全部商品</div>
<div class="content">
    <?php
    foreach($content as $data){
        echo "

                <div id='display'>
                    <ul>
                        <li style='text-align: center'><a href='http://localhost/2016-6-23/index.php/user_publish/detailed/{$data['id']}'><img width='250' height='180' src='http://localhost/2016-6-23/upload/{$data['img_information']}.jpg'></a></li>
                        <li style='font-size: 16px;text-align: center'><a href='http://localhost/2016-6-23/index.php/user_publish/detailed/{$data['id']}'>{$data['commodity_name']}</a></li>
                        <li style='color: red;text-align: center''>{$data['commodity_price']}￥</li>
                        <li style='color:#919191;text-indent: 1em;word-wrap:break-word;'>{$data['commodity_information']}</li>
                        <li>&nbsp;&nbsp;<a href='http://localhost/2016-6-23/index.php/user_publish/revise/{$data['id']}'>编辑</a>&nbsp;&nbsp;&nbsp;<a href='http://localhost/2016-6-23/index.php/user_publish/del/{$data['id']}'>删除</a></li>
                    </ul>
                </div>
            ";

    }
    ?>
</div>
</body>
</html>