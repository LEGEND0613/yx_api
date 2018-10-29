<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:69:"D:\web-tb\lotusadmin���\code/application/admin\view\index\index.html";i:1515977065;}*/ ?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Fast-Admin</title>
  <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="shortcut icon" href="__static__/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="__static__/css/font.css">
    <link rel="stylesheet" href="__module__/layui/css/layui.css">
    <link rel="stylesheet" href="__static__/css/xadmin.css">
    <script type="text/javascript" src="__js__/jquery.min.js"></script>
    <script src="__module__/layui/layui.js" charset="utf-8"></script>
    <script type="text/javascript" src="__static__/js/xadmin.js"></script>
</head>
<body>
    <!-- 顶部开始 -->
    <div class="container">
        <div class="logo"><a href="./index.html">fast-admin</a></div>
        <div class="left_open">
            <i title="展开左侧栏" class="iconfont">&#xe699;</i>
        </div>
        <ul class="layui-nav left fast-add" lay-filter="">
          <li class="layui-nav-item">
            <a href="javascript:;">+新增</a>

            <dl class="layui-nav-child"> <!-- 二级菜单 -->
              <dd><a onclick="x_admin_show('资讯','http://www.baidu.com')"><i class="iconfont">&#xe6a2;</i>资讯</a></dd>
              <dd><a onclick="x_admin_show('图片','http://www.baidu.com')"><i class="iconfont">&#xe6a8;</i>图片</a></dd>
               <dd><a onclick="x_admin_show('用户','http://www.baidu.com')"><i class="iconfont">&#xe6b8;</i>用户</a></dd>
            </dl>
          </li>
        </ul>

        <ul class="layui-nav right" lay-filter="">
          <li class="layui-nav-item">
            <a href="javascript:;"><?php echo session('username'); ?></a>
            <dl class="layui-nav-child"> <!-- 二级菜单 -->
              <dd><a onclick="x_admin_show('个人信息','http://www.baidu.com')">个人信息</a></dd>
              <dd><a onclick="x_admin_show('切换帐号','http://www.baidu.com')">切换帐号</a></dd>
              <dd><a href="<?php echo url('admin/user/logout'); ?>">退出</a></dd>
            </dl>
          </li>
          <li class="layui-nav-item to-index"><a href="/">前台首页</a></li>
        </ul>

    </div>
    <!-- 顶部结束 -->
    <!-- 中部开始 -->
     <!-- 左侧菜单开始 -->
    <div class="left-nav">
      <div id="side-nav">
        <ul id="nav">

            <?php if(is_array($menu) || $menu instanceof \think\Collection || $menu instanceof \think\Paginator): if( count($menu)==0 ) : echo "" ;else: foreach($menu as $key=>$vo): if(isset($vo['children'])): ?>
                        <li>
                            <a href="javascript:;">
                                 <?php if(!empty($vo['icon'])): ?>
                                     <i class="layui-icon">&#<?php echo $vo['icon']; ?>;</i>
                                 <?php else: ?>
                                      <i class="layui-icon"></i>
                                 <?php endif; ?>
                                  <!-- <i class="iconfont">&#xe620;</i> -->
                                <cite><?php echo $vo['title']; ?></cite>
                                <i class="iconfont nav_right">&#xe697;</i>
                            </a>
                             <ul class="sub-menu">
                                 <?php if(is_array($vo['children']) || $vo['children'] instanceof \think\Collection || $vo['children'] instanceof \think\Paginator): if( count($vo['children'])==0 ) : echo "" ;else: foreach($vo['children'] as $key=>$v): if(isset($v['children'])): ?>
                                    <li>
                                            <a _href="<?php echo url($v['name']); ?>">
                                                <?php if(empty($v['icon'])): ?>
                                                      <i class="layui-icon"></i>
                                                <?php else: ?>
                                                      <i class="layui-icon">&#<?php echo $v['icon']; ?>;</i>
                                                 <?php endif; ?>
                                                 <cite> <?php echo $v['title']; ?></cite>
                                            </a>
                                             <ul class="sub-menu">
                                              <?php if(is_array($v['children']) || $v['children'] instanceof \think\Collection || $v['children'] instanceof \think\Paginator): if( count($v['children'])==0 ) : echo "" ;else: foreach($v['children'] as $key=>$vs): ?>
                                                <li>
                                                    <a _href="<?php echo url($vs['name']); ?>">
                                                    <i class="layui-icon">&#xe602;</i>
                                                        <cite> <?php echo $vs['title']; ?></cite>
                                                    </a>

                                                 </li >
                                            <?php endforeach; endif; else: echo "" ;endif; ?>
                                            </ul>
                                        </li>
                                        <?php else: ?>
                                                    <li>
                                                        <a _href="<?php echo url($v['name']); ?>">
                                                        <i class="layui-icon">&#xe602;</i>
                                                            <cite> <?php echo $v['title']; ?></cite>
                                                        </a>
                                                    </li>

                                        <?php endif; ?>

                                     </li >
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                            </ul>
                        </li>



                    <?php else: ?>
                <li>
                            <a _href="<?php echo url($vo['name']); ?>">
                            <?php if(!empty($vo['icon'])): ?>
                                 <i class="layui-icon">&#<?php echo $vo['icon']; ?>;</i>
                            <?php else: ?>
                                  <i class="layui-icon"></i>
                            <?php endif; ?>

                                    <cite><?php echo $vo['title']; ?></cite>
                                     <i class="iconfont nav_right">&#xe697;</i>
                                </a>
                            </li >
                <?php endif; endforeach; endif; else: echo "" ;endif; ?>


        </ul>
      </div>
    </div>

    <!-- <div class="x-slide_left"></div> -->
    <!-- 左侧菜单结束 -->
    <!-- 右侧主体开始 -->
    <div class="page-content">
        <div class="layui-tab tab" lay-filter="xbs_tab" lay-allowclose="false">
          <ul class="layui-tab-title">
            <li class="layui-this">我的桌面</li>
          </ul>
          <div class="layui-tab-content">
            <div class="layui-tab-item layui-show">
                <iframe src="<?php echo url('admin/index/welcome'); ?>" frameborder="0" scrolling="yes" class="x-iframe"></iframe>
            </div>
          </div>
        </div>
    </div>
    <div class="page-content-bg"></div>
    <!-- 右侧主体结束 -->
    <!-- 中部结束 -->
    <!-- 底部开始 -->
    <div class="footer">
        <div class="copyright">Copyright Reserved</div>
    </div>
    <!-- 底部结束 -->


</body>
</html>