<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:61:"D:\webset\www.yxapi.com/application/admin\view\auth\auth.html";i:1515723186;s:63:"D:\webset\www.yxapi.com/application/admin\view\public\head.html";i:1515723186;s:63:"D:\webset\www.yxapi.com/application/admin\view\public\foot.html";i:1515723186;}*/ ?>
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


<div class="x-body">
    <div>
    	<ul id="tree" class="ztree"></ul>
    </div>
    <div>
    	<button id="auth-btn"  class="layui-btn layui-btn-small">提交</button>
    </div>
</div>
<link rel="stylesheet" href="__module__/ztree/css/metroStyle/metroStyle.css" type="text/css">
<script type="text/javascript" src="__module__/ztree/js/jquery-1.4.4.min.js"></script>
<script type="text/javascript" src="__module__/ztree/js/jquery.ztree.core.js"></script>
<script type="text/javascript" src="__module__/ztree/js/jquery.ztree.excheck.js"></script>
<script type="text/javascript">
$(function(){
        var tree = $("#tree");
        var zTree;
        var setting = {
            check: {
                enable: true
            },
            view: {
                dblClickExpand: false,
                showLine: true,
                showIcon: true,
                selectedMulti: false
            },
            data: {
                simpleData: {
                    enable: true,
                    idKey: "id",
                    pIdKey: "pid",
                    rootpid: ""
                },
                key: {
                    name: "title"
                }
            }
        };
    //加载树形菜单
    $.ajax({
            url: "<?php echo url('admin/auth/getJson'); ?>",
            type: "post",
            dataType: "json",
            cache: false,
            data: {
                id: <?php echo $id; ?>
            },
            success: function (data){
                zTree = $.fn.zTree.init(tree, setting, data);
            }
    });
    /**
     * 授权提交
     */
    $("#auth-btn").bind("click", function (){
            var checked_ids,auth_rule_ids = [];
            checked_ids = zTree.getCheckedNodes(); // 获取当前选中的checkbox
            $.each(checked_ids, function (index, item) {
                auth_rule_ids.push(item.id);
            });
           
            $.ajax({
                url: "<?php echo url('admin/auth/updateAuthGroupRule'); ?>",
                type: "post",
                cache: false,
                data: {
                    id: <?php echo $id; ?>,
                    auth_rule_ids: auth_rule_ids
                },
                success: function (data) {
                    console.log(data);
                    if(data.code === 1){
                        layer.msg(data.msg,{icon:1,time:1000,offset:'t'},function(){
                            x_admin_close();
                            parent.location.reload();
                        })
                    }else{
                        layer.msg(data.msg,{icon:2,offset:'t'}); 
                    }
                }
            });
    });
})

</script>
<script src="__module__/layui/layui.all.js" charset="utf-8"></script>
</html>	