<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:62:"D:\webset\www.yxapi.com/application/admin\view\auth\index.html";i:1515723186;s:63:"D:\webset\www.yxapi.com/application/admin\view\public\head.html";i:1515723186;s:63:"D:\webset\www.yxapi.com/application/admin\view\public\foot.html";i:1515723186;}*/ ?>
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
        <button class="layui-btn layui-btn-small " onclick="x_admin_show('添加菜单','showAdd.html',500,460)"></i>添加菜单</button>
        <button onclick="javascript:location.reload()" class="layui-btn layui-btn-small">刷新</button>
        <span class="x-right" style="line-height:40px">共有数据:10条</span>

    <table class="layui-table">
        <thead>
          <tr>
            <th>ID</th>
            <th>权限名称</th>
            <th>控制器方法</th>
            <th>图标</th>
            <th>状态</th>
            <th>操作</th>
        </thead>
        <tbody>
                          <?php if(is_array($auth) || $auth instanceof \think\Collection || $auth instanceof \think\Paginator): $i = 0; $__LIST__ = $auth;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                            <tr>
                                <td><?php echo $vo['id']; ?></td>
                                <td>&nbsp;<?php echo str_repeat('&nbsp;丨---',$vo['level']-1); ?><?php echo $vo['title']; ?></td>
                                <td><?php echo $vo['name']; ?></td>
                                <td>
                                    <i class="layui-icon">
                                    <?php 
                                        if(empty($vo['icon'])){
                                        echo '未设置'; 
                                    }else{
                                         echo '&#'.$vo['icon'].';';   
                                    }   
                                    ?>
                                    </i>   
                                </td>
                                <td><?php if($vo['status'] == '1'): ?>显示<?php else: ?><font color="red">隐藏</font><?php endif; ?>
                                </td>
                                <td> <!--<button type="button" class="btn btn-success">添加子菜单</button> <button type="button" class="btn btn-primary">编辑</button> <button type="button" class="btn btn-danger" onClick="delcfm('<?php echo url('admin/menu/del',['id' => $vo['id']]); ?>','<?php echo $vo['title']; ?>')">删除</button>-->
                                    <button type="button" onclick="x_admin_show('编辑菜单',
                                    'showEdit.html?id=<?php echo $vo['id']; ?>',500,460)" class="layui-btn layui-btn-mini">编辑
                                    </button>
                                    <button type="button" onClick="deleteAuthRule(<?php echo $vo['id']; ?>)" class="layui-btn layui-btn-mini layui-btn-danger">删除</button>
                                </td>
                            </tr>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
      </table>
	      <div class="page">
	        <div>
	        
	        </div>
	      </div>
    </div>
</body>
<script>
function deleteAuthRule(id){
    layer.confirm('确定要删除吗?',{
          btn: ['确定','取消'] //按钮
        }, function(){
            $.ajax({
                url: 'delete',
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
                        window.location.reload();
                    })
                }
            })
        });
}
</script>
<script src="__module__/layui/layui.all.js" charset="utf-8"></script>
</html>