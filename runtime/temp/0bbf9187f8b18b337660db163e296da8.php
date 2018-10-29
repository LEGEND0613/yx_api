<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:64:"D:\webset\www.yxapi.com/application/admin\view\api\app_list.html";i:1515723186;s:63:"D:\webset\www.yxapi.com/application/admin\view\public\head.html";i:1515723186;s:63:"D:\webset\www.yxapi.com/application/admin\view\public\foot.html";i:1515723186;}*/ ?>
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
    <button class="layui-btn layui-btn-small " onclick="x_admin_show('添加接口','show_add_app.html',500,320)"></i>添加应用</button>
    <button onclick="javascript:location.reload()" class="layui-btn layui-btn-small">刷新</button>
    <span class="x-right" style="line-height:40px">共有数据:<?php echo $data->count(); ?></span>
    <table class="layui-table">
        <thead>
          <tr>
            <th>AppID</th>
            <th>名称</th>
            <th>SECRET</th>
            <th>API</th>
            <th>操作</th>
        </thead>
        <tbody>
            <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <tr>
                    <td><?php echo $vo['app_id']; ?></td>
                    <td><?php echo $vo['name']; ?></td>
                    <td><?php echo $vo['secret']; ?></td>
                    <td>
                        <a type="button" href="index.html" class="layui-btn layui-btn-mini">
                            <i class="layui-icon" style="font-size: 30px; ">&#xe63c;</i>
                            进入仓库
                        </a>
                    </td>
                    <td>
                        <button type="button" onclick="x_admin_show('编辑应用',
                        'show_edit_app.html?id=<?php echo $vo['id']; ?>',500,300)" class="layui-btn layui-btn-mini">编辑
                        </button>
                        <a type="button" onClick="delete_app(<?php echo $vo['id']; ?>)" class="layui-btn layui-btn-mini layui-btn-danger">删除</button>
                    </td>
                </tr>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>
	      <div class="page">
	        <div>
	          <?php echo $data->render(); ?>
	        </div>
	      </div>
    </div>
</body>

<script type="text/javascript">
    function delete_app(id){
        layer.confirm('确定要删除吗?',{
          btn: ['确定','取消'] //按钮
        }, function(){
            $.ajax({
                url: 'delete_app',
                type: 'post',
                dataType: 'json',
                data: {id:id},
            })
            .done(function(data){
                console.log(data);
                if(data.code==0){
                    layer.msg(data.msg,{icon:5,time:500});
                }else{
                    layer.msg(data.msg,{icon:1,time:500},function(){
                        location.reload();
                    })
                }
            })
        });
    }    
</script>
<script src="__module__/layui/layui.all.js" charset="utf-8"></script>
</html>