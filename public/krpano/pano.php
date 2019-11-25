<html>
<style type="text/css">
#panocontent {
	width: 800px;
	height: 400px;
}
</style>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>
<LINK REL=StyleSheet HREF="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/ui-lightness/jquery-ui.css" TYPE="text/css" MEDIA=screen>
<script type="text/javascript" src="swfkrpano.js"></script>
<script type="text/javascript">
function krpano() {
	return document.getElementById('krpanoSWFObject');
}
function openinfo(spotName) {
	
	$('<input type="button" value="Remove '+spotName+'" />').click(function() {
		krpano().call('removehotspot('+spotName+')');
		$(this).dialog('destroy');
	}).dialog();
	
	
	
}

$(function() {
	embedpano({swf:"krpano.swf", id:"krpanoSWFObject", xml:"pano.xml", target:"panocontent", width:"516", height:"300"});
		
	
	$('#panoSelect').change(function() {
		krpano().call("loadpano('"+$(this).val()+"', null, MERGE, BLEND(1));");
	});

	function getlookat() {
			krpano().call("screentosphere(mouse.x, mouse.y, mouseath, mouseatv)");
				
			var mouse_at_x = krpano().get("mouse.x");
			var mouse_at_y = krpano().get("mouse.y");
			var mouse_at_h = krpano().get("mouseath");
			var mouse_at_v = krpano().get("mouseatv");
			
			return {'x': mouse_at_x, 'y': mouse_at_y, 'h': mouse_at_h, 'v': mouse_at_v};
	}

	var spotId = 0;
	var spots = {};
	function addHotSpot() {
		var spotName = 'spot'+spotId;

		var pos = getlookat();
		spots[spotName] = pos;
		
		krpano().call('addhotspot('+spotName+')');
		krpano().call('set(hotspot['+spotName+'].url, '+$('#spotSelect').val()+')');
		krpano().call('set(hotspot['+spotName+'].ath,'+pos.h+')');
		krpano().call('set(hotspot['+spotName+'].atv,'+pos.v+')');
		krpano().call('set(hotspot['+spotName+'].scale, 1)');
		krpano().call('set(hotspot['+spotName+'].zoom, true)');
//		krpano().call('set(hotspot['+spotName+'].onclick, removehotspot('+spotName+'))');
		krpano().call('set(hotspot['+spotName+'].onclick, js(openinfo('+spotName+')) )');
		spotId++;
	}


	var orig = window.onmousedown;
	
	$('#panoCb').change(function() {
		if ($(this).is(':checked')) {
			var that = $(this);
			window.onmousedown = function() { 
				addHotSpot();
				that.attr('checked', false);
				window.onmousedown = orig;
				return false;
			};			
		}
		else {
			window.onmousedown = orig;
		}
	});


});
</script>

<body>

Add hotspot 

<select id="spotSelect">
	<option value="spot.png">black spot</option>
	<option value="spot2.png">green spot</option>
	<option value="spot3.png">red spot</option>
</select>

<input type="checkbox" id="panoCb" />

<select id="panoSelect">
	<option value="pano.xml">pano1</option>
	<option value="pano2.xml">pano2</option>
</select>

<div id="panocontent" />


</body>
</html>
