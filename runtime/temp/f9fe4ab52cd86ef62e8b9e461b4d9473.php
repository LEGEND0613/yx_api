<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:73:"D:\web-tb\lotusadmin���\code/application/admin\view\db_manage\index.html";i:1515723186;s:69:"D:\web-tb\lotusadmin���\code/application/admin\view\public\head.html";i:1515723186;s:69:"D:\web-tb\lotusadmin���\code/application/admin\view\public\foot.html";i:1515723186;}*/ ?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>闻海南-ADMIN</title>
  <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="shortcut icon" href="__static__/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="__static__/css/font.css">
    <link rel="stylesheet" href="__module__/layui/css/layui.css">
    <link rel="stylesheet" href="__static__/css/xadmin.css">
    <script type="text/javascript" src="__js__/jquery.min.js"></script>
    <script src="__module__/layui/layui.all.js" charset="utf-8"></script>
    <script type="text/javascript" src="__static__/js/xadmin.js"></script>
    <script type="text/javascript" src="__static__/js/jquery.form.js"></script>
    <script type="text/javascript" src="__static__/js/jquery.form.js"></script>
</head>


    <body>
    <div class="x-body" >
        <button class="layui-btn layui-btn-small " onclick="">
        </i>一键优化</button>
        <button onclick="javascript:location.reload()" class="layui-btn layui-btn-small">刷新</button>
        <span class="x-right" style="line-height:40px">数据库表数量:<?php echo $count; ?></span>
    

    <table class="layui-table">
        <thead>
          <tr>
            <th>
              <div class="header layui-form-checkbox" lay-skin="primary"><i class="layui-icon">&#xe605;</i></div>
            </th>
            <th>数据表</th>
            <th>操作</th>
        </thead>
        <tbody>
          <?php foreach($db_names as $vo): ?>
            <tr>
                <td>
                  <div class="layui-form-checkbox" lay-skin="primary" data-id='2'><i class="layui-icon">&#xe605;</i></div>
                </td>
                <td><?php echo $vo; ?></td>
                <td>
                    <button class="layui-btn layui-btn-mini">优化</button>
                    <button class="layui-btn layui-btn-mini">修复</button>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
      </table>
	      <div class="page">
	        <div>

	        </div>
	      </div>
    </div>
</body>

<script src="__module__/layui/layui.all.js" charset="utf-8"></script>
</html>
