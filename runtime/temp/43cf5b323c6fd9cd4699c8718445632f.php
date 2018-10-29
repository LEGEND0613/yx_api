<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:63:"D:\webset\www.yxapi.com/application/index\view\index\index.html";i:1515769598;s:56:"D:\webset\www.yxapi.com/application/index\view\base.html";i:1515977326;}*/ ?>
<!DOCTYPE html>
<html>
<head>
  <title>极速后台开发框架</title>
  


  <link rel="stylesheet" href="__css__/swiper.css">
  <link rel="stylesheet" href="__css__/home.css">
  <meta name="keywords" content="后台开发框架" />
  <meta name="description" content="极速后台开发框架" />
</head>
<body>

<div class="header">
    <h1 class="logo">
    </h1>
    <ul class="nav">
        <li>
            <a href="http://lsadmin.zhengdoudou.cn">
                首页
            </a>
        </li>

        <li>
            <a href="admin/user/index" >
                ifame演示
            </a>
        </li>

        <li>
            <a href="#" >
                演示
            </a>
        </li>


        <li>
            <a href="https://www.kancloud.cn/summer_bloom/lotus_admin/470128" target="_blank">
                文档地址
            </a>
        </li>

        <li>
            <a href="http://xmwxgn.com" target="_blank">
                光年网络学院
            </a>
        </li>

        


        <li>
            <a target="_blank" href="">加入QQ群</a>
        </li>

    </ul>
</div>
<div class="swiper-container swiper-container-vertical">
    <div class="swiper-wrapper">

        <div class="swiper-slide page1" style="height: 959px; margin-bottom: 30px;background-image:url(/public/static/images/int.gif);">
            <div class="text">
                    <a class="download" href="javascript:show_tip()"></a>
            </div>
        </div>
        
        <div class="swiper-slide page3" style="width:100%;height: 959px; margin-bottom: 30px;background-color:black;">
            <div class="mb" >
            </div>       
        </div>

      <!--   <div class="swiper-slide page2" style="width:100%;height: 959px; margin-bottom: 30px;background-color:green;">
            <div class="code" style="background-image:url(/public/static/images/code.gif)" >
            </div>       
        </div> -->

       
   
    </div>
    <!-- Add Pagination -->
    <div class="swiper-pagination swiper-pagination-clickable swiper-pagination-bullets">
        <span class="swiper-pagination-bullet swiper-pagination-bullet-active">
        </span>
        <span class="swiper-pagination-bullet">
        </span>
        <span class="swiper-pagination-bullet">
        </span>
        <span class="swiper-pagination-bullet">
        </span>
        <span class="swiper-pagination-bullet">
        </span>
        <span class="swiper-pagination-bullet">
        </span>
        <span class="swiper-pagination-bullet">
        </span>
        <span class="swiper-pagination-bullet">
        </span>
        <span class="swiper-pagination-bullet">
        </span>
        <span class="swiper-pagination-bullet">
        </span>
    </div>
</div>

</body>
<script src="__js__/jquery.min.js"></script>
<script src="__js__/swiper.js"></script>
<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->


<script src="__module__/layer/layer.js"></script>
<script type="text/javascript">
    var swiper = new Swiper('.swiper-container', {
		        pagination: '.swiper-pagination',
		        direction: 'vertical',
		        slidesPerView: 1,
		        paginationClickable: true,
		        spaceBetween: 10,
		        mousewheelControl: true,
                effect:'coverflow',
                autoplay: 8000
		    });
    function show_tip(){
       var index1 =  layer.confirm('无限光年网络学院',
            {title:'别急悟空！',
            btn:['一定给','看心情咯']},
                function(){
                    layer.msg('跳转中~~~',{offset:'t',icon:1},function(){
                         location.href = 'http://xmwxgn.com';
                    });
                },
                function(){
                    layer.msg('嗷嗷嗷~~！！',{icon:5,time:5000,offset:'t'},function(){
                        location.href = 'http://xmwxgn.com';
                    })
                }
            );
    }
</script>

</html>