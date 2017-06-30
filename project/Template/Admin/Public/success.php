<extend name="Public:layout" />
<block name="container">
<div class="wrap">
  <div id="error_tips">
    <h2>{$msgTitle}</h2>
    <div class="error_cont">
      <ul>
        <li>{$message}</li>
      </ul>
      <div class="error_return"><a href="{$jumpUrl}" class="btn">返回</a></div>
    </div>
  </div>
</div>
<script src="__PUBLIC__/admin/js/common.js"></script>
<script>
setTimeout(function(){
	location.href = '{$jumpUrl}';
},3000);
</script>
<script src="__PUBLIC__/admin/js/common.js"></script>
</block>