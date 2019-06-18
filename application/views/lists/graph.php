<script>
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
	theme: "light2", // "light1", "light2", "dark1", "dark2"
	animationEnabled: true,
	axisX: {
		interval: 1,
		intervalType: "month",
		valueFormatString: "MMM"
	},
	axisY:{
		title: "Visitor",
		valueFormatString: "#0"
	},
	data: [{        
		type: "line",
		markerSize: 12,
		xValueFormatString: "MMM, YYYY",
		yValueFormatString: "###.#",
		dataPoints: [   
		<?php 
			//print_r($graph_data);
			foreach($graph_data as $key=>$value)
			{
				$n = $value->month-1;
				echo '{x : new Date(2018,'.$n.',01),y:'.$value->total.'},';
			}
			
			?>
		]
	}]
});
chart.render();

}
</script>
<style>
.canvasjs-chart-credit{display:none;}
</style>
<div id="chartContainer" style="height: 300px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>