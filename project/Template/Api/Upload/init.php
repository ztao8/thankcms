<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="__PUBLIC__/common.css">
  <link rel="stylesheet" type="text/css" href="__PUBLIC__/plugin/webuploader/webuploader.css">
  <style>
    body{padding:30px;}
    
  </style>
</head>
<body>
<div>
  <!--用来存放item-->
  <div id="fileList"></div>
  <div id="filePicker">选择图片</div>
</div>
<script type="text/javascript" src="__PUBLIC__/jquery.js"></script>
<script type="text/javascript" src="__PUBLIC__/plugin/layer/layer.js"></script>
<script type="text/javascript" src="__PUBLIC__/plugin/webuploader/webuploader.js"></script>
<script type="text/javascript" src="__PUBLIC__/common.js"></script>
<script>
  uploadImg({
    "filePicker" : "#filePicker",
    "preview" : "#fileList",
    "maxlength" : 1,
  });
</script>
</body>
</html>