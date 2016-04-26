@extends('home')
@section('content')
@foreach($info as $info)
@endforeach
<form method="POST" action="{{ url('home/updateEmployee') }}/{{$info->id}}" enctype="multipart/form-data">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<div class="row">
	<div class="col s12">
		<div class="card-panel hoverable" style="background-image:url('http://materializecss.com/images/sample-1.jpg'); width: 100%; height: 100%;"><h3 class="white-text">Add Employees</h3>
		</div>
	</div>
</div>
	<div style="width:50%; margin:0 auto;">
	      <h3 class="center">
	      @if ($info->path == "")
	      	<img class="responsive-img circle" src="http://materializecss.com/images/yuna.jpg">
	      @else
	      	<img class="responsive-img circle" src="{{route('employee.image',[$info->path])}}" style="width:150px; height:150px;">
	      @endif
	      </h3>
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
				<input id="emp_id" type="text" class="validate" name="empid" value="{{$info->emp_id}}" required>
				<label for="emp_id">ID</label>
			</div>
			<div class="input-field col s6">
				<input id="last_name" type="text" class="validate" name="lastname"  value="{{$info->lastname}}" required>
				<label for="last_name">Last Name</label>
			</div>
			<div class="input-field col s6">
				<input id="first_name" type="text" class="validate" name="firstname" value="{{$info->firstname}}" required>
				<label for="first_name">First Name</label>
			</div>
			<div class="input-field col s6">
				<input id="middle_name" type="text" class="validate" name="middlename" value="{{$info->middlename}}" required>
				<label for="middle_name">Middle Name</label>
			</div>
			<div class="input-field col s6">
				<input id="email" type="email" class="validate" name="emailadd" value="{{$info->email}}">
	          	<label for="email" data-error="Wrong Email" data-success="Valid Email">Emaill Address</label>
			</div>
			<div class="input-field col s6">
				<input type="date" class="datepicker" id="bday" name="birthday" value="{{$info->birthday}}" required> 
				<label for="bday">Birth Day</label>
			</div>
			<div class="input-field col s6">
				<select name="civil_status" required>
			      <option value="" disabled selected>Choose Status</option>
			      <option value="{{$info->civilstatus}}" selected>{{$info->civilstatus}}</option>
			      <option value="Single">Single</option>
			      <option value="Married">Married</option>
			      <option value="Widowed">Widowed</option>
			    </select>
	    		<label>Select Civil Status</label>
			</div>
			<div class="input-field col s6">
				<input id="phone" type="number" class="validate" name="phonenumber" onkeypress="return isNumberKey(event)" value="{{$info->phone}}">
				<label for="phone">Phone #</label>
			</div>
			<div class="input-field col s6">
				<input id="emp_religion" type="text" class="validate" name="religion" value="{{$info->religion}}" required>
				<label for="emp_religion">Religion</label>
			</div>
			<div class="input-field col s6">
				<input id="zip" type="number" class="validate" name="zipnumber" onkeypress="return isNumberKey(event)" value="{{$info->zipcode}}" required>
				<label for="zip">Zip Code</label>
			</div>
			<div class="input-field col s6">
	          <textarea id="addrs" class="materialize-textarea" name="address" value="" required>{{$info->address}}</textarea>
	          <label for="addrs">Address</label>
			</div>
			<div class="input-field col s6">
				<p>
				
				
				@if ($info->gender == 'Male')
			      <input name="gender" type="radio" id="gen_male" value="Male" checked/>
			      <label for="gen_male">Male</label>
			      <input name="gender" type="radio" id="gen_female" value="Female"/>
			      <label for="gen_female">Female</label>
			    @elseif ($info->gender  == 'Female')
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
				<input id="bs" type="text" class="validate" name="basicsalary" value="{{$info->basicsalary}}" required>
				<label for="bs">Basic Salary</label>
			</div>
			<div class="input-field col s6">
				<input id="minis" type="number" step="0.01" name="deminis" value="{{$info->deminis}}">
				<label for="minis">De Minimis Total</label>
			</div>
			<div class="input-field col s6">
				<select name="taxcon" required>
			      <option value="" disabled selected>Choose Contribution</option>
			      @if ($info->taxcon <> '')
			      <option value="{{$info->taxcon}}" selected>{{$info->taxcon}}</option>
			      @endif
			      <option value="Single">Single</option>
			    </select>
	    		<label>TAX Contribution</label>
			</div>
			<div class="input-field col s6">
				<select name="ssscon" required>
			      <option value="" disabled selected>Choose Contribution</option>
			      @if ($info->ssscon <> '')
			      <option value="{{$info->ssscon}}" selected>{{$info->ssscon}}</option>
			      @endif
			      <option value="Single">Single</option>
			    </select>
	    		<label>SSS Contribution</label>
			</div>
			<div class="input-field col s6">
				<select name="philcon" required>
			      <option value="" disabled selected>Choose Contribution</option>
			      @if ($info->philcon <> '')
			      <option value="{{$info->philcon}}" selected>{{$info->philcon}}</option>
			      @endif
			      <option value="Single">Single</option>
			    </select>
	    		<label>PhilHealth Contribution</label>
			</div>
			<div class="input-field col s6">
				<select name="pagibigcon" required>
			      <option value="" disabled selected>Choose Contribution</option>
			      @if ($info->pagibigcon <> '')
			      <option value="{{$info->pagibigcon}}" selected>{{$info->pagibigcon}}</option>
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
				<select name="branch" required>
			      <option value="" disabled selected>Choose Branch</option>
			      @if ($info->branch <> '')
			      <option value="{{$info->branch}}" selected>{{$info->branch}}</option>
			      @endif
			      <option value="Single">Single</option>
			    </select>
	    		<label>Select Branch</label>
			</div>
			<div class="input-field col s6">
				<input id="pos" type="text" class="validate" name="position" value="{{$info->position}}" required>
				<label for="pos">Position</label>
			</div>
			<div class="input-field col s6">
				<select name="department" required>
			      <option value="" disabled selected>Choose Department</option>
			      @if ($info->department <> '')
			      <option value="{{$info->department}}" selected>{{$info->department}}</option>
			      @endif
			      <option value="Single">Single</option>
			    </select>
	    		<label>Department</label>
			</div>
			<div class="input-field col s6">
				<input type="date" class="datepicker" id="startdate" name="startdate" value="{{$info->startdate}}" required>
				<label for="startdate">Start Date</label>
			</div>
			<div class="input-field col s6">
				<select name="employmentstatus" required>
			      <option value="" disabled selected>Choose Status</option>
			      @if ($info->status <> '')
			      <option value="{{$info->statu}}" selected>{{$info->status}}</option>
			      @endif
			      <option value="Single">Single</option>
			    </select>
	    		<label>Employment Status</label>
			</div>
			<div class="input-field col s6">
				<input id="dh" type="number" step="0.01" class="validate" name="dailyhourrate" value="{{$info->hourlyrate}}">
				<label for="dh">Daily Hour</label>
			</div>
			<div class="input-field col s6">
				<input id="tin" type="text" class="validate" name="tinnum" value="{{$info->tinnum}}">
				<label for="tin">TIN#</label>
			</div>
			<div class="input-field col s6">
				<input id="phil" type="text" class="validate" name="philhealthnum" value="{{$info->philnum}}">
				<label for="phil">PhilHealth#</label>
			</div>
			<div class="input-field col s6">
				<input id="sss" type="text" class="validate" name="sssnum" value="{{$info->sssnum}}">
				<label for="sss">SSS#</label>
			</div>
			<div class="input-field col s6">
				<input id="hdnf" type="text" class="validate" name="pagibignum" value="{{$info->pagibignum}}">
				<label for="hdnf">HDMF#</label>
			</div>
	      </div>
	      <h5>Employment Information</h5>
	      <div class="divider"></div>
	      <div class="row">
			<div class="input-field col s6">
				<input id="sick" type="number" step="0.5" class="validate" name="sickleave" value="{{$info->sickleave}}">
				<label for="sick">Sick Leave</label>
			</div>
			<div class="input-field col s6">
				<input id="vec" type="number" step="0.5" class="validate" name="vacaleave" value="{{$info->vacaleave}}">
				<label for="vec">Vacation Leave</label>
			</div>
	      </div>
	      <h5>Dependents</h5>
	      <div class="divider"></div>
	      <div class="row">
			<div class="input-field col s6">
				<input id="dep1" type="text" class="validate" name="dependent1" value="{{$info->dependent1}}">
				<label for="dep1">Dependent 1</label>
			</div>
			<div class="input-field col s6">
				<input type="date" class="datepicker" id="bday1" name="birthday1" value="{{$info->depbday1}}">
				<label for="bday1">Birth Day</label>
			</div>
			<div class="input-field col s6">
				<input id="dep2" type="text" class="validate" name="dependent2" value="{{$info->dependent2}}">
				<label for="dep2">Dependent 2</label>
			</div>
			<div class="input-field col s6">
				<input type="date" class="datepicker" id="bday2" name="birthday2" value="{{$info->depbday2}}">
				<label for="bday2">Birth Day</label>
			</div>
			<div class="input-field col s6">
				<input id="dep3" type="text" class="validate" name="dependent3" value="{{$info->dependent3}}">
				<label for="dep3">Dependent 3</label>
			</div>
			<div class="input-field col s6">
				<input type="date" class="datepicker" id="bday4" name="birthday3" value="{{$info->depbday3}}">
				<label for="bday4">Birth Day</label>
			</div>
			<div class="input-field col s6">
				<input id="dep4" type="text" class="validate" name="dependent4" value="{{$info->dependent4}}">
				<label for="dep4">Dependent 4</label>
			</div>
			<div class="input-field col s6">
				<input type="date" class="datepicker" id="bday4" name="birthday4" value="{{$info->depbday4}}">
				<label for="bday4">Birth Day</label>
			</div>
	      </div>
	      <h5>Bank Details</h5>
	      <div class="divider"></div>
	      <div class="row">
			<div class="input-field col s6">
				<p>
				@if ($info->banktype == 'Savings')
			      <input name="banktype" type="radio" id="save" value="Savings" checked/>
			      <label for="save">Savings</label>
			      <input name="banktype" type="radio" id="curr" value="Current" />
			      <label for="curr">Current</label>
			    @elseif ($info->banktype == 'Current')
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
				<input id="bankacc" type="number" class="validate" name="banknum" value="{{$info->banknum}}">
				<label for="bankacc">Bank Account#</label>
			</div>	  
	    <div class="row center-align">
	      <button class="waves-effect waves-white btn green ">Update</button>
	    </div>
	  </div>
	</div>
</form>
@endsection