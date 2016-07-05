<html style="height: 400px">
<head>
    <meta charset="UTF-8">
    <title>首页</title>
    <link rel="stylesheet" type="text/css" href="http://localhost/2016-6-23/style/home.css" />
    <script type="text/javascript" src="http://localhost/2016-6-23/js/jquery.js"></script>
    <script type="text/javascript" src="http://localhost/2016-6-23/js/home.js"></script>
</head>

<body>
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
</body>
</html>