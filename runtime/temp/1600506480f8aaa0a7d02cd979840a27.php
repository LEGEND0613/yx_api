<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:76:"D:\web-tb\lotusadmin���\code/application/admin\view\file_system\upload.html";i:1515723186;}*/ ?>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>WebUploader演示 - 带裁剪功能 </title>
    <link rel="stylesheet" type="text/css" href="__static__/css/webuploader.css" />
    <link rel="stylesheet" type="text/css" href="__module__/layui/css/layui.css" />
</head>
<body>

 <div id="uploader-demo" style="margin-top: 20px;margin-left:20px;">
     <!--用来存放item-->
         <div  id="fileList" class="uploader-list">
         </div>
         <div id="filePicker">选择图片</div>
 </div>
 </body>
    <script type="text/javascript" src="__static__/js/jquery.js"></script>
    <script type="text/javascript" src="__static__/js/xadmin.js"></script>
    <script type="text/javascript" src="__module__/layui/layui.all.js"></script>
    <script type="text/javascript" src="__module__/layer/layer.js"></script>
    <script type="text/javascript" src="__static__/js/webuploader.js"></script>
    <script type="text/javascript">
            var $list=$("#fileList");   //这几个初始化全局的百度文档上没说明，好蛋疼
            var thumbnailWidth = 400;   //缩略图高度和宽度 （单位是像素），当宽高度是0~1的时候，是按照百分比计算，具体可以看api文档
            var thumbnailHeight = 400;
            var uploader = WebUploader.create({
             // 选完文件后，是否自动上传。
            auto: true,
             // swf文件路径
            swf: '__static__/css/Uploader.swf', //加载swf文件，路径一定要对

             // 文件接收服务端。
             server: '<?php echo url("admin/file_system/upload"); ?>',

             // 选择文件的按钮。可选。
             // 内部根据当前运行是创建，可能是input元素，也可能是flash.
             pick: '#filePicker',

             // 只允许选择图片文件。
             accept: {
                 title: 'Images',
                 extensions: 'gif,jpg,jpeg,bmp,png',
                 mimeTypes: 'image/'
             }
         });
         //上传完成事件监听
         uploader.on( 'fileQueued', function(file) {
             var $li = $(
                     '<div id="' + file.id + '" class="file-item thumbnail">' +
                         '<img>' +
                         '<div class="info">' + file.name + '</div>' +
                     '</div>'
                     ),
                 $img = $li.find('img');
             // $list为容器jQuery实例
                    $list.append( $li );
             // 创建缩略图
             // 如果为非图片文件，可以不用调用此方法。
             // thumbnailWidth x thumbnailHeight 为 100 x 100
             uploader.makeThumb( file, function( error, src ) {
                 if ( error ) {
                     $img.replaceWith('<span>不能预览</span>');
                     return;
                 }
                 $img.attr( 'src', src );
             }, thumbnailWidth, thumbnailHeight );
             //提示
             layer.msg('上传1张图片成功(倒数3秒关闭)',{},function(){
                x_admin_close();
                parent.location.reload();
             });
         });

 </script>
</body>
</html>