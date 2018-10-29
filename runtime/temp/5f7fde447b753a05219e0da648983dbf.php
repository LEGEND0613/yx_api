<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:65:"D:\webset\www.yxapi.com/application/admin\view\auth\roleEdit.html";i:1515723186;s:63:"D:\webset\www.yxapi.com/application/admin\view\public\head.html";i:1515723186;s:63:"D:\webset\www.yxapi.com/application/admin\view\public\foot.html";i:1515723186;}*/ ?>
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
    <style media="screen" type="text/css">
        header {
    color: black;
}
    </style>
    <div class="x-body">
        <form action="editRole" class="layui-form" id="mainForm" method="post" style="margin-right: 20px;">
            <input type="hidden" value="<?php echo $data['id']; ?>" name="id">
            <div class="layui-form-item">
                <label class="layui-form-label">
                    角色名称
                </label>
                <div class="layui-input-block">
                    <input autocomplete="off" value="<?php echo $data['title']; ?>" class="layui-input" id="title" lay-verify="required" name="title" placeholder="请输入角色名称" type="text">
                    </input>
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">启用状态</label>
                <div class="layui-input-block">
                    <input type="radio" value="1"   title="启用"  name="status" <?php  if($data['status']==1){echo 'checked';}  ?>>
                    <input type="radio" value="0"  title="禁用"  name="status"  <?php  if($data['status']==0){echo 'checked';}  ?>>
                </div>
            </div>

            <div class="layui-form-item">
                <div class="layui-input-block">
                    <button class="layui-btn"  lay-filter="toSubmit" lay-submit=""  style="margin-left: 30%">
                        提交
                    </button>
                     <button style="display: none;" class="layui-btn layui-btn-primary" id="reset" type="reset">
                        重置
                    </button>
                </div>
            </div>

        </form>
    </div>
</body>
<script type="text/javascript">
    var form = layui.form;
    var layer = layui.layer;
              //自定义验证规则
              form.verify({
                title: function(value){
                  if(value.length < 3){
                    return '标题至少得2个字符啊';
                  }
                }
              });
        //监听提交
        form.on('submit(demo1)', function(data){
              layer.alert(JSON.stringify(data.field), {
              title: '最终的提交信息'
            })
            return false;
          });
    $(document).ready(function(){ 
         var options = {
              type:'post',           //post提交
              //url:'http://ask.tongzhuo100.com/server/****.php?='+Math.random(),   //url
              dataType:"json",        //json格式
              data:{},    //如果需要提交附加参数，视情况添加
              clearForm: false,        //成功提交后，清除所有表单元素的值
              resetForm: false,        //成功提交后，重置所有表单元素的值
              cache:false,          
              async:false,          //同步返回
              success:function(data){
                    console.log(data);
                    if(data.code==0){
                        layer.msg(data.msg,{icon:2,time:1000});
                    }else{
                        layer.msg(data.msg,{icon:1,time:1000},function(){
                            $("#reset").click();
                            x_admin_close();
                            parent.location.reload();
                        });
                    }
                  //服务器端返回处理逻辑
                },
                error:function(XmlHttpRequest,textStatus,errorThrown){
                    layer.msg('操作失败:服务器处理失败');
              }
            }; 
        // bind form using 'ajaxForm' 
        $('#mainForm').ajaxForm(options).submit(function(data){
            //无逻辑
        }); 

    });
</script>
 
<script src="__module__/layui/layui.all.js" charset="utf-8"></script>
</html>
