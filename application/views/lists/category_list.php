<div class="row" style="padding:5px 35px 10px 50px ">
		<div class="col-lg-6">
			<div class=" left-box text-center">
			<div class="row">
				<div class="col-lg-4" style="background-color:#fd3768; color:white;padding:20px;">
				<h1><i class="fa fa-list "></i></h1>
				</div>
				<div class="col-lg-8" style="padding:20px;">
				<h3>Category : <?php echo $states['total']; ?></h3>
				</div>
			</div>
			</div>
		</div>
		<div class="col-lg-6">
			<div class=" left-box text-center">
			<div class="row">
				<div class="col-lg-4" style="background-color:#fd3768; color:white;padding:20px;">
				<h1><i class="fa fa-link "></i></h1>
				</div>
				<div class="col-lg-8" style="padding:20px;">
				<h3>Linked Question : <?php echo $states['total_link_question']; ?></h3>
				</div>
			</div>
			</div>
		</div>
			
</div>


<div class="row" style="margin:5px 35px 0px 35px; border: 2px solid #e3e3e3;padding: 15px !important;border-top: 5px solid #fd3768;">
		<div class="col-lg-4">
			<br/>
			<a class="btn btn-default w3-btn" data-toggle="modal" data-target="#myModal" ><strong>Add a Category</strong></a>
            
		</div>
		<div class="col-lg-2" style="padding-top:20px">
			<div class="input-group">
			  <select  class="form-control"  ng-model="filter" ng-change="getFilterData()" width="100%" style="height:40px !important">
				<option value="id">BY ID</option>
				<option value="title">BY Title</option>
				<option value="description">BY Description</option>
				<option value="status">BY Status</option>
				
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
  <h1 style="color:#2e3458">Category List</h1>
  <table class="table table-responsive">
    <thead>
      <tr style="background-color: #fd3768;color: white;">
        <th>ID</th>
        <th>Title</th>
        <th>Description</th>
        <th>Total Link Question</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
	
      <tr ng-repeat="x in all_question">
        <td>{{x.id}}</td>
        <td>{{x.title}}</td>
		<td>{{x.description}}</td>
		<td>{{x.total_link_question}}</td>
		<td>
		<label class="switch">
		  <input type="checkbox"  ng-checked="check_status(x)" ng-click="myfunc(x)" ng-model="status" >
		  <span class="slider round"></span>
		</label> 
		</td>
		<td>
		<button class="btn btn-danger btn-small" ng-click="delete_category(x)"><i class="fa fa-trash"></i></button>
		<button class="btn btn-primary btn-small" ng-click="get_category(x)" data-toggle="modal" data-target="#myModal"><i class="fa fa-pencil"></i></button>
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

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color:#fd3768;color:white;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Category</h4>
      </div>
      <div class="modal-body">
        
		  <div class="form-group">
			<label for="email">Title:</label>
			<input type="text" class="form-control" ng-model="title" placeholder="Enter Title">
			<input type="hidden" ng-model="id">
			<span class="text-danger form_error form_error_title"></span>
		  </div>
		  <div class="form-group">
			<label for="pwd">Description:</label>
			<textarea class="form-control" ng-model="description" placeholder="Enter Description"></textarea>
			<span class="text-danger form_error form_error_description" ></span>
		  </div>
		  <button type="submit" class="btn btn-default" ng-click="submit_category()">Submit</button>
		 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>