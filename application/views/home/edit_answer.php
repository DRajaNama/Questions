<?php $base_url = $this->config->item('base_url'); ?>
<div class="container" style="margin-top: 40px !important;" ng-app="myApp" ng-controller="myCtrl">
	
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
					<i class="fa fa-angle-up fa-2x"></i>
					<h4 class="text-center"> 0</h4>
					<i class="fa fa-angle-down fa-2x"></i>
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
				<b class="text-capitalize"><?php echo $question->profession; ?></b> :<span  style="color:#fd3768;"><?php echo $question->name; ?></span> <span class="label label-primary">Level <?php echo $question->level; ?></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				 &nbsp;&nbsp;&nbsp;
				</span>
				</a>
				 
				<span class="pull-right">
					<p class="text-muted">Asked on <?php echo substr($question->created,0,-8); ?> at <?php echo substr($question->created,10,10); ?></p>
				</span>
				</div>
			</div>
			<hr/>
	
			<div class="row">
				<div class="col-lg-2">
					<h4 class="pull-left">Answer  </h4>
					<br/><br/>
					<center><i class="fa fa-angle-up fa-2x"></i>
					<h4 class="text-center">1</h4>
					<i class="fa fa-angle-down fa-2x"></i>
					<br/>
					<br/>
					<?php if($answer->accepted != 'no'){?>
					<i class="fa fa-check fa-2x text-success"></i>
					<?php } ?>
					</center>
				</div>
				<div class="col-lg-10" style="background: #f9d8d833;padding: 15px;border-left: 5px solid #fd3568">
					<p><?php echo $answer->answer; ?></p>
				</div>
				
				<div class="col-lg-12">
				<br/>
				<span class="pull-left">
				<a href="<?php echo $base_url."/user/".$answer->user_id; ?>" style="text-decoration:none;">
				<img src="<?php echo $base_url; ?>/assets/images/<?php echo $answer->image; ?>" width="30px" height="30px" >
				<b class="text-capitalize"><?php echo $answer->profession; ?></b> :<span  style="color:#fd3768;"><?php echo $answer->name; ?></span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				 &nbsp;&nbsp;&nbsp;</a>
				</span>
				<span class="pull-right">
					<p class="text-primary">Answered on <?php echo substr($answer->created,0,-8); ?> at <?php echo substr($answer->created,10,10); ?></p>
				</span>
				</div>
			</div>
			<hr/>
		
			<div class="row" style="margin-top:50px;">
				<div class="col-lg-2">
				<?php if($this->session->userdata('loggedIn') == true){ ?>
				<!--img src="<?php echo $base_url; ?>/assets/images/side_banner.gifs" width="100px" height="460px"> <br/-->
				<?php } ?>
				</div>
				<div class="col-lg-10">
				
				<h4 class="text-center">Submit Your Answer</h4><br/>
				 <?php if($this->session->userdata('loggedIn') === true){  $row = $this->session->userdata('userData');?>
				<form class="form" action="<?php echo $base_url; ?>/answer" method="post">
						<input type="hidden" class="form-control" name="answer_id" value="<?php echo $answer->id; ?>">
					<div class="form-group">
					<input type="text" class="form-control" name="name" disabled value="<?php echo $row['data']->name; ?>">
						<span class="text-danger form_error form_error_name" style="display:none;"></span>
					</div>
					<div class="form-group">
						<label for="editor">Your Answer</label>
						<textarea type="text" row="7" class="form-control" id="editor" name="answer" placeholder="Enter question description and Solution Error" ><?php echo $answer->answer; ?></textarea>
						<span class="text-danger form_error form_error_answer" style="display:none;"></span>
					</div>
					<input type="submit" class="btn btn-default w3-btn " value="Edit">
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
				<tr><th>Votes : </th><td><?php echo $votes; ?></td></tr>
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
 
</body>
</html> 
