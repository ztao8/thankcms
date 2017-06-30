<extend name="Public:layout" />
<block name="container">
<div class="wrap J_check_wrap"> 
   	<ul class="nav nav-tabs">
		<li class="active"><a href="{:U('city/index')}">城市列表</a></li>
		<li><a href="{:U('city/edit')}">添加城市</a></li>
	</ul>
	<form action="{:U('city/index')}" method="get" class="well form-search">
		<div class="search_type cc mb10">
			<div class="mb10">
				<span class="mr20">搜索类型： 
					<select name="parentid" class="select_2" style="width: 100px;">
						<option value="" <?php if($_GET['parentid'] === ''){echo 'selected';}?>>不限</option>
                        <option value="0" <?php if($_GET['parentid'] === '0'){echo 'selected';}?>>省份</option>
                        <volist name="provinceList" id="vo">
                        <option value="{$vo.id}" <?php if($_GET['parentid'] == $vo['id']){echo 'selected';}?>>{$vo.name}</option>
                        </volist>
					</select> &nbsp;&nbsp;
					省份城市名称： 
					<input type="text" placeholder="省份城市名称" value="{$Think.get.name}" style="width: 200px;" name="name">
					&nbsp; &nbsp;
					<input type="submit" value="搜索" class="btn btn-primary">
				</span>
			</div>
		</div>
	</form>
	<form class="J_ajaxForm" method="post" action="{:U('city/listorders')}">
	<div class="table-actions">
		<button type="submit" class="btn btn_submit btn-primary btn-small J_ajax_submit_btn">排序</button>
	</div>
   	<table class="table table-hover table-bordered"> 
	    <thead> 
		    <tr>
		    	<th width="80">排序</th>
				<th width="50">ID</th>
				<th>城市名称</th>
				<th>所属省份</th>
				<th>城市首字母</th>
				<th>城市缩写</th>
				<th>状态</th>
				<th width="120">管理操作</th>
			</tr>
	    </thead> 
	    <tbody>
	    	<volist name="list" id="vo">
			<tr>
				<td>
					<span class="expander" style="padding-left: 20px"></span>
					<input type="text" class="input input-order" value="{$vo.listorder}" size="3" name="listorders[{$vo.id}]">
				</td>
				<td>{$vo.id}</td>
				<td>{$vo.name}</td>
				<td>{$provinceList[$vo['parentid']]['name']}</td>
				<td>{$vo.letter}</td>
				<td>{$vo.seo}</td>
				<td>
					<if condition="$vo['status'] eq 1">
						<font color="red">√</font>
					<else /> 
						<font color="red">╳</font>
					</if>
				</td>
				<td>
					<a href="{:U('city/edit',array('id'=>$vo['id']))}">修改</a> | 
					<a class="J_ajax_del" href="{:U('city/delete',array('id'=>$vo['id']))}">删除</a>
				</td>
			</tr>
			</volist>
	    </tbody> 
   	</table>
   	<div class="table-actions">
		<button type="submit" class="btn btn_submit btn-primary btn-small J_ajax_submit_btn">排序</button>
	</div>
	</form>
   	<div class="pagination">
   		{$page}
   	</div> 
</div>
<script src="__PUBLIC__/admin/js/common.js"></script>
</block>