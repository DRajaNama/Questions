<?php $base_url = $this->config->item('base_url'); ?>
<style>

* {
  box-sizing: border-box;
}

img {
  vertical-align: middle;
}

/* Position the image container (needed to position the left and right arrows) */
.container {
  position: relative;
}

/* Hide the images by default */
.mySlides {
  display: none;
}

/* Add a pointer when hovering over the thumbnail images */
.cursor {
  cursor: pointer;
}

/* Next & previous buttons */
.prev,
.next {
  cursor: pointer;
  position: absolute;
  top: 40%;
  width: auto;
  padding: 16px;
  margin-top: -50px;
  color: white;
  font-weight: bold;
  font-size: 20px;
  border-radius: 0 3px 3px 0;
  user-select: none;
  -webkit-user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover,
.next:hover {
  background-color: rgba(0, 0, 0, 0.8);
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* Container for image text */
.caption-container {
  text-align: left;
background-color: #222;
padding: 20px 10px 10px 60px;
color: white;
position: absolute;
width: 97.4%;
opacity: 0.7;
font-size: 20px;
}

.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Six columns side by side */
.column {
  float: left;
  width: 16.66%;
  border: 5px solid white;
}

/* Add a transparency effect for thumnbail images */
.demo {
  opacity: 0.6;
}



.bounce {
  animation: shake 0.5s;
  animation-iteration-count: 2s;
}

@keyframes shake {
  0% { transform: translate(1px, 1px) rotate(0deg); }
  10% { transform: translate(-1px, -2px) rotate(-1deg); }
  20% { transform: translate(-3px, 0px) rotate(1deg); }
  30% { transform: translate(3px, 2px) rotate(0deg); }
  40% { transform: translate(1px, -1px) rotate(1deg); }
  50% { transform: translate(-1px, 2px) rotate(-1deg); }
  60% { transform: translate(-3px, 1px) rotate(0deg); }
  70% { transform: translate(3px, 1px) rotate(-1deg); }
  80% { transform: translate(-1px, -1px) rotate(1deg); }
  90% { transform: translate(1px, 2px) rotate(0deg); }
  100% { transform: translate(1px, -2px) rotate(-1deg); }
}



.active,
.demo:hover {
  opacity: 1;
}
.contact{
	padding:30px;
}
</style>
<body bgcolor="#eaeaea" ng-app="myApp" ng-controller="myCtrl">


<div class="row" style="background: #060606e6;">

<div class="container">
	
	<div class="caption-container">
		<p id="caption"></p>
	</div>
	
  <div class="mySlides ">
    <div class="numbertext">1 / 6</div>
    <img class="slideLeft" src="<?php echo base_url(); ?>/assets/image/img_woods_wide.jpg" style="width:100%">
  </div>

  <div class="mySlides">
    <div class="numbertext">2 / 6</div>
    <img class="slideLeft" src="<?php echo base_url(); ?>/assets/image/img_fjords_wide.jpg" style="width:100%">
  </div>

  <div class="mySlides">
    <div class="numbertext">3 / 6</div>
    <img class="slideLeft" src="<?php echo base_url(); ?>/assets/image/img_mountains_wide.jpg" style="width:100%">
  </div>
    
  <div class="mySlides">
    <div class="numbertext">4 / 6</div>
    <img class="slideLeft" src="<?php echo base_url(); ?>/assets/image/img_lights_wide.jpg" style="width:100%">
  </div>

  <div class="mySlides">
    <div class="numbertext">5 / 6</div>
    <img class="slideLeft" src="<?php echo base_url(); ?>/assets/image/img_nature_wide.jpg" style="width:100%">
  </div>
    
  <div class="mySlides">
    <div class="numbertext">6 / 6</div>
    <img class="slideLeft" src="<?php echo base_url(); ?>/assets/image/img_snow_wide.jpg" style="width:100%">
  </div>
    
  <a class="prev" onclick="plusSlides(-1)">❮</a>
  <a class="next" onclick="plusSlides(1)">❯</a>

  

  <div class="row" style="margin-right:0px !important; margin-left:0px !important;">
    <div class="column">
      <img class="demo cursor" src="<?php echo base_url(); ?>/assets/image/img_woods.jpg" style="width:100%" onclick="currentSlide(1)" alt="The Woods">
    </div>
    <div class="column">
      <img class="demo cursor" src="<?php echo base_url(); ?>/assets/image/img_fjords.jpg" style="width:100%" onclick="currentSlide(2)" alt="Trolltunga, Norway">
    </div>
    <div class="column">
      <img class="demo cursor" src="<?php echo base_url(); ?>/assets/image/img_mountains.jpg" style="width:100%" onclick="currentSlide(3)" alt="Mountains and fjords">
    </div>
    <div class="column">
      <img class="demo cursor" src="<?php echo base_url(); ?>/assets/image/img_lights.jpg" style="width:100%" onclick="currentSlide(4)" alt="Northern Lights">
    </div>
    <div class="column">
      <img class="demo cursor" src="<?php echo base_url(); ?>/assets/image/img_nature.jpg" style="width:100%" onclick="currentSlide(5)" alt="Nature and sunrise">
    </div>    
    <div class="column">
      <img class="demo cursor" src="<?php echo base_url(); ?>/assets/image/img_snow.jpg" style="width:100%" onclick="currentSlide(6)" alt="Snowy Mountains">
    </div>
  </div>
</div>
</div>
<script>
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  var captionText = document.getElementById("caption");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
      slides[i].className = slides[i].className.replace('bounce','');
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  slides[slideIndex-1].className += " bounce ";
	
  dots[slideIndex-1].className += " active ";
  captionText.innerHTML = dots[slideIndex-1].alt;
  if(n> slides.length){ n = 1; }
  setTimeout(function(){ currentSlide(n+1); },15000);
  
}


</script>
</div>
<div class="container" style="height:500px;padding-top:100px">
	<h1 class="text-center theme-text2">Submit Question Process</h1>
	<br/>
	<center><hr width="50%" style="border: 1px solid #fd3768"/></center>
	<br/>
	<br/>
	<div class="row">
		<div class="col-lg-4"><a href="<?php echo $base_url; ?>/sign-up" style="text-decoration:none;">
			<center>
			<i class="fa fa-file-text fa-4x theme-text2"></i>
			<br/>
			<br/>
			<h5 class="theme-text">Registration</h5>
			<p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
			</center></a>
		</div>
		<div class="col-lg-4"><a href="<?php echo $base_url; ?>/ask-question" style="text-decoration:none;">
			<center>
			<i class="fa fa-pencil-square-o fa-4x theme-text2"></i>
			<br/>
			<br/>
			<h5 class="theme-text">Submit Question</h5>
			<p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
			</center></a>
		</div>
		<div class="col-lg-4"><a href="<?php echo $base_url; ?>/home" style="text-decoration:none;">
			<center>
			<i class="fa fa-list-ul fa-4x theme-text2"></i>
			<br/>
			<br/>
			<h5 class="theme-text">Get Answers</h5>
			<p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
			</center></a>
		</div>
	</div>
</div>
<br/>
<br/>
<hr width="50%" style="border:1px solid #fd3768;"/>
<br/>
<div class="row contact" >
<div class="container">
	<div class="row">
		<div class="col-lg-6 ">
			<div id="map" style="width:100%;height:500px"></div>
		</div>
		<div class="col-lg-6">
			
				<h3>Leave A Message</h3>
				<br/>
				<form  class="form" action="<?php echo $base_url;?>/contact" method="POST">
				<ul class="list list-unstyled">
					<li><h4>Email</h4> <input type="text" class="form-control" name="email" placeholder="Enter Your Email">
					<span class="text-danger form_error form_error_email" style="display:none;"></span>
					</li>
					<li><h4>Name</h4> <input type="text" class="form-control" name="name"placeholder="Enter Your Name"> 
					<span class="text-danger form_error form_error_name" style="display:none;"></span></li>
					<li><h4>Message</h4> <textarea class="form-control" rows="5" name="message" placeholder="Enter Your Message"></textarea>
					<span class="text-danger form_error form_error_message" style="display:none;"></span></li>
					<li><br/><input type="submit" class="form-control w3-btn"></li>
				</ul>
				</form>
		</div>
	</div>
	
</div>
<br/>
</div>			
				
<script>
$(document).ready(function(){
	

});
 
 var app = angular.module('myApp',[]);
 app.controller('myCtrl',function($scope,$http){
	
	
	 
 });
 
 </script>
   <script src="<?php echo $base_url; ?>/assets/js/common_script.js"></script>
 <script>
      function initAutocomplete() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 25.2138156, lng: 75.86475270000005},
          zoom: 14,
          mapTypeId: 'roadmap'
        });
//{"longitute":"75.86475270000005","latitude":"25.2138156","location_name":"Kota"}
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
	
    </script>
 <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDuIcpoZQHtK2RoVgmx0cRuiUAl0svWPes&libraries=places&callback=initAutocomplete" async defer></script>
		 


</body>
</html>
