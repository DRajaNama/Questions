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
			<br/><br/><center>
			<span class="name-text" ><?php echo $row->name;  ?></span>
			<br/><br/>
			<h4 class="text-muted"><strong><span style="color:#fd376d !important;" class="text-capitalize" ><?php echo $row->profession;  ?></span></strong></h4>
			<h5> Followers : <?php print_r($follow_status['follower']); ?></h5></center>
			<?php if($states['follow']!="yes"){ ?>
			<a href="javascript:" class="btn w3-btn form-control follow_btn" ng-click="follow(<?php echo $row->id;  ?>)"><i class="fa fa-user-plus" style="font-size:18px !important;margin-top:4px;"></i> &nbsp; Follow</a>
			<?php }else{ ?>
			<a href="javascript:" class="btn w3-btn form-control follow_btn"><i class="fa fa-check" style="font-size:18px !important;margin-top:4px;"></i> &nbsp; Following</a>
			<?php }?>
			</div>
			 <br/>
			
			<div class="left-box">
			<h5>Interested Topic</h5>
				<br/>
				<span >
				<?php $tag = explode(',',$row->tags);
					foreach($tag as $key=>$value){?>
				<span class="badge"><?php echo $value; ?></span>
					<?php } ?>
				</span>
				

			</div>
			<br/>
			<?php $que = (int)$states['questions']; if($que <= 10){ $per_q = $que/10*100; 
			}elseif($que>=10){	$per_q = $que;	}  ?>
			<div class="left-box">
			<span>Questions</span> <span class="pull-right text-success"><?php echo $per_q."%"; ?></span> 
			<div class="container_div">
			  <div class="skills" style="width: <?php echo $per_q."%"; ?>; height:5px; background-color: #4CAF50;"></div>
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
			<div class="left-box" style="padding:35px;">
			<h1 class="name-text">About Me</h1>  <br/>
			<p class="text-muted text-justify about-me"><strong>{{about_me}}</strong></p>
			
			<br/>
			<hr/>
			<br/>
			<div class="row">
				<div class="col-lg-6">
			
				<div id="map" style="width:100%;height:500px"></div>
				</div>
				<div class="col-lg-6">
				<h4 class="text-center">Personal Information</h4>
				<br/>
					<table class="table">
						<tr><th>Name</th>
						<td><span class="text">{{name}}</span></td></tr>
						<tr><th>Profession</th>
						<td><span class="text">{{profession}} </span></td></tr>
						<tr><th>Date of Birth</th>
						<td><span class="text">{{dob}} </span></td></tr>
						<tr><th>Gender</th>
						<td><span class="text">{{gender}} </span></td></tr>
						<tr><th>Institute Name</th>
						<td><span class="text">{{institute}}</span></td></tr>
						<tr><th>Location</th>
						<td><span class="location-text">{{location}} </span></i></td></tr>
						<tr><th>Email</th>
						<td><?php echo $row->email;  ?></td></tr>
						
					</table>
					
				</div>
			</div>
			</div>
			<br/>
			
			
			
		</div>	<!-- col-lg-8-->
	</div><!-- row-->
<?php $location = json_decode($row->location);  ?>
<script>
$(document).ready(function(){
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
	 
	 $scope.id 				= '<?php echo $row->id;  ?>';
	 $scope.name 			= '<?php echo $row->name;  ?>';
	 $scope.profession 		= '<?php echo $row->profession;  ?>';
	 $scope.dob 			= '<?php echo $row->dob;  ?>';
	 $scope.institute 		= '<?php echo $row->institute_name;  ?>';
	 $scope.gender 			= '<?php echo $row->gender;  ?>';
	 $scope.location 		= '<?php echo $location->location_name;  ?>';
	 $scope.about_me 		= "<?php echo $row->about;  ?>";
	
	 
	 var data = $.param({
			viewer_ip:"<?php echo $_SERVER['REMOTE_ADDR']; ?>",
			user_id  :$scope.id
		});
		$http({
			method: 'POST',
			url: '<?php echo $base_url; ?>/user-viewer',
			data: data,
			headers:	{'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}
		}).then(function(response){
			
		});
		
	$scope.follow = function(id){
		var data = $.param({
			following:id,
		});
		$http({
			method: 'POST',
			url: '<?php echo $base_url; ?>/follow',
			data: data,
			headers:	{'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}
		}).then(function(response){
			if(response.data.success){
			location.reload();
			}else{
			$("body").append('<div class="alert alert-danger alert-dismissable" style="position:fixed;  top:100px;  right:30px;  z-index:9999;" >'+'<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>'+
			'<strong>Warning!</strong> '+response.data.Warning+' </div>');
			}
		});
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
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDuIcpoZQHtK2RoVgmx0cRuiUAl0svWPes&libraries=places&callback=initAutocomplete"
         async defer></script>
		 
<script>
function myFunction(x) {
	var nav = document.getElementById("mySidenav").clientWidth;;
	if(nav == 0){
		//alert('open');
    document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
	}else{
		//alert('close');
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";
	}
    x.classList.toggle("change");
}
</script>
  <script scr="<?php echo $base_url; ?>/assets/js/common_script.js"></script>
</body>
</html>
