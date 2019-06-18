<!DOCTYPE html>
<html lang="en">
<head>
  <title>BMS Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container" style="padding-top:100px">
  <div class="row">
	<div class="col-lg-6 col-xs-offset-3">
  <form class="form" action="BMS-login" method="post">
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Email:</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
		<span class="text-danger form_error_email" style="display:none;"></span>
      </div>
    </div>
	<br/>
	<br/>
	<br/>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Password:</label>
      <div class="col-sm-10">          
        <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
		<span class="text-danger form_error_password" style="display:none;"></span>
      </div>
    </div>
    <br/>
    <br/>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Submit</button>
      </div>
    </div>
  </form>
</div>
</div>
</div>
<script src="<?php echo base_url(); ?>assets/js/common_script.js"></script>
</body>
</html>