<div class="row" style="padding:5px 35px 10px 50px ">
		<div class="col-lg-4">
			<div class=" left-box text-center">
			<div class="row">
				<div class="col-lg-4" style="background-color:#fd3768; color:white;padding:20px;">
				<h1><i class="fa fa-id-badge "></i></h1>
				</div>
				<div class="col-lg-8" style="padding:20px;">
				<h3>Contacts : <?php echo $states['total']; ?></h3>
				</div>
			</div>
			</div>
		</div>
		<div class="col-lg-4">
			<div class=" left-box text-center">
			<div class="row">
				<div class="col-lg-4" style="background-color:#fd3768; color:white;padding:20px;">
				<h1><i class="fa fa-check "></i></h1>
				</div>
				<div class="col-lg-8" style="padding:20px;">
				<h3>Done : <?php echo $states['done']; ?></h3>
				</div>
			</div>
			</div>
		</div>
		<div class="col-lg-4">
			<div class=" left-box text-center">
			<div class="row">
				<div class="col-lg-4" style="background-color:#fd3768; color:white;padding:20px;">
				<h1><i class="fa fa-redo "></i></h1>
				</div>
				<div class="col-lg-8" style="padding:20px;">
				<h3>In Progress : <?php echo $states['pending']; ?></h3>
				</div>
			</div>
			</div>
		</div>
		
</div>



<div class="row" style="margin:5px 35px 0px 35px; border: 2px solid #e3e3e3;padding: 15px !important;border-top: 5px solid #fd3768;">
		<div class="col-lg-4">
			<h5 style="color:#fd3768"><strong>Search Contacts with Filters?</strong></h5>
            <p class="text-muted"><small>We'll notify you and promise never to spam.</small></p>
		</div>
		<div class="col-lg-2" style="padding-top:20px">
			<div class="input-group">
			  <select  class="form-control"  ng-model="filter" ng-change="getFilterData()" width="100%" style="height:40px !important">
				<option value="id">BY ID</option>
				<option value="name">BY Name</option>
				<option value="created">BY Creaeted</option>
				<option value="email">BY Email</option>
				<option value="action">BY action</option>
				<option value="message">BY message</option>
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
  <h1 style="color:#2e3458">Contact & Message List</h1>
  <table class="table table-responsive">
    <thead>
      <tr style="background-color: #fd3768;color: white;">
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Message</th>
        <th>Created</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
	
      <tr ng-repeat="x in all_question">
        <td>{{x.id}}</td>
        <td>{{x.name}}</td>
		<td>{{x.email}}</td>
		<td>{{x.message}}</td>
		<td>{{x.created}}</td>
		<td>
		<span class="label label-danger" style="cursor:pointer" ng-if="x.action === 'pending'" ng-click="change_action(x)">{{x.action}}</span>
		<span class="label label-warning" style="cursor:pointer"ng-if="x.action === 'process'" ng-click="change_action(x)">{{x.action}}</span>
		<span class="label label-primary" style="cursor:pointer"ng-if="x.action === 'approved'" ng-click="change_action(x)">{{x.action}}</span>
		<span class="label label-success" style="cursor:pointer" ng-if="x.action === 'done'" >{{x.action}}</span>
		</td>
		<td>
		<button class="btn btn-danger btn-small" ng-click="delete_message(x)"><i class="fa fa-trash"></i></button>
		<button class="btn btn-primary btn-small" ng-click="reprocess(x)"><i class="fa fa-repeat "></i></button>
		</td>
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