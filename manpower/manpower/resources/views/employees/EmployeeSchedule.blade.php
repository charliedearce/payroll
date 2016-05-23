@extends('home')
@section('content')
<div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
	<a class="btn-floating btn-large waves-effect waves-light red tooltipped" data-position="left" data-delay="50" data-tooltip="Back" href="/home/employees"><i class="material-icons">replay</i></a>
</div>
<div class="row">
	<div class="col s12">
		<div class="card-panel hoverable" style="background-image:url('http://materializecss.com/images/sample-1.jpg'); width: 100%; height: 100%;"><h3 class="white-text">Work Schedule</h3>
		</div>
	</div>
</div>
<div class="row">
	<form method="POST" action="hellow">
		<div class="input-field col s12 center">
	          
	          @foreach ($employee as $employee)
	          <h4>{{$employee->firstname}} {{$employee->lastname}}'s Time Table</h4>
	          @endforeach
	    </div>
	</form>
</div>
<div class="row">
	<div class="col s12">
		<h5>Day Shift Schedule</h5>
		<table class="striped">
			<thead>
				<tr>
					<th>Su</th>
					<th>Mo</th>
					<th>Tu</th>
					<th>We</th>
					<th>Th</th>
					<th>Fr</th>
					<th>Sa</th>
				</tr>
			</thead>

			<tbody>
				<tr>
					<td class="center">
						 {{--*/ $time_id_su1 = null; 
						 		$time_id_mo1 = null;
						 		$time_id_tu1 = null;
						 		$time_id_we1 = null;
						 		$time_id_th1 = null;
						 		$time_id_fr1 = null;
						 		$time_id_sa1 = null;	
						  /*--}}
						 {{--*/ $sched_id = null; /*--}}
						@foreach ($scheduleday1 as $scheduleday1)
							{{--*/ $sched_id = $scheduleday1->id /*--}}
						@endforeach
						@foreach ($su1 as $su1)
							<b>Working Time</b><br>
							{{date('h:i A', strtotime($su1->in))}} - {{date('h:i A', strtotime($su1->out))}} </br>
							<b>Break Time</b></br>
							{{date('h:i A', strtotime($su1->breakin))}} - {{date('h:i A', strtotime($su1->breakout))}} </br>
							{{--*/ $time_id_su1 = $su1->id; /*--}}
						@endforeach
						@if(Empty($time_id_su1))
							<a class="modal-trigger" href="#{{$sched_id}}add-su1"><i class="material-icons">add</i></a>
						@else
							<a class="modal-trigger" href="#{{$time_id_su1}}delete-su1"><i class="material-icons">delete</i></a>
						@endif
						<form method="POST" action="{{ url('home/addSchedule/su1') }}">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<input type="hidden" name="sched_id" value="{{$sched_id}}">
							<input type="hidden" name="empid" value="{{$empid}}">
							<div id="{{$sched_id}}add-su1" class="modal" style="max-width:350px;">
							    <div class="modal-content center">
							    <h4>Sunday (Day Shift)</h4>
							        <div class="input-field col s6">
										<input id="su-in1" type="text" class="validate" name="in" value="8:00 AM" required>
										<label for="su-in1">Time In:</label>
									</div>
									<div class="input-field col s6">
										<input id="su-out1" type="text" class="validate" name="out" value="5:00 PM" required>
										<label for="su-out1">Time Out:</label>
									</div>
									<hr>
									 <div class="input-field col s6">
										<input id="su-bout1" type="text" class="validate" name="bout" value="12:00 PM" required>
										<label for="su-bout1">Break Out:</label>
									</div>
									<div class="input-field col s6">
										<input id="su-bin1" type="text" class="validate" name="bin" value="1:00 PM" required>
										<label for="su-bin1">Break In:</label>
									</div>
							    </div>
							    <div class="modal-footer">
							      <button class=" modal-action waves-effect btn red left">Add</button>
							      <a href="#!" class=" modal-action modal-close waves-effect btn green">cancel</a>
							    </div>
						 	</div>
						 </form>
						 	<form method="POST" action="{{ url('home/deleteSchedule/delete') }}">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<input type="hidden" name="sched_id" value="{{$time_id_su1}}">
							 	<div id="{{$time_id_su1}}delete-su1" class="modal" style="max-width:350px;">
								    <div class="modal-content center">
									      Are you sure you want to delete<br>
									      <b>Sunday Schedule (day shift)?</b>
								    </div>
								    <div class="modal-footer">
								      <button class=" modal-action waves-effect btn red left">yes</button>
								      <a href="#!" class=" modal-action modal-close waves-effect btn green">No</a>
								    </div>
							 	</div>
						 	</form>		
					</td>
					<td class="center">
						@foreach ($mo1 as $mo1)
						<b>Working Time</b><br>
						{{date('h:i A', strtotime($mo1->in))}} - {{date('h:i A', strtotime($mo1->out))}} </br>
						{{--*/ $sched_id = $scheduleday1->id /*--}}
						<b>Break Time</b></br>
						{{date('h:i A', strtotime($mo1->breakin))}} - {{date('h:i A', strtotime($mo1->breakout))}} </br>
						{{--*/ $time_id_mo1 = $mo1->id; /*--}}
						@endforeach
						@if(Empty($time_id_mo1))
							<a class="modal-trigger" href="#{{$sched_id}}add-mo1"><i class="material-icons">add</i></a>
						@else
							<a class="modal-trigger" href="#{{$time_id_mo1}}delete-mo1"><i class="material-icons">delete</i></a>
						@endif
						<form method="POST" action="{{ url('home/addSchedule/mo1') }}">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<input type="hidden" name="sched_id" value="{{$sched_id}}">
							<input type="hidden" name="empid" value="{{$empid}}">
							<div id="{{$sched_id}}add-mo1" class="modal" style="max-width:350px;">
							    <div class="modal-content center">
							    <h4>Monday (Day Shift)</h4>
							        <div class="input-field col s6">
										<input id="mo-in1" type="text" class="validate" name="in" value="8:00 AM" required>
										<label for="mo-in1">Time In:</label>
									</div>
									<div class="input-field col s6">
										<input id="mo-out1" type="text" class="validate" name="out" value="5:00 PM" required>
										<label for="mo-out1">Time Out:</label>
									</div>
									<hr>
									 <div class="input-field col s6">
										<input id="mo-bout1" type="text" class="validate" name="bout" value="12:00 PM" required>
										<label for="mo-bout1">Break Out:</label>
									</div>
									<div class="input-field col s6">
										<input id="mo-bin1" type="text" class="validate" name="bin" value="1:00 PM" required>
										<label for="mo-bin1">Break In:</label>
									</div>
							    </div>
							    <div class="modal-footer">
							      <button class=" modal-action waves-effect btn red left">Add</button>
							      <a href="#!" class=" modal-action modal-close waves-effect btn green">cancel</a>
							    </div>
						 	</div>
						 </form>
						 	<form method="POST" action="{{ url('home/deleteSchedule/delete') }}">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<input type="hidden" name="sched_id" value="{{$time_id_mo1}}">
							 	<div id="{{$time_id_mo1}}delete-mo1" class="modal" style="max-width:350px;">
								    <div class="modal-content center">
									      Are you sure you want to delete<br>
									      <b>Monday Schedule (day shift)?</b>
								    </div>
								    <div class="modal-footer">
								      <button class=" modal-action waves-effect btn red left">yes</button>
								      <a href="#!" class=" modal-action modal-close waves-effect btn green">No</a>
								    </div>
							 	</div>
						 	</form>		
					</td>
					<td class="center">
						@foreach ($tu1 as $tu1)
						<b>Working Time</b><br>
						{{date('h:i A', strtotime($tu1->in))}} - {{date('h:i A', strtotime($tu1->out))}} </br>
						{{--*/ $sched_id = $scheduleday1->id /*--}}
						<b>Break Time</b></br>
						{{date('h:i A', strtotime($tu1->breakin))}} - {{date('h:i A', strtotime($tu1->breakout))}} </br>
						{{--*/ $time_id_tu1 = $tu1->id; /*--}}
						@endforeach
						@if(Empty($time_id_tu1))
							<a class="modal-trigger" href="#{{$sched_id}}add-tu1"><i class="material-icons">add</i></a>
						@else
							<a class="modal-trigger" href="#{{$time_id_tu1}}delete-tu1"><i class="material-icons">delete</i></a>
						@endif
						<form method="POST" action="{{ url('home/addSchedule/tu1') }}">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<input type="hidden" name="sched_id" value="{{$sched_id}}">
							<input type="hidden" name="empid" value="{{$empid}}">
							<div id="{{$sched_id}}add-tu1" class="modal" style="max-width:350px;">
							    <div class="modal-content center">
							    <h4>Tuesday (Day Shift)</h4>
							        <div class="input-field col s6">
										<input id="tu-in1" type="text" class="validate" name="in" value="8:00 AM" required>
										<label for="tu-in1">Time In:</label>
									</div>
									<div class="input-field col s6">
										<input id="tu-out1" type="text" class="validate" name="out" value="5:00 PM" required>
										<label for="tu-out1">Time Out:</label>
									</div>
									<hr>
									 <div class="input-field col s6">
										<input id="tu-bout1" type="text" class="validate" name="bout" value="12:00 PM" required>
										<label for="tu-bout1">Break Out:</label>
									</div>
									<div class="input-field col s6">
										<input id="tu-bin1" type="text" class="validate" name="bin" value="1:00 PM" required>
										<label for="tu-bin1">Break In:</label>
									</div>
							    </div>
							    <div class="modal-footer">
							      <button class=" modal-action waves-effect btn red left">Add</button>
							      <a href="#!" class=" modal-action modal-close waves-effect btn green">cancel</a>
							    </div>
						 	</div>
						 </form>
						 	<form method="POST" action="{{ url('home/deleteSchedule/delete') }}">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<input type="hidden" name="sched_id" value="{{$time_id_tu1}}">
							 	<div id="{{$time_id_tu1}}delete-tu1" class="modal" style="max-width:350px;">
								    <div class="modal-content center">
									      Are you sure you want to delete<br>
									      <b>Tuesday Schedule (day shift)?</b>
								    </div>
								    <div class="modal-footer">
								      <button class=" modal-action waves-effect btn red left">yes</button>
								      <a href="#!" class=" modal-action modal-close waves-effect btn green">No</a>
								    </div>
							 	</div>
						 	</form>		
					</td>
					<td class="center">
						@foreach ($we1 as $we1)
						<b>Working Time</b><br>
						{{date('h:i A', strtotime($we1->in))}} - {{date('h:i A', strtotime($we1->out))}} </br>
						{{--*/ $sched_id = $scheduleday1->id /*--}}
						<b>Break Time</b></br>
						{{date('h:i A', strtotime($we1->breakin))}} - {{date('h:i A', strtotime($we1->breakout))}} </br>
						{{--*/ $time_id_we1 = $we1->id; /*--}}
						@endforeach
						@if(Empty($time_id_we1))
							<a class="modal-trigger" href="#{{$sched_id}}add-we1"><i class="material-icons">add</i></a>
						@else
							<a class="modal-trigger" href="#{{$time_id_we1}}delete-we1"><i class="material-icons">delete</i></a>
						@endif
						<form method="POST" action="{{ url('home/addSchedule/we1') }}">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<input type="hidden" name="sched_id" value="{{$sched_id}}">
							<input type="hidden" name="empid" value="{{$empid}}">
							<div id="{{$sched_id}}add-we1" class="modal" style="max-width:350px;">
							    <div class="modal-content center">
							    <h4>Wednesday (Day Shift)</h4>
							        <div class="input-field col s6">
										<input id="we-in1" type="text" class="validate" name="in" value="8:00 AM" required>
										<label for="we-in1">Time In:</label>
									</div>
									<div class="input-field col s6">
										<input id="we-out1" type="text" class="validate" name="out" value="5:00 PM" required>
										<label for="we-out1">Time Out:</label>
									</div>
									<hr>
									 <div class="input-field col s6">
										<input id="we-bout1" type="text" class="validate" name="bout" value="12:00 PM" required>
										<label for="we-bout1">Break Out:</label>
									</div>
									<div class="input-field col s6">
										<input id="we-bin1" type="text" class="validate" name="bin" value="1:00 PM" required>
										<label for="we-bin1">Break In:</label>
									</div>
							    </div>
							    <div class="modal-footer">
							      <button class=" modal-action waves-effect btn red left">Add</button>
							      <a href="#!" class=" modal-action modal-close waves-effect btn green">cancel</a>
							    </div>
						 	</div>
						 </form>
						 	<form method="POST" action="{{ url('home/deleteSchedule/delete') }}">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<input type="hidden" name="sched_id" value="{{$time_id_we1}}">
							 	<div id="{{$time_id_we1}}delete-we1" class="modal" style="max-width:350px;">
								    <div class="modal-content center">
									      Are you sure you want to delete<br>
									      <b>Wednesday Schedule (day shift)?</b>
								    </div>
								    <div class="modal-footer">
								      <button class=" modal-action waves-effect btn red left">yes</button>
								      <a href="#!" class=" modal-action modal-close waves-effect btn green">No</a>
								    </div>
							 	</div>
						 	</form>		
					</td>
					<td class="center">
						@foreach ($th1 as $th1)
						<b>Working Time</b><br>
						{{date('h:i A', strtotime($th1->in))}} - {{date('h:i A', strtotime($th1->out))}} </br>
						{{--*/ $sched_id = $scheduleday1->id /*--}}
						<b>Break Time</b></br>
						{{date('h:i A', strtotime($th1->breakin))}} - {{date('h:i A', strtotime($th1->breakout))}} </br>
						{{--*/ $time_id_th1 = $th1->id; /*--}}
						@endforeach
						@if(Empty($time_id_th1))
							<a class="modal-trigger" href="#{{$sched_id}}add-th1"><i class="material-icons">add</i></a>
						@else
							<a class="modal-trigger" href="#{{$time_id_th1}}delete-th1"><i class="material-icons">delete</i></a>
						@endif
						<form method="POST" action="{{ url('home/addSchedule/th1') }}">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<input type="hidden" name="sched_id" value="{{$sched_id}}">
							<input type="hidden" name="empid" value="{{$empid}}">
							<div id="{{$sched_id}}add-th1" class="modal" style="max-width:350px;">
							    <div class="modal-content center">
							    <h4>Thursday (Day Shift)</h4>
							        <div class="input-field col s6">
										<input id="th-in1" type="text" class="validate" name="in" value="8:00 AM" required>
										<label for="th-in1">Time In:</label>
									</div>
									<div class="input-field col s6">
										<input id="th-out1" type="text" class="validate" name="out" value="5:00 PM" required>
										<label for="th-out1">Time Out:</label>
									</div>
									<hr>
									 <div class="input-field col s6">
										<input id="th-bout1" type="text" class="validate" name="bout" value="12:00 PM" required>
										<label for="th-bout1">Break Out:</label>
									</div>
									<div class="input-field col s6">
										<input id="th-bin1" type="text" class="validate" name="bin" value="1:00 PM" required>
										<label for="th-bin1">Break In:</label>
									</div>
							    </div>
							    <div class="modal-footer">
							      <button class=" modal-action waves-effect btn red left">Add</button>
							      <a href="#!" class=" modal-action modal-close waves-effect btn green">cancel</a>
							    </div>
						 	</div>
						 </form>
						 	<form method="POST" action="{{ url('home/deleteSchedule/delete') }}">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<input type="hidden" name="sched_id" value="{{$time_id_th1}}">
							 	<div id="{{$time_id_th1}}delete-th1" class="modal" style="max-width:350px;">
								    <div class="modal-content center">
									      Are you sure you want to delete<br>
									      <b>Thursday Schedule (day shift)?</b>
								    </div>
								    <div class="modal-footer">
								      <button class=" modal-action waves-effect btn red left">yes</button>
								      <a href="#!" class=" modal-action modal-close waves-effect btn green">No</a>
								    </div>
							 	</div>
						 	</form>		
					</td>
					<td class="center">
						@foreach ($fr1 as $fr1)
						<b>Working Time</b><br>
						{{date('h:i A', strtotime($fr1->in))}} - {{date('h:i A', strtotime($fr1->out))}} </br>
						{{--*/ $sched_id = $scheduleday1->id /*--}}
						<b>Break Time</b></br>
						{{date('h:i A', strtotime($fr1->breakin))}} - {{date('h:i A', strtotime($fr1->breakout))}} </br>
						{{--*/ $time_id_fr1 = $fr1->id; /*--}}
						@endforeach
						@if(Empty($time_id_fr1))
							<a class="modal-trigger" href="#{{$sched_id}}add-fr1"><i class="material-icons">add</i></a>
						@else
							<a class="modal-trigger" href="#{{$time_id_fr1}}delete-fr1"><i class="material-icons">delete</i></a>
						@endif
						<form method="POST" action="{{ url('home/addSchedule/fr1') }}">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<input type="hidden" name="sched_id" value="{{$sched_id}}">
							<input type="hidden" name="empid" value="{{$empid}}">
							<div id="{{$sched_id}}add-fr1" class="modal" style="max-width:350px;">
							    <div class="modal-content center">
							    <h4>Friday (Day Shift)</h4>
							        <div class="input-field col s6">
										<input id="fr-in1" type="text" class="validate" name="in" value="8:00 AM" required>
										<label for="fr-in1">Time In:</label>
									</div>
									<div class="input-field col s6">
										<input id="fr-out1" type="text" class="validate" name="out" value="5:00 PM" required>
										<label for="fr-out1">Time Out:</label>
									</div>
									<hr>
									 <div class="input-field col s6">
										<input id="fr-bout1" type="text" class="validate" name="bout" value="12:00 PM" required>
										<label for="fr-bout1">Break Out:</label>
									</div>
									<div class="input-field col s6">
										<input id="fr-bin1" type="text" class="validate" name="bin" value="1:00 PM" required>
										<label for="fr-bin1">Break In:</label>
									</div>
							    </div>
							    <div class="modal-footer">
							      <button class=" modal-action waves-effect btn red left">Add</button>
							      <a href="#!" class=" modal-action modal-close waves-effect btn green">cancel</a>
							    </div>
						 	</div>
						 </form>
						 	<form method="POST" action="{{ url('home/deleteSchedule/delete') }}">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<input type="hidden" name="sched_id" value="{{$time_id_fr1}}">
							 	<div id="{{$time_id_fr1}}delete-fr1" class="modal" style="max-width:350px;">
								    <div class="modal-content center">
									      Are you sure you want to delete<br>
									      <b>Friday Schedule (day shift)?</b>
								    </div>
								    <div class="modal-footer">
								      <button class=" modal-action waves-effect btn red left">yes</button>
								      <a href="#!" class=" modal-action modal-close waves-effect btn green">No</a>
								    </div>
							 	</div>
						 	</form>		
					</td>
					<td class="center">
						@foreach ($sa1 as $sa1)
						<b>Working Time</b><br>
						{{date('h:i A', strtotime($sa1->in))}} - {{date('h:i A', strtotime($sa1->out))}} </br>
						{{--*/ $sched_id = $scheduleday1->id /*--}}
						<b>Break Time</b></br>
						{{date('h:i A', strtotime($sa1->breakin))}} - {{date('h:i A', strtotime($sa1->breakout))}} </br>
						{{--*/ $time_id_sa1 = $sa1->id; /*--}}
						@endforeach
						@if(Empty($time_id_sa1))
							<a class="modal-trigger" href="#{{$sched_id}}add-sa1"><i class="material-icons">add</i></a>
						@else
							<a class="modal-trigger" href="#{{$time_id_sa1}}delete-sa1"><i class="material-icons">delete</i></a>
						@endif
						<form method="POST" action="{{ url('home/addSchedule/sa1') }}">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<input type="hidden" name="sched_id" value="{{$sched_id}}">
							<input type="hidden" name="empid" value="{{$empid}}">
							<div id="{{$sched_id}}add-sa1" class="modal" style="max-width:350px;">
							    <div class="modal-content center">
							    <h4>Saturday (Day Shift)</h4>
							        <div class="input-field col s6">
										<input id="sa-in1" type="text" class="validate" name="in" value="8:00 AM" required>
										<label for="sa-in1">Time In:</label>
									</div>
									<div class="input-field col s6">
										<input id="sa-out1" type="text" class="validate" name="out" value="5:00 PM" required>
										<label for="sa-out1">Time Out:</label>
									</div>
									<hr>
									 <div class="input-field col s6">
										<input id="sa-bout1" type="text" class="validate" name="bout" value="12:00 PM" required>
										<label for="sa-bout1">Break Out:</label>
									</div>
									<div class="input-field col s6">
										<input id="sa-bin1" type="text" class="validate" name="bin" value="1:00 PM" required>
										<label for="sa-bin1">Break In:</label>
									</div>
							    </div>
							    <div class="modal-footer">
							      <button class=" modal-action waves-effect btn red left">Add</button>
							      <a href="#!" class=" modal-action modal-close waves-effect btn green">cancel</a>
							    </div>
						 	</div>
						 </form>
						 	<form method="POST" action="{{ url('home/deleteSchedule/delete') }}">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<input type="hidden" name="sched_id" value="{{$time_id_sa1}}">
							 	<div id="{{$time_id_sa1}}delete-sa1" class="modal" style="max-width:350px;">
								    <div class="modal-content center">
									      Are you sure you want to delete<br>
									      <b>Saturday Schedule (day shift)?</b>
								    </div>
								    <div class="modal-footer">
								      <button class=" modal-action waves-effect btn red left">yes</button>
								      <a href="#!" class=" modal-action modal-close waves-effect btn green">No</a>
								    </div>
							 	</div>
						 	</form>		
					</td>
				</tr>
				 
			</tbody>
		</table>
	</div>
</div>

<div class="row">
	<div class="col s12">
		<h5>Night Shift Schedule</h5>
		<table class="responsive-table striped ">
			<thead>
				<tr>
					<th>Su</th>
					<th>Mo</th>
					<th>Tu</th>
					<th>We</th>
					<th>Th</th>
					<th>Fr</th>
					<th>Sa</th>
				</tr>
			</thead>

			<tbody>
				<tr>
					<td class="center">
						 {{--*/ $time_id_su2 = null; 
						 		$time_id_mo2 = null;
						 		$time_id_tu2 = null;
						 		$time_id_we2 = null;
						 		$time_id_th2 = null;
						 		$time_id_fr2 = null;
						 		$time_id_sa2 = null;	
						  /*--}}
						 {{--*/ $sched_id = null; /*--}}
						@foreach ($scheduleday2 as $scheduleday2)
							{{--*/ $sched_id = $scheduleday2->id /*--}}
						@endforeach
						@foreach ($su2 as $su2)
							<b>Working Time</b><br>
							{{date('h:i A', strtotime($su2->in))}} - {{date('h:i A', strtotime($su2->out))}} </br>
							<b>Break Time</b></br>
							{{date('h:i A', strtotime($su2->breakin))}} - {{date('h:i A', strtotime($su2->breakout))}} </br>
							{{--*/ $time_id_su2 = $su2->id; /*--}}
						@endforeach
						@if(Empty($time_id_su2))
							<a class="modal-trigger" href="#{{$sched_id}}add-su2"><i class="material-icons">add</i></a>
						@else
							<a class="modal-trigger" href="#{{$time_id_su2}}delete-su2"><i class="material-icons">delete</i></a>
						@endif
						<form method="POST" action="{{ url('home/addSchedule/su2') }}">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<input type="hidden" name="sched_id" value="{{$sched_id}}">
							<input type="hidden" name="empid" value="{{$empid}}">
							<div id="{{$sched_id}}add-su2" class="modal" style="max-width:350px;">
							    <div class="modal-content center">
							    <h4>Sunday (night shift)</h4>
							        <div class="input-field col s6">
										<input id="su-in2" type="text" class="validate" name="in" value="8:00 AM" required>
										<label for="su-in2">Time In:</label>
									</div>
									<div class="input-field col s6">
										<input id="su-out2" type="text" class="validate" name="out" value="5:00 PM" required>
										<label for="su-out2">Time Out:</label>
									</div>
									<hr>
									 <div class="input-field col s6">
										<input id="su-bout2" type="text" class="validate" name="bout" value="12:00 PM" required>
										<label for="su-bout2">Break Out:</label>
									</div>
									<div class="input-field col s6">
										<input id="su-bin2" type="text" class="validate" name="bin" value="1:00 PM" required>
										<label for="su-bin2">Break In:</label>
									</div>
							    </div>
							    <div class="modal-footer">
							      <button class=" modal-action waves-effect btn red left">Add</button>
							      <a href="#!" class=" modal-action modal-close waves-effect btn green">cancel</a>
							    </div>
						 	</div>
						 </form>
						 	<form method="POST" action="{{ url('home/deleteSchedule/delete') }}">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<input type="hidden" name="sched_id" value="{{$time_id_su2}}">
							 	<div id="{{$time_id_su2}}delete-su2" class="modal" style="max-width:350px;">
								    <div class="modal-content center">
									      Are you sure you want to delete<br>
									      <b>Sunday Schedule (night shift)?</b>
								    </div>
								    <div class="modal-footer">
								      <button class=" modal-action waves-effect btn red left">yes</button>
								      <a href="#!" class=" modal-action modal-close waves-effect btn green">No</a>
								    </div>
							 	</div>
						 	</form>		
					</td>
					<td class="center">
						@foreach ($mo2 as $mo2)
						<b>Working Time</b><br>
						{{date('h:i A', strtotime($mo2->in))}} - {{date('h:i A', strtotime($mo2->out))}} </br>
						{{--*/ $sched_id = $scheduleday2->id /*--}}
						<b>Break Time</b></br>
						{{date('h:i A', strtotime($mo2->breakin))}} - {{date('h:i A', strtotime($mo2->breakout))}} </br>
						{{--*/ $time_id_mo2 = $mo2->id; /*--}}
						@endforeach
						@if(Empty($time_id_mo2))
							<a class="modal-trigger" href="#{{$sched_id}}add-mo2"><i class="material-icons">add</i></a>
						@else
							<a class="modal-trigger" href="#{{$time_id_mo2}}delete-mo2"><i class="material-icons">delete</i></a>
						@endif
						<form method="POST" action="{{ url('home/addSchedule/mo2') }}">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<input type="hidden" name="sched_id" value="{{$sched_id}}">
							<input type="hidden" name="empid" value="{{$empid}}">
							<div id="{{$sched_id}}add-mo2" class="modal" style="max-width:350px;">
							    <div class="modal-content center">
							    <h4>Monday (night shift)</h4>
							        <div class="input-field col s6">
										<input id="mo-in2" type="text" class="validate" name="in" value="8:00 AM" required>
										<label for="mo-in2">Time In:</label>
									</div>
									<div class="input-field col s6">
										<input id="mo-out2" type="text" class="validate" name="out" value="5:00 PM" required>
										<label for="mo-out2">Time Out:</label>
									</div>
									<hr>
									 <div class="input-field col s6">
										<input id="mo-bout2" type="text" class="validate" name="bout" value="12:00 PM" required>
										<label for="mo-bout2">Break Out:</label>
									</div>
									<div class="input-field col s6">
										<input id="mo-bin2" type="text" class="validate" name="bin" value="1:00 PM" required>
										<label for="mo-bin2">Break In:</label>
									</div>
							    </div>
							    <div class="modal-footer">
							      <button class=" modal-action waves-effect btn red left">Add</button>
							      <a href="#!" class=" modal-action modal-close waves-effect btn green">cancel</a>
							    </div>
						 	</div>
						 </form>
						 	<form method="POST" action="{{ url('home/deleteSchedule/delete') }}">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<input type="hidden" name="sched_id" value="{{$time_id_mo2}}">
							 	<div id="{{$time_id_mo2}}delete-mo2" class="modal" style="max-width:350px;">
								    <div class="modal-content center">
									      Are you sure you want to delete<br>
									      <b>Monday Schedule (night shift)?</b>
								    </div>
								    <div class="modal-footer">
								      <button class=" modal-action waves-effect btn red left">yes</button>
								      <a href="#!" class=" modal-action modal-close waves-effect btn green">No</a>
								    </div>
							 	</div>
						 	</form>		
					</td>
					<td class="center">
						@foreach ($tu2 as $tu2)
						<b>Working Time</b><br>
						{{date('h:i A', strtotime($tu2->in))}} - {{date('h:i A', strtotime($tu2->out))}} </br>
						{{--*/ $sched_id = $scheduleday2->id /*--}}
						<b>Break Time</b></br>
						{{date('h:i A', strtotime($tu2->breakin))}} - {{date('h:i A', strtotime($tu2->breakout))}} </br>
						{{--*/ $time_id_tu2 = $tu2->id; /*--}}
						@endforeach
						@if(Empty($time_id_tu2))
							<a class="modal-trigger" href="#{{$sched_id}}add-tu2"><i class="material-icons">add</i></a>
						@else
							<a class="modal-trigger" href="#{{$time_id_tu2}}delete-tu2"><i class="material-icons">delete</i></a>
						@endif
						<form method="POST" action="{{ url('home/addSchedule/tu2') }}">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<input type="hidden" name="sched_id" value="{{$sched_id}}">
							<input type="hidden" name="empid" value="{{$empid}}">
							<div id="{{$sched_id}}add-tu2" class="modal" style="max-width:350px;">
							    <div class="modal-content center">
							    <h4>Tuesday (night shift)</h4>
							        <div class="input-field col s6">
										<input id="tu-in2" type="text" class="validate" name="in" value="8:00 AM" required>
										<label for="tu-in2">Time In:</label>
									</div>
									<div class="input-field col s6">
										<input id="tu-out2" type="text" class="validate" name="out" value="5:00 PM" required>
										<label for="tu-out2">Time Out:</label>
									</div>
									<hr>
									 <div class="input-field col s6">
										<input id="tu-bout2" type="text" class="validate" name="bout" value="12:00 PM" required>
										<label for="tu-bout2">Break Out:</label>
									</div>
									<div class="input-field col s6">
										<input id="tu-bin2" type="text" class="validate" name="bin" value="1:00 PM" required>
										<label for="tu-bin2">Break In:</label>
									</div>
							    </div>
							    <div class="modal-footer">
							      <button class=" modal-action waves-effect btn red left">Add</button>
							      <a href="#!" class=" modal-action modal-close waves-effect btn green">cancel</a>
							    </div>
						 	</div>
						 </form>
						 	<form method="POST" action="{{ url('home/deleteSchedule/delete') }}">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<input type="hidden" name="sched_id" value="{{$time_id_tu2}}">
							 	<div id="{{$time_id_tu2}}delete-tu2" class="modal" style="max-width:350px;">
								    <div class="modal-content center">
									      Are you sure you want to delete<br>
									      <b>Tuesday Schedule (night shift)?</b>
								    </div>
								    <div class="modal-footer">
								      <button class=" modal-action waves-effect btn red left">yes</button>
								      <a href="#!" class=" modal-action modal-close waves-effect btn green">No</a>
								    </div>
							 	</div>
						 	</form>		
					</td>
					<td class="center">
						@foreach ($we2 as $we2)
						<b>Working Time</b><br>
						{{date('h:i A', strtotime($we2->in))}} - {{date('h:i A', strtotime($we2->out))}} </br>
						{{--*/ $sched_id = $scheduleday2->id /*--}}
						<b>Break Time</b></br>
						{{date('h:i A', strtotime($we2->breakin))}} - {{date('h:i A', strtotime($we2->breakout))}} </br>
						{{--*/ $time_id_we2 = $we2->id; /*--}}
						@endforeach
						@if(Empty($time_id_we2))
							<a class="modal-trigger" href="#{{$sched_id}}add-we2"><i class="material-icons">add</i></a>
						@else
							<a class="modal-trigger" href="#{{$time_id_we2}}delete-we2"><i class="material-icons">delete</i></a>
						@endif
						<form method="POST" action="{{ url('home/addSchedule/we2') }}">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<input type="hidden" name="sched_id" value="{{$sched_id}}">
							<input type="hidden" name="empid" value="{{$empid}}">
							<div id="{{$sched_id}}add-we2" class="modal" style="max-width:350px;">
							    <div class="modal-content center">
							    <h4>Wednesday (night shift)</h4>
							        <div class="input-field col s6">
										<input id="we-in2" type="text" class="validate" name="in" value="8:00 AM" required>
										<label for="we-in2">Time In:</label>
									</div>
									<div class="input-field col s6">
										<input id="we-out2" type="text" class="validate" name="out" value="5:00 PM" required>
										<label for="we-out2">Time Out:</label>
									</div>
									<hr>
									 <div class="input-field col s6">
										<input id="we-bout2" type="text" class="validate" name="bout" value="12:00 PM" required>
										<label for="we-bout2">Break Out:</label>
									</div>
									<div class="input-field col s6">
										<input id="we-bin2" type="text" class="validate" name="bin" value="1:00 PM" required>
										<label for="we-bin2">Break In:</label>
									</div>
							    </div>
							    <div class="modal-footer">
							      <button class=" modal-action waves-effect btn red left">Add</button>
							      <a href="#!" class=" modal-action modal-close waves-effect btn green">cancel</a>
							    </div>
						 	</div>
						 </form>
						 	<form method="POST" action="{{ url('home/deleteSchedule/delete') }}">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<input type="hidden" name="sched_id" value="{{$time_id_we2}}">
							 	<div id="{{$time_id_we2}}delete-we2" class="modal" style="max-width:350px;">
								    <div class="modal-content center">
									      Are you sure you want to delete<br>
									      <b>Wednesday Schedule (night shift)?</b>
								    </div>
								    <div class="modal-footer">
								      <button class=" modal-action waves-effect btn red left">yes</button>
								      <a href="#!" class=" modal-action modal-close waves-effect btn green">No</a>
								    </div>
							 	</div>
						 	</form>		
					</td>
					<td class="center">
						@foreach ($th2 as $th2)
						<b>Working Time</b><br>
						{{date('h:i A', strtotime($th2->in))}} - {{date('h:i A', strtotime($th2->out))}} </br>
						{{--*/ $sched_id = $scheduleday2->id /*--}}
						<b>Break Time</b></br>
						{{date('h:i A', strtotime($th2->breakin))}} - {{date('h:i A', strtotime($th2->breakout))}} </br>
						{{--*/ $time_id_th2 = $th2->id; /*--}}
						@endforeach
						@if(Empty($time_id_th2))
							<a class="modal-trigger" href="#{{$sched_id}}add-th2"><i class="material-icons">add</i></a>
						@else
							<a class="modal-trigger" href="#{{$time_id_th2}}delete-th2"><i class="material-icons">delete</i></a>
						@endif
						<form method="POST" action="{{ url('home/addSchedule/th2') }}">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<input type="hidden" name="sched_id" value="{{$sched_id}}">
							<input type="hidden" name="empid" value="{{$empid}}">
							<div id="{{$sched_id}}add-th2" class="modal" style="max-width:350px;">
							    <div class="modal-content center">
							    <h4>Thursday (night shift)</h4>
							        <div class="input-field col s6">
										<input id="th-in2" type="text" class="validate" name="in" value="8:00 AM" required>
										<label for="th-in2">Time In:</label>
									</div>
									<div class="input-field col s6">
										<input id="th-out2" type="text" class="validate" name="out" value="5:00 PM" required>
										<label for="th-out2">Time Out:</label>
									</div>
									<hr>
									 <div class="input-field col s6">
										<input id="th-bout2" type="text" class="validate" name="bout" value="12:00 PM" required>
										<label for="th-bout2">Break Out:</label>
									</div>
									<div class="input-field col s6">
										<input id="th-bin2" type="text" class="validate" name="bin" value="1:00 PM" required>
										<label for="th-bin2">Break In:</label>
									</div>
							    </div>
							    <div class="modal-footer">
							      <button class=" modal-action waves-effect btn red left">Add</button>
							      <a href="#!" class=" modal-action modal-close waves-effect btn green">cancel</a>
							    </div>
						 	</div>
						 </form>
						 	<form method="POST" action="{{ url('home/deleteSchedule/delete') }}">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<input type="hidden" name="sched_id" value="{{$time_id_th2}}">
							 	<div id="{{$time_id_th2}}delete-th2" class="modal" style="max-width:350px;">
								    <div class="modal-content center">
									      Are you sure you want to delete<br>
									      <b>Thursday Schedule (night shift)?</b>
								    </div>
								    <div class="modal-footer">
								      <button class=" modal-action waves-effect btn red left">yes</button>
								      <a href="#!" class=" modal-action modal-close waves-effect btn green">No</a>
								    </div>
							 	</div>
						 	</form>		
					</td>
					<td class="center">
						@foreach ($fr2 as $fr2)
						<b>Working Time</b><br>
						{{date('h:i A', strtotime($fr2->in))}} - {{date('h:i A', strtotime($fr2->out))}} </br>
						{{--*/ $sched_id = $scheduleday2->id /*--}}
						<b>Break Time</b></br>
						{{date('h:i A', strtotime($fr2->breakin))}} - {{date('h:i A', strtotime($fr2->breakout))}} </br>
						{{--*/ $time_id_fr2 = $fr2->id; /*--}}
						@endforeach
						@if(Empty($time_id_fr2))
							<a class="modal-trigger" href="#{{$sched_id}}add-fr2"><i class="material-icons">add</i></a>
						@else
							<a class="modal-trigger" href="#{{$time_id_fr2}}delete-fr2"><i class="material-icons">delete</i></a>
						@endif
						<form method="POST" action="{{ url('home/addSchedule/fr2') }}">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<input type="hidden" name="sched_id" value="{{$sched_id}}">
							<input type="hidden" name="empid" value="{{$empid}}">
							<div id="{{$sched_id}}add-fr2" class="modal" style="max-width:350px;">
							    <div class="modal-content center">
							    <h4>Friday (night shift)</h4>
							        <div class="input-field col s6">
										<input id="fr-in2" type="text" class="validate" name="in" value="8:00 AM" required>
										<label for="fr-in2">Time In:</label>
									</div>
									<div class="input-field col s6">
										<input id="fr-out2" type="text" class="validate" name="out" value="5:00 PM" required>
										<label for="fr-out2">Time Out:</label>
									</div>
									<hr>
									 <div class="input-field col s6">
										<input id="fr-bout2" type="text" class="validate" name="bout" value="12:00 PM" required>
										<label for="fr-bout2">Break Out:</label>
									</div>
									<div class="input-field col s6">
										<input id="fr-bin2" type="text" class="validate" name="bin" value="1:00 PM" required>
										<label for="fr-bin2">Break In:</label>
									</div>
							    </div>
							    <div class="modal-footer">
							      <button class=" modal-action waves-effect btn red left">Add</button>
							      <a href="#!" class=" modal-action modal-close waves-effect btn green">cancel</a>
							    </div>
						 	</div>
						 </form>
						 	<form method="POST" action="{{ url('home/deleteSchedule/delete') }}">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<input type="hidden" name="sched_id" value="{{$time_id_fr2}}">
							 	<div id="{{$time_id_fr2}}delete-fr2" class="modal" style="max-width:350px;">
								    <div class="modal-content center">
									      Are you sure you want to delete<br>
									      <b>Friday Schedule (night shift)?</b>
								    </div>
								    <div class="modal-footer">
								      <button class=" modal-action waves-effect btn red left">yes</button>
								      <a href="#!" class=" modal-action modal-close waves-effect btn green">No</a>
								    </div>
							 	</div>
						 	</form>		
					</td>
					<td class="center">
						@foreach ($sa2 as $sa2)
						<b>Working Time</b><br>
						{{date('h:i A', strtotime($sa2->in))}} - {{date('h:i A', strtotime($sa2->out))}} </br>
						{{--*/ $sched_id = $scheduleday2->id /*--}}
						<b>Break Time</b></br>
						{{date('h:i A', strtotime($sa2->breakin))}} - {{date('h:i A', strtotime($sa2->breakout))}} </br>
						{{--*/ $time_id_sa2 = $sa2->id; /*--}}
						@endforeach
						@if(Empty($time_id_sa2))
							<a class="modal-trigger" href="#{{$sched_id}}add-sa2"><i class="material-icons">add</i></a>
						@else
							<a class="modal-trigger" href="#{{$time_id_sa2}}delete-sa2"><i class="material-icons">delete</i></a>
						@endif
						<form method="POST" action="{{ url('home/addSchedule/sa2') }}">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<input type="hidden" name="sched_id" value="{{$sched_id}}">
							<input type="hidden" name="empid" value="{{$empid}}">
							<div id="{{$sched_id}}add-sa2" class="modal" style="max-width:350px;">
							    <div class="modal-content center">
							    <h4>Saturday (night shift)</h4>
							        <div class="input-field col s6">
										<input id="sa-in2" type="text" class="validate" name="in" value="8:00 AM" required>
										<label for="sa-in2">Time In:</label>
									</div>
									<div class="input-field col s6">
										<input id="sa-out2" type="text" class="validate" name="out" value="5:00 PM" required>
										<label for="sa-out2">Time Out:</label>
									</div>
									<hr>
									 <div class="input-field col s6">
										<input id="sa-bout2" type="text" class="validate" name="bout" value="12:00 PM" required>
										<label for="sa-bout2">Break Out:</label>
									</div>
									<div class="input-field col s6">
										<input id="sa-bin2" type="text" class="validate" name="bin" value="1:00 PM" required>
										<label for="sa-bin2">Break In:</label>
									</div>
							    </div>
							    <div class="modal-footer">
							      <button class=" modal-action waves-effect btn red left">Add</button>
							      <a href="#!" class=" modal-action modal-close waves-effect btn green">cancel</a>
							    </div>
						 	</div>
						 </form>
						 	<form method="POST" action="{{ url('home/deleteSchedule/delete') }}">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<input type="hidden" name="sched_id" value="{{$time_id_sa2}}">
							 	<div id="{{$time_id_sa2}}delete-sa2" class="modal" style="max-width:350px;">
								    <div class="modal-content center">
									      Are you sure you want to delete<br>
									      <b>Saturday Schedule (night shift)?</b>
								    </div>
								    <div class="modal-footer">
								      <button class=" modal-action waves-effect btn red left">yes</button>
								      <a href="#!" class=" modal-action modal-close waves-effect btn green">No</a>
								    </div>
							 	</div>
						 	</form>		
					</td>
				</tr>
				 <div id="" class="modal" style="max-width:350px;">
				    <div class="modal-content center">
				      
				    </div>
				    <div class="modal-footer">
				      <a href="" class=" modal-action waves-effect btn red left">yes</a>
				      <a href="#!" class=" modal-action modal-close waves-effect btn green">No</a>
				    </div>
				 </div>
			</tbody>
		</table>
	</div>
</div>
@endsection