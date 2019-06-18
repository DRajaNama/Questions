<html lang="en"><head>
    <meta charset="utf-8">
    <meta name="robots" content="noindex, nofollow">

    <title>about.me Login Style - Bootsnipp.com</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    
	<script src="https://apis.google.com/js/platform.js" async defer></script>
	<meta name="google-signin-client_id" content=" 365968683891-d753kt8k9965stjsk1l2q0qedc73rlbi.apps.googleusercontent.com ">
     <link rel="stylesheet" href="assets/css/comman_style.css">

 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
</head>
<body>
	<div class="container">
  <div class="row">

    <div class="main">
	<div class="panel panel-default">
  <div class="panel-body">
      <h3>Please Log In, or <a href="#">Sign Up</a></h3>
      <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6">
        <center><a href="javascript:void(0);" onclick="fbLogin()" id="fbLink" class='btn btn-primary btn-block  'style="color:white;width: 130px !important;">Facebook Sign In </a></center>
        </div>
		
	
        <center><div class="col-xs-6 col-sm-6 col-md-6">
          <a href="<?php echo $GoogleLogin; ?>" class="btn btn-danger " style="color:white;width: 130px !important;">Google Sign In</a>
		</div></center>
      </div>
      <div class="login-or">
        <hr class="hr-or">
        <span class="span-or">or</span>
      </div>

      <form role="form"  class="form" action="sign-in" method="post">
        <div class="form-group">
          <label for="inputUsernameEmail">Email</label>
          <input class="form-control" id="inputUsernameEmail" name="email" type="text" placeholder="Enter your Email">
		  <span class="text-danger form_error_email" style="display:none;"></span>
        </div>
        <div class="form-group">
         
          <label for="inputPassword">Password</label>
          <input class="form-control" id="inputPassword" name="password" type="password" placeholder="Enter your Password">
		  <span class="text-danger form_error_password" style="display:none;"></span>
        </div>
        <div class="checkbox pull-left">
          <label>
            <input type="checkbox">
            Remember me </label>
        </div><br/><br/>
        <input type="submit" class="btn btn-primary w3-button-color" value="Log In">
		<a class="pull-right" href="#">Forgot password?</a>
      </form>
	 
	  <div class="login-or">
        <hr class="hr-or">
        <span class="span-or">or</span>
      </div>
	  
	 <center> <a href="sign-up" class="text-info">Create An Account if not Have?</a></center>
    
    </div>
    
  </div>
  </div>
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
            	alert(response);
                if(response==1)
                {
                	location.reload();
                }else{
                	alert("Error");
                }
            }
        })
    }
} 
</script>
<script src="assets/js/common_script.js"></script>
</body></html>