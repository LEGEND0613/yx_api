<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:61:"D:\webset\www.yxapi.com/application/admin\view\auth\edit.html";i:1515723186;s:63:"D:\webset\www.yxapi.com/application/admin\view\public\head.html";i:1515723186;s:63:"D:\webset\www.yxapi.com/application/admin\view\public\foot.html";i:1515723186;}*/ ?>
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
        <form action="edit" class="layui-form" id="mainForm" method="post" style="margin-right: 20px;">
            <input type="hidden" name='id' value="<?php echo $data['id']; ?>">
            <div class="layui-form-item">
                <label class="layui-form-label">
                    上级菜单
                </label>
                <div class="layui-input-block">
                    <select lay-filter="aihao" name="pid" id='pid' disabled="disabled">
                        <option value=""><?php echo $p_title; ?></option>
                    </select>
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">
                    菜单名称
                </label>
                <div class="layui-input-block">
                    <input autocomplete="off" value="<?php echo $data['title']; ?>" class="layui-input" id="title" lay-verify="required" name="title" placeholder="请输入菜单名称" type="text">
                    </input>
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">
                    控制器
                </label>
                <div class="layui-input-block">
                    <input autocomplete="off" value="<?php echo $data['name']; ?>"  class="layui-input" id="name" lay-verify="required" name="name" placeholder="请输入控制器" type="text">
                    </input>
                </div>
            </div>


            <div class="layui-form-item">
                <label class="layui-form-label">
                    图标icon
                </label>
                <div class="layui-input-block">
                    <input  value="<?php echo $data['icon']; ?>"  class="layui-input" id="icon"  name="icon" placeholder="请输入图标类，不熟悉font-some请留空" type="text">
                    </input>
                </div>
            </div>


            <div class="layui-form-item">
                <label class="layui-form-label">
                    状态
                </label>
                <div class="layui-input-block">
                  
                     <select name="status" id='status' value="<?php echo $data['status']; ?>" lay-filter="aihao" name="interest">
                        <option value="1" <?php  if($data['status']==1){echo 'selected';}  ?>>显示</option>
                        <option value="0" <?php  if($data['status']==0){echo 'selected';}  ?>>隐藏</option>
                    </select>
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">
                    排序
                </label>
                <div class="layui-input-block">
                    <input autocomplete="off" value="<?php echo $data['sort']; ?>" class="layui-input" id="sort"  lay-verify="required" name="sort" placeholder="排序数值越大排列越靠前" type="text" value="0">
                    </input>
                </div>
            </div>

            <div class="layui-form-item">
                <div class="layui-input-block">
                    <button class="layui-btn"  lay-filter="toSubmit" lay-submit=""  style="margin-left: 33%">
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
    // $("#status").val(0);
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
    		      		layer.msg(data.msg);
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
