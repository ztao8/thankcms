<extend name="Public:layout" />
<block name="container">
<div class="wrap J_check_wrap"> 
   	<ul class="nav nav-tabs">
		<li class="active"><a href="{:U('content/index')}">文章列表</a></li>
		<li><a href="{:U('content/edit')}">添加文章</a></li>
	</ul>
	<form class="well form-search" method="get" action="{:U('content/index')}">
		<div class="search_type cc mb10">
			<div class="mb10">
				<span class="mr20">分类： 
					<select class="select_2" name="category">
						<option value="">全部</option>
						{$select_categorys}
					</select> &nbsp;&nbsp;
					时间：
					<input type="text" name="start_time" class="J_date date" value="{$Think.get.start_time}" style="width: 80px;" autocomplete="off">-
					<input type="text" class="J_date date" name="end_time" value="{$Think.get.end_time}" style="width: 80px;" autocomplete="off"> &nbsp; &nbsp;
					关键字： 
					<input type="text" name="keyword" style="width: 200px;" value="{$Think.get.keyword}" placeholder="请输入关键字...">
					<input type="submit" class="btn btn-primary" value="搜索">
				</span>
			</div>
		</div>
	</form>
	<form class="J_ajaxForm" method="post" action>
	<div class="table-actions">
		<button class="btn btn-primary btn-small J_ajax_submit_btn" type="submit" data-action="{:U('content/listorders')}">排序</button>
		<button class="btn btn-primary btn-small J_ajax_submit_btn" type="submit" data-action="{:U('content/change',array('operation'=>'status','status'=>1))}" data-subcheck="true">审核</button>
		<button class="btn btn-primary btn-small J_ajax_submit_btn" type="submit" data-action="{:U('content/change',array('operation'=>'status','status'=>0))}" data-subcheck="true">取消审核</button>
		<button class="btn btn-primary btn-small J_ajax_submit_btn" type="submit" data-action="{:U('content/change',array('operation'=>'istop','istop'=>1))}" data-subcheck="true">置顶</button>
		<button class="btn btn-primary btn-small J_ajax_submit_btn" type="submit" data-action="{:U('content/change',array('operation'=>'istop','istop'=>0))}" data-subcheck="true">取消置顶</button>
		<button class="btn btn-primary btn-small J_ajax_submit_btn" type="submit" data-action="{:U('content/change',array('operation'=>'isrecom','isrecom'=>1))}" data-subcheck="true">推荐</button>
		<button class="btn btn-primary btn-small J_ajax_submit_btn" type="submit" data-action="{:U('content/change',array('operation'=>'isrecom','isrecom'=>0))}" data-subcheck="true">取消推荐</button>
		<button class="btn btn-primary btn-small J_ajax_submit_btn" type="submit" data-action="{:U('content/change',array('operation'=>'ishot','ishot'=>1))}" data-subcheck="true">热门</button>
		<button class="btn btn-primary btn-small J_ajax_submit_btn" type="submit" data-action="{:U('content/change',array('operation'=>'ishot','ishot'=>0))}" data-subcheck="true">取消热门</button>
	</div>
   	<table class="table table-hover table-bordered table-list"> 
	    <thead> 
		    <tr>
				<th width="15"><label><input type="checkbox" class="J_check_all" data-direction="x" data-checklist="J_check_x"></label></th>
				<th width="50">排序</th>
				<th>标题</th>
				<th width="150">所属栏目</th>
				<th width="50">点击量</th>
				<th width="120">发布时间</th>
				<th width="180">状态</th>
				<th width="60">操作</th>
			</tr>
	    </thead> 
	    <tbody>
	    	<volist name="list" id="vo">
			<tr>
				<td><input type="checkbox" class="J_check" data-yid="J_check_y" data-xid="J_check_x" name="id[]" value="{$vo.id}" title="ID:{$vo.id}"></td>
				<td><input name="listorders[{$vo.id}]" class="input input-order" type="text" size="5" value="{$vo.listorder}" title="ID:{$vo.id}"></td>
				<td><a href="" target="_blank"> <span>{$vo.title}</span></a></td>
				<td>{$category_array[$vo['category']]['name']}</td>
				<td>{$vo.hits}</td>
				<td>{$vo.post_time|date='Y-m-d H:i:s',###}</td>
				<td>
				<if condition="$vo.status eq 1">
				<a href="{:U('content/change',array('operation'=>'status','id'=>$vo['id'],'status'=>0))}">已审核</a>
				<else />
				<a href="{:U('content/change',array('operation'=>'status','id'=>$vo['id'],'status'=>1))}" style="color:red;">未审核</a>
				</if> | 
				<if condition="$vo.istop eq 1">
				<a href="{:U('content/change',array('operation'=>'istop','id'=>$vo['id'],'istop'=>0))}">已置顶</a>
				<else />
				<a href="{:U('content/change',array('operation'=>'istop','id'=>$vo['id'],'istop'=>1))}" style="color:red;">未置顶</a>
				</if> | 
				<if condition="$vo.isrecom eq 1">
				<a href="{:U('content/change',array('operation'=>'isrecom','id'=>$vo['id'],'isrecom'=>0))}">已推荐</a>
				<else />
				<a href="{:U('content/change',array('operation'=>'isrecom','id'=>$vo['id'],'isrecom'=>1))}" style="color:red;">未推荐</a>
				</if> | 
				<if condition="$vo.ishot eq 1">
				<a href="{:U('content/change',array('operation'=>'ishot','id'=>$vo['id'],'ishot'=>0))}">已热门</a>
				<else />
				<a href="{:U('content/change',array('operation'=>'ishot','id'=>$vo['id'],'ishot'=>1))}" style="color:red;">未热门</a>
				</if>
				</td>
				<td>
					<a href="{:U('content/edit',array('id'=>$vo['id']))}">修改</a> |
					<a href="{:U('content/delete',array('id'=>$vo['id']))}" class="J_ajax_del">删除</a>
				</td>
			</tr>
			</volist>
	    </tbody> 
   	</table>
   	<div class="table-actions">
		<button class="btn btn-primary btn-small J_ajax_submit_btn" type="submit" data-action="{:U('content/listorders')}">排序</button>
		<button class="btn btn-primary btn-small J_ajax_submit_btn" type="submit" data-action="{:U('content/change',array('operation'=>'status','status'=>1))}" data-subcheck="true">审核</button>
		<button class="btn btn-primary btn-small J_ajax_submit_btn" type="submit" data-action="{:U('content/change',array('operation'=>'status','status'=>0))}" data-subcheck="true">取消审核</button>
		<button class="btn btn-primary btn-small J_ajax_submit_btn" type="submit" data-action="{:U('content/change',array('operation'=>'istop','istop'=>1))}" data-subcheck="true">置顶</button>
		<button class="btn btn-primary btn-small J_ajax_submit_btn" type="submit" data-action="{:U('content/change',array('operation'=>'istop','istop'=>0))}" data-subcheck="true">取消置顶</button>
		<button class="btn btn-primary btn-small J_ajax_submit_btn" type="submit" data-action="{:U('content/change',array('operation'=>'isrecom','isrecom'=>1))}" data-subcheck="true">推荐</button>
		<button class="btn btn-primary btn-small J_ajax_submit_btn" type="submit" data-action="{:U('content/change',array('operation'=>'isrecom','isrecom'=>0))}" data-subcheck="true">取消推荐</button>
		<button class="btn btn-primary btn-small J_ajax_submit_btn" type="submit" data-action="{:U('content/change',array('operation'=>'ishot','ishot'=>1))}" data-subcheck="true">热门</button>
		<button class="btn btn-primary btn-small J_ajax_submit_btn" type="submit" data-action="{:U('content/change',array('operation'=>'ishot','ishot'=>0))}" data-subcheck="true">取消热门</button>
	</div>
	</form>
   	<div class="pagination">
   		{$page}
   	</div> 
</div>
<script src="__PUBLIC__/admin/js/common.js"></script>
</block>