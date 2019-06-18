<!DOCTYPE html>
<html lang="en">
<head>
	<title>Bootstrap Example</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery-jvectormap-2.0.3.css" type="text/css" media="screen"/>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/map/jvectormap-2.0.3.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/map/jvectormap-world-mill.js"></script>
</head>
<body>
<style>
.jvectormap-container {
    width: 100%;
    height: 500px !important;
	}
</style>
       <div id="world-map-gdp" class="world-map-width"></div>
        <script type="text/javascript">
		
        $(function(){
			//SELECT COUNT(1) as total, country FROM `tbl_site_states` Group by country
        var gdpData = {
			  <?php foreach($map_data as $key=>$value)
				{
				echo '"'.$value->country.'":'.$value->total.',';
			}?>
        };
        $('#world-map-gdp').vectorMap({
        map: 'world_mill',
        series: {
        regions: [{
        values: gdpData,
        scale: ['#fae3e6', '#e55a67'],
        normalizeFunction: 'polynomial'
        }]
        },
        
        onRegionTipShow: function(e, el, code){
        el.html(el.html()+' (Open - '+gdpData[code]+')');
        }
        });
        });
        </script>
      

</body>
</html>
