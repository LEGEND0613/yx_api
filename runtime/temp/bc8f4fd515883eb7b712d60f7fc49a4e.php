<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:68:"D:\web-tb\lotusadmin���\code/application/admin\view\user\login.html";i:1515989151;}*/ ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<title>php</title>
<link rel="stylesheet" type="text/css" href="__css__/style.css" tppabs="css/style.css" />
<meta name="description" content="lotusadmin">

<style>
body{
	height:100%;
	background:#16a085;
	overflow:hidden;
}
canvas{
	z-index:-1;
	position:absolute;
}
</style>
<script src="__js__/jquery.min.js"></script>
<script src="__module__/layer/layer.js"></script>
<script src="__js__/verificationNumbers.js" tppabs="js/verificationNumbers.js"></script>
<script src="__js__/Particleground.js" tppabs="js/Particleground.js"></script>

</head>
<body>
<?php  
	    $username = 	session('username');
		if(!empty($username )){  ?>	
		<script type="text/javascript">
				window.location.href="<?php echo url('admin/index/index'); ?>";
		</script>
<?php  } ?>
<dl class="admin_login">
 <dt>
  <strong>php快速开发框架</strong>
  <em>thinkphp5</em>
 </dt>
 <dd class="user_icon">
  <input type="text" name="username" id='username' placeholder="账号" class="login_txtbx"/>
 </dd>
 <dd class="pwd_icon">
  <input type="password" name="password"  id="password" placeholder="密码" class="login_txtbx"/>
 </dd>
 
<!--  <dd class="val_icon">
  <div class="checkcode">
    <input type="text" name="username"  id="J_codetext" placeholder="验证码" maxlength="4" class="login_txtbx">
    <canvas class="J_codeimg" id="myCanvas" onclick="createCode()">对不起，您的浏览器不支持canvas，请下载最新版浏览器!</canvas>
  </div>
  <input type="button" value="验证码核验" class="ver_btn" onClick="validate();">
 </dd> -->
 <dd>
  <button id="bs" onclick="login()" type="button"  value="立即登陆" class="submit_btn"/>登录</button>
 </dd>
 <dd>
  <p>© XXXX</p>
  <p>XXXXX</p>
 </dd>
</dl>
</body>
<script>
$(document).ready(function() {
  //粒子背景特效
  $('body').particleground({
    dotColor: '#5cbdaa',
    lineColor: '#5cbdaa'
  });
  //验证码
  createCode();
  //测试提交，对接程序删除即可
   $(".submit_btn").click(function(){
	  // location.href="javascrpt:"tpa=http://***index.html;\

	});
});


function login(){
	var username  = $('#username').val();
	var password  = $('#password').val();
	$.ajax({
	url: 'login',
	type: 'post',
	dataType: 'json',
		data:{
			username: username,
			password:password
			},
	})
	.done(function(data){
		console.log(data);
		if(data.code==0){
			layer.msg(data.msg,{});
		}else{
			layer.msg(data.msg,{icon:1,offset:'t'},function(){
				location.href = "index/index";
			});
			
		}
	})
}
document.onkeydown = function(e){ 
    var ev = document.all ? window.event : e;
    if(ev.keyCode==13) {
          login();
     }
}

layer.msg('账号:admin  密码:123456',{time:6000,offset:'t'});

</script>
</html>
