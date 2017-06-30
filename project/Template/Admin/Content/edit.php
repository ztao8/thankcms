<extend name="Public:layout" />
<block name="container">
<style type="text/css">
.col-auto { overflow: auto; _zoom: 1;_float: left;}
.col-right { float: right; width: 210px; overflow: hidden; margin-left: 6px; }
.table th, .table td {vertical-align: middle;}
.picList li{margin-bottom: 5px;}
</style>
<div class="wrap jj">
	<ul class="nav nav-tabs">
		<li><a href="{:U('content/index')}">文章列表</a></li>
		<li <empty name="data.id">class="active"</empty>><a href="{:U('content/edit')}">添加文章</a></li>
	</ul>
	<div class="common-form">
		<form name="myform" id="myform" action="{:U('content/edit')}" method="post" class="form-horizontal J_ajaxForm" enctype="multipart/form-data" style="">
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
						          		<input type="hidden" name="thumb" id="thumb" value="{$data.thumb}">
										<a href="javascript:void(0);" onclick="showUpload(1,'callback')">
										<img src="{$data.thumb|default='__PUBLIC__/admin/images/icon/upload-pic.png'}" id="thumb_preview" width="135" height="113" style="cursor:hand"></a>
						            	<input type="button" class="btn" onclick="$('#thumb_preview').attr('src','__PUBLIC__/admin/images/icon/upload-pic.png');$('#thumb').val('');return false;" value="取消图片">
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
                                                                    <label class="radio"><input type="radio" name="status" value="1" <if condition="$data.status eq 1">checked</if>><span>审核通过</span></label>
									<label class="radio"><input type="radio" name="status" value="0" <if condition="$data.status eq 0">checked</if>><span>待审核</span></label>
								 	</span>
				 				</td>
		        			</tr>
		        			<tr>
						    	<td>
						            <span class="switch_list cc">
									<label class="radio"><input type="radio" name="istop" value="1" <if condition="$data.istop eq 1">checked</if>><span>置顶</span></label>
									<label class="radio"><input type="radio" name="istop" value="0" <if condition="$data.istop eq 0">checked</if>><span>未置顶</span></label>
								 	</span>
								</td>
		        			</tr>
		        			<tr>
		          				<td>
		          					<span class="switch_list cc">
									<label class="radio"><input type="radio" name="isrecom" value="1" <if condition="$data.isrecom eq 1">checked</if>><span>推荐</span></label>
									<label class="radio"><input type="radio" name="isrecom" value="0" <if condition="$data.isrecom eq 0">checked</if>><span>未推荐</span></label>
				 					</span>
				 				</td>
		        			</tr>
		        			<tr>
		          				<td>
		          					<span class="switch_list cc">
									<label class="radio"><input type="radio" name="ishot" value="1" <if condition="$data.ishot eq 1">checked</if>><span>热门</span></label>
									<label class="radio"><input type="radio" name="ishot" value="0" <if condition="$data.ishot eq 0">checked</if>><span>不热门</span></label>
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
										{$select_categorys}
									</select>
		              			</td>
		            		</tr>
		            		<tr>
		              			<th width="80">标题 </th>
		              			<td>
		              				<input type="text" style="width:400px;" name="title" id="title" required="" value="{$data.title}" class="input input_hd J_title_color" placeholder="请输入标题">
		              				<span class="must_red">*</span>
		              			</td>
		            		</tr>
		            		<tr>
		              			<th width="80">短标题 </th>
		              			<td>
		              				<input type="text" style="width:200px;" name="short_title" id="short_title" required="" value="{$data.short_title}" class="input input_hd J_title_color" placeholder="请输入短标题">
		              				<span class="must_red">*</span>
		              			</td>
		            		</tr>
		            		<tr>
		              			<th width="80">关键词</th>
		              			<td><input type="text" name="keywords" id="keywords" value="{$data.keywords}" style="width:400px" class="input" placeholder="请输入关键字"> 多关键词之间用空格或者英文逗号隔开</td>
		            		</tr>
		            		<tr>
		              			<th width="80">文章来源</th>
		              			<td><input type="text" name="source" id="source" value="{$data.source}" style="width:400px" class="input" placeholder="请输入文章来源"></td>
		            		</tr>
		            		<tr>
		              			<th width="80">摘要 </th>
		              			<td><textarea name="excerpt" id="excerpt" required="" style="width:95%;height:50px;" placeholder="请填写摘要">{$data.excerpt}</textarea><span class="must_red">*</span></td>
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
				<input type="hidden" name="id" value="{$data.id}" />
		        <button class="btn btn-primary btn_submit J_ajax_submit_btn" type="submit">提交</button>
		        <a class="btn" href="{:U('content/index')}">返回</a>
		  	</div>
		 </form>
	</div>
</div>
<script src="__PUBLIC__/admin/js/common.js"></script>
<script type="text/javascript" charset="utf-8" src="__PUBLIC__/plugin/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="__PUBLIC__/plugin/ueditor/ueditor.all.min.js"></script>
<script type="text/javascript" charset="utf-8" src="__PUBLIC__/plugin/ueditor/lang/zh-cn/zh-cn.js"></script>
<script src="__PUBLIC__/plugin/upload.js"></script>
<script type="text/javascript">
	window.UEDITOR_HOME_URL = "{:SITE_URL}";
	var ue = UE.getEditor('editor');
	var content = '<?php echo htmlspecialchars_decode($data['content']);?>';
	ue.addListener("ready", function () {
		// editor准备好之后才可以使用
		ue.setContent(content);
	});
</script>
</block>