@extends('home')
@section('content')
<div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
	<a class="btn-floating btn-large waves-effect waves-light modal-trigger red tooltipped" data-position="left" data-delay="50" data-tooltip="Add Attendance" href="#test"><i class="material-icons">assignment</i></a>
</div>
<div class="row">
	<div class="col s12">
		<div class="card-panel hoverable" style="background-image:url('http://materializecss.com/images/sample-1.jpg'); width: 100%; height: 100%;"><h3 class="white-text">Employee Attendance</h3>
		</div>
	</div>

<div class="row">
	<form method="GET" action="{{ url('home/employees') }}">

		<div class="input-field col s6">
	          <h5>Employee: </h5>
	    </div>
	    <div class="input-field col s6">
	          <h5>Payroll #: </h5>
	    </div>
	    <div class="input-field col s6">
	          <a class="waves-effect waves-light btn"><i class="material-icons right">import_export</i>Import Excel</a>
	    </div>
	    <div class="input-field col s6">
	          <a class="waves-effect waves-light btn"><i class="material-icons right">library_books</i>Excel Template</a>
	    </div>
	</form>
</div>
<div class="row">
	<div class="col s12">
		<table class="responsive-table striped ">
			<thead>
				<tr>
					<th>Work Date</th>
					<th>Shift</th>
					<th>Time In</th>
					<th>Break Out</th>
					<th>Break In</th>
					<th>Time Out</th>
					<th>Over Time</th>
					<th>Day Type</th>
					<th>Leave</th>
				</tr>
			</thead>

			<tbody>
				@foreach($attendance as $atten)
				<tr>
					<td>
					{{$atten->date}}
					</td>
					<td>
					{{$atten->shift}}
					</td>
					<td>
					{{$atten->in}}
					</td>
					<td>
					{{$atten->breakout}}
					</td>
					<td>
					{{$atten->breakin}}
					</td>
					<td>
					{{$atten->out}}
					</td>
					<td>
					{{$atten->overtime}}
					</td>
					<td>
					{{$atten->daytype}}
					</td>
					<td>
					{{$atten->leave}}
					</td>
				</tr>
				@endforeach
				<form method="POST" action="{{$cur_url}}/addAttendance"> 
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
					 <div id="test" class="modal" style="max-width:350px;">
					    <div class="modal-content">
						    <div class="input-field col s12">
						      <input type="date" class="datepicker" id="wdate" name="workdate" required> 
								<label for="wdate">Work date</label>
							</div>
							<p><b>&nbsp; Shift Schedule: </b>
						      <input name="shift" type="radio" id="day" checked />
						      <label for="day" value="1">Day</label>&nbsp;&nbsp;
						      <input name="shift" type="radio" id="night" />
						      <label for="night" value="2">Night</label>
						    </p>
						      <div class="input-field col s6">
								<input id="att-in" type="text" class="validate" value="00:00 AM" name="in" required>
								<label for="att-in">Time In:</label>
							  </div>
							  <div class="input-field col s6">
								<input id="att-bout" type="text" class="validate" value="00:00 PM" name="bin" required>
								<label for="att-bout">Break Out:</label>
							  </div>
							  <div class="input-field col s6">
								<input id="att-bin" type="text" class="validate" value="00:00 PM" name="bout" required>
								<label for="att-bin">Break In:</label>
							  </div>
							  <div class="input-field col s6">
								<input id="att-out" type="text" class="validate" value="00:00 PM" name="out" required>
								<label for="att-out">Time Out:</label>
							  </div>
					    </div>
					    <div class="modal-footer">
					      <button class=" modal-action waves-effect btn red left">yes</button>
					      <a href="#!" class=" modal-action modal-close waves-effect btn green">No</a>
					    </div>
					 </div>
				</form>
			</tbody>
		</table>
	</div>
</div>
@endsection