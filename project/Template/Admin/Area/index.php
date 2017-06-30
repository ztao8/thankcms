<extend name="Public:layout" />
<block name="container">
<div class="wrap J_check_wrap"> 
   	<ul class="nav nav-tabs">
		<li class="active"><a href="{:U('area/index')}">区域板块列表</a></li>
		<li><a href="{:U('area/edit')}">添加区域板块</a></li>
	</ul>
	<form action="{:U('area/index')}" method="get" class="well form-search">
		<div class="search_type cc mb10">
			<div class="mb10">
				<span class="mr20">搜索类型： 
					<select id="provinceid" name="provinceid" class="select_2" style="width: 100px;">
						<option value="" <?php if($_GET['provinceid'] === ''){echo 'selected';}?>>不限</option>
                        <volist name="provinceList" id="vo">
                        <option value="{$vo.id}" <?php if($_GET['provinceid'] == $vo['id']){echo 'selected';}?>>{$vo.name}</option>
                        </volist>
					</select> &nbsp;&nbsp;
					<select id="city_id" name="city_id" class="select_2" style="width: 100px;">
						<option value="" <?php if($_GET['city_id'] === ''){echo 'selected';}?>>不限</option>
					</select> &nbsp;&nbsp;
					<select id="parentid" name="parentid" class="select_2" style="width: 100px;">
						<option value="" <?php if($_GET['parentid'] === ''){echo 'selected';}?>>不限</option>
                        <volist name="areaList" id="vo">
                        <option value="{$vo.id}" <?php if($_GET['parentid'] == $vo['id']){echo 'selected';}?>>{$vo.name}</option>
                        </volist>
					</select> &nbsp;&nbsp;
					区域板块名称： 
					<input type="text" placeholder="区域板块名称" value="{$Think.get.name}" style="width: 200px;" name="name">
					&nbsp; &nbsp;
					<input type="submit" value="搜索" class="btn btn-primary">
				</span>
			</div>
		</div>
	</form>
	<form class="J_ajaxForm" method="post" action="{:U('area/listorders')}">
	<div class="table-actions">
		<button type="submit" class="btn btn_submit btn-primary btn-small J_ajax_submit_btn">排序</button>
	</div>
   	<table class="table table-hover table-bordered"> 
	    <thead> 
		    <tr>
		    	<th width="80">排序</th>
				<th width="50">ID</th>
				<th>区域板块名称</th>
				<th>所属区域</th>
				<th>区域板块首字母</th>
				<th>区域板块缩写</th>
				<th width="200">坐标</th>
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
				<td>{$areaList[$vo['parentid']]['name']}</td>
				<td>{$vo.letter}</td>
				<td>{$vo.seo}</td>
				<td>{$vo.mapx}&nbsp;<font color="red">|</font>&nbsp;{$vo.mapy}&nbsp;&nbsp;<a href="JavaScript:;" onclick="showIframe('{:U('area/map',array('id'=>$vo['id']))}','地图标注','80%','80%')">[标注]</a></td>
				<td>
					<if condition="$vo['status'] eq 1">
						<font color="red">√</font>
					<else /> 
						<font color="red">╳</font>
					</if>
				</td>
				<td>
					<a href="{:U('area/edit',array('id'=>$vo['id']))}">修改</a> | 
					<a class="J_ajax_del" href="{:U('area/delete',array('id'=>$vo['id']))}">删除</a>
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
<script>
$(function(){
	$("#provinceid").change(function(){
		$('#city_id').html('<option value="">不限</option>');
		$('#parentid').html('<option value="">不限</option>');
		var provinceid = $('#provinceid').val();
		ajaxCityList(provinceid,0);
	});
});
$(function(){
	var provinceid = $('#provinceid').val();
	var city_id = <?php echo empty($_GET['city_id']) ? 0:$_GET['city_id'];?>;
	ajaxCityList(provinceid,city_id);
});

$(function(){
	$("#city_id").change(function(){
		$('#parentid').html('<option value="">不限</option>');
		var city_id = $('#city_id').val();
		ajaxAreaList(0,city_id,0);
	});
});
$(function(){
	var city_id = $('#city_id').val();
	var area_id = <?php echo empty($_GET['parentid']) ? 0:$_GET['parentid'];?>;
	ajaxAreaList(0,city_id,area_id);
});

function refresh(){
	var refresh = getCookie('_REFRESH_');
	if(refresh == '1'){
		location.reload();
		setCookie('_REFRESH_','');
	}
}
setInterval("refresh()",1000);
</script>
</block>