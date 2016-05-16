@extends('home')
@section('content')
<form method="POST" action="{{ url('home/employees/save') }}" enctype="multipart/form-data">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<div class="row">
	<div class="col s12">
		<div class="card-panel hoverable" style="background-image:url('http://materializecss.com/images/sample-1.jpg'); width: 100%; height: 100%;"><h3 class="white-text">Add Employees</h3>
		</div>
	</div>
</div>
<div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
	<a class="btn-floating btn-large waves-effect waves-light red tooltipped" data-position="left" data-delay="50" data-tooltip="Back" href="/home/employees"><i class="material-icons">replay</i></a>
</div>
	<div style="width:50%; margin:0 auto;">
	      <h3 class="center"><img class="responsive-img circle" src="http://materializecss.com/images/yuna.jpg"></h3>
	      <h5>Employee Information</h5>
	      <div class="divider"></div>
	      <div class="row">
	      	<div class="file-field input-field">
				<div class="btn">
					<span>Browse</span>
					<input type="file" name="file">
				</div>
				<div class="file-path-wrapper">
					<input class="file-path validate" type="text" placeholder="Upload Employee Picture"  name="path">
				</div>
			</div>
			<div class="input-field col s6">
				<input id="emp_id" type="text" class="validate" name="empid" value="{{Request::old('empid')}}" required>
				<label for="emp_id">ID</label>
			</div>
			<div class="input-field col s6">
				<input id="last_name" type="text" class="validate" name="lastname"  value="{{Request::old('lastname')}}" required>
				<label for="last_name">Last Name</label>
			</div>
			<div class="input-field col s6">
				<input id="first_name" type="text" class="validate" name="firstname" value="{{Request::old('firstname')}}" required>
				<label for="first_name">First Name</label>
			</div>
			<div class="input-field col s6">
				<input id="middle_name" type="text" class="validate" name="middlename" value="{{Request::old('middlename')}}" required>
				<label for="middle_name">Middle Name</label>
			</div>
			<div class="input-field col s6">
				<input id="email" type="email" class="validate" name="emailadd" value="{{Request::old('emailadd')}}">
	          	<label for="email" data-error="Wrong Email" data-success="Valid Email">Emaill Address</label>
			</div>
			<div class="input-field col s6">
				<input type="date" class="datepicker" id="bday" name="birthday" value="{{Request::old('birthday')}}" required> 
				<label for="bday">Birth Day</label>
			</div>
			<div class="input-field col s6">
				<select name="civil_status">
			      <option value="" disabled selected>Choose Status</option>
			      @if (Request::old('civil_status') <> '')
			      <option value="{{Request::old('civil_status')}}" selected>{{Request::old('civil_status')}}</option>
			      @endif
			      <option value="Single">Single</option>
			      <option value="Married">Married</option>
			      <option value="Widowed">Widowed</option>
			    </select>
	    		<label>Select Civil Status</label>
			</div>
			<div class="input-field col s6">
				<input id="phone" type="number" class="validate" name="phonenumber" onkeypress="return isNumberKey(event)" value="{{Request::old('phonenumber')}}">
				<label for="phone">Phone #</label>
			</div>
			<div class="input-field col s6">
				<input id="emp_religion" type="text" class="validate" name="religion" value="{{Request::old('religion')}}" required>
				<label for="emp_religion">Religion</label>
			</div>
			<div class="input-field col s6">
				<input id="zip" type="number" class="validate" name="zipnumber" onkeypress="return isNumberKey(event)" value="{{Request::old('zipnumber')}}" required>
				<label for="zip">Zip Code</label>
			</div>
			<div class="input-field col s6">
	          <textarea id="addrs" class="materialize-textarea" name="address" value="" required>{{Request::old('address')}}</textarea>
	          <label for="addrs">Address</label>
			</div>
			<div class="input-field col s6">
				<p>
				
				
				@if (Request::old('gender') == 'Male')
			      <input name="gender" type="radio" id="gen_male" value="Male" checked/>
			      <label for="gen_male">Male</label>
			      <input name="gender" type="radio" id="gen_female" value="Female"/>
			      <label for="gen_female">Female</label>
			    @elseif (Request::old('gender') == 'Female')
			      <input name="gender" type="radio" id="gen_male" value="Male" />
			      <label for="gen_male">Male</label>
			      <input name="gender" type="radio" id="gen_female" value="Female" checked/>
			      <label for="gen_female">Female</label>
			    @else
			    	<input name="gender" type="radio" id="gen_male" value="Male" checked/>
			    	<label for="gen_male">Male</label>
			        <input name="gender" type="radio" id="gen_female" value="Female"/>
			        <label for="gen_female">Female</label>
			    @endif
	    		</p>
			</div>
	      </div>
	      <h5>Salary Details</h5>
	      <div class="divider"></div>
	      <div class="row">
			<div class="input-field col s6">
				<input id="bs" type="text" class="validate" name="basicsalary" value="{{Request::old('basicsalary')}}" required>
				<label for="bs">Basic Salary</label>
			</div>
			<div class="input-field col s6">
				<input id="minis" type="number" step="0.01" name="deminis" value="{{Request::old('deminis')}}">
				<label for="minis">De Minimis Total</label>
			</div>
			<div class="input-field col s6">
				<select name="taxcon">
			      <option value="" disabled selected>Choose Contribution</option>
			      @if (Request::old('taxcon') <> '')
			      <option value="{{Request::old('taxcon')}}" selected>{{Request::old('taxcon')}}</option>
			      @endif
			      <option value="Single">Single</option>
			    </select>
	    		<label>TAX Contribution</label>
			</div>
			<div class="input-field col s6">
				<select name="ssscon">
			      <option value="" disabled selected>Choose Contribution</option>
			      @if (Request::old('ssscon') <> '')
			      <option value="{{Request::old('ssscon')}}" selected>{{Request::old('ssscon')}}</option>
			      @endif
			      <option value="Single">Single</option>
			    </select>
	    		<label>SSS Contribution</label>
			</div>
			<div class="input-field col s6">
				<select name="philcon">
			      <option value="" disabled selected>Choose Contribution</option>
			      @if (Request::old('philcon') <> '')
			      <option value="{{Request::old('philcon')}}" selected>{{Request::old('philcon')}}</option>
			      @endif
			      <option value="Single">Single</option>
			    </select>
	    		<label>PhilHealth Contribution</label>
			</div>
			<div class="input-field col s6">
				<select name="pagibigcon">
			      <option value="" disabled selected>Choose Contribution</option>
			      @if (Request::old('pagibigcon') <> '')
			      <option value="{{Request::old('pagibigcon')}}" selected>{{Request::old('pagibigcon')}}</option>
			      @endif
			      <option value="Single">Single</option>
			    </select>
	    		<label>Pag-ibig Contribution</label>
			</div>
	      </div>
	      <h5>Job Details</h5>
	      <div class="divider"></div>
	      <div class="row">
	      		<div class="input-field col s6">
				<select name="branch">
			      <option value="" disabled selected>Choose Branch</option>
			      @if (Request::old('branch') <> '')
			      <option value="{{Request::old('branch')}}" selected>{{Request::old('branch')}}</option>
			      @endif
			      <option value="Single">Single</option>
			    </select>
	    		<label>Select Branch</label>
			</div>
			<div class="input-field col s6">
				<input id="pos" type="text" class="validate" name="position" value="{{Request::old('position')}}" required>
				<label for="pos">Position</label>
			</div>
			<div class="input-field col s6">
				<select name="department">
			      <option value="" disabled selected>Choose Department</option>
			      @if (Request::old('department') <> '')
			      <option value="{{Request::old('department')}}" selected>{{Request::old('department')}}</option>
			      @endif
			      <option value="Single">Single</option>
			    </select>
	    		<label>Department</label>
			</div>
			<div class="input-field col s6">
				<input type="date" class="datepicker" id="startdate" name="startdate" value="{{Request::old('startdate')}}" required>
				<label for="startdate">Start Date</label>
			</div>
			<div class="input-field col s6">
				<select name="employmentstatus">
			      <option value="" disabled selected>Choose Status</option>
			      @if (Request::old('employmentstatus') <> '')
			      <option value="{{Request::old('employmentstatus')}}" selected>{{Request::old('employmentstatus')}}</option>
			      @endif
			      <option value="Single">Single</option>
			    </select>
	    		<label>Employment Status</label>
			</div>
			<div class="input-field col s6">
				<input id="dh" type="number" step="0.01" class="validate" name="dailyhourrate" value="{{Request::old('dailyhourrate')}}">
				<label for="dh">Daily Hour</label>
			</div>
			<div class="input-field col s6">
				<input id="tin" type="text" class="validate" name="tinnum" value="{{Request::old('tinnum')}}">
				<label for="tin">TIN#</label>
			</div>
			<div class="input-field col s6">
				<input id="phil" type="text" class="validate" name="philhealthnum" value="{{Request::old('philhealthnum')}}">
				<label for="phil">PhilHealth#</label>
			</div>
			<div class="input-field col s6">
				<input id="sss" type="text" class="validate" name="sssnum" value="{{Request::old('sssnum')}}">
				<label for="sss">SSS#</label>
			</div>
			<div class="input-field col s6">
				<input id="hdnf" type="text" class="validate" name="pagibignum" value="{{Request::old('pagibignum')}}">
				<label for="hdnf">HDMF#</label>
			</div>
	      </div>
	      <h5>Employment Information</h5>
	      <div class="divider"></div>
	      <div class="row">
			<div class="input-field col s6">
				<input id="sick" type="number" step="0.5" class="validate" name="sickleave" value="{{Request::old('sickleave')}}">
				<label for="sick">Sick Leave</label>
			</div>
			<div class="input-field col s6">
				<input id="vec" type="number" step="0.5" class="validate" name="vacaleave" value="{{Request::old('vacaleave')}}">
				<label for="vec">Vacation Leave</label>
			</div>
	      </div>
	      <h5>Dependents</h5>
	      <div class="divider"></div>
	      <div class="row">
			<div class="input-field col s6">
				<input id="dep1" type="text" class="validate" name="dependent1" value="{{Request::old('dependent1')}}">
				<label for="dep1">Dependent 1</label>
			</div>
			<div class="input-field col s6">
				<input type="date" class="datepicker" id="bday1" name="birthday1" value="{{Request::old('birthday1')}}">
				<label for="bday1">Birth Day</label>
			</div>
			<div class="input-field col s6">
				<input id="dep2" type="text" class="validate" name="dependent2" value="{{Request::old('dependent2')}}">
				<label for="dep2">Dependent 2</label>
			</div>
			<div class="input-field col s6">
				<input type="date" class="datepicker" id="bday2" name="birthday2" value="{{Request::old('birthday2')}}">
				<label for="bday2">Birth Day</label>
			</div>
			<div class="input-field col s6">
				<input id="dep3" type="text" class="validate" name="dependent3" value="{{Request::old('dependent3')}}">
				<label for="dep3">Dependent 3</label>
			</div>
			<div class="input-field col s6">
				<input type="date" class="datepicker" id="bday4" name="birthday3" value="{{Request::old('birthday3')}}">
				<label for="bday4">Birth Day</label>
			</div>
			<div class="input-field col s6">
				<input id="dep4" type="text" class="validate" name="dependent4" value="{{Request::old('dependent4')}}">
				<label for="dep4">Dependent 4</label>
			</div>
			<div class="input-field col s6">
				<input type="date" class="datepicker" id="bday4" name="birthday4" value="{{Request::old('birthday4')}}">
				<label for="bday4">Birth Day</label>
			</div>
	      </div>
	      <h5>Bank Details</h5>
	      <div class="divider"></div>
	      <div class="row">
			<div class="input-field col s6">
				<p>
				@if (Request::old('banktype') == 'Savings')
			      <input name="banktype" type="radio" id="save" value="Savings" checked/>
			      <label for="save">Savings</label>
			      <input name="banktype" type="radio" id="curr" value="Current" />
			      <label for="curr">Current</label>
			    @elseif (Request::old('banktype') == 'Current')
			    <input name="banktype" type="radio" id="save" value="Savings" />
			      <label for="save">Savings</label>
			      <input name="banktype" type="radio" id="curr" value="Current" checked/>
			      <label for="curr">Current</label>
			    @else
			      <input name="banktype" type="radio" id="save" value="Savings"/>
			      <label for="save">Savings</label>
			      <input name="banktype" type="radio" id="curr" value="Current"/>
			      <label for="curr">Current</label>
			    @endif
	    		</p>
			</div>
			<div class="input-field col s6">
				<input id="bankacc" type="number" class="validate" name="banknum" value="{{Request::old('banknum')}}">
				<label for="bankacc">Bank Account#</label>
			</div>	  
	    <div class="row center-align">
	      <button class="waves-effect waves-white btn green ">Save</button>
	    </div>
	  </div>
	</div>
</form>
@endsection