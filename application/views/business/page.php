<?php $base_url = $this->config->item('base_url'); 
$row = $profile;

?>
 
<body bgcolor="#eaeaea" ng-app="myApp" ng-controller="myCtrl">
<style>
.table > tbody > tr > td, .table > tbody > tr > th{
border-top: 0px solid white !important;
padding:10px !important;
}

      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 500px;
		width:500px;
      }
      /* Optional: Makes the sample page fill the window. */
      
      #description {
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
      }

      #infowindow-content .title {
        font-weight: bold;
      }
.edit,.edit-location,.edit-about{display:none;}
      .pac-card {
        margin: 10px 10px 0 0;
        border-radius: 2px 0 0 2px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        outline: none;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
        background-color: #fff;
        font-family: Roboto;
      }

      #pac-container {
        padding-bottom: 12px;
        margin-right: 12px;
      }

      .pac-controls {
        display: inline-block;
        padding: 5px 11px;
      }

      .pac-controls label {
        font-family: Roboto;
        font-size: 13px;
        font-weight: 300;
      }

      #pac-input {
        background-color: #fff;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        margin-left: 12px;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        width: 400px;
      }

      #pac-input:focus {
        border-color: #4d90fe;
      }

      #title {
        color: #fff;
        background-color: #4d90fe;
        font-size: 25px;
        font-weight: 500;
        padding: 6px 12px;
      }
      #target {
        width: 345px;
      }
	  
	  .list-group-item.active, .list-group-item.active:focus, .list-group-item.active:hover {
    z-index: 2 !important;
    color: #fff !important;
    background-color: #f93b5d !important;
    border-color: #f93b5d !important;
}

    </style>
	<div class="row" style="margin-left:0px !important; margin-right:0px !important;margin-top:30px;">
		<div class="col-lg-3" style="padding-right: 0px !important;">
			<div class="left-box">
			<img src="<?php echo $base_url; ?>/assets/images/<?php echo $row->image;  ?>" width="100%" height="265px">
			<input type="file" name="image" id="file" class="file hide" data-url="<?php echo base_url(); ?>profile-pic"/> 
			<label for="file" class="img-btn text-center">Upload Profile Picture</label>
			<br/><br/>
			<center><span class="name-text " ><?php echo $row->name;  ?></span>
			<br/><br/>
			<h4 class="text-muted"><strong><span style="color:#fd376d !important;" class="text-capitalize" ><?php echo $row->profession;  ?></span></strong></h4>
			
			</center>
			</div>
			
			<br/>
			
			<div class="left-box alert-danger">
			 <h3 class="text-center text-danger">Page Expired</h3>
				<P class="text-center"><strong><?php print_r($page_detail->plan_duration);?></strong></p>
				<center> 
				<?php 
						$date=strtotime($page_detail->plan_duration);
						$diff=$date-time();
						$days=floor($diff/(60*60*24));
						$hours=round(($diff-$days*60*60*24)/(60*60));
						echo "$days days $hours hours remain<br/>";
				?>
				</center>
			</div>
			<br/>
			<?php $que = (int)$states['questions']; if($que <= 10){ $per_q = $que/10*100; 
			}elseif($que>=10){	$per_q = $que;	}  ?>
			<div class="left-box">
			<span>Questions</span> <span class="pull-right text-success"><?php echo $per_q."%"; ?></span> 
			<div class="container_div">
			  <div class="skills" style=" width: <?php echo $per_q."%"; ?>; height:5px; background-color: #4CAF50;  "></div>
			</div>
<br/>
			<?php $ans = (int)$states['answers']; if($ans <= 10){ $ans_q = $ans/10*100; 
			}elseif($ans >=10){	$ans_q = $ans;	}  ?>
			<span>Answers</span><span class="pull-right text-primary"><?php echo $ans_q."%"; ?></span> 
			<div class="container_div">
			  <div class="skills css" style="width: <?php echo $ans_q."%"; ?>; background-color:#2196F3; height:5px; "></div>
			</div>
<br/>		<?php $vis = (int)$states['visitor']; if($vis <= 10){ $vis_q = $vis/10*100; 
			}elseif($vis >=10){	$vis_q = $vis;	}  ?>
			<span>Viewers</span><span class="pull-right text-danger"><?php echo $vis_q."%"; ?></span>
			<div class="container_div">
			  <div class="skills js" style="width: <?php echo $vis_q."%"; ?>; height:5px; background-color: #f44336;"></div>
			</div>
<br/>
			<span>Votes</span><span class="pull-right text-muted">40%</span>
			<div class="container_div">
			  <div class="skills php" style="width: 40%; height:5px; background-color: #808080;"></div>
			</div>
			</div>
			
		</div>
		<div class="col-lg-9">
			<ul class="nav nav-tabs">
				<li class="active"><a data-toggle="tab" href="#home">Dashboard</a></li>
				<li><a data-toggle="tab" href="#menu1">Ads Gallery</a></li>
				<li><a data-toggle="tab" href="#menu2">Menu 2</a></li>
				<li><a data-toggle="tab" href="#menu3">Menu 3</a></li>
			</ul>
			<div class="tab-content">
			<div id="home" class="tab-pane fade in active">
			<div class="left-box" style="padding:35px;">
			<h1 class="name-text">Dashboard</h1>  <br/>
			<div class="row">
				<div class="col-lg-4 text-center" style="background-color: #f44336;color:white;height:130px;padding-top:15px;border: 5px solid white;">
				<center>
					<i class="fa fa-users fa-3x"></i><br/>
					<h2>Total Followers : <span class="count"><?php print_r($follow_status['follower']); ?></span></h2>
				</center>
				</div>
				<div class="col-lg-4" style="background-color: #2196F3; color:white;height:130px;padding-top:15px;border: 5px solid white;">
				<center>
					<i class="fa fa-picture-o fa-3x"></i><br/>
					<h2>Total Banners : <span class="count"><?php echo 0; ?></span></h2>
				</center>
				</div>
				<div class="col-lg-4" style="background-color: #009688 !important;color:white;height:130px;padding-top:15px;border: 5px solid white;">
				<center>
					<i class="fa fa-slideshare fa-3x"></i><br/>
					<h2>Total Visitor : <span class="count"><?php echo $states['visitor']; ?></span></h2>
				</center>
				</div>
			</div><!--top column row-->
			
			</div>
			<br/>
			
			<div class="left-box">
					<div id="myChart"></div>
			</div>
			<style>
			#myChart-license-text{display:none;}
			</style>
			</div>
			<div id="menu1" class="tab-pane fade ">
				<div class="left-box" style="padding:35px;">
				<h1 class="name-text">Upload Slider Ads</h1>  <br/>
				<span class="text-danger pull-right">You Can Upload Only <?php echo $page_detail->limits; ?> Images in this Plan</span>
				<button class="btn btn-default w3-btn" ng-hide="limits==img_limit" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i></button>
				<br/>
				<hr/>
				
				<div class="container" style="margin-top:50px; width:100% !important;">
					<div class="row">
						<div class="col-lg-3" style="margin-bottom:20px " ng-repeat="img in gallery">
							<div class="left-box">
							<span  class=" pull-right" style="padding: 2px;cursor: pointer;font-size: 15px !important;" ng-click="delete_image(img)"><strong>&times;</strong></span>
							
							<img src="<?php echo $base_url; ?>/assets/uploads/banner/{{img.image}}" width="150px" height="150px">
							<br/>
							<br/>
							<center> <span class="text-primary" style="color:#fd376d !important"><strong>{{img.title}}</strong></span></center>
							</div>
						</div>
						
					</div>
				</div>
				</div>
			</div>
			</div>
		</div>	<!-- col-lg-8-->
	</div><!-- row-->
	
	
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Uploads</h4>
        </div>
        <div class="modal-body">
			<form class="form" action="<?php echo base_url(); ?>banner-pic" enctype="multipart/form-data" method="POST">
			  <div class="form-group">
				<label for="email">Title:</label>
				<input type="text" class="form-control" name="title" placeholder="Enter Image Title">
			  </div>
			  <div class="form-group">
				<label for="pwd">Type:</label>
				<select class="form-control" name="type">
					<option value="slider">Slider</option>
					<option value="vartical">vartical</option>
					<option value="horizontal">Horizontal</option>
					<option value="small">small</option>
				</select>
			  </div>
			  <div class="form-group">
				<label for="email">Image:</label>
				<input type="file" class="form-control" name="image">
			  </div>
			  <button type="submit" class="btn btn-default w3-btn">Submit</button>
			</form> 
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default w3-btn" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  
	<?php
	
	//print_r($graph->follow);
	function js_str($s)
	{
		return '' .$s. '';
	}	
	$temp = array_map('js_str', $graph->follow);
    $follow =  '[' . implode(',', $temp) . ']'; 
	
	$temp = array_map('js_str', $graph->visitor);
    $visitor =  '[' . implode(',', $temp) . ']'; 
	
	?>
<?php $location = json_decode($row->location);  ?>
<script>
$(document).ready(function(){

		
	
	$(function () {
  $("#datepicker").datepicker({ 
        autoclose: true, 
        todayHighlight: true
  }).datepicker('update', new Date());
});


	$(".edit-location-btn").click(function(e){
		$('.edit-location').show();
		$(".location-text ").hide();
		$('.edit-location-btn').hide();
	});
	
	$(".edit-btn").click(function(e){
		$('.edit').show();
		$(".edit-btn").hide();
		$('.text').hide();
	});
	$(".update-about").click(function(e){
		$(".about-me").hide();
		$(".update-about").hide();
		$(".edit-about").show();
		
	});
	var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight){
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    } 
  });
}

});
 
 var app = angular.module('myApp',[]);
 app.controller('myCtrl',function($scope,$http){
	 
	 $scope.showMe = false;
    $scope.toggle_fun = function() {
        $scope.showMe = !$scope.showMe;
    }
	
	 $scope.id 				= '<?php echo $row->id;  ?>';
	 $scope.name 			= '<?php echo $row->name;  ?>';
	 $scope.profession 		= '<?php echo $row->profession;  ?>';
	 $scope.dob 			= '<?php echo $row->dob;  ?>';
	 $scope.institute 		= '<?php echo $row->institute_name;  ?>';
	 $scope.gender 			= '<?php echo $row->gender;  ?>';
	 $scope.location 		= '<?php echo $location->location_name;  ?>';
	 $scope.about_me 		= "<?php echo $row->about;  ?>";
	 $scope.limits 			= <?php echo $page_detail->limits; ?>;
	
	get_images();
	
	function get_images(){
			$http({
				method: 'POST',
				url: '<?php echo $base_url; ?>/get-images',
				headers:	{'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}
			}).then(function(response){
				$scope.gallery = response.data.gallary;
				$scope.img_limit = response.data.gallary.length;
				//console.log($scope.img_limit);
			})
	}
	
	 $scope.get_tags = function()
	 {
		 if($scope.interest.length > 2 ){
			var data = $.param({
				tag					:$scope.interest,
			});
			$http({
				method: 'POST',
				url: '<?php echo $base_url; ?>/get-tags',
				data: data,
				headers:	{'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}
			}).then(function(response){
				$scope.tags_list = response.data.tags;
				if(response.data.tags.length >0){
					$(".tags_list").show();
				}else{
				$(".tags_list").hide(); 
			}
			})
		 }else{
			$(".tags_list").hide(); 
		}
	 }
	 $scope.add_interest = function(x){
		 var data = $.param({
				tag_id		:x.id,
			});
			$http({
				method: 'POST',
				url: '<?php echo $base_url; ?>/add-interest',
				data: data,
				headers:	{'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}
			}).then(function(response){
				//console.log(response.data);
				$(".tags_list").hide(); 
			
			});
			$scope.show = false;
			$scope.interest = '';
			$scope.tags_list = '';
	 }
	 
	 $scope.edit_function = function(){
		 
		 $(".edit").hide();
		 $(".edit-btn").show();
		 $('.text').show();
		 
		 var data = $.param({
			id					:$scope.id,
			name				:$scope.name,
			profession			:$scope.profession,
			dob 				:$scope.dob,
			institute_name		:$scope.institute,
			gender				:$scope.gender
		});
		$http({
			method: 'POST',
			url: '<?php echo $base_url; ?>/update-profile',
			data: data,
			headers:	{'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}
		}).then(function(response){
			
		$("body").append('<div class="alert alert-success alert-dismissable" style="position:fixed;  top:100px;  right:30px;  z-index:9999;" >'+
		'<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>'+
		'<strong>Success!</strong> Update Successfully </div>');
					
				  
		  // setTimeout(function(){ 
		  //location.href= '<?php echo $base_url; ?>/logout';
		  // }, 7000);

		});
	 }
	 
	 $scope.about_update = function(){
		//console.log($scope.about_me);
		var data = $.param({
			id					:$scope.id,
			about				:$scope.about_me,
		});
		$http({
			method: 'POST',
			url: '<?php echo $base_url; ?>/update-about',
			data: data,
			headers:	{'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}
		}).then(function(response){
			$("body").append('<div class="alert alert-success alert-dismissable" style="position:fixed;  top:100px;  right:30px;  z-index:9999;" >'+
		'<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>'+
		'<strong>Success!</strong> Update Successfully </div>');
		
		$(".about-me").show();
		$(".update-about").show();
		$(".edit-about").hide();
		
		});
	 }
	 
	 $scope.delete_image = function(x)
	 {
		 var data = $.param({
				id		:x.id,
				image 	:x.image,
			});
		 $http({
				method: 'POST',
				url: '<?php echo $base_url; ?>/delete-image',
				data:data,
				headers:	{'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}
			}).then(function(response){
				$("body").append('<div class="alert alert-success alert-dismissable" style="position:fixed;  top:100px;  right:30px;  z-index:9999;" >'+
				'<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>'+
				'<strong>Success!</strong> '+response.data.success+' </div>');
				get_images();
			})
	 }
	 
 });
 
 </script>
 
 <script>
 

      function initAutocomplete() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: <?php echo $location->latitude; ?>, lng: <?php echo $location->longitute; ?>},
          zoom: 14,
          mapTypeId: 'roadmap'
        });

        // Create the search box and link it to the UI element.
        var input = document.getElementById('pac-input');
        var searchBox = new google.maps.places.SearchBox(input);
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

        // Bias the SearchBox results towards current map's viewport.
        map.addListener('bounds_changed', function() {
          searchBox.setBounds(map.getBounds());
        });

        var markers = [];
        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.
        searchBox.addListener('places_changed', function() {
          var places = searchBox.getPlaces();

          if (places.length == 0) {
            return;
          }

          // Clear out the old markers.
          markers.forEach(function(marker) {
            marker.setMap(null);
          });
          markers = [];

          // For each place, get the icon, name and location.
          var bounds = new google.maps.LatLngBounds();
          places.forEach(function(place) {
		  
		  
		  
		  
		  if (!place.geometry) {
              console.log("Returned place contains no geometry");
              return;
            }
			
            var icon = {
              url: place.icon,
              size: new google.maps.Size(71, 71),
              origin: new google.maps.Point(0, 0),
              anchor: new google.maps.Point(17, 34),
              scaledSize: new google.maps.Size(25, 25)
            };

            // Create a marker for each place.
            markers.push(new google.maps.Marker({
              map: map,
              icon: icon,
              title: place.name,
              position: place.geometry.location
            }));

            if (place.geometry.viewport) {
              // Only geocodes have viewport.
              bounds.union(place.geometry.viewport);
            } else {
              bounds.extend(place.geometry.location);
            }
			
			var latitude = place.geometry.location.lat();
          var longitude = place.geometry.location.lng();
		  var place_name = place.name;
		  
		  var data = { lat : latitude, log: longitude, name: place_name}
		  submit_location(data); 
		  
          });
          map.fitBounds(bounds);
        });
      }
	function submit_location(data){
		
		$.ajax({
        	type:'POST',
        	url:'<?php echo $base_url; ?>/location-update',
        	data:data,
        	dataType:'JSON',
        	success: function(e) {
				$('.edit-location').hide();
				$(".location-text ").show();
				$('.edit-location-btn').show();
				
				  
				
		$("body").append('<div class="alert alert-success alert-dismissable" style="position:fixed;  top:100px;  right:30px;  z-index:9999;" >'+
		'<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>'+
		'<strong>Success!</strong>Location Update Successfully </div>');
					
				  
				  //setTimeout(function(){ 
				  //location.href= '<?php echo $base_url; ?>/logout';
				 // }, 5000);
			}
		});
	}

  
var myConfig = {
 	type: 'line', 
 	title: {
 	  text: 'Weekly Graph'
 	},
 	plot: {
 	  tooltip: {
 	    visible: true
 	  },
 	  cursor: 'hand'
 	},
 	crosshairX:{},
 	scaleX: {
    markers: [],
    offsetEnd:75,
 	  labels: ['Mon', 'Tues', 'Wed', 'Thur', 'Fri', 'Sat', 'Sun'] //["Jan","Feb","March","April","May","June","July","Aug"]
 	},
	series: [
		{
			values: <?php echo $follow; ?>,
			text: 'Followers'
		},
		{
			values: <?php echo $visitor;?>,
			text: 'Viewers'
		}
	]
};
zingchart.render({
    id: 'myChart',
    data: myConfig
  });
</script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDuIcpoZQHtK2RoVgmx0cRuiUAl0svWPes&libraries=places&callback=initAutocomplete"
         async defer></script>
		 
 <script scr="<?php echo $base_url; ?>/assets/js/common_script.js"></script>
</body>
</html>
