<?php $base_url = $this->config->item('base_url');  ?>
<div ng-app="myApp" ng-controller="myCtrl">
<div class="row" >
	<?php print_R($data); ?>
<div><!-- search questions and answer -->

<div class="row plan-page-first" style="background-image:url(assets/images/feasibility-of-business-idea.jpg);">
	<div class="col-lg-6" ></div>
	<div class="col-lg-6" style="padding-top:15%;padding-right:10%">
		<span class="pull-right"><h1 style="color:white;">Select Your Plan</h1>
		<p  style="color:white;">Plan give You an Limit of Your Page</p>
		</span>
	</div>
</div>
<div class="row plan-page-first text-center" style="padding-top:5%;">
	<div class="container">
	<h3>Activate Page</h3>
  <p><em>Plans provide page activation with limit</em></p>
  <br/>
	<div class="row">
		<div class="col-lg-4 plan-box">
				<div class="list-group">
				  <a href="javascript:" class="list-group-item list-group-item-success">Starter</a>
				  <a href="#" class="list-group-item"><center><span class="text-center" style="color:#FD3768;font-size:50px !important;"><strong>$30</strong></span>/week</center></a>
				  <a href="#" class="list-group-item text-center"><strong style="font-size:25px">3</strong> Time Day Main</a>
				  <a href="#" class="list-group-item text-center"><strong style="font-size:25px">5</strong> Time Day Side</a>
				  <a href="#" class="list-group-item text-center"><strong style="font-size:25px">3</strong> Time Day Bottom</a>
				  
				  <a href="#" class="list-group-item text-center"><center><button type="button" class="btn btn-default w3-btn" >Choose Plan!</button></center></a>
				</div> 
		</div>
		<div class="col-lg-4 plan-box">
				<div class="list-group">
				  <a href="javascript:" class="list-group-item list-group-item-info">Recommended</a>
				  <a href="#" class="list-group-item"><center><span class="text-center" style="color:#FD3768;font-size:50px !important;"><strong>$90</strong></span>/Month</center></a>
				    <a href="#" class="list-group-item text-center"><strong style="font-size:25px">3</strong> Time Day Main</a>
				  <a href="#" class="list-group-item text-center"><strong style="font-size:25px">5</strong> Time Day Side</a>
				  <a href="#" class="list-group-item text-center"><strong style="font-size:25px">3</strong> Time Day Bottom</a>
				  
				  <a href="#" class="list-group-item text-center"><center><button type="button" class="btn btn-default w3-btn" >Choose Plan!</button></center></a>
				</div> 
		</div>
		<div class="col-lg-4 plan-box">
				<div class="list-group">
				  <a href="javascript:" class="list-group-item list-group-item-danger">Premium</a>
				  <a href="#" class="list-group-item"><center><span class="text-center" style="color:#FD3768;font-size:50px !important;"><strong>$250</strong></span>/Year</center></a>
				   <a href="#" class="list-group-item text-center"><strong style="font-size:25px">3</strong> Time Day Main</a>
				  <a href="#" class="list-group-item text-center"><strong style="font-size:25px">5</strong> Time Day Side</a>
				  <a href="#" class="list-group-item text-center"><strong style="font-size:25px">3</strong> Time Day Bottom</a>
				  
				  <a href="#" class="list-group-item text-center"><center><button type="button" class="btn btn-default w3-btn" >Choose Plan!</button></center></a>
				</div> 
		</div>
	</div>
	</div>
</div>


<!-- Container (The Band Section) -->
<div id="band" class="container text-center" style=" padding-bottom:10%;">
  <h3 class="text-center">Page</h3>
  <p><em>Advertising Medium</em></p>
  <p>Any type of Institute, Collage and School can advertising in this page. it will help to show your banner and you can help the student for solving question and answers in medium of this page</p>
  <br>
  <div class="row">
    <div class="col-sm-4">
      <p class="text-center"><strong>Name</strong></p><br>
      <a href="#demo" data-toggle="collapse">
        <img src="bandmember.jpg" class="img-circle person" alt="Random Name" width="255" height="255">
      </a>
      <div id="demo" class="collapse">
        <p>Guitarist and Lead Vocalist</p>
        <p>Loves long walks on the beach</p>
        <p>Member since 1988</p>
      </div>
    </div>
    <div class="col-sm-4">
      <p class="text-center"><strong>Name</strong></p><br>
      <a href="#demo2" data-toggle="collapse">
        <img src="bandmember.jpg" class="img-circle person" alt="Random Name" width="255" height="255">
      </a>
      <div id="demo2" class="collapse">
        <p>Drummer</p>
        <p>Loves drummin'</p>
        <p>Member since 1988</p>
      </div>
    </div>
    <div class="col-sm-4">
      <p class="text-center"><strong>Name</strong></p><br>
      <a href="#demo3" data-toggle="collapse">
        <img src="bandmember.jpg" class="img-circle person" alt="Random Name" width="255" height="255">
      </a>
      <div id="demo3" class="collapse">
        <p>Bass player</p>
        <p>Loves math</p>
        <p>Member since 2005</p>
      </div>
    </div>
  </div>
</div>


</div><!-- main -->

</div>
</div>
<script>
var app = angular.module('myApp', []);

app.controller('myCtrl', function($scope, $http) {
	


 
});
</script>

<script>
$('.count').each(function () {
    $(this).prop('Counter',0).animate({
        Counter: $(this).text()
    }, {
        duration: 4000,
        easing: 'swing',
        step: function (now) {
            $(this).text(Math.ceil(now));
        }
    });
});
</script> 
</body>
</html> 
