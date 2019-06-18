<!DOCTYPE html>
<html>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- Tell the browser to be responsive to screen width -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

<meta charset="utf-8">
<?php 
if(isset($page)){
	
if($page == "home"){
	echo "<title>".$seo->site_title."</title>";
?>
	<meta name="<?php echo 'description';?>" content="<?php echo $seo->site_description; ?>">  
	<meta name="<?php echo 'keywords';?>" content="<?php echo $seo->site_keyword; ?>"> 
	<?php if($seo->site_follow == 'true'){?>
	<META NAME="ROBOTS" CONTENT="NOFOLLOW"> <?php }?> 
	
	<?php if($seo->site_index == 'true'){?>
	<META NAME="ROBOTS" CONTENT="NOINDEX"> <?php }?> 
<?php }
else if($page == "question"){
	
	echo "<title>".str_replace('%question_title%',$question->question,$seo->question_title)."</title>";
	 
	?>
	<?php if($seo->question_follow == 'true'){?>
	<META NAME="ROBOTS" CONTENT="NOFOLLOW"> <?php }?> 
	
	<?php if($seo->question_index == 'true'){?>
	<META NAME="ROBOTS" CONTENT="NOINDEX"> <?php }?> 
<?php
}
}else{
	echo "<title>Questions</title>";
}
 ?>

	
<?php $base_url = $this->config->item('base_url'); ?>

<link rel="stylesheet" href="<?php echo $base_url; ?>/assets/css/comman_style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-tagsinput/1.3.6/jquery.tagsinput.min.css">
<link href='https://fonts.googleapis.com/css?family=Merienda One' rel='stylesheet'>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.css" />
<script src="https://cdn.ckeditor.com/ckeditor5/1.0.0-alpha.2/classic/ckeditor.js"></script>

</head>
<body>

<div id="mySidenav" class="sidenav">

 <h3 class="text-danger" style="color: #dc3545 !important;position: absolute;top: 0px;left: 25px;font-style: italic;
font-family: initial;">
<img src="<?php echo $base_url; ?>/assets/images/avatar.png" width="30px" height="30px" > QUESTIONS</h3>
<?php 
if($this->session->userdata('loggedIn') == true){  $row = $this->session->userdata('userData'); ?>

 <center><br/>
 <img src="<?php echo $base_url; ?>/assets/images/<?php echo $row['data']->image  ?>" width="100px" height="100px" class="img-responsive img-circle" style="border-radius:50%;border:5px solid #fd3768;"><h5 style="color:#fd376d;"> <?php echo $row['data']->name;  ?></h5> <br/>
 </center>
 
<?php }else{ ?>
 <center><br/>
 <img src="<?php echo $base_url; ?>/assets/images/avatar.png" width="100px" height="100px" class="img-responsive img-circle" style="border-radius:50%;border:5px solid #fd3768;"><h5 style="color:#fd376d;"> Hello! User</h5> <br/>
 </center>
<?php } ?>


  <ul style="padding-left:0px !important;">
  <a href="<?php echo $base_url; ?>/questions" style="text-decoration:none"><li><i class="fa fa-question-circle"></i> &nbsp; Questions</li></a>
  <a href="<?php echo $base_url; ?>/tags" style="text-decoration:none"><li><i class="fa fa-tags"></i> &nbsp; Tags</li></a>
  <a href="<?php echo $base_url; ?>/users" style="text-decoration:none"><li><i class="fa fa-users"></i> &nbsp; Users</li></a>
  <!--a href="#" style="text-decoration:none"><li><i class="fa fa-trophy"></i> &nbsp; Badges</li></a-->
  <a href="<?php echo $base_url; ?>/category" style="text-decoration:none"><li><i class="fa fa-th-list"></i> &nbsp; Categories </li></a>
  
  </ul>
  
</div>

<div id="main">
 
 <nav class="navbar navbar-default" style="margin-bottom:0px;">
	  <a class="navbar-brand" href="javascript:" onclick="myFunction(this)" style="font-size:10px;cursor:pointer">
				<div class="bar1"></div>
				<div class="bar2"></div>
				<div class="bar3"></div>
	  </a>
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
</button>
  <div class="collapse navbar-collapse" id="myNavbar">
    <ul class="nav navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="<?php echo $base_url; ?>/home">Home</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="<?php echo $base_url; ?>/ask-question">Ask Question</a>
      </li>
	  </ul>
	 <ul class="nav navbar-nav navbar-right">
	 <?php if($this->session->userdata('loggedIn') == false){ ?>
      <li class="nav-item"><a class="nav-link" href="<?php echo $base_url; ?>/sign-up"><i class="fa fa-user"></i> Sign Up</a></li>
      <li class="nav-item"><a class="nav-link" href="<?php echo $base_url; ?>/login"><i class="fa fa-key"></i> Login</a></li> 
	 <?php }else{ ?>
      <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" data-toggle="dropdown" href="javascript:"><i class="fa fa-user"></i> Profile</a>
	  <ul class="dropdown-menu">
            <li><center><img src="<?php echo $base_url; ?>/assets/images/<?php echo $row['data']->image; ?>" width="50px" height="50px" class="img-circle" style="border:2px solid #fd3768;"></center></li>
			<li><a href="<?php echo $base_url; ?>/profile" class="text-center" style="color:#fd3768;"><?php echo $row['data']->name; ?></a></li>
           
            <li><a href="<?php echo $base_url; ?>/profile"><?php echo $row['data']->email; ?></a></li>
            <li class="divider"></li>
			<?php if($this->session->userdata('business') == true){ ?>
			<li><a href="<?php echo $base_url; ?>/page/<?php echo $row['data']->name; ?>"> &nbsp; Page : <?php echo $row['data']->name; ?></a></li>
            <li class="divider"></li> 
			<?php } ?>
			<li><a href="<?php echo $base_url; ?>/logout" class="text-center text-danger">Log Out</a></li>
          </ul>
	   </li>
	 <?php } ?>
    </ul>
  </div>  
</nav>