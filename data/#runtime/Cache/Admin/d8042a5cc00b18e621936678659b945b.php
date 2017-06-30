<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8" /> 
<!-- Set render engine for 360 browser --> 
<meta name="renderer" content="webkit" /> 
<meta http-equiv="X-UA-Compatible" content="IE=edge" /> 
<meta name="viewport" content="width=device-width, initial-scale=1" /> 
<!-- HTML5 shim for IE8 support of HTML5 elements --> 
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<![endif]--> 
<link href="/statics/admin/themes/flat/theme.min.css" rel="stylesheet" /> 
<link href="/statics/admin/css/simplebootadmin.css" rel="stylesheet" /> 
<link href="/statics/admin/js/artDialog/skins/default.css" rel="stylesheet" /> 
<link href="/statics/admin/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" /> 
<style>
.length_3{width: 180px;}
form .input-order{margin-bottom: 0px;padding:3px;width:40px;}
.table-actions{margin-top: 5px; margin-bottom: 5px;padding:0px;}
.table-list{margin-bottom: 0px;}
</style> 
<!--[if IE 7]>
<link rel="stylesheet" href="/statics/admin/font-awesome/4.2.0/css/font-awesome-ie7.min.css">
<![endif]--> 
<script type="text/javascript">
//全局变量
var GV = {
    DIMAUB: "<?php echo U('/');?>",
    JS_ROOT: "statics/admin/js/",
    TOKEN: ""
};
var SITE_URL = "<?php echo SITE_URL;?>";
var SITE_MEMBER_URL = "<?php echo SITE_MEMBER_URL;?>";
var SITE_MANAGE_URL = "<?php echo SITE_MANAGE_URL;?>";
var UPLOAG_IMAGE_URL = "<?php echo UPLOAG_MAGE_URL;?>";
</script> 
<script src="/statics/admin/js/jquery.js"></script> 
<script src="/statics/admin/js/wind.js"></script> 
<script src="/statics/admin/bootstrap/js/bootstrap.min.js"></script>
<script src="/statics/plugin/layer/layer.js"></script>
<style>
#think_page_trace_open{z-index:9999;}
.home_info li em {float: left;width: 100px;font-style: normal;}
li {list-style: none;}
</style> 
</head> 
<body class="J_scroll_fixed">
  	
<style type="text/css">
.col-auto { overflow: auto; _zoom: 1;_float: left;}
.col-right { float: right; width: 210px; overflow: hidden; margin-left: 6px; }
.table th, .table td {vertical-align: middle;}
.picList li{margin-bottom: 5px;}
</style>
<div class="wrap jj">
	<ul class="nav nav-tabs">
		<li><a href="<?php echo U('content/index');?>">文章列表</a></li>
		<li <?php if(empty($data["id"])): ?>class="active"<?php endif; ?>><a href="<?php echo U('content/edit');?>">添加文章</a></li>
	</ul>
	<div class="common-form">
		<form name="myform" id="myform" action="<?php echo U('content/edit');?>" method="post" class="form-horizontal J_ajaxForm" enctype="multipart/form-data" style="">
		  	<div class="col-right">
		    	<div class="table_full">
		      		<table class="table table-bordered">
		         		<tbody>
		         			<tr>
		          				<td><b>缩略图</b></td>
		        			</tr>
		        			<tr>
		          				<td>
						          	<div style="text-align: center;">
						          		<input type="hidden" name="thumb" id="thumb" value="<?php echo ($data["thumb"]); ?>">
										<a href="javascript:void(0);" onclick="showUpload(1,'callback')">
										<img src="<?php echo ((isset($data["thumb"]) && ($data["thumb"] !== ""))?($data["thumb"]):'/statics/admin/images/icon/upload-pic.png'); ?>" id="thumb_preview" width="135" height="113" style="cursor:hand"></a>
						            	<input type="button" class="btn" onclick="$('#thumb_preview').attr('src','/statics/admin/images/icon/upload-pic.png');$('#thumb').val('');return false;" value="取消图片">
						            </div>
							 	</td>
		        			</tr>
		        			<tr>
		          				<td><b>发布时间</b></td>
		        			</tr>
		        			<tr>
                                                    <td><input type="text" name="post_time" id="post_time" value="<?php echo empty($data['post_time']) ? date('Y-m-d H:i'):date('Y-m-d H:i',$data['post_time']);?>" size="21" class="input length_3 J_datetime date" style="width: 160px;"></td>
		        			</tr>
		        			<tr>
		          				<td><b>状态</b></td>
		        			</tr>
		        			<tr>
		          				<td>
						          	<span class="switch_list cc">
                                                                    <label class="radio"><input type="radio" name="status" value="1" <?php if($data["status"] == 1): ?>checked<?php endif; ?>><span>审核通过</span></label>
									<label class="radio"><input type="radio" name="status" value="0" <?php if($data["status"] == 0): ?>checked<?php endif; ?>><span>待审核</span></label>
								 	</span>
				 				</td>
		        			</tr>
		        			<tr>
						    	<td>
						            <span class="switch_list cc">
									<label class="radio"><input type="radio" name="istop" value="1" <?php if($data["istop"] == 1): ?>checked<?php endif; ?>><span>置顶</span></label>
									<label class="radio"><input type="radio" name="istop" value="0" <?php if($data["istop"] == 0): ?>checked<?php endif; ?>><span>未置顶</span></label>
								 	</span>
								</td>
		        			</tr>
		        			<tr>
		          				<td>
		          					<span class="switch_list cc">
									<label class="radio"><input type="radio" name="isrecom" value="1" <?php if($data["isrecom"] == 1): ?>checked<?php endif; ?>><span>推荐</span></label>
									<label class="radio"><input type="radio" name="isrecom" value="0" <?php if($data["isrecom"] == 0): ?>checked<?php endif; ?>><span>未推荐</span></label>
				 					</span>
				 				</td>
		        			</tr>
		        			<tr>
		          				<td>
		          					<span class="switch_list cc">
									<label class="radio"><input type="radio" name="ishot" value="1" <?php if($data["ishot"] == 1): ?>checked<?php endif; ?>><span>热门</span></label>
									<label class="radio"><input type="radio" name="ishot" value="0" <?php if($data["ishot"] == 0): ?>checked<?php endif; ?>><span>不热门</span></label>
				 					</span>
				 				</td>
		        			</tr>
		      			</tbody>
		      		</table>
		    	</div>
		  	</div>
		  	<div class="col-auto" style="">
		    	<div class="table_full" style="">
		      		<table class="table table-bordered" style="">
		            	<tbody style="">
		            		<tr>
		              			<th width="80">栏目</th>
		              			<td>
									<select name="category">
										<option value="">请选择分类</option>
										<?php echo ($select_categorys); ?>
									</select>
		              			</td>
		            		</tr>
		            		<tr>
		              			<th width="80">标题 </th>
		              			<td>
		              				<input type="text" style="width:400px;" name="title" id="title" required="" value="<?php echo ($data["title"]); ?>" class="input input_hd J_title_color" placeholder="请输入标题">
		              				<span class="must_red">*</span>
		              			</td>
		            		</tr>
		            		<tr>
		              			<th width="80">短标题 </th>
		              			<td>
		              				<input type="text" style="width:200px;" name="short_title" id="short_title" required="" value="<?php echo ($data["short_title"]); ?>" class="input input_hd J_title_color" placeholder="请输入短标题">
		              				<span class="must_red">*</span>
		              			</td>
		            		</tr>
		            		<tr>
		              			<th width="80">关键词</th>
		              			<td><input type="text" name="keywords" id="keywords" value="<?php echo ($data["keywords"]); ?>" style="width:400px" class="input" placeholder="请输入关键字"> 多关键词之间用空格或者英文逗号隔开</td>
		            		</tr>
		            		<tr>
		              			<th width="80">文章来源</th>
		              			<td><input type="text" name="source" id="source" value="<?php echo ($data["source"]); ?>" style="width:400px" class="input" placeholder="请输入文章来源"></td>
		            		</tr>
		            		<tr>
		              			<th width="80">摘要 </th>
		              			<td><textarea name="excerpt" id="excerpt" required="" style="width:95%;height:50px;" placeholder="请填写摘要"><?php echo ($data["excerpt"]); ?></textarea><span class="must_red">*</span></td>
		            		</tr>
		            		<tr style="">
		              			<th width="80">内容</th>
		              			<td style=""><div id="content_tip"></div>
		              				<div id="content" class="edui-default" style="">
		              					<script id="editor" name="content" type="text/plain" style="width:100%;height:250px;"></script>
		              				</div>
								</td>
		            		</tr>
				            <tr>
		              			<th width="80">相册图集 </th>
		              			<td>
                                                        <fieldset class="blue pad-10">
                                                        <legend>图片列表</legend>
                                                        <ul id="photos" class="picList unstyled"></ul>
                                                        </fieldset>
                                                        <a href="javascript:;" style="margin: 5px 0;" onclick="showUpload(50,'callback_piclist')" class="btn">选择图片 </a>
                                                </td>
		            		</tr>
		               	</tbody>
		      		</table>
		    	</div>
		  	</div>
		  	<div class="form-actions">
				<input type="hidden" name="id" value="<?php echo ($data["id"]); ?>" />
		        <button class="btn btn-primary btn_submit J_ajax_submit_btn" type="submit">提交</button>
		        <a class="btn" href="<?php echo U('content/index');?>">返回</a>
		  	</div>
		 </form>
	</div>
</div>
<script src="/statics/admin/js/common.js"></script>
<script type="text/javascript" charset="utf-8" src="/statics/plugin/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/statics/plugin/ueditor/ueditor.all.min.js"></script>
<script type="text/javascript" charset="utf-8" src="/statics/plugin/ueditor/lang/zh-cn/zh-cn.js"></script>
<script src="/statics/plugin/upload.js"></script>
<script type="text/javascript">
	window.UEDITOR_HOME_URL = "<?php echo SITE_URL;?>";
	var ue = UE.getEditor('editor');
	var content = '<?php echo htmlspecialchars_decode($data['content']);?>';
	ue.addListener("ready", function () {
		// editor准备好之后才可以使用
		ue.setContent(content);
	});
</script>

</body>
</html>