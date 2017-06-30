//弹出iframe
function showUpload(num,callback){
	layer.open({
	    type: 2,
	    title: '图片上传',
	    shadeClose: true,
	    shade: 0.8,
	    area: ['580px', '500px'],
	    content:"/upload/diyupload?num="+num+"&callback="+callback
	}); 
}

var index = parent.layer.getFrameIndex(window.name);
$('#close').click(function(){
	parent.layer.close(index);
});
//返回的缩略图
function callback(){
	var pic =  $("input[name='uploadPic[]']:eq(0)").val();
	if(typeof(pic) == "undefined"){
		parent.layer.msg('请先上传图片！');
	}else{
		parent.$('#thumb').val(pic);
		parent.$('#thumb_preview').attr('src',pic);
		parent.layer.close(index);
	}
}

//返回的图片列表
function callback_piclist(){
	var pic_list =  $("input[name='uploadPic[]']").val();
	if(typeof(pic_list) == "undefined"){
		parent.layer.msg('请先上传图片！');
	}else{
		var str = parent.$("#photos li:last-child").attr('id');
		var len = 0;
		if(typeof(str) != "undefined"){
			str = str.replace("picchild_","");
			len = parseInt(str);
		}
		var html = '';
		$("input[name='uploadPic[]']").each(function(index,item){
			++len;
			html += '<li id="picchild_'+len+'"><img src="'+$(this).val()+'" width="60px" height="60px"/> ';
			html += '<input type="text" name="photos_url[]" value="'+$(this).val()+'" style="width:310px;" class="input"> ';
			html += '<input type="text" name="photos_title[]" value="" style="width:160px;" class="input"> <input class="btn" onclick="remove_pic('+len+')" type="button" value="移除" /></li>'
		});
		parent.$('#photos').append(html);
		parent.layer.close(index);
	}
}

// 删除图片
function remove_pic(len){
	$('#picchild_'+len).remove();
}
