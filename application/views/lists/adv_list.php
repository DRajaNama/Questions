

<div class="row " style="padding:5px 45px 0px 45px ">
	<div class="col-lg-4 states-box" style="background-color:#FD3768;color:white" >
		<h2><span class="text-theme pull-left"> Total Ads: &nbsp; <span class="count"> <?php echo $states['total']; ?></span></span></h2> <h1><i class="fa fa-image pull-right text-theme"></i></h1>
	</div>
	<div class="col-lg-4 states-box" style="background-color:#FD3768;color:white">
		<h2><span class="text-theme pull-left"> Active Ads: &nbsp; <span class="count"><?php echo $states['active_user']; ?></span></span></h2> <h1><i class="fa fa-check pull-right text-theme "></i></h1>
	</div>
	<div class="col-lg-4 states-box" style="background-color:#FD3768;color:white">
				<h2><span class="text-theme pull-left"> Inactive Ads: &nbsp; <span class="count"><?php echo $states['inactive_user']; ?></span></span></h2> <h1><i class="fa fa-ban pull-right text-theme "></i></h1>
	</div>
	
</div>
<div class="row" style="margin:5px 35px 0px 35px; border: 2px solid #e3e3e3;padding: 15px !important;border-top: 5px solid #fd3768;">
		<div class="col-lg-4">
			<h5 style="color:#fd3768"><strong>Search New Question's Answers?</strong></h5>
            <p class="text-muted"><small>We'll notify you and promise never to spam.</small></p>
		</div>
		<div class="col-lg-2" style="padding-top:20px">
			<div class="input-group">
			  <select  class="form-control"  ng-model="filter" ng-change="getFilterData()" width="100%" style="height:40px !important">
				<option value="id">BY ID</option>
				<option value="title">BY Title</option>
				<option value="type">BY Type</option>
				<option value="stoped">BY Terminated</option>
				<option value="created">BY Created</option>
			  </select>
			</div>
		</div>
		<div class="col-lg-6" style="padding-top:20px">
			<!--div class="input-group"-->
			  <input type="text" class="form-control" placeholder="Search for..."  ng-model="searchKey" ng-change="getFilterData()" aria-label="Search for...">
			  <!--span class="input-group-btn">
				<button class="btn btn-default w3-btn" type="button">Search!</button>
			  </span>
			</div-->
		</div>
	</div><!-- search row-->
<div class="row" style="padding:25px 50px 0px 50px">
<div class="panel panel-default">
  <div class="panel-body">
  <h1 style="color:#2e3458">Banner List</h1>
  <table class="table table-responsive">
    <thead>
      <tr style="background-color: #fd3768;color: white;">
        <th>ID</th>
        <th>User Id</th>
        <th>Creator Name</th>
        <th>Image</th>
		<th>Title</th>
        <th>Type</th>
        <th>Created</th>
        <th>Terminated</th>
		<!---th>Modified</th-->
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
	
      <tr ng-repeat="x in all_question">
        <td>{{x.id}}</td>
        <td>{{x.user_id}}</td>
        <td>{{x.creator_name}}</td>
		<td><img src="<?php echo base_url();?>assets/uploads/banner/{{x.image}}" width="50px" height="50px" class="img img-responsive"></td>
		<td>{{x.title}}</td>
		<td>{{x.type}}</td>
		<td>{{x.created}}</td>
		<td>{{x.stoped}}</td>
		<!--td>{{x.modified}}</td-->
		<td>
		<label class="switch">
		  <input type="checkbox"  ng-checked="check_status(x)" ng-click="myfunc(x)" ng-model="status" >
		  <span class="slider round"></span>
		</label> 
		</td>
		<td>
		<button class="btn btn-danger btn-small" ng-click="delete_adv(x)"><i class="fa fa-trash"></i></button>
		<a  href="javascript:" class="btn btn-primary btn-small" ng-click="edit_adv(x)"><i class="fa fa-pencil"></i></a> </td>
      </tr>
      
    </tbody>
  </table>
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
				<!--	&nbsp; Showing {{limit*currentPage+1}} to of {{recordsTotal}} entries 
			{{ (limit*currentPage+limit) >  recordsTotal ? recordsTotal : (limit*currentPage+limit) }}  --> 					
				  </li>
				</ul>
			</center>
</div>
</div>
</div>
<script>
$('.count').each(function () {
	console.log();
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