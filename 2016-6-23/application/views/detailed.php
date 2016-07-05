<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>商品详情</title>
    <link rel="stylesheet" type="text/css" href="http://localhost/2016-6-23/style/detailed.css" />
    <script type="text/javascript" src="http://localhost/2016-6-23/js/jquery.js"></script>
</head>

<body>
<div id="top"><a  href='http://localhost/2016-6-23/index.php/user'>返回首页</a></div>
<div class="content">
    <div id="title">商品详情</div>

    <?php
    foreach($list as $data){
        echo "<div id=\"img\"><img src=\"http://localhost/2016-6-23/upload/{$data['img_information']}.jpg\" width=\"600\"></div>
    <div id=\"ul\">
        <ul>
            <li><h1>{$data['commodity_name']}</h1></li>
            <li>价格：<span id='span'>{$data['commodity_price']}￥</span></li>
            <li>商品简介：</li>
            <li style='text-indent: 2em;font-size: 12px;color: #5c5e60'>{$data['content']}</li>
        </ul>
    </div>
            ";
    }
    ?>
</div>
</body>
</html>