<extend name="Public:layout" />
<block name="container">
<div class="wrap">
  <div id="error_tips">
    <h2>缓存已更新！</h2>
    <div class="error_cont">
      <ul>
        <li>缓存已更新！</li>
      </ul>
      <div class="error_return"><a href="javascript:close_app();" class="btn">关闭</a></div>
    </div>
  </div>
</div>
<script src="__PUBLIC/admin/statics/js/common.js"></script>
<script>
var close_timeout=setTimeout(function(){
	parent.close_current_app();
},3000);

function close_app(){
	clearTimeout(close_timeout);
	parent.close_current_app();
}
</script>
</block>