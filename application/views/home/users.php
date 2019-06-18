<?php $base_url = $this->config->item('base_url');  ?>
<div ng-app="myApp" ng-controller="myCtrl">
<div class="container" style="margin-top: 40px !important;">
	
	<div><!-- search questions and answer -->
	
	<div class="row">
		<div class="col-lg-4 col-xs-offset-4">
			<div class="input-group">
			  <input type="text" class="form-control" placeholder="Search for..."  ng-model="searchKey"  aria-label="Search for...">
			  <span class="input-group-btn">
				<button class="btn btn-secondary w3-btn" type="button" ng-click="getFilterData()">Search!</button>
			  </span>
			</div>
		</div>
	</div>
<div class="row">
	
	<div class="col-lg-9">

		<div class="row">
			<div class="col-lg-3 user-box" ng-repeat="user in all_user">
				<a href="<?php echo $base_url;?>/user/{{user.id}}" style="text-decoration:none;"><img src="assets/images/{{user.image}}" width="60px" height="60px" > &nbsp; <span class="text-capitalize"> {{user.profession}}</span> <br/><br/>
				<strong class="text-tag">{{user.name}}</strong><br/><br/>
				
				<span class="">Location: {{user.location}}</span><br/> 
				<span class="text-muted">Intrested:</span>
				<span ng-repeat="tag in user.tags">
				<span class="label label-default" >#{{tag}}</span> 
				</span></a>
			</div>
		</div>
	</div>
	<div class="col-lg-3">
	
		
		
		<img src="assets/images/side_banner.gif" width="250px" height="600px">
	</div>
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

</div><!-- main -->

</div>
</div>
<div id="overlay" >
  <div class="loader"></div>
</div>
<script>
var app = angular.module('myApp', []);

app.filter('offset', function() {
  return function(input, start) {
    start = parseInt(start, 10);
    return input.slice(start);
  };
});

app.controller('myCtrl', function($scope, $http) {
	
	$scope.all_user=[];
	$scope.limit = 12; 
	$scope.page  = 1;
	$scope.searchKey = '';
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
				url: '<?php echo $base_url; ?>/user-list',
				data: data,
				headers:	{'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'},
			}).then(function(response){
				//console.log(response.data);
				if(response.data != '')
				{
					$("#overlay").css('display','none');		
				}
				$scope.all_user 	= response.data.data;
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
