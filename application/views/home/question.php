<?php $base_url = $this->config->item('base_url'); $row = $this->session->userdata('userData'); ?>
<div class="container" style="margin-top: 40px !important;" ng-app="myApp" ng-controller="myCtrl">
	<style>
	.fa-2x:focus {
    color:#5dabed !important;
	}
	</style>
	<!-- question row--->
	<div class="row" style="padding: 15px !important;margin-bottom:50px;background: #d2d2d21a;">
		<div class="col-lg-8">
			<h2><?php  echo $question->question; ?></h2>
			<hr/>	
			<div class="row">
				<div class="col-lg-2">
					<h4 class="pull-left">Question</h4>
					<br/><br/>
					<center>
					<?php if($this->session->userdata('loggedIn') == true){ ?>
					<i class="fa fa-angle-up fa-2x" ng-click="votes(<?php echo $question->id; ?>,<?php echo $row['data']->id; ?>,'question','up')"></i>
					<h4 class="text-center"><?php print_r($question_votes); ?></h4>
					<i class="fa fa-angle-down fa-2x" ng-click="votes(<?php echo $question->id; ?>,<?php echo $row['data']->id; ?>,'question','down')"></i>
					<?php }else{ ?>
					 <i class="fa fa-angle-up fa-2x" ng-click="login_alert()"></i>
					<h4 class="text-center"> 0</h4>
					<i class="fa fa-angle-down fa-2x" ng-click="login_alert()"></i>
					<?php } ?>
					</center>
				</div>
				<div class="col-lg-10" style="background: #f9d8d833;padding: 15px;border-left: 5px solid #2e3458">
					<p><?php echo json_decode($question->description); ?></p>
					<br/>
					<br/>
					<?php foreach(explode(',',$question->tags) as $key =>$value){  ?>
					 <span>
					 <span class="label label-default" ><?php echo $value; ?></span> 
					 </span>
					<?php } ?>
				</div>
				
				<div class="col-lg-12">
				<br/>
				<span class="pull-left">
				<a href="<?php echo $base_url."/user/".$question->creator_id; ?>" style="text-decoration:none;">
				
				<img src="<?php echo $base_url; ?>/assets/images/<?php echo $question->image; ?>" width="30px" height="30px" >
				<b class="text-capitalize"><?php echo $question->profession; ?></b> :<span  style="color:#fd3768;"><?php echo $question->name; ?></span> <span class="label label-primary">Level <?php echo $question->level; ?></span> <span class="label label-warning">Category :  <?php echo $question->category; ?></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				 &nbsp;&nbsp;&nbsp;
				</span>
				</a>
				 
				<span class="pull-right">
					<p class="text-muted">Asked on <?php echo substr($question->created,0,-8); ?> at <?php echo substr($question->created,10,10); ?></p>
				</span>
				</div>
			</div>
			<hr/>
			<?php if($answers != 'false'){ ?>
			<?php  $i = 1; foreach($answers as $key=>$value){  ?>
			<div class="row">
				<div class="col-lg-2">
					<h4 class="pull-left">Answer  </h4>
					<br/><br/>
					<center>
					<?php  if($this->session->userdata('loggedIn') == true){ ?>
					<i class="fa fa-angle-up fa-2x" ng-click="votes(<?php echo $value->id; ?>,<?php echo $row['data']->id; ?>,'answer','up')"></i>
					<h4 class="text-center"><?php echo $value->votes; ?></h4>
					<i class="fa fa-angle-down fa-2x" ng-click="votes(<?php echo $question->id; ?>,<?php echo $row['data']->id; ?>,'answer','down')"></i>
					<?php }else{ ?>
					 <i class="fa fa-angle-up fa-2x" ng-click="login_alert()"></i>
					<h4 class="text-center"> 0</h4>
					<i class="fa fa-angle-down fa-2x" ng-click="login_alert()"></i>
					<?php } ?>
					</center>
					<br/>
					<br/>
					<?php if($value->accepted != 'no'){?>
					<i class="fa fa-check fa-2x text-success" ng-click="change_approved(<?php echo $value->id; ?>)"></i>
					<?php }else{ if(isset($row['data']->id) === $question->creator_id)	{
					?>
					<a href="javascript:"><i class="fa fa-check fa-2x text-muted" ng-click="change_approved(<?php echo $value->id; ?>)"></i></a>
					<?php } } ?>
					</center>
				</div>
				<div class="col-lg-10" style="background: #f9d8d833;padding: 15px;border-left: 5px solid #fd3568">
					<p><?php echo $value->answer; ?></p>
				</div>
				
				<div class="col-lg-12">
				<br/>
				<span class="pull-left">
				<a href="<?php echo $base_url."/user/".$value->user_id; ?>" style="text-decoration:none;">
				<img src="<?php echo $base_url; ?>/assets/images/<?php echo $value->image; ?>" width="30px" height="30px" >
				<b class="text-capitalize"><?php echo $value->profession; //!= 'business' ? $value->profession : "Page"; ?></b>  : <span  style="color:#fd3768;"><?php echo $value->name; ?></span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				 &nbsp;&nbsp;&nbsp;</a>
				</span>
				<span class="pull-right">
					<p class="text-primary">Answered on <?php echo substr($value->created,0,-8); ?> at <?php echo substr($value->created,10,10); ?></p>
				</span>
				</div>
			</div>
			<hr/>
			<?php  } } ?>
			<div class="row" style="margin-top:50px;">
				<div class="col-lg-2">
				<?php if($this->session->userdata('loggedIn') == true){ ?>
				<!--img src="<?php echo $base_url; ?>/assets/images/side_banner.gifs" width="100px" height="460px"> <br/-->
				<?php } ?>
				</div>
				<div class="col-lg-10">
				
				<h4 class="text-center">Submit Your Answer</h4><br/>
				 <?php if($this->session->userdata('loggedIn') === true){  ?>
				<form class="form" action="<?php echo $base_url; ?>/answer" method="post">
						<input type="hidden" class="form-control" name="question_id" value="<?php echo $question->id; ?>">
						<input type="hidden" class="form-control" name="user_id" value="<?php echo $row['data']->id; ?>">
					<div class="form-group">
					<input type="text" class="form-control" name="name" disabled value="<?php echo $row['data']->name; ?>">
						<span class="text-danger form_error form_error_name" style="display:none;"></span>
					</div>
					<div class="form-group">
						<label for="editor">Your Answer</label>
						<textarea type="text" row="7" class="form-control" id="editor" name="answer" placeholder="Enter question description and Solution Error" ></textarea>
						<span class="text-danger form_error form_error_answer" style="display:none;"></span>
					</div>
					<input type="submit" class="btn btn-default w3-btn " value="Submit">
					</form>
					<br/>
					 <?php }else{ ?>
						<div class="jumbotron">
						  <center><h4>Login First For Submit Your Answer </h4>
						  <br/>
						  <a href="<?php echo $base_url; ?>/login" class="btn btn-default w3-btn" >Login Here!</a>
						  </div>
						  
					 <?php } ?>
						<p class="text-danger">when you posting your answer, you agree to the privacy policy and terms of service.</p></center>
				</div>
				<img src="<?php echo $base_url; ?>/assets/images/row_banner.jpgs" width="100%" height="150px">
			</div>
		</div>
		<div class="col-lg-4" >
			<table class="table">
				<tr><th>Answers : </th><td><?php echo $question->total_no_answer; ?></td></tr>
				<tr><th>Viewer : </th><td><?php echo $question->viewers; ?></td></tr>
				<tr><th>Votes : </th><td><?php print_r($question_votes); ?></td></tr>
			</table>
			
			<br/>
			<img src="" width="350px" height="300px">
			<br/>
			<br/>
			<br/>
			
			<h4>Top Viewed Question</h4>
			<br/>
			<ul class="list-group">
			  <li class="list-group-item " ng-repeat="question in all_question">
				<div class="row">
					<div class="col-lg-2">
						<span class="label label-success">{{question.viewers}}</span>
					</div>
					<div class="col-lg-10">
					<a href="{{question.id}}" class="text-primary">{{question.question}}</a>
					</div>
				</div>
			  </li>
			</ul> 
		</div>
	</div> <!-- question row-->
	
	
	
	
	
</div>

</div><!-- main -->

<script>
var app = angular.module("myApp",[]);
app.controller("myCtrl",function($scope,$http){
	
	$scope.change_approved = function(x){
		var data = $.param({id:x});
		$http({
				method: 'POST',
				url: '<?php echo $base_url; ?>/question-approved',
				data:data,
				headers:	{'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}
		}).then(function(response){
			location.reload();
		});
	}
	
	
	var data = $.param({
			viewer_ip:"<?php echo $_SERVER['REMOTE_ADDR']; ?>",
			question_id:<?php echo $question->id; ?>
		});
		$http({
			method: 'POST',
			url: '<?php echo $base_url; ?>/get-viewer',
			data: data,
			headers:	{'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}
		}).then(function(response){
			
		});
		
		$http.get('<?php echo $base_url; ?>/top-question').then(function(response) {
			$scope.all_question = response.data;
			console.log($scope.all_question);
		});
	
	$scope.votes = function(q_id,u_id,medium,type){
		var data = $.param({
			user_id 	: u_id,
			medium_id	: q_id,
			medium 		: medium,
			type		: type,
		});
		$http({
			method: 'POST',
			url: '<?php echo $base_url; ?>/votes',
			data: data,
			headers:	{'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}
		}).then(function(response){
			
			angular.forEach(response.data, function(value, key){
				flashshow(value,key);
			})
			
			setTimeout(function(){ location.reload(); }, 5000);
		});
		
	}
	
	$scope.login_alert = function(){
		var data = ' Please Login First For Votes'; 
		var type = 'danger'; 
		flashshow(data,type);
		
	}
	
	function flashshow(data,type){
		$("body").append('<div class="alert alert-'+type+' alert-dismissable" style="position:fixed;  top:100px;  right:30px;  z-index:9999;" ><a href="#" class="close" data-dismiss="alert" aria-label="close">×</a> '+data+'</div>');
		
		setTimeout(function(){ $(".alert").fadeOut(3000); }, 5000);
		} 
		
	
});
</script>



<script>
			ClassicEditor
				.create( document.querySelector( '#editor' ) )
				.then( editor => {
					//console.log( editor );
				} )
				.catch( error => {
					console.error( error );
				} );
		</script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-tagsinput/1.3.6/jquery.tagsinput.min.js"></script>
  <script src="<?php echo $base_url; ?>/assets/js/common_script.js"></script>
</body>
</html> 
