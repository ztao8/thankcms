<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>图片上传</title>
<script src="/statics/jquery.js"></script>
<link rel="stylesheet" type="text/css" href="/statics/plugin/diyUpload/css/webuploader.css">
<link rel="stylesheet" type="text/css" href="/statics/plugin/diyUpload/css/diyUpload.css">
<script type="text/javascript" src="/statics/plugin/diyUpload/js/webuploader.html5only.min.js"></script>
<script type="text/javascript" src="/statics/plugin/diyUpload/js/diyUpload.js"></script>
</head>
<style>
*{ margin:0; padding:0;}
#box{ margin:5px auto; width:550px; height:400px; background:#FF9;overflow-y: scroll;overflow-x: hidden;}
#floor{ margin:5px auto; width:550px; text-align:right;}
.btn{
	font-family: "Microsoft YaHei","Lato","Helvetica Neue",Helvetica,Arial,sans-serif;
	display: inline-block;
	margin-bottom: 0;
	font-size: 15px;
	line-height: 20px;  
	vertical-align: middle;
  	cursor: pointer;
  	padding: 7px 20px;
  	color: #fff;
  	text-decoration: none;
  	text-shadow: none;
  	background-image: none;
  	border: 0;
  	border-radius: 3px;
  	background:#7b8a8b;
  	transition: .25s;
  	text-align: center;
}
.btn_c{background:#1abc9c}
</style>
<body>
<div id="box">
	<div id="pic"></div>
</div>
<div id="floor">
	<button id="ok" onclick="<?php echo ($callback); ?>()" class="btn btn_c" type="button">确认完成</button>
	<a class="btn" id="close" href="javascript:;">取消</a>
</div>
<div id="pic_list" style="display:none;"></div>
</body>
<script src="/statics/plugin/upload.js"></script>
<script type="text/javascript">
/*
* 服务器地址,成功返回,失败返回参数格式依照jquery.ajax习惯;
* 其他参数同WebUploader
*/

$('#pic').diyUpload({
	url:"<?php echo C('SITE_MANAGE_URL');?>/upload/upload",
	success:function( data ) {
		var test = data;
		for(i in test ){
			$('#pic_list').append('<input type="hidden" name="uploadPic[]" value="' + test[i] + '"/>');       
		}
		console.info( data );
	},
	error:function( err ) {
		console.info( err );	
	},
	buttonText : '选择图片',
	chunked:true,
	// 分片大小
	chunkSize:512 * 1024,
	//最大上传的文件数量, 总文件大小,单个文件大小(单位字节);
	fileNumLimit:<?php echo ($num); ?>,
	fileSizeLimit:500000 * 1024,
	fileSingleSizeLimit:50000 * 1024,
});
</script>
</html>