<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php foreach($list as $val){} echo $val['commodity_classification'];?>专区</title>
    <link rel="stylesheet" type="text/css" href="http://localhost/2016-6-23/style/show_type.css" />
    <script type="text/javascript" src="http://localhost/2016-6-23/js/jquery.js"></script>
</head>

<body>
<div id="top"><a  href='http://localhost/2016-6-23/index.php/user'>返回首页</a></div>
<div id="title"><?php echo @$val['commodity_classification'];?>专区</div>
<div id="subclass"><?php echo @$val['commodity_classification'];?></div>
    <?php
    foreach($list as $data){
        echo "<div class='content'><div id='display'>
                    <ul>
                        <li style='text-align: center'><a href='http://localhost/2016-6-23/index.php/user_publish/detailed/{$data['id']}'><img width='250' height='180' src='http://localhost/2016-6-23/upload/{$data['img_information']}.jpg'></a></li>
                        <li style='font-size: 16px;text-align: center'><a href='http://localhost/2016-6-23/index.php/user_publish/detailed/{$data['id']}'>{$data['commodity_name']}</a></li>
                        <li style='color: red;text-align: center''>{$data['commodity_price']}￥</li>
                        <li style='color:#919191;text-indent: 1em;word-wrap:break-word;font-size: 12px;'>{$data['commodity_information']}</li>
                    </ul>
                </div></div>
            ";

    }
    ?>

</body>
</html>