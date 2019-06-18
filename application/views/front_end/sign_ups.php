<html lang="en"><head>
    <meta charset="utf-8">
    <meta name="robots" content="noindex, nofollow">

    <title>Create An Account</title>
     <meta name="viewport" content="width=device-width, initial-scale=1">
    
	<style type="text/css">
     
    </style>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/comman_style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
</head>
<body>
	<div class="container">
  <div class="row">

    <div class="main">
	<div class="panel panel-default">
  <div class="panel-body">
      <h3>Please Sign Up</h3>
      
      
      <form  class="form" action="register" method="post">
        <div class="form-group">
          <label for="inputName">Name</label>
          <input class="form-control" id="inputName" name="name" type="text" placeholder="Enter Your Name">
		  <span class="text-danger form_error_name" style="display:none;"></span>
        </div>
		<div class="form-group">
          <label for="inputUsernameEmail">Email</label>
          <input class="form-control" id="inputUsernameEmail" name="email" type="text" placeholder="Enter Your Email">
		  <span class="text-danger form_error_email" style="display:none;"></span>
        </div>
        <div class="form-group">
         <label for="inputPassword">Password</label>
          <input class="form-control" id="inputPassword" name="password" type="password" placeholder="Create Your Password">
		 <span class="text-danger form_error_password" style="display:none;"></span>
        </div>
		<div class="form-group">
         <label for="confirm_Password">Confirm Password</label>
          <input class="form-control" id="confirm_Password" name="confirm_password" type="password" placeholder="Create Confirm Password">
		  <span class="text-danger form_error_confirm_password" style="display:none;"></span>
        </div>
		<div class="form-group">
         <label for="inputProfession">Select Your Profession</label>
          <select class="form-control" id="inputProfession" name="profession" title="Select Your Profession">
			<option value="student">Student</option>
			<option value="teacher">Teacher</option>
			<option value="other">Other</option>
		  </select>
		  <span class="text-danger form_error_profession" style="display:none;"></span>
        </div>
       
        <input type="submit" class="btn btn btn-primary w3-button-color" value="Sign Up">
         
      </form>
	  
	  
	  <div class="login-or">
        <hr class="hr-or">
        <span class="span-or">or</span>
      </div>
	 
	 <center><a class="text-info" href="login">Already Have An Account?</a></center>
    </div>
    
  </div>
  </div>
  </div>
</div>

<script src="assets/js/common_script.js"></script>
  



</body></html>