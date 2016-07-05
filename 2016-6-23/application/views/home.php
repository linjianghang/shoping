<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>首页</title>
    <link rel="stylesheet" type="text/css" href="http://localhost/2016-6-23/style/home.css" />
    <script type="text/javascript" src="http://localhost/2016-6-23/js/jquery.js"></script>
    <script type="text/javascript" src="http://localhost/2016-6-23/js/home.js"></script>
</head>
<body>
<div id="top">
    <div id="user_show"><?php
        if(!$this->input->cookie('username')){
            echo '<a href="http://localhost/2016-6-23/index.php/user/login">登陆</a> &nbsp;<a href="http://localhost/2016-6-23/index.php/user/login">注册</a>';
        }else{
            echo "欢迎，您&nbsp;&nbsp;&nbsp;".$this->input->cookie('username')."&nbsp;&nbsp;<a href='http://localhost/2016-6-23/index.php/user/off'>注销</a>&nbsp;&nbsp;&nbsp;<a style='font-size: 14px;' href='http://localhost/2016-6-23/index.php/user/shop'>我的购物车</a>";
        }
        ?></div>
</div>
<div id="header">
    <div id="img">
        <div id="img_show">
        <img src="http://localhost/2016-6-23/img/1.jpg" class="i1" i="1">
        </div>
        <button type="button" class="button1" onclick="left()"></button>
        <button type="button" class="button2" onclick="right()"></button>
        <ul>
            <li id="on1"></li>
            <li id="on2"></li>
            <li id="on3"></li>
            <li id="on4"></li>
            <li id="on5"></li>
        </ul>

    </div>
</div>
<div id="left">
    <div id="lei">商品分类</div>
    <?php
    foreach($list as $data){
        echo "<ul><a href='http://localhost/2016-6-23/index.php/user_publish/max_type/{$data['id']}'><li><h2 a='{$data['id']}'>{$data['type']}</h2></li></a></ul>";
    }
    ?>
    <?php
    foreach($list as $value){
        $a="<p class=\"p{$value['id']}\" b=\"{$value['id']}\">";
        foreach($min_list as $data){
            if($data['u_id']==$value['id']) {
                $a .= "<a href='http://localhost/2016-6-23/index.php/user_publish/show_type/{$data['id']}' class='min_type'>{$data['min_type']}&nbsp;&nbsp;</a>";
            }
        }
        $a.="</p>";
        echo $a;
    }
    ?>

</div>
<div class="content">
    <div id="title">全部商品</div>
    <?php
    foreach($content as $data){
            echo "
                <div id='display'>
                    <ul>
                        <li style='text-align: center'><a href='http://localhost/2016-6-23/index.php/user_publish/detailed/{$data['id']}'><img width='250' height='200' src='http://localhost/2016-6-23/upload/{$data['img_information']}.jpg'></a></li>
                        <li style='font-size: 16px;text-align: center'><a href='http://localhost/2016-6-23/index.php/user_publish/detailed/{$data['id']}'>{$data['commodity_name']}</a></li>
                        <li class='s1' style='color: red;text-align: center'>{$data['commodity_price']}￥</li>
                        <li style='color:#919191;text-indent: 1em;word-wrap:break-word;'>{$data['commodity_information']}</li>
                        <li><input name='shop_input' value='1' class='shop_input'><a href='javascript:;' class='add'>+</a><a href='javascript:;' class='sub'>-</a><a id='shopping' href='http://localhost/2016-6-23/index.php/user/join_shop/{$data['id']}'>加入购物车</a><span id='span'></span></li>
                    </ul>
                </div>
            ";

    }
    ?>
</div>
<script>
    $(document).ready(function(){
        //todo 把商品数量传过去
        $("#shopping").click(function(){
            var number=$(".shop_input").val();
            var data = {
                'number':number
            };
            var url = "http://localhost/2016-6-23/index.php/user/join_shop";
            $.ajax({url:url,data:data,dataType:'text',type:'post',async:false});
        });
    });
</script>
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
<script>
    //todo 点击换下一张或上一张图片
    var count = 5;
    function right(){
        //todo 获取.d3中的img
        var img = document.querySelector('#img img');
        //TODO 获取img中的i元素
        var i=img.getAttribute('i');
        i++;
        //TODO 如果却换是大于最大图片数量 则从却换到第一张
        if(i>count){
            i=1;
        }
        //todo 图片地址
        img.src='http://localhost/2016-6-23/img/'+i+'.jpg';
        //todo 设置 i 的值
        img.setAttribute('i',i);
    }
    var scroll=setInterval(right,3000);
    //todo 鼠标经过按钮时 计时器停止
    $("button").hover(function(){
            clearInterval(scroll);
            jQuery.fx.off=true;
        },
        function(){
            //todo 鼠标离开时计时器开始运行
            scroll=setInterval(right,1000);
            jQuery.fx.off=false;
        });
    $("ul").hover(function(){
            clearInterval(scroll);
            jQuery.fx.off=true;
        },
        function(){
            //todo 鼠标离开时计时器开始运行
            scroll=setInterval(right,1000);
            jQuery.fx.off=false;
        });
    function left(){
        var img = document.querySelector('#img img');
        var i=img.getAttribute('i');
        i--;
        if(i<1){
            i=count;
        }
        img.src='http://localhost/2016-6-23/img/'+i+'.jpg';
        img.setAttribute('i',i);
    }
    $(document).ready(function(){
        $("#on1").mousedown(function(){
            $(".i1").remove();
            $("#img_show").append("<img src='http://localhost/2016-6-23/img/1.jpg' class='i1' i='1'>");
        });
        $("#on2").mousedown(function(){
            $(".i1").remove();
            $("#img_show").append("<img src='http://localhost/2016-6-23/img/2.jpg' class='i1' i='1'>");
        });
        $("#on3").mousedown(function(){
            $(".i1").remove();
            $("#img_show").append("<img src='http://localhost/2016-6-23/img/3.jpg' class='i1' i='1'>");
        });
        $("#on4").mousedown(function(){
            $(".i1").remove();
            $("#img_show").append("<img src='http://localhost/2016-6-23/img/4.jpg' class='i1' i='1'>");
        });
        $("#on5").mousedown(function(){
            $(".i1").remove();
            $("#img_show").append("<img src='http://localhost/2016-6-23/img/5.jpg' class='i1' i='1'>");
        });
    });
</script>
<script>
    var center1 = $('h2');
    var center2 = $('.content');
    for(var i=0; i<center1.length; i++) {
        center1[i].onclick = function() {
            document.querySelector('#content' + this.getAttribute('a')).style.display = 'block';
        }
    }

</script>
</body>
</html>