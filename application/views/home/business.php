<?php $base_url = $this->config->item('base_url');  ?>
<div ng-app="myApp" ng-controller="myCtrl">
<div class="row">
	<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">

      <div class="item active">
        <img src="<?php  echo $base_url; ?>/assets/image/la.jpg" alt="Los Angeles" class="img-responsive" style="width:100%;height:500px !important;">
        <div class="carousel-caption">
          <h3>Los Angeles</h3>
          <p>LA is always so much fun!</p>
        </div>
      </div>

      <div class="item">
        <img src="<?php  echo $base_url; ?>/assets/image/chicago.jpg" alt="Chicago" class="img-responsive" style="width:100%;height:500px !important;">
        <div class="carousel-caption">
          <h3>Chicago</h3>
          <p>Thank you, Chicago!</p>
        </div>
      </div>
    
      <div class="item">
        <img src="<?php  echo $base_url; ?>/assets/image/ny.jpg" alt="New York" class="img-responsive" style="width:100%;height:500px !important;">
        <div class="carousel-caption">
          <h3>New York</h3>
          <p>We love the Big Apple!</p>
        </div>
      </div>
  
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
  <!--- slider--->

</div><!-- main -->

<div class="container" style="padding-top:50px !important;">
	<div class="row">
		<div class="col-lg-4 plan-box">
				<div class="list-group">
				  <a href="javascript:" class="list-group-item list-group-item-success">Starter</a>
				  <a href="#" class="list-group-item"><center><span class="text-center" style="color:#FD3768;font-size:50px !important;"><strong>$30</strong></span>/week</center></a>
				  <a href="#" class="list-group-item text-center"><strong style="font-size:25px">3</strong> Time Day Main</a>
				  <a href="#" class="list-group-item text-center"><strong style="font-size:25px">5</strong> Time Day Side</a>
				  <a href="#" class="list-group-item text-center"><strong style="font-size:25px">3</strong> Time Day Bottom</a>
				  
				  <!--a href="#" class="list-group-item text-center"><center><button type="button" class="btn btn-default w3-btn" data-toggle="modal" data-target="#myModal">Choose Plan!</button></center></a-->
				</div> 
		</div>
		<div class="col-lg-4 plan-box">
				<div class="list-group">
				  <a href="javascript:" class="list-group-item list-group-item-info">Recommended</a>
				  <a href="#" class="list-group-item"><center><span class="text-center" style="color:#FD3768;font-size:50px !important;"><strong>$90</strong></span>/Month</center></a>
				    <a href="#" class="list-group-item text-center"><strong style="font-size:25px">3</strong> Time Day Main</a>
				  <a href="#" class="list-group-item text-center"><strong style="font-size:25px">5</strong> Time Day Side</a>
				  <a href="#" class="list-group-item text-center"><strong style="font-size:25px">3</strong> Time Day Bottom</a>
				  
				  <!--a href="#" class="list-group-item text-center"><center><button type="button" class="btn btn-default w3-btn" data-toggle="modal" data-target="#myModal">Choose Plan!</button></center></a-->
				</div> 
		</div>
		<div class="col-lg-4 plan-box">
				<div class="list-group">
				  <a href="javascript:" class="list-group-item list-group-item-danger">Premium</a>
				  <a href="#" class="list-group-item"><center><span class="text-center" style="color:#FD3768;font-size:50px !important;"><strong>$250</strong></span>/Year</center></a>
				   <a href="#" class="list-group-item text-center"><strong style="font-size:25px">3</strong> Time Day Main</a>
				  <a href="#" class="list-group-item text-center"><strong style="font-size:25px">5</strong> Time Day Side</a>
				  <a href="#" class="list-group-item text-center"><strong style="font-size:25px">3</strong> Time Day Bottom</a>
				  
				  <!--a href="#" class="list-group-item text-center"><center><button type="button" class="btn btn-default w3-btn" data-toggle="modal" data-target="#myModal">Choose Plan!</button></center></a-->
				</div> 
		</div>
	</div>
</div>
<br/>
<br/>
<br/>
<hr class="theme-hr" />
<div class="row" >
	<div class="container" style="height:500px;padding-top:50px;margin-bottom:100px;">
	<h1 class="text-center theme-text2">Business Process</h1>
	<br/>
	<center><hr width="100px" style="border-top: 3px solid #fd3768"/></center>
	<br/>
	<br/>
	<div class="row">
		<div class="col-lg-4"><a href="javascript:" style="text-decoration:none;" data-toggle="modal" data-target="#myModal"> 
			<center>
			<i class="fa fa-file-text fa-4x theme-text2"></i>
			<br/>
			<br/>
			<h5 class="theme-text">Registration</h5>
			<p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
			</center></a>
		</div>
		<div class="col-lg-4"><a href="javascript:" style="text-decoration:none;">
			<center>
			<i class="fa fa-money fa-4x theme-text2"></i>
			<br/>
			<br/>
			<h5 class="theme-text">Buy Plan</h5>
			<p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
			</center></a>
		</div>
		<div class="col-lg-4"><a href="javascript:" style="text-decoration:none;">
			<center>
			<i class="fa fa-cogs fa-4x theme-text2"></i>
			<br/>
			<br/>
			<h5 class="theme-text">Manage Page</h5>
			<p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
			</center></a>
		</div>
	</div>
</div>
</div>

<!-- Trigger the modal with a button -->

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
			<h1>Business Account</h1>
		</div>
        <div class="modal-body">
		<ul class="nav nav-tabs">
			  <li class="active"><a data-toggle="tab" href="#home">Login </a></li>
			  <li><a data-toggle="tab" href="#menu1">Sign Up</a></li>
			</ul>
		<div class="tab-content">
		  <div id="home" class="tab-pane fade in active">
		  <br/>
					<form class="form" action="<?php echo $base_url; ?>/business-login" method="post">
						<div class="form-group">
						  <label for="email">Email:</label>
						  <input type="email" class="form-control" name="email" placeholder="Enter email">
						  <span class="text-danger form_error_email" style="display:none;"></span>
						</div>
						<div class="form-group">
						  <label for="pwd">Password:</label>
						  <input type="Password" class="form-control" name="password" placeholder="Enter password">
						  <span class="text-danger form_error_password" style="display:none;"></span>
						</div>
						<input type="submit" class="btn btn-default w3-btn" value="submit">
					</form>
		  </div>
		  <div id="menu1" class="tab-pane fade">
			<form class="form" action="<?php echo $base_url; ?>/business-sign-up" method="post">
						<div class="form-group">
						  <label for="email">Email:</label>
						  <input type="email" class="form-control" name="email" placeholder="Enter email">
						  <input type="hidden" class="form-control" name="profession" value="business">
						  <span class="text-danger form_error_email" style="display:none;"></span>
						</div>
						<div class="form-group">
						  <label for="name">Page Name:</label>
						  <input type="text" class="form-control" name="name" placeholder="Enter Name">
						  <span class="text-danger form_error_name" style="display:none;"></span>
						</div>
						<div class="form-group">
						  <label for="mobile">Mobile:</label>
						  <input type="text" class="form-control" name="mobile" placeholder="Enter Mobile">
						  <span class="text-danger form_error_mobile style="display:none;"></span>
						</div>
						<div class="form-group">
						  <label for="password">Password:</label>
						  <input type="password" class="form-control" name="password" placeholder="Enter password">
						  <span class="text-danger form_error_password" style="display:none;"></span>
						</div>
						<button type="submit" class="btn btn-default w3-btn">Submit</button>
					</form>
		  </div>
		  
		</div>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-default w3-btn" data-dismiss="modal">Close</button>
		</div>
      </div>
      
    </div>
  </div>
  
  

</div>
<script>
var app = angular.module('myApp', []);
app.controller('myCtrl', function($scope, $http) {
	
});
</script>
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
<script src="<?php echo base_url(); ?>assets/js/common_script.js"></script>
</body>
</html> 
