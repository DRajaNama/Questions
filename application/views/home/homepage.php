<?php $base_url = $this->config->item('base_url');  ?>
<div ng-app="myApp" ng-controller="myCtrl">
<div class="container" style="margin-top: 40px !important;">
	<div class="row">
		<div class="col-lg-4 text-center" style="background-color: #f44336;color:white;height:130px;padding-top:15px;border: 5px solid white;">
		<center>
			<i class="fa fa-users fa-3x"></i><br/>
			<h2>Total Users : <span class="count"><?php echo $records['total_user']; ?></span></h2>
		</center>
		</div>
		<div class="col-lg-4" style="background-color: #2196F3; color:white;height:130px;padding-top:15px;border: 5px solid white;">
		<center>
			<i class="fa fa-question-circle fa-3x"></i><br/>
			<h2>Total Questions : <span class="count"><?php echo $records['total_question']; ?></span></h2>
		</center>
		</div>
		<div class="col-lg-4" style="background-color: #009688 !important;color:white;height:130px;padding-top:15px;border: 5px solid white;">
		<center>
			<i class="fa fa-check fa-3x"></i><br/>
			<h2>Total Answers : <span class="count"><?php echo $records['total_answer']; ?></span></h2>
		</center>
		</div>
	</div><!--top column row-->
	<br/>
	<br/>
	<div class="row" style="border: 2px solid #e3e3e3;padding: 15px !important;border-top: 5px solid #fd3768;">
		<div class="col-lg-4">
			<h5 style="color:#fd3768"><strong>Search New Question's Answers?</strong></h5>
            <p class="text-muted"><small>We'll notify you and promise never to spam.</small></p>
		</div>
		<div class="col-lg-2" style="padding-top:20px">
			<div class="input-group">
			  <select  class="form-control"  ng-model="filter" ng-change="getFilterData()" width="100%" style="height:40px !important">
				<option value="id">BY ID</option>
				<option value="question">BY Question</option>
				<option value="created">BY Creaeted</option>
				<option value="category">BY Category</option>
			  </select>
			</div>
		</div>
		<div class="col-lg-6" style="padding-top:20px">
			<div class="input-group">
			  <input type="text" class="form-control" placeholder="Search for..."  ng-model="searchKey"  aria-label="Search for...">
			  <span class="input-group-btn">
				<button class="btn btn-default w3-btn" type="button" ng-click="getFilterData()">Search!</button>
			  </span>
			</div>
		</div>
	</div><!-- search row-->
	<br/>
	<br/>
	<div><!-- search questions and answer -->
<div class="row">
	
	<div class="col-lg-10 col-sm-12">

	<ul class="list list-unstyled" ng-repeat="question in all_question" >
	<!--ul class="list list-unstyled" ng-repeat="question in all_question | filter:searchKey | offset: currentPage*limit | limitTo: limit" -->
	<li>
	<!-- question row--->
	
	<div class="row" style="border: 2px solid #e3e3e3;padding: 15px !important;">
		<div class="col-lg-9">
			<a href="question/{{question.id}}" style="text-decoration:none;">
			<h5><strong>{{question.question}}</strong></h5>
			<p class="text-muted"><small> {{question.description}} </small></p>
			</a>
			<a href="user/{{question.creator_id}}" style="text-decoration:none;">
			<img src="assets/images/{{question.image}}" width="30px" height="30px" >
			<b class="text-capitalize">{{question.profession}}</b> :<span  style="color:#fd3768;">{{question.name}}</span> <span class="label label-primary">Level {{question.level}}</span> &nbsp; 
			<span class="label label-warning">Category : {{question.category}}</span></a>  
			 <br/><center>
			 <a href="question/{{question.id}}" style="text-decoration:none;">
			 <span ng-repeat="tag in question.tags">
			 <span class="label label-success" >#{{tag}}</span> 
			 </span>
			 </center>
						
		</div>
		<div class="col-lg-3" style="float:right">
		
			<ul class="list-inline circle-list pull-right">
				<li><div class="circle" >{{question.total_no_answer}}</div><center> answers</center></li>
				<li><div class="circle">{{question.voters}}</div> <center> votes</center></li>
				<li><div class="circle">{{question.viewers}}</div> <center> views</center></li>
			</ul>
			
			<span class="text-muted pull-right"> <br/>Asked on {{question.created}}</span></a>
		</div>
	</div> <!-- question row-->
	
	</li>
	</ul>
	
	<div class="row" style="color:#fd3768;height:200px;padding-top:100px;" ng-hide="recordsTotal >'0'">
	 <h3 class="text-center" style="color:#fd3768">Record Not Found</h3>
	</div>

	
	
	<center>
		<ul class="pagination" ng-if="recordsTotal > limit">
		  <li ng-if="prevPageDisabled()">
		  <a href="javascript:" class="" ng-click="prevPage()">Prev</a>
		  </li>
		  <li class="" ng-if="n>=0" ng-repeat="n in range()" ng-class="{active: n == currentPage}" ng-click="setPage(n)">
			<a href="javascript:">{{n+1}}</a>
		  </li>
		  <li ng-if="nextPageDisabled()">
			<a class="" ng-click="nextPage()" href="javascript:">Next</a>
		  </li>
		  <li class=" pagination-label"> 
			&nbsp; Showing {{limit*currentPage+1}} to {{(limit*currentPage+limit) >  recordsTotal ? recordsTotal : (limit*currentPage+limit) }} of {{recordsTotal}} entries 
		  </li>
		</ul>
	</center>
	</div>
	<div class="col-lg-2 hidden-xs hidden-sm">
		<img src="assets/images/side_banner.gif" width="170px" height="600px">
	</div>
	</div>
	
	<div><!-- search Questions and answer-->
</div>

</div><!-- main -->
</div>
</div>
<div id="overlay" >
  <div class="loader"></div>
</div>
<script>
var app = angular.module('myApp', []);

app.controller('myCtrl', function($scope, $http) {
	
	$scope.all_question=[];
	$scope.limit = 5; 
	$scope.page  = 1;
	$scope.searchKey = '<?php if(isset($_GET['searchKey'])){  echo $_GET['searchKey'];}else{ echo '';} ?>';
	$scope.filter = 'id';
	var pagination_btn_range = 3;
	
	get_questions_list($scope.limit,$scope.page,$scope.searchKey,$scope.filter);
	function get_questions_list(limit, page,search,filter) {
		$("#overlay").css('display','block');		
		var data = $.param({
				limit		:limit,
				page		:page,
				search		:search,
				filter		:filter,
			});
			
			$http({
				method: 'POST',
				url: '<?php echo $base_url; ?>/get-question',
				data: data,
				headers:	{'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'},
			}).then(function(response){
				//console.log(response.data);
				if(response.data != ''){
					$("#overlay").css('display','none');
				}
				$scope.all_question = response.data.data;
				$scope.recordsTotal = response.data.recordsTotal;
				$scope.page 		= response.data.page_num;
				$scope.total_page 	= response.data.total_page;
			});
	} //function

 $scope.range = function() {
    
    var ret = [];
    var start;

    start = $scope.currentPage;
    if ( start > $scope.pageCount()-pagination_btn_range ) {
      start = $scope.pageCount()-pagination_btn_range+1;
    }
	
    for (var i=start; i<start+pagination_btn_range; i++) {
		ret.push(i);
    }
	
    return ret;
  };
$scope.currentPage = 0;

 $scope.pageCount = function() {
	return Math.ceil($scope.recordsTotal/$scope.limit)-1;
  };
// set Page Range
$scope.setPage = function(n) {
    $scope.currentPage = n;
	get_questions_list($scope.limit,$scope.currentPage+1,$scope.searchKey,$scope.filter);
  };
  //Next btn
$scope.nextPage = function() {
    if ($scope.currentPage < $scope.pageCount()) {
	   $scope.currentPage++;
	   get_questions_list($scope.limit,$scope.currentPage+1,$scope.searchKey,$scope.filter);
    }
};

$scope.nextPageDisabled = function() {
    return $scope.currentPage === $scope.pageCount() ? "" : "true";
  };
  //prev btn
  $scope.prevPageDisabled = function() {
    return $scope.currentPage === 0 ? "" : "true";
  };
  $scope.prevPage = function() {
    if ($scope.currentPage > 0) {
      $scope.currentPage--;
	  get_questions_list($scope.limit,$scope.currentPage+1,$scope.searchKey,$scope.filter);
    }
  }; 
  
  
  $scope.getFilterData = function()
  {	
  
	var search = $scope.searchKey;
	get_questions_list($scope.limit,$scope.currentPage+1,$scope.searchKey,$scope.filter);
	
  }
});
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
</body>
</html> 
