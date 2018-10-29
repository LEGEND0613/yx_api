<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:75:"D:\web-tb\lotusadmin���\code/application/admin\view\file_system\index.html";i:1515723186;s:69:"D:\web-tb\lotusadmin���\code/application/admin\view\public\head.html";i:1515723186;s:69:"D:\web-tb\lotusadmin���\code/application/admin\view\public\foot.html";i:1515723186;}*/ ?>
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
    <link rel="stylesheet" type="text/css" href="__static__/css/webuploader.css" />
    <div class="x-body">


       <button class="layui-btn layui-btn-small "
        onclick="x_admin_show('上传图片','upload.html',500,500)"></i>上传图片</button>
        <button onclick="javascript:location.reload()" class="layui-btn layui-btn-small">刷新</button>

      <span class="x-right" style="line-height:40px">共有数据:<i class="i_count"><?php echo $data->total(); ?></i>条</span>

    <table class="layui-table">
        <thead>
          <tr>
            <th>
              <div class="header layui-form-checkbox" lay-skin="primary"><i class="layui-icon">&#xe605;</i></div>
            </th>
            <th>ID</th>
            <th>URL(双击放大)</th>
            <th>Size</th>
            <th>操作</th>
        </thead>
        <tbody>

        <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <tr id='<?php echo $vo['id']; ?>' ondblclick="tClick(<?php echo $vo['id']; ?>)">
                <td>
                  <div class="layui-form-checkbox" lay-skin="primary" data-id='2'><i class="layui-icon">&#xe605;</i></div>
                </td>
                <td><?php echo $vo['id']; ?></td>
                <td class="url"><img src="<?php echo $vo['url']; ?>" alt=""> </td>
                <td><?php echo $vo['size']; ?></td>
                <td>
                  <button onclick="del(this,<?php echo $vo['id']; ?>)" class="layui-btn layui-btn-mini layui-btn-danger">删除</button>
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

    <script>
      layui.use(['laydate','form'], function(){
        var laydate = layui.laydate;
        //执行一个laydate实例
        laydate.render({
          elem: '#start' //指定元素
        });
        //执行一个laydate实例
        laydate.render({
          elem: '#end' //指定元素
        });
      });
       /*用户-停用*/
      function member_stop(obj,id){
          layer.confirm('确认要停用吗？',function(index){
              if($(obj).attr('title')=='启用'){
                //发异步把用户状态进行更改
                $(obj).attr('title','停用')
                $(obj).find('i').html('&#xe62f;');

                $(obj).parents("tr").find(".td-status").find('span').addClass('layui-btn-disabled').html('已停用');
                layer.msg('已停用!',{icon: 5,time:1000});

              }else{
                $(obj).attr('title','启用')
                $(obj).find('i').html('&#xe601;');

                $(obj).parents("tr").find(".td-status").find('span').removeClass('layui-btn-disabled').html('已启用');
                layer.msg('已启用!',{icon: 5,time:1000});
              }

          });
      }

      //删除所有
      function delAll (argument) {
        var data = tableCheck.getData();
        layer.confirm('确认要全部删除吗？',function(index){
            //捉到所有被选中的，发异步进行删除
            layer.msg('删除成功', {icon: 1});
            $(".layui-form-checked").not('.header').parents('tr').remove();
        });
      }

      function del(obj,id){
        var url = $("#"+id).children('td').children('img').attr('src');
        var count = $(".i_count")[0].innerText;
        layer.confirm('确认要删除吗？',function(index){
            //捉到所有被选中的，发异步进行删除
            $.post("<?php echo url('admin/file_system/del'); ?>", {id:id,url:url}, function(data, textStatus, xhr) {
          /*optional stuff to do after success */
              console.log(data);
              if(data.code==1){
                  layer.msg(data.msg,{icon:1,time:1000},function(){
                    $(obj).parents('tr').remove();
                    $(".i_count").html(count-1);
                  });
              }else{
                  layer.msg(data.msg,{icon:2,time:1000});
              }

            });
        });
      }

      function tClick(id){
          var url = $('#'+id).children('td').children('img').attr('src');
          //页面层
          layer.open({
            type: 1,
            skin: '', //加上边框
            area: ['900px', '648px'], //宽高
            content: "<center style='margin-top:40px;'><img width='800' height='500' src="+url+"></center>"
          });
      }

    </script>

 </html>
<script src="__module__/layui/layui.all.js" charset="utf-8"></script>
</html>