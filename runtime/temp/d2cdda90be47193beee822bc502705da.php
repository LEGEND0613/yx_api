<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:67:"D:\web-tb\lotusadmin���\code/application/admin\view\user\edit.html";i:1515723186;s:69:"D:\web-tb\lotusadmin���\code/application/admin\view\public\head.html";i:1515723186;s:69:"D:\web-tb\lotusadmin���\code/application/admin\view\public\foot.html";i:1515723186;}*/ ?>
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
<style type="text/css" media="screen">
header {
    color: black;
}
</style>


<div class="x-body" >
	<form class="layui-form" id='mainForm' method="post" action="editUser">

		<input type="hidden" name="id" value="<?php echo $data['id']; ?>">
		
		<div class="layui-form-item">
                <label class="layui-form-label">
                    用户角色
                </label>
                <div class="layui-input-block">
                    <select  value="<?php echo $data['group_id']; ?>"  name="group_id" id='group_id'>
                        <?php 
                            foreach($auth_group as $vo){
                            	if($vo['id']==$data['group_id']){  
                         ?> 
                           <option  value="<?php echo $vo['id']; ?>" selected><?php echo $vo['title']; ?></option>
                            <?php 	}else{    ?>
 						    <option value="<?php echo $vo['id']; ?>"><?php echo $vo['title']; ?></option>
                            <?php   }   }  ?>
                       
                    </select>
                </div>
        </div>

		<div class="layui-form-item">
		    <label class="layui-form-label">用户名</label>
		    <div class="layui-input-block">
		    <input type="text" id="username" value="<?php echo $data['username']; ?>"  name="username" lay-verify="required|username" autocomplete="off" placeholder="请输入用户名" class="layui-input">
		    </div>
		  </div>

		<div class="layui-form-item">
		    <label class="layui-form-label">邮&nbsp;&nbsp;&nbsp;箱</label>
		    <div class="layui-input-block">
		    <input type="text" id="email" value="<?php echo $data['email']; ?>" name="email" lay-verify="required|email" placeholder="请输入注册邮箱" autocomplete="off" class="layui-input">
		    </div>
		</div>

		<div class="layui-form-item">
		    <label class="layui-form-label">密&nbsp;&nbsp;&nbsp;码</label>
		    <div class="layui-input-block">
		    <input type="password" id="password"  name="password" lay-verify="pass" placeholder="留空为不修改" autocomplete="off" class="layui-input">
		    </div>
	  	</div>

	  	<div class="layui-form-item">
		    <label class="layui-form-label">确&nbsp;&nbsp;&nbsp;认</label>
		    <div class="layui-input-block">
		    	<input type="password"  id="check_password"  name="check_password"  placeholder="确认密码" autocomplete="off" class="layui-input">
		    </div>
	  	</div>


		<div class="layui-form-item">
		    <div class="layui-input-block">
		      <button style="margin-left: 20%" class="layui-btn" lay-submit="" lay-filter="toSubmit">提交</button>
		      <button id="reset" type="reset" class="layui-btn layui-btn-primary">重置</button>
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
			    username: function(value){
			      if(value.length < 5){
			        return '标题至少得5个字符啊';
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
	    	// var options = { 
	        // target:
	        // target element(s) to be updated with server response 
	        // beforeSubmit:  showRequest,  // pre-submit callback 
	        // success: function(data){
	        //  		console.log(data);
	        //  },  
	        // other available options: 
	        //url:       url         // override for form's 'action' attribute 
	        //type:      type        // 'get' or 'post', override for form's 'method' attribute 
	        //dataType:  null        // 'xml', 'script', or 'json' (expected server response type) 
	        //clearForm: true        // clear all form fields after successful submit 
	        //resetForm: true        // reset the form after successful submit 
	        // $.ajax options can be used here too, for example: 
	        //timeout:   3000 
	    // };
	    var options = {
		      type:'post',           //post提交
		      // url:'http://ask.tongzhuo100.com/server/****.php?='+Math.random(),   //url
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
		      		layer.msg(data.msg,{icon:1,time:500},function(){
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
	    $('#mainForm').ajaxForm(options).submit(function(data){}); 
	});
</script>
<script src="__module__/layui/layui.all.js" charset="utf-8"></script>
</html>
