@extends('home')
@section('content')


<div class="row">
	<div class="col s12">
		<div class="card-panel hoverable" style="background-image:url('http://materializecss.com/images/sample-1.jpg'); width: 100%; height: 100%;"><h3 class="white-text">Employees</h3>
		</div>
	</div>
</div>
<div class="row">
	<form method="POST" action="hellow">
		<div class="input-field col s12 left">
	          <input id="last_name" type="text" class="validate" style="width:300px; max-width: 85%;">
	          <button class="btn-floating btn-small waves-effect waves-light red" type="submit">
	          <i class="material-icons">search</i></button>
	          <label for="last_name">Search by: ID, First Name, Last Name</label>
	    </div>
	</form>
</div>
<div class="row">
	<div class="col s12">
		<table class="responsive-table striped ">
			<thead>
				<tr>
					<th>ID</th>
					<th>Last Name</th>
					<th>First Name</th>
					<th>Department</th>
					<th>Date Hired</th>
					<th>Emp. Status</th>
				</tr>
			</thead>

			<tbody>
			@foreach($employee as $employee)
				<tr>
					<td>{{$employee->emp_id}}</td>
					<td>{{$employee->lastname}}</td>
					<td>{{$employee->firstname}}</td>
					<td>{{$employee->department}}</td>
					<td>{{$employee->startdate}}</td>
					<td>{{$employee->status}}</td>
					<td style="font-size:10px;">Edited {{$ago->ago(strtotime($employee->updated_at))}}</td>
					<td><a class="waves-effect waves-teal modal-trigger tooltipped" data-position="bottom" data-delay="50" data-tooltip="Work Schedule" href="#{{$employee->id}}"><i class="material-icons">schedule</i></a></td>
					<td><a class="waves-effect waves-teal tooltipped" data-position="bottom" data-delay="50" data-tooltip="Edit" href="editEmployee/{{$employee->id}}"><i class="material-icons">mode_edit</i></a></td>
					<td><a class="waves-effect waves-teal tooltipped" data-position="bottom" data-delay="50" data-tooltip="View" href="editEmployee/{{$employee->id}}"><i class="material-icons">visibility</i></a></td>
					<td><a class="waves-effect waves-teal modal-trigger tooltipped" data-position="bottom" data-delay="50" data-tooltip="Delete" href="#{{$employee->id}}"><i class="material-icons">delete</i></a></td>
				</tr>
				 <div id="{{$employee->id}}" class="modal" style="max-width:350px;">
				    <div class="modal-content center">
				      <p>Are you sure you want to delete this data? <br><br><b>ID: {{$employee->emp_id}} <br> {{$employee->firstname}} <br> {{$employee->lastname}}</b></p>
				    </div>
				    <div class="modal-footer">
				      <a href="deleteEmployee/{{$employee->id}}" class=" modal-action waves-effect btn red left">yes</a>
				      <a href="#!" class=" modal-action modal-close waves-effect btn green">No</a>
				    </div>
				 </div>
			@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection