<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:61:"D:\webset\www.yxapi.com/application/admin\view\auth\role.html";i:1515723186;s:63:"D:\webset\www.yxapi.com/application/admin\view\public\head.html";i:1515723186;s:63:"D:\webset\www.yxapi.com/application/admin\view\public\foot.html";i:1515723186;}*/ ?>
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


  <style type="text/css">
      input::-webkit-input-placeholder {
         color: #aab2bd;
         font-size: 14px;
     }
     input {
        padding-left: 5px;
     }
  </style>
  <body>
    <div class="x-body">
        <div   class="layui-row">
          <input id="role_name" name="role_name" style="height:25px;" placeholder="请输入角色名称">
          <button style="margin-left: 10px;" class="layui-btn layui-btn-small " onclick="addRole()"></i>添加角色</button>
          <button onclick="javascript:location.reload()" class="layui-btn layui-btn-small">刷新</button>
          <span class="x-right" style="line-height:40px">共有数据:<?php echo $role->total(); ?>条</span>
        </div>
    <table class="layui-table">
        <thead>
          <tr>
            <th>ID</th>
            <th>角色</th>
            <th>状态</th>
            <th>操作</th>
        </thead>
        <tbody>
          <?php if(is_array($role) || $role instanceof \think\Collection || $role instanceof \think\Paginator): $i = 0; $__LIST__ = $role;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
          <tr>
            <td><?php echo $vo['id']; ?></td>
            <td><?php echo $vo['title']; ?></td> 
            <td>
              <?php 
              if($vo['status']==1)
              {echo '<span style=color:green>启用</span>'; }else{
                echo '<span style=color:red>禁用</span>';
            }
           ?>

           </td> 
            <td>
                <button class="layui-btn layui-btn-mini" onclick="x_admin_show('用户授权','showAuth.html?id=<?php echo $vo['id']; ?>',500,350)">授权</button>
                <button class="layui-btn layui-btn-mini" onclick="x_admin_show('角色编辑','showRoleEdit.html?id=<?php echo $vo['id']; ?>',500,250)">编辑</button>
                <button onclick="delRole(this,<?php echo $vo['id']; ?>)" class="layui-btn layui-btn-mini layui-btn-danger">删除</button>
             </td>
          </tr>
          <?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
      </table>
        <div class="page">
          <div>
            <?php echo $role->render(); ?>
          </div>
        </div>
    </div>
</body>
<script>
function addRole(){
  var role_name = $("#role_name").val();
  if(role_name.length==0){
      layer.msg('角色名不能为空',{icon:2});
      return false;
  }
  if(role_name.length<2){
      layer.msg('角色名过短',{icon:2});
      return false;
  }
  $.ajax({
     url: 'addRole',
     type: 'post',
     dataType: 'json',
     data: {role_name: role_name},
   })
   .done(function(data) {
     console.log(data);
     if(data.code==1){
        layer.msg(data.msg,{icon:1,offset:"t",time:500},function(){
            location.reload();
        });
     }else{
        layer.msg(data.msg,{icon:2});
     }
   })
}
function delRole(obj,id){
   layer.confirm('确认要删除吗？',function(index){
    $.ajax({
      url: 'delRole',
      type: 'post',
      dataType: 'json',
      data: {id:id},
  })
  .done(function(data){
      if(data.code==1){
          layer.msg(data.msg,{icon:1,offset:"t",time:500},function(){
              location.reload();
          });
       }else{
          layer.msg(data.msg,{icon:2,offset:"t"});
       }
    })
   })
}

</script>
<script src="__module__/layui/layui.all.js" charset="utf-8"></script>
</html>
