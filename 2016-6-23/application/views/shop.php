<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>我的购物车</title>
    <link rel="stylesheet" type="text/css" href="http://localhost/2016-6-23/style/shop.css" />
    <script type="text/javascript" src="http://localhost/2016-6-23/js/jquery.js"></script>
</head>

<body>
<div id="top"><a  href='http://localhost/2016-6-23/index.php/user'>返回首页</a></div>
<div class="content">
    <div id="title">我的购物车</div>
    <div id="shop_del"><a href='http://localhost/2016-6-23/index.php/user/clear'>清空购物车</a></div>
    <?php
    if(empty($list)){
        echo "<div id='emp'>购物车为空,快去添加吧！！！</div>";
    }else{
        foreach($list as $data){
            echo "

                    <div id='display'>
                        <ul>
                            <li style='text-align: center'><img width='250' height='200' src='http://localhost/2016-6-23/upload/{$data['img']}.jpg'></li>
                            <li style='font-size: 16px;text-align: center'>{$data['name']}</li>
                            <li class='s1' style='color: red;text-align: center'>单价：{$data['price']}￥</li>
                            <li style='margin-top:10px;float: left;color:#919191;text-indent: 1em;word-wrap:break-word;'>数量：{$data['number']}</li>
                            <li style='float: left;margin-left: 100px'><input name='shop_input' value='{$data['number']}' class='shop_input'><a href='javascript:;' class='add'>+</a><a href='javascript:;' class='sub'>-</a></li>
                            <li style='clear: left'><a href='http://localhost/2016-6-23/index.php/user/del/{$data['id']}' class='del'>删除商品</a></li>
                        </ul>
                    </div>
                ";
        }
    }
    ?>
</div>
<?php
if(!empty($list)){
    echo "<div id='shop'><a id='settle'>去结算</a></div>";
}
?>
<script>
    //实现购物车数量加减
    $("document").ready(function(){
        $(".add").click(function(){
            var t=$(this).parent().find('input[class*=shop_input]');
            t.val(parseInt(t.val())+1);
        });
        $(".sub").click(function(){
            var t=$(this).parent().find('input[class*=shop_input]');
            if(parseInt(t.val())>1) {
                t.val(parseInt(t.val())-1);
            }
        });
    })
</script>
</body>
</html>