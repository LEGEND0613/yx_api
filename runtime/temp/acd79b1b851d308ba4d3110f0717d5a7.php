<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:61:"D:\webset\www.yxapi.com/application/admin\view\api\index.html";i:1515723186;s:63:"D:\webset\www.yxapi.com/application/admin\view\public\head.html";i:1515723186;s:63:"D:\webset\www.yxapi.com/application/admin\view\public\foot.html";i:1515723186;}*/ ?>
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
    <fieldset class="layui-elem-field">
          <legend>仓库</legend>
          <div class="layui-field-box">
              <button class="layui-btn layui-btn-small " onclick="x_admin_show('添加接口','showAddApi.html',500,420)"><i class="layui-icon" style="font-size: 30px; ">&#xe61f;</i>添加接口</button>
              *AcessToken(测试推荐禁用)
        <button  onclick="javascript:window.location.href = '<?php echo url("admin/api/app_list"); ?>'" class="layui-btn layui-btn-small x-right">
        <i class="layui-icon" style="font-size: 30px; ">&#xe65c;</i>返回  
        </button>
         <button onclick="javascript:location.reload()" class="layui-btn layui-btn-small x-right">刷新</button>
          <table class="layui-table">
        <thead>
          <tr>
            <th>ID</th>
            <th>名称</th>
            <th>BASE_URL</th>
            <th>hash</th>
            <th>传输方式</th>
            <th>AcessToken</th>
            <th>参数</th>
            <th>测试</th>
            <th>操作</th>
        </thead>
        <tbody>
            <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <tr>
                 <td><?php echo $vo['id']; ?></td>
                 <td><?php echo $vo['name']; ?></td>
                 <td><?php echo $vo['base_url']; ?></td>
                 <td><?php echo $vo['hash']; ?></td>
                 <td><?php echo $vo['method']; ?></td>

                 <td>
                    <?php if($vo['is_token'] == '0'): ?>
                    <button type="button" onClick="change_status('<?php echo $vo['id']; ?>','<?php echo $vo['is_token']; ?>')" class="layui-btn layui-btn-mini layui-btn-danger">禁用</button>
                    <?php else: ?>
                    <button type="button" onClick="change_status('<?php echo $vo['id']; ?>','<?php echo $vo['is_token']; ?>')" class="layui-btn layui-btn-mini ">启用</button>
                    <?php endif; ?>
                </td>

                <td><?php echo $vo['param']; ?></td>
                <td>
                    <button type="button" onClick="x_admin_show('接口参数(多个参数用|分割)','param.html?id=<?php echo $vo['id']; ?>',800,190)" class="layui-btn layui-btn-mini">测试参数</button> 
                    <button type="button" onClick="x_admin_show('测试结果','doTest.html?id=<?php echo $vo['id']; ?>',800,390)" class="layui-btn layui-btn-mini">执行测试</button>
                </td>  
                <td>     
                        
                        <button type="button" onclick="x_admin_show('编辑菜单',
                        'show_edit_api.html?id=<?php echo $vo['id']; ?>',500,420)" class="layui-btn layui-btn-mini">编辑
                        </button>
                       
                         
                        <button type="button" onClick="delete_api(<?php echo $vo['id']; ?>)" class="layui-btn layui-btn-mini layui-btn-danger">删除</button>

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
    </fieldset>
    </div>
</body>

<script type="text/javascript">
    function change_status(id,is_token){
            $.post("<?php echo url('admin/api/change_status'); ?>", {id:id,is_token: is_token}, function(data, textStatus, xhr) {
                        if(data.code==0){
                            layer.msg(data.msg);
                        }else{
                            layer.msg(data.msg,{icon:1,time:500},function(){
                                $("#reset").click();
                                x_admin_close();
                                location.reload();
                            });
                        }
             });
    }
    function delete_api(id){
        layer.confirm('确定要删除吗?',{
          btn: ['确定','取消'] //按钮
        },function(){
            $.post("<?php echo url('admin/api/delete_api'); ?>", {id:id}, function(data, textStatus, xhr) {
                /*optional stuff to do after success */
                if(data.code==0){
                            layer.msg(data.msg);
                        }else{
                            layer.msg(data.msg,{icon:1,time:500},function(){
                                $("#reset").click();
                                x_admin_close();
                                location.reload();
                            });
                }
            });
        });  
    }
    function doTest(id){
       $.ajax({
         url: 'doTest',
         type: 'post',
         dataType: 'json',
         data: {id:id},
       })
       .done(function(data){
            
       })
    }
</script>
<script src="__module__/layui/layui.all.js" charset="utf-8"></script>
</html>