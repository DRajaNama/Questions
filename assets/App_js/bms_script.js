var app = angular.module("myApp", ["ngRoute"]);
app.config(function($routeProvider,$locationProvider) {
    $routeProvider
    .when("/questions", {
        templateUrl: BASE_URL+'BMS/questions',
        controller: 'QuestionCtrl'
    })
	.when("/answers", {
        templateUrl: BASE_URL+'BMS/answers_list',
        controller: 'AnswersCtrl'
    })
    .when("/question/:id", {
		templateUrl: BASE_URL+'BMS/question-update',
        controller: 'UserCtrl'
    })
	.when("/users", {
        templateUrl: BASE_URL+'BMS/users',
        controller: 'UsersCtrl'
    })
	.when("/user/:id", {
		templateUrl: BASE_URL+'BMS/user-update',
        controller: 'UserCtrl'
    })
	.when("/contacts", {
		templateUrl: BASE_URL+'BMS/contacts',
        controller: 'ContectCtrl'
    })
	.when("/tags", {
		templateUrl: BASE_URL+'BMS/tags',
        controller: 'tagsCtrl'
    })
	.when("/category", {
		templateUrl: BASE_URL+'BMS/category_page',
        controller: 'CategoryCtrl'
    })
	.when("/ads", {
		templateUrl: BASE_URL+'BMS/ads',
        controller: 'AdsCtrl'
    })
	.when("/seo", {
        templateUrl: BASE_URL+'BMS/seo',
        controller: 'SeoCtrl'
    })
	.when("/home",{
        templateUrl: BASE_URL+'BMS/frame',
        controller: 'dashboardCtrl'
    })
    .otherwise({
        templateUrl: BASE_URL+'BMS/frame',
        controller: 'dashboardCtrl'
    });
	$locationProvider.html5Mode(true)
});


app.controller('dashboardCtrl',function($scope,$http){
	
});
app.controller('SeoCtrl',function($scope,$http){
	
		$http({
				method: 'POST',
				url: BASE_URL+'BMS/seo_data',
				headers:	{'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}
		}).then(function(response){
				$scope.site_title  			= response.data.site_title;
				$scope.site_description  	= response.data.site_description;
				$scope.site_keyword  		= response.data.site_keyword;
				$scope.site_index  			= response.data.site_index == 'true' ? true: false;
				$scope.site_follow  		= response.data.site_follow == 'true' ? true: false;
				$scope.question_title  		= response.data.question_title;
				$scope.question_index  		= response.data.question_index == 'true' ? true: false;
				$scope.question_follow  	= response.data.question_follow == 'true' ? true: false;
				$scope.search_page  		= response.data.search_page;
				$scope.notfound_page  		= response.data.notfound_page;
		});
	
	
	$scope.site_seo = function(){
		var data = $.param({
			site_title:$scope.site_title,
			site_description:$scope.site_description,
			site_keyword: $scope.site_keyword,
			site_index: $scope.site_index,
			site_follow:$scope.site_follow
			});
		$http({
				method: 'POST',
				url: BASE_URL+'BMS/site_seo',
				data:data,
				headers:	{'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}
		}).then(function(response){
			flashshow(response.data.success);	
		});
	}
	
		
	$scope.question_seo = function(){
		var data = $.param({
			question_title:$scope.question_title,
			question_index: $scope.question_index,
			question_follow:$scope.question_follow
			});
		$http({
				method: 'POST',
				url: BASE_URL+'BMS/site_seo',
				data:data,
				headers:	{'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}
		}).then(function(response){
				
			flashshow(response.data.success);	
		});
	}
	$scope.page_seo = function(){
		var data = $.param({
			search_page:$scope.search_page,
			notfound_page: $scope.notfound_page,
			});
		$http({
				method: 'POST',
				url: BASE_URL+'BMS/site_seo',
				data:data,
				headers:	{'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}
		}).then(function(response){
				flashshow(response.data.success);	
			
		});
	}
	
	function flashshow(data)
	{
		$("body").append('<div class="alert alert-success alert-dismissable" style="position:fixed;  top:100px;  right:30px;  z-index:9999;" >'+
		'<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>'+
		'<strong>Success!</strong> &nbsp; '+data+'</div>');
	}
	
});
app.controller('ContectCtrl',function($scope,$http){
			
	$scope.delete_message = function(x){
		$("#overlay").css('display','block');
		var data = $.param({id:x.id});
		$http({
				method: 'POST',
				url: BASE_URL+'BMS/delete_contact',
				data:data,
				headers:	{'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}
		}).then(function(response){
				if(response.data != '')
				{
					$("#overlay").css('display','none');
				}
		});
		get_list($scope.limit,$scope.page,$scope.searchKey,$scope.filter);
	}
	
	$scope.reprocess = function(x){
		$("#overlay").css('display','block');
		var data = $.param({id:x.id});
		$http({
				method: 'POST',
				url: BASE_URL+'BMS/repeat_action',
				data:data,
				headers:	{'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}
		}).then(function(response){
			if(response.data != '')
				{
					$("#overlay").css('display','none');
				}
			get_list($scope.limit,$scope.page,$scope.searchKey,$scope.filter);
		});
	}
	
	$scope.change_action = function(x){
		$("#overlay").css('display','block');
		var data = $.param({id:x.id});
		$http({
				method: 'POST',
				url: BASE_URL+'BMS/change_action',
				data:data,
				headers:	{'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}
		}).then(function(response){
			if(response.data != '')
				{
					$("#overlay").css('display','none');
				}
			get_list($scope.limit,$scope.page,$scope.searchKey,$scope.filter);
		});
		
	}
	
	// pagination with angular SPA
	
	$scope.all_question=[];
	$scope.limit = 5; 
	$scope.page  = 1;
	$scope.searchKey = '';
	$scope.filter = 'id';
	var pagination_btn_range = 2;
	
	
	get_list($scope.limit,$scope.page,$scope.searchKey,$scope.filter);
	function get_list(limit, page,search,filter) {
				$("#overlay").css('display','block');
		var data = $.param({
				limit		:limit,
				page		:page,
				search		:search,
				filter		:filter,
			});
			
			$http({
				method: 'POST',
				url: BASE_URL+'BMS/contact_list',
				data: data,
				headers:	{'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'},
			}).then(function(response){
				if(response.data != '')
				{
					$("#overlay").css('display','none');
				}
				//console.log(response.data);
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
	get_list($scope.limit,$scope.currentPage+1,$scope.searchKey,$scope.filter);
  };
  //Next btn
$scope.nextPage = function() {
    if ($scope.currentPage < $scope.pageCount()) {
	   $scope.currentPage++;
	   get_list($scope.limit,$scope.currentPage+1,$scope.searchKey,$scope.filter);
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
	  get_list($scope.limit,$scope.currentPage+1,$scope.searchKey,$scope.filter);
    }
  }; 
  
  
  $scope.getFilterData = function()
  {	
	var search = $scope.searchKey;
	get_list($scope.limit,$scope.currentPage+1,search,$scope.filter);
	
  }
})
app.controller('tagsCtrl',function($scope,$http){
			
	
		$scope.tags_status = function(x){
		if(x.status === 'active'){
			return true;
		}else{
			return false;
		}
	}
	
	$scope.myfunc = function(x){
		var data = $.param({id:x.id});
		$http({
				method: 'POST',
				url: BASE_URL+'BMS/tags_status',
				data:data,
				headers:	{'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}
		}).then(function(response){
			get_list($scope.limit,$scope.page,$scope.searchKey,$scope.filter);
		});
		
	}
	
	
	
	$scope.reprocess = function(x){
		$("#overlay").css('display','block');
		var data = $.param({id:x.id});
		$http({
				method: 'POST',
				url: BASE_URL+'BMS/repeat_action',
				data:data,
				headers:	{'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}
		}).then(function(response){
			if(response.data != '')
				{
					$("#overlay").css('display','none');
				}
			get_list($scope.limit,$scope.page,$scope.searchKey,$scope.filter);
		});
	}
	
	$scope.change_action = function(x){
		$("#overlay").css('display','block');
		var data = $.param({id:x.id});
		$http({
				method: 'POST',
				url: BASE_URL+'BMS/change_action',
				data:data,
				headers:	{'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}
		}).then(function(response){
			if(response.data != '')
				{
					$("#overlay").css('display','none');
				}
			get_list($scope.limit,$scope.page,$scope.searchKey,$scope.filter);
		});
		
	}
	
	// pagination with angular SPA
	
	$scope.all_question=[];
	$scope.limit = 5; 
	$scope.page  = 1;
	$scope.searchKey = '';
	$scope.filter = 'id';
	var pagination_btn_range = 2;
	
	
	get_list($scope.limit,$scope.page,$scope.searchKey,$scope.filter);
	function get_list(limit, page,search,filter) {
				$("#overlay").css('display','block');
		var data = $.param({
				limit		:limit,
				page		:page,
				search		:search,
				filter		:filter,
			});
			
			$http({
				method: 'POST',
				url: BASE_URL+'BMS/tags_list',
				data: data,
				headers:	{'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'},
			}).then(function(response){
				if(response.data != '')
				{
					$("#overlay").css('display','none');
				}
				//console.log(response.data);
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
	get_list($scope.limit,$scope.currentPage+1,$scope.searchKey,$scope.filter);
  };
  //Next btn
$scope.nextPage = function() {
    if ($scope.currentPage < $scope.pageCount()) {
	   $scope.currentPage++;
	   get_list($scope.limit,$scope.currentPage+1,$scope.searchKey,$scope.filter);
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
	  get_list($scope.limit,$scope.currentPage+1,$scope.searchKey,$scope.filter);
    }
  }; 
  
  
  $scope.getFilterData = function()
  {	
	var search = $scope.searchKey;
	get_list($scope.limit,$scope.currentPage+1,search,$scope.filter);
	
  }
  
  $scope.delete_tags = function(x){
		$("#overlay").css('display','block');
		var data = $.param({id:x.id});
		$http({
				method: 'POST',
				url: BASE_URL+'BMS/delete_tags',
				data:data,
				headers:	{'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}
		}).then(function(response){
				if(response.data != '')
				{
					$("#overlay").css('display','none');
				}
		});
		
			get_list($scope.limit,1,$scope.searchKey,$scope.filter);
	}
})
app.controller('CategoryCtrl',function($scope,$http){
		 $scope.id = 0;	
	$scope.delete_category = function(x){
		
		var data = $.param({id:x.id});
		$http({
				method: 'POST',
				url: BASE_URL+'BMS/delete_category',
				data:data,
				headers:	{'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}
		}).then(function(response){
				
		});
		get_list($scope.limit,$scope.page,$scope.searchKey,$scope.filter);
	}
	
	$scope.get_category = function(x){
		var data = $.param({id:x.id});
		$http({
				method: 'POST',
				url: BASE_URL+'BMS/category_data',
				data:data,
				headers:	{'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}
		}).then(function(response){
			$scope.title  = response.data.title;	
			$scope.description  = response.data.description;	
			$scope.id  = response.data.id;	
		});
		
	}
	$scope.submit_category = function(){
		var data = $.param({title:$scope.title,description:$scope.description,id:$scope.id});
		$http({
				method: 'POST',
				url: BASE_URL+'BMS/add_category',
				data:data,
				headers:	{'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}
		}).then(function(response){
				if(response.data.success)
				{
					get_list($scope.limit,$scope.page,$scope.searchKey,$scope.filter);
				}
				if(response.data.errors){
					angular.forEach(response.data.errors,function(value,key){
						$(".form_error_"+key).html(value);
						
					});
				}
					
		});
		
	}
	$scope.check_status = function(x){
		if(x.status === 'active'){
			return true;
		}else{
			return false;
		}
	}
	$scope.myfunc = function(x){
		var data = $.param({id:x.id});
		$http({
				method: 'POST',
				url: BASE_URL+'BMS/category_status',
				data:data,
				headers:	{'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}
		}).then(function(response){
			get_list($scope.limit,$scope.page,$scope.searchKey,$scope.filter);
		});
		
	}
	
		
	// pagination with angular SPA
	
	$scope.all_question=[];
	$scope.limit = 5; 
	$scope.page  = 1;
	$scope.searchKey = '';
	$scope.filter = 'id';
	var pagination_btn_range = 2;
	
	
	get_list($scope.limit,$scope.page,$scope.searchKey,$scope.filter);
	function get_list(limit, page,search,filter) {
				$("#overlay").css('display','Block');
		var data = $.param({
				limit		:limit,
				page		:page,
				search		:search,
				filter		:filter,
			});
			
			$http({
				method: 'POST',
				url: BASE_URL+'BMS/category_list',
				data: data,
				headers:	{'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'},
			}).then(function(response){
				//console.log(response.data);
				if(response.data !='')
				{
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
	get_list($scope.limit,$scope.currentPage+1,$scope.searchKey,$scope.filter);
  };
  //Next btn
$scope.nextPage = function() {
    if ($scope.currentPage < $scope.pageCount()) {
	   $scope.currentPage++;
	   get_list($scope.limit,$scope.currentPage+1,$scope.searchKey,$scope.filter);
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
	  get_list($scope.limit,$scope.currentPage+1,$scope.searchKey,$scope.filter);
    }
  }; 
  
  
  $scope.getFilterData = function()
  {	
	var search = $scope.searchKey;
	get_list($scope.limit,$scope.currentPage+1,search,$scope.filter);
	
  }
})
app.controller('AdsCtrl',function($scope,$http){
		 $scope.id = 0;	
	$scope.delete_adv = function(x){
		var data = $.param({id:x.id,image:x.image});
		$http({
				method: 'POST',
				url: BASE_URL+'BMS/delete_adv',
				data:data,
				headers:	{'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}
		}).then(function(response){
				
		});
		get_list($scope.limit,$scope.page,$scope.searchKey,$scope.filter);
	}
	
	$scope.submit_category = function(){
		var data = $.param({title:$scope.title,description:$scope.description,id:$scope.id});
		$http({
				method: 'POST',
				url: BASE_URL+'BMS/add_category',
				data:data,
				headers:	{'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}
		}).then(function(response){
				if(response.data.success)
				{
					get_list($scope.limit,$scope.page,$scope.searchKey,$scope.filter);
				}
				if(response.data.errors){
					angular.forEach(response.data.errors,function(value,key){
						$(".form_error_"+key).html(value);
						
					});
				}
					
		});
		
	}
	$scope.check_status = function(x){
		
		if(x.status === 'active'){
			return true;
		}else{
			return false;
		}
	}
	$scope.myfunc = function(x){
		var data = $.param({id:x.id});
		$http({
				method: 'POST',
				url: BASE_URL+'BMS/adv_status',
				data:data,
				headers:	{'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}
		}).then(function(response){
			get_list($scope.limit,$scope.page,$scope.searchKey,$scope.filter);
		});
		
	}
	
		
	// pagination with angular SPA
	
	$scope.all_question=[];
	$scope.limit = 5; 
	$scope.page  = 1;
	$scope.searchKey = '';
	$scope.filter = 'id';
	var pagination_btn_range = 2;
	
	
	get_list($scope.limit,$scope.page,$scope.searchKey,$scope.filter);
	function get_list(limit, page,search,filter) {
				$("#overlay").css('display','block');
		var data = $.param({
				limit		:limit,
				page		:page,
				search		:search,
				filter		:filter,
			});
			
			$http({
				method: 'POST',
				url: BASE_URL+'BMS/advers_listing',
				data: data,
				headers:	{'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'},
			}).then(function(response){
				//console.log(response.data);
				//$("#overlay").css('display','none');
				if(response.data !='')
				{
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
	get_list($scope.limit,$scope.currentPage+1,$scope.searchKey,$scope.filter);
  };
  //Next btn
$scope.nextPage = function() {
    if ($scope.currentPage < $scope.pageCount()) {
	   $scope.currentPage++;
	   get_list($scope.limit,$scope.currentPage+1,$scope.searchKey,$scope.filter);
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
	  get_list($scope.limit,$scope.currentPage+1,$scope.searchKey,$scope.filter);
    }
  }; 
  
  
  $scope.getFilterData = function()
  {	
	var search = $scope.searchKey;
	get_list($scope.limit,$scope.currentPage+1,search,$scope.filter);
	
  }

  ///
})
app.controller('UsersCtrl',function($scope,$http){
	
	
	$scope.delete_user = function(x){
		var data = $.param({id:x.id});
		$http({
				method: 'POST',
				url: BASE_URL+'BMS/delete_user',
				data:data,
				headers:	{'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}
		}).then(function(response){
				
		});
		get_list($scope.limit,$scope.page,$scope.searchKey,$scope.filter);
	}
	
	$scope.check_status = function(x){
		if(x.status === 'active'){
			return true;
		}else{
			return false;
		}
	}
	
	$scope.myfunc = function(x){
		var data = $.param({id:x.id});
		$http({
				method: 'POST',
				url: BASE_URL+'BMS/change_status',
				data:data,
				headers:	{'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}
		}).then(function(response){
			get_list($scope.limit,$scope.page,$scope.searchKey,$scope.filter);
		});
		
	}
	$scope.edit_user = function(x){
		//alert();
		location.href="#!user/"+x.id;
	}
	
	
	
	// pagination with angular SPA
	
	$scope.all_question=[];
	$scope.limit = 3; 
	$scope.page  = 1;
	$scope.searchKey = '';
	$scope.filter = 'id';
	var pagination_btn_range = 2;
	
	
	get_list($scope.limit,$scope.page,$scope.searchKey,$scope.filter);
	function get_list(limit, page,search,filter) {
				$("#overlay").css('display','Block');
		var data = $.param({
				limit		:limit,
				page		:page,
				search		:search,
				filter		:filter,
			});
			
			$http({
				method: 'POST',
				url: BASE_URL+'BMS/listing',
				data: data,
				headers:	{'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'},
			}).then(function(response){
				//console.log(response.data);
				//$("#overlay").css('display','none');
				if(response.data !='')
				{
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
	get_list($scope.limit,$scope.currentPage+1,$scope.searchKey,$scope.filter);
  };
  //Next btn
$scope.nextPage = function() {
    if ($scope.currentPage < $scope.pageCount()) {
	   $scope.currentPage++;
	   get_list($scope.limit,$scope.currentPage+1,$scope.searchKey,$scope.filter);
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
	  get_list($scope.limit,$scope.currentPage+1,$scope.searchKey,$scope.filter);
    }
  }; 
  
  
  $scope.getFilterData = function()
  {	
	var search = $scope.searchKey;
	get_list($scope.limit,$scope.currentPage+1,search,$scope.filter);
	
  }
});
app.controller('QuestionCtrl',function($scope,$http){
	
	$scope.delete_question = function(x){
		var data = $.param({id:x.id});
		$http({
				method: 'POST',
				url: BASE_URL+'delete-question',
				data:data,
				headers:	{'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}
		}).then(function(response){
				$("body").append('<div class="alert alert-success alert-dismissable" style="position:fixed;  top:100px;  right:30px;  z-index:9999;" >'+
    '<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>'+
    '<strong>Success!</strong>'+response.data.success+'</div>');
		});
		get_list($scope.limit,$scope.page,$scope.searchKey,$scope.filter);
	}
	
	$scope.question_status = function(x){
		if(x.status === 'active'){
			return true;
		}else{
			return false;
		}
	}
	
	$scope.myfunc = function(x){
		var data = $.param({id:x.id});
		$http({
				method: 'POST',
				url: BASE_URL+'BMS/question_status',
				data:data,
				headers:	{'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}
		}).then(function(response){
			get_list($scope.limit,$scope.page,$scope.searchKey,$scope.filter);
		});
		
	}
	$scope.edit_question = function(x){
		//alert();
		//location.href="#!user/"+x.id;
	}
	
	
	// pagination with angular SPA
	
	$scope.all_question=[];
	$scope.limit = 5; 
	$scope.page  = 1;
	$scope.searchKey = '';
	$scope.filter = 'id';
	var pagination_btn_range = 2;
	
	
	get_list($scope.limit,$scope.page,$scope.searchKey,$scope.filter);
	function get_list(limit, page,search,filter) {
				$("#overlay").css('display','block');
		var data = $.param({
				limit		:limit,
				page		:page,
				search		:search,
				filter		:filter,
			});
			
			$http({
				method: 'POST',
				url: BASE_URL+'BMS/question_listing',
				data: data,
				headers:	{'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'},
			}).then(function(response){
				//console.log(response.data);
				//$("#overlay").css('display','none');
				if(response.data !='')
				{
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
	get_list($scope.limit,$scope.currentPage+1,$scope.searchKey,$scope.filter);
  };
  //Next btn
$scope.nextPage = function() {
    if ($scope.currentPage < $scope.pageCount()) {
	   $scope.currentPage++;
	   get_list($scope.limit,$scope.currentPage+1,$scope.searchKey,$scope.filter);
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
	  get_list($scope.limit,$scope.currentPage+1,$scope.searchKey,$scope.filter);
    }
  }; 
  
  
  $scope.getFilterData = function()
  {	
	var search = $scope.searchKey;
	console.log(search);
	get_list($scope.limit,$scope.currentPage+1,search,$scope.filter);
	
  }
  
  
  ///////////
});
app.controller('AnswersCtrl',function($scope,$http){
	
	$scope.delete_question = function(x){
		var data = $.param({id:x.id});
		$http({
				method: 'POST',
				url: BASE_URL+'delete-question',
				data:data,
				headers:	{'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}
		}).then(function(response){
				$("body").append('<div class="alert alert-success alert-dismissable" style="position:fixed;  top:100px;  right:30px;  z-index:9999;" >'+
    '<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>'+
    '<strong>Success!</strong>'+response.data.success+'</div>');
		});
		get_list($scope.limit,$scope.page,$scope.searchKey,$scope.filter);
	}
	
	$scope.answer_status = function(x){
		
		if(x.status === 'active'){
			return true;
		}else{
			return false;
		}
	}
	
	$scope.myfunc = function(x){
		var data = $.param({id:x.id});
		$http({
				method: 'POST',
				url: BASE_URL+'BMS/answer_status',
				data:data,
				headers:	{'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}
		}).then(function(response){
			get_list($scope.limit,$scope.page,$scope.searchKey,$scope.filter);
		});
		
	}
	$scope.edit_question = function(x){
		//alert();
		//location.href="#!user/"+x.id;
	}
	
	
	// pagination with angular SPA
	
	$scope.all_question=[];
	$scope.limit = 5; 
	$scope.page  = 1;
	$scope.searchKey = '';
	$scope.filter = 'id';
	var pagination_btn_range = 2;
	
	
	get_list($scope.limit,$scope.page,$scope.searchKey,$scope.filter);
	function get_list(limit, page,search,filter) {
				$("#overlay").css('display','block');
		var data = $.param({
				limit		:limit,
				page		:page,
				search		:search,
				filter		:filter,
			});
			
			$http({
				method: 'POST',
				url: BASE_URL+'BMS/answers_listing',
				data: data,
				headers:	{'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'},
			}).then(function(response){
				//console.log(response.data);
				if(response.data !='')
				{
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
	get_list($scope.limit,$scope.currentPage+1,$scope.searchKey,$scope.filter);
  };
  //Next btn
$scope.nextPage = function() {
    if ($scope.currentPage < $scope.pageCount()) {
	   $scope.currentPage++;
	   get_list($scope.limit,$scope.currentPage+1,$scope.searchKey,$scope.filter);
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
	  get_list($scope.limit,$scope.currentPage+1,$scope.searchKey,$scope.filter);
    }
  }; 
  
  
  $scope.getFilterData = function()
  {	
	var search = $scope.searchKey;
	get_list($scope.limit,$scope.currentPage+1,search,$scope.filter);
  }
});
app.controller('UserCtrl',function($scope,$http,$routeParams,$location){
		var url = $location.path().split('/');
		$scope.first = url[2];
		
		var data = $.param({id:$scope.first});
		$http({
				method: 'POST',
				url: BASE_URL+'BMS/get_user_data',
				data:data,
				headers:	{'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}
		}).then(function(response){
				 angular.forEach(response.data,function(value,key){
					$scope.id = value.id;
					$scope.name = value.name;
					$scope.email = value.email;
					$scope.gender = value.gender;
					$scope.profession = value.profession;
					$scope.mobile = value.mobile;
					$scope.institute_name = value.institute_name;
					$scope.dob = value.dob;
				});
		});
		
		$scope.edit_user = function(){
		
			var data = $.param({
				id			:$scope.id,
				name		:$scope.name,
				email		:$scope.email,
				gender		:$scope.gender,
				profession	:$scope.profession,
				mobile		:$scope.mobile,
				institute_name:$scope.institute_name,
				dob			:$scope.dob,
				});
			$http({
					method: 'POST',
					url: BASE_URL+'BMS/update_user',
					data:data,
					headers:	{'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}
			}).then(function(response){
				location.href="#!/users";	
			});
		}
		
		$scope.login_user  = function(x){
				console.log(x);
		}
		
})
app.controller('QuestionUpdateCtrl',function($scope,$http,$routeParams,$location){
		var url = $location.path().split('/');
		$scope.first = url[2];
		
		var data = $.param({id:$scope.first});
		$http({
				method: 'POST',
				url: BASE_URL+'BMS/get_question_data',
				data:data,
				headers:	{'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}
		}).then(function(response){
				 angular.forEach(response.data,function(value,key){
					$scope.id = value.id;
					$scope.name = value.name;
					$scope.email = value.email;
					$scope.gender = value.gender;
					$scope.profession = value.profession;
					$scope.mobile = value.mobile;
					$scope.institute_name = value.institute_name;
					$scope.dob = value.dob;
				});
		});
		
		$scope.edit_user = function(){
			var data = $.param({
				id			:$scope.id,
				name		:$scope.name,
				email		:$scope.email,
				gender		:$scope.gender,
				profession	:$scope.profession,
				mobile		:$scope.mobile,
				institute_name:$scope.institute_name,
				dob			:$scope.dob,
				});
			$http({
					method: 'POST',
					url: BASE_URL+'BMS/update_question',
					data:data,
					headers:	{'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}
			}).then(function(response){
				location.href="#!/users";	
			});
		}
		
		
		
})