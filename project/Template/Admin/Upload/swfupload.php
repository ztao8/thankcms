<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Cache-control" content="private, must-revalidate" />
<title>图片上传</title>
<script type="text/javascript">
	var path = '__PUBLIC__/plugin/swfupload';
	var url  = "{:C('SITE_MANAGE_URL')}";
</script>
<script type="text/javascript" src="__PUBLIC__/plugin/swfupload/js/jquery.js"></script>
<script type="text/javascript" src="__PUBLIC__/plugin/swfupload/js/swfupload.js"></script>
<script type="text/javascript" src="__PUBLIC__/plugin/swfupload/js/handlers.js"></script>
<link href="__PUBLIC__/plugin/swfupload/css/default.css" rel="stylesheet" type="text/css" />
<style>
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
<script type="text/javascript">
var swfu;
window.onload = function () {
	swfu = new SWFUpload({
		upload_url: "{:C('SITE_MANAGE_URL')}/upload/upload",
		post_params: {"PHPSESSID": ""},
		file_size_limit : "2 MB",
		file_types : "*.jpg;*.png;*.gif;*.bmp",
		file_types_description : "JPG Images",
		file_upload_limit : "{$num}",
		file_queue_error_handler : fileQueueError,
		file_dialog_complete_handler : fileDialogComplete,
		upload_progress_handler : uploadProgress,
		upload_error_handler : uploadError,
		upload_success_handler : uploadSuccess,
		upload_complete_handler : uploadComplete,
		button_image_url : "__PUBLIC__/plugin/swfupload/images/upload.png",
		button_placeholder_id : "spanButtonPlaceholder",
		button_width: 113,
		button_height: 33,
		button_text : '',
		button_text_style : '.spanButtonPlaceholder { font-family: Helvetica, Arial, sans-serif; font-size: 14pt;} ',
		button_text_top_padding: 0,
		button_text_left_padding: 0,
		button_window_mode: SWFUpload.WINDOW_MODE.TRANSPARENT,
		button_cursor: SWFUpload.CURSOR.HAND,			
		flash_url : "__PUBLIC__/plugin/swfupload/swf/swfupload.swf",
		custom_settings : {
			upload_target : "divFileProgressContainer"
		},				
		debug: false
	});
};

</script>
</head>
<body>
	<div font-size: 12px; padding: 10px;">
		<span id="spanButtonPlaceholder"></span>
		<div id="divFileProgressContainer"></div>
		<div id="thumbnails">
			<ul id="pic_list"></ul>
			<div style="clear: both;"></div>
		</div>
		<div style="float:right;margin:5px;">
			<button class="btn btn_c" type="submit">确认完成</button>
			<a class="btn" href="javascript:history.back(-1)">取消</a>
		</div>
	</div>
</body>
</html>