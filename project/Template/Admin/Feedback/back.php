<extend name="Public:layout" />
<block name="container">
<div class="wrap jj" style="padding: 10px;">
	<div class="common-form">
		<fieldset>
			<textarea style="width:450px;height:160px;" cols="100" rows="5" id="feedback" name="feedback">{$data.feedback}</textarea>
		</fieldset>
		<button type="submit" id="baochun" style="margin-top:10px;" class="btn btn-primary btn_submit">保存</button>
		<input type="hidden" id="id" name="id" value="{$data.id}" />
	</div>
</div>
<script src="__PUBLIC__/admin/js/common.js"></script>
<script>
$(function(){
	$("#baochun").click(function(){
		var index = parent.layer.getFrameIndex(window.name);
		var id = $('#id').val();
		var feedback = $('#feedback').val();
		if (feedback == ''){
			layer.alert('请先填写回复内容！');
		}
		$.post(
			"{:U('feedback/back')}",
			{id:id,feedback:feedback},
			function(data){
				var arr = eval(data);
				if(arr.status){
					setCookie('_FEEDBACK_REFRESH_','1');
					parent.layer.msg(arr.info);
					parent.layer.close(index);
				}else{
					layer.alert(arr.info);
				}
			}
		);
	});
});
</script>
</block>