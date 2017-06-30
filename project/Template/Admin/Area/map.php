<extend name="Public:layout" />
<block name="container">
<script src="__PUBLIC__/admin/js/common.js"></script>
<style type="text/css">
body{
	margin:0;
	height:100%;
	width:100%;
	position:absolute;
}
#mapContainer{
	height:100%;
	width:100%;
}
.tip{
	position:absolute;
	top: 20px;
	right:10px;
	height:160px;
	font-size:12px;
	background-color:#FFFFFF;
	border:1px solid #ccc;
	border-radius:3px;
}	
.tip input[type="button"]{
	margin-left: 10px;
	margin-right:10px;
	margin-top:10px;
	background-color: #0D9BF2;
	height:35px;
	text-align:center;
	line-height:35px;
	color:#fff;
	font-size:14px;
	border-radius:3px;
	outline: none;
	border:0;
	float:right;
	cursor:pointer;
}
.tip input[type="text"]{
	margin-left: 10px;
	margin-right:5px;
	margin-top:10px;
	height:20px;
	outline: none;
	border:0;
	border:1px solid #CCCCCC;
	padding-left:5px;
	width:160px;
}
.tip span{
	margin-left:10px;
}
</style>
<div id="mapContainer"></div>
<div class="tip">
    <div>
    	<span>城市名称：</span>
        <input id="cityName" placeholder="请输入城市的名称" type="text"/>
        <input id="query" value="搜&nbsp;&nbsp;索" type="button"/>
    </div>
    <div>
    	<span>标记坐标：</span>
        <input id="mapx" name="mapx" style="width:100px;" type="text" value="{$data.mapx}"/>
        <input id="mapy" name="mapy" style="width:100px;" type="text" value="{$data.mapy}"/>
        <input id="id" name="id" type="hidden" value="{$data.id}"/>
    </div> 
    <div>
    	<input type="button" style="background-color: #1DCCAA;" onclick="addMarket()" value="重新标注"/>
    	<input type="button" style="background-color: #2C3E50;" id="baochun" value="保&nbsp;&nbsp;存"/> 
    </div>
</div>
<script type="text/javascript" src="http://webapi.amap.com/maps?v=1.3&key=07b6db07097e0b5f40068b845f862137"></script>
<script type="text/javascript">
	var map;
	var marker;
    map = new AMap.Map('mapContainer', {
    	resizeEnable: true,
    	view: new AMap.View2D({
			zoom: 11 
		}),
    });
	
	//获取地图中心点
	function addMarket(lnglat){
		//添加覆盖物
	    marker = new AMap.Marker({				  
			icon:"http://webapi.amap.com/images/marker_sprite.png",
			position:lnglat,
	        draggable:true, //点标记可拖拽
		    cursor:'move',  //鼠标悬停点标记时的鼠标样式
	        raiseOnDrag:true//鼠标拖拽点标记时开启点标记离开地图的效果
		});
	    map.clearMap();
		marker.setMap(map);  //在地图上添加点	
		AMap.event.addListener(marker,'mouseup',function(e){
			$('#mapx').val(marker.getPosition().getLng());
			$('#mapy').val(marker.getPosition().getLat());	
		});
	};

    //设置城市
    document.getElementById('query').onclick = function(){
    	var cityName = document.getElementById('cityName').value;
        if(!cityName){
            cityName = '上海市';
        }
        map.setCity(cityName);
    };

window.onload = function(){
	var mapx = $('#mapx').val();
	var mapy = $('#mapy').val();
	if(mapx != '' && mapy != ''){
		var lnglat = new AMap.LngLat(mapx,mapy);
		map.setCenter(lnglat);
		map.setZoomAndCenter(13,lnglat);
		addMarket(lnglat);
	}
}
$(function(){
	$("#baochun").click(function(){
		var index = parent.layer.getFrameIndex(window.name);
		var id = $('#id').val();
		var mapx = $('#mapx').val();
		var mapy = $('#mapy').val();
		if (mapx == '' || mapy == ''){
			layer.alert('请先标注获取坐标！');
		}
		$.post(
			"{:U('area/map')}",
			{id:id,mapx:mapx,mapy:mapy},
			function(data){
				var arr = eval(data);
				if(arr.status){
					setCookie('_REFRESH_','1');
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