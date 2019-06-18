
<html lang="en">
<head>
  <title>Login Here!</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   <link rel="stylesheet" href="assets/css/comman_style.css">
<meta name="google-signin-client_id" content=" 365968683891-d753kt8k9965stjsk1l2q0qedc73rlbi.apps.googleusercontent.com ">
    
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  body{
  background: white; /* For browsers that do not support gradients */
  background: linear-gradient(140deg, #2e3458, #fd376d); 
  }
 </style>
</head>
<body>

<div class="container" >
  <div class="row ">
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-offset-1 form_area1"
	style="background-image: url(assets/images/login_bg.jpg);">
	<h1 class="h1" style="color:white;text-shadow: 0px 0px 0px black;font-family: Lucida Sans Unicode;font-size: 50px;"> <strong>Hello<br/> <span style="font-size:70px !important;">World.</span></strong></h1>
	</div><!-- first column -->
    <div class="col-lg-4 col-md-4 col-sm-12   form_area2">
	<h2 class="h2"><strong>Login Here!</strong></h2>
	<p class="text-muted">Don't have an account? &nbsp; <a href="sign-up" class="text-primary">Create your Account,</a> &nbsp; It takes <br/>less then a minutes</p>
	<br/>
		<form class="form" action="sign-in" method="post">
		  <div class="form-group">
			<input type="email" class="form_input" name="email" placeholder="Enter Your Email">
			<span class="text-danger form_error_email" style="display:none;"></span>
		  </div>
		  <br/>
		  <div class="form-group">
			<input type="password" class="form_input" name="password" placeholder="Enter Your Password">
			<span class="text-danger form_error_password" style="display:none;"></span>
		  </div>
		  <div class="checkbox">
			<a href="<?php echo base_url();?>contact"> <span class="text-muted">Leave a Message</span></a>
		  </div>
		  
		  <input type="submit" class="btn btn-default w3-btn " value="Submit">
		</form> 
		<center><span class="text-muted"> Login with Social Media sites</span></center>
		<div class="login-or">
        <hr class="hr-or">
        <span class="span-or">or</span>
		</div>
		
		<div class="col-lg-6">
		<center><a href="javascript:void(0);" onclick="fbLogin()" id="fbLink" class='btn btn-default w3-btn 'style="width: 130px !important;padding-top:10px">Facebook Sign In </a></center>
		</div>
		<div class="col-lg-6">
		<center><a href="<?php echo $GoogleLogin; ?>" class="btn btn-default w3-btn " style="padding-top:10px;width: 130px !important;">Google Sign In</a></center>
		</div>
	</div><!-- second form column -->
  </div>
</div>
    <div id="fb-root"></div>
<script type="text/javascript">
	/////////////////// fb login //////////////////
window.fbAsyncInit = function() {
    // FB JavaScript SDK configuration and setup
    FB.init({
      appId      : '296744947499858', // FB App ID
      cookie     : true,  // enable cookies to allow the server to access the session
      xfbml      : true,  // parse social plugins on this page
      version    : 'v2.8' // use graph api version 2.8
    });
    
    // Check whether the user already logged in
    FB.getLoginStatus(function(response) {
        if (response.status === 'connected') {
            //display user data
           
        }
    });
};

// Load the JavaScript SDK asynchronously
(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

// Facebook login with JavaScript SDK
function fbLogin() {
    FB.login(function (response) {
        if (response.authResponse) {
            // Get and display the user profile data
            getFbUserData();
        } else {
            document.getElementById('status').innerHTML = 'User cancelled login or did not fully authorize.';
        }
    }, {scope: 'email'});
}

// Fetch the user profile data from facebook
function getFbUserData(){
    FB.api('/me', {locale: 'en_US', fields: 'id,first_name,last_name,email,link,gender,locale,picture'},
    function (response) {
        var  data = {'id':response.id,'name':response.first_name,'lastname':response.last_name, 'email':response.email,'gender':response.gender,'image':response.picture.data.url}
        fblogin(data);
        //document.getElementById('fbLink').setAttribute("onclick","fbLogout()");
        //document.getElementById('fbLink').innerHTML = 'Logout from Facebook';
       
    });
    function fblogin(data)
    {	console.log(data);
    	$.ajax({
            url:'<?php echo base_url().'fb-login'; ?>',
            type:'post',
			data:data,
            success:function(response){
            	 console.log(response);
				 if(response.success != '')
                {	location.reload();
                }else{
                	alert("Error");
                }
            }
        })
    }
} 
</script>
<script src="<?php echo base_url(); ?>assets/js/common_script.js"></script>
</body>
</html>