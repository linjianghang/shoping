<html style="height: 400px">
<head>
    <meta charset="UTF-8">
    <title>首页</title>
    <link rel="stylesheet" type="text/css" href="http://localhost/2016-6-23/style/home.css" />
    <script type="text/javascript" src="http://localhost/2016-6-23/js/jquery.js"></script>
    <script type="text/javascript" src="http://localhost/2016-6-23/js/home.js"></script>
</head>

<body>
<div class="content" style="margin-left: 20px;margin-top: 20px">
    <div id="title">全部商品</div>
    <?php
    foreach($content as $data){
        echo "

                <div id='display'>
                    <ul>
                        <li style='text-align: center'><a href='http://localhost/2016-6-23/index.php/user_publish/detailed/{$data['id']}'><img width='250' height='200' src='http://localhost/2016-6-23/upload/{$data['img_information']}.jpg'></a></li>
                        <li style='font-size: 16px;text-align: center'><a href='http://localhost/2016-6-23/index.php/user_publish/detailed/{$data['id']}'>{$data['commodity_name']}</a></li>
                        <li style='color: red;text-align: center''>{$data['commodity_price']}￥</li>
                        <li style='color:#919191;text-indent: 1em;word-wrap:break-word;'>{$data['commodity_information']}</li>
                    </ul>
                </div>
            ";

    }
    ?>
</div>
</body>
</html>