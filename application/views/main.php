<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular-route.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>/assets/css/bms_style.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-tagsinput/1.3.6/jquery.tagsinput.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery-jvectormap-2.0.3.css" type="text/css" media="screen"/>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/map/jvectormap-2.0.3.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/map/jvectormap-world-mill.js"></script>	
<script src="https://cdn.ckeditor.com/4.8.0/standard/ckeditor.js"></script>
</head>
<body ng-app="myApp">

<base href="<?php echo base_url(); ?>BMS/">
<div id="mySidenav" class="sidenav" style=" border-right: 1px solid rgba(0, 0, 0, 0.15); box-shadow: black -5px 0px 14px;">

 <h3 class="text-danger" style="color: #dc3545 !important;position: absolute;top: 0px;left: 25px;font-style: italic;
font-family: initial;">
<img src="<?php echo base_url(); ?>/assets/images/avatar.png" width="30px" height="30px" > QUESTIONS</h3>

 <center><br/>
 <img src="<?php echo base_url(); ?>/assets/images/avatar.png" width="100px" height="100px" class="img-responsive img-circle" style="border-radius:50%;border:5px solid #fd3768;"><h5 style="color:#fd376d;"> <?php //echo $row['data']->name;  ?></h5>
<h3 style="color:#fd3768;">Hello! User</h3>
 <br/>
 
 </center>
 


  <ul style="padding-left:0px !important;">
  <a href="questions" style="text-decoration:none"><li><i class="fa fa-question-circle"></i> &nbsp; Questions</li></a>
  <a href="answers" style="text-decoration:none"><li><i class="fa fa-buysellads"></i> &nbsp; Answers</li></a>
  <a href="contacts" style="text-decoration:none"><li><i class="fa fa-id-badge"></i> &nbsp; Contact</li></a>
  <a href="users" style="text-decoration:none"><li><i class="fa fa-users"></i> &nbsp; Users</li></a>
  <a href="tags" style="text-decoration:none"><li><i class="fa fa-tags"></i> &nbsp; Tags</li></a>
  <a href="category" style="text-decoration:none"><li><i class="fa fa-th-list"></i> &nbsp; Category </li></a>
  <!--a href="ads" style="text-decoration:none"><li><i class="fa fa-slideshare "></i> &nbsp; Ads</li></a-->
  <a href="seo" style="text-decoration:none"><li><i class="fa fa-globe "></i> &nbsp; SEO</li></a>
  </ul>
  
</div>

<div id="main">
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="javascript:" onclick="myFunction(this)" style="font-size:10px;cursor:pointer">
				<div class="bar1"></div>
				<div class="bar2"></div>
				<div class="bar3"></div>
	  </a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="home">Home</a></li>
        <!--li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="javascript:">Page 1 <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="javascript:">Page 1-1</a></li>
            <li><a href="javascript:">Page 1-2</a></li>
            <li><a href="javascript:">Page 1-3</a></li>
          </ul>
        </li>
        <li><a href="#!banana">Page 2</a></li>
        <li><a href="#!tomato">Page 3</a></li-->
      </ul>
      <ul class="nav navbar-nav navbar-right">
	 <?php if($this->session->userdata('BMS_loggedIn') == true){
		$row = $this->session->userdata('BMS_userData');
	 ?>
     <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" data-toggle="dropdown" href="javascript:"><i class="fa fa-user"></i> Profile</a>
	  <ul class="dropdown-menu">
           <li><a href="javascript:" class="text-center" style="color:#fd3768;"><?php echo $row['data']->username; ?></a></li>
           
            <li><a href="javascript:"><?php echo $row['data']->email; ?></a></li>
            <li class="divider"></li>
			<li><a href="<?php echo base_url(); ?>BMS-logout" class="text-center text-danger">Log Out</a></li>
          </ul>
	   </li>
	 <?php } ?>
    </ul>
    </div>
  </div>
</nav>

<div ng-view></div>

</div>
<div id="overlay" >
  <div class="loader"></div>
</div>
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
<script>var BASE_URL = "<?php echo base_url(); ?>";</script>
<script src="<?php echo base_url();?>/assets/App_js/bms_script.js"></script>
</body>
</html>
