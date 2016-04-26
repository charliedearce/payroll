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
					<th>Employment Status</th>
				</tr>
			</thead>

			<tbody>
				<tr>
					<td>1</td>
					<td>2</td>
					<td>3</td>
					<td>4</td>
					<td>5</td>
					<td>6</td>
					<td><a class="waves-effect waves-teal modal-trigger" href="#modal1"><i class="material-icons">visibility</i></a></td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
@endsection