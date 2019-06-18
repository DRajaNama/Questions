<!DOCTYPE html>
<html lang="en">
<head>
	<title>Dashboard</title>
</head>
<body>
<div class="container" style="margin-top:50px;margin-bottom:50px">
	<div class="row">
		<div class="col-lg-4">
			<div class=" left-box text-center">
			<div class="row">
				<div class="col-lg-4" style="background-color:#fd3768; color:white;padding:20px;">
				<h1><i class="fa fa-quora "></i></h1>
				</div>
				<div class="col-lg-8" style="padding:20px;">
				<h2>Questions : <?php echo $states->questions; ?></h2>
				</div>
			</div>
			</div>
		</div>
		<div class="col-lg-4">
			<div class=" left-box text-center">
			<div class="row">
				<div class="col-lg-4" style="background-color:#fd3768; color:white;padding:20px;">
				<h1><i class="fa fa-buysellads "></i></h1>
				</div>
				<div class="col-lg-8" style="padding:20px;">
				<h2>Answers : <?php echo $states->answers; ?></h2>
				</div>
			</div>
			</div>
		</div>
		<div class="col-lg-4">
			<div class=" left-box text-center">
			<div class="row">
				<div class="col-lg-4" style="background-color:#fd3768; color:white;padding:20px;">
				<h1><i class="fa fa-users "></i></h1>
				</div>
				<div class="col-lg-8" style="padding:20px;">
				<h2>Users : <?php echo $states->users; ?></h2>
				</div>
			</div>
			</div>
		</div>
		<div class="col-lg-4">
			<div class=" left-box text-center">
			<div class="row">
				<div class="col-lg-4" style="background-color:#fd3768; color:white;padding:20px;">
				<h1><i class="fa fa-eye "></i></h1>
				</div>
				<div class="col-lg-8" style="padding:20px;">
				<h2>Visitor : <?php echo $states->visitor; ?></h2>
				</div>
			</div>
			</div>
		</div>
		<div class="col-lg-4">
			<div class=" left-box text-center">
			<div class="row">
				<div class="col-lg-4" style="background-color:#fd3768; color:white;padding:20px;">
				<h1><i class="fa fa-id-badge  "></i></h1>
				</div>
				<div class="col-lg-8" style="padding:20px;">
				<h2>Contacts : <?php echo $states->contacts; ?></h2>
				</div>
			</div>
			</div>
		</div>
		<div class="col-lg-4">
			<div class=" left-box text-center">
			<div class="row">
				<div class="col-lg-4" style="background-color:#fd3768; color:white;padding:20px;">
				<h1><i class="fa fa-slideshare  "></i></h1>
				</div>
				<div class="col-lg-8" style="padding:20px;">
				<h2>Ads : <?php echo $states->adv; ?></h2>
				</div>
			</div>
			</div>
		</div>
	</div>
	<div class="row">
	<div class="col-lg-12 left-box top-border">
	<h2 class="text-center">Site State</h2>
		<iframe src="<?php echo base_url(); ?>BMS/dashboard" width="100%" height="500px" style="border: 0px !important;"></iframe> 
	</div>
	
	<div class="col-lg-12 left-box top-border" >
	<h2 class="text-center">Every Month Visitor</h2>
		<iframe src="<?php echo base_url(); ?>BMS/graph" width="100%" height="350px" style="border: 0px !important;"></iframe> 
	</div>
	</div>
</div>

</body>
</html>
