
<div class="container">
	<a href="users" style="text-decoration:none;" ><i class="fa fa-angle-left"></i> &nbsp; Back to user list</a>
  <div class="row">
	<div class="col-lg-6 col-xs-offset-3">
	<div class="panel panel-default">
		<div class="panel panel-header" style="padding:20px;">
			  <h2>User Update</h2>
		</div>
		<div class="panel panel-body">
		<table class="table table-responsive">
			<tr>
			<th>Name</th>
			<td><input type="text" name="name" placeholder="Enter Your Name" ng-model="name" class="form-control">
			<input type="hidden" name="id" ng-model="id" >
			</tr>
			<tr>
			<th>Email</th>
			<td><input type="Email" name="email" placeholder="Enter Your email" ng-model="email" class="form-control" disabled>
			</tr>
			<tr>
			<th>Gender</th>
			<td><select  name="gender" ng-model="gender" class="form-control" >
					<option value="male">Male</option>
					<option value="female">Female</option>
					<option value="other">Other</option>
				</select>
			</td>
			</tr>
			<tr>
			<th>Profession</th>
			<td><select  name="profession" ng-model="profession" class="form-control" >
					<option value="student">Student</option>
					<option value="teacher">teacher</option>
					<option value="business">business</option>
				</select>
			</td>
			</tr>
			<tr>
			<th>Mobile</th>
			<td><input type="text" name="mobile" placeholder="Enter Your Mobile" ng-model="mobile" class="form-control">
			</tr>
			<tr>
			<th>Institute Name</th>
			<td><input type="text" name="institute_name" placeholder="Enter Your institute_name" ng-model="institute_name" class="form-control">
			</tr>
			<tr>
			<th>DOB</th>
			<td><input type="text" name="dob" placeholder="Enter Your DOB" ng-model="dob" class="form-control">
			</tr>
			<tr><th></th><td><input type="submit" class="btn btn-default w3-btn form-control" value="Edit" ng-click="edit_user()"><td/></tr>
		</table>
		</div>
		</div>
	</div>
   </div>
</div>