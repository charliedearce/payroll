@extends('home')
@section('content')
@foreach($info as $info)
	@if(empty(Request::old('empid')))
		<?php 
			$emp_id = $info->emp_id;
            $lastname = $info->lastname; 
            $firstname = $info->firstname; 
            $middlename = $info->middlename; 
            $email = $info->email; 
            $birthday = $info->birthday; 
            $civilstatus = $info->civilstatus; 
            $phone = $info->phone; 
            $religion = $info->religion; 
            $zipcode = $info->zipcode; 
            $address = $info->address; 
            $gender = $info->gender; 
            $basicsalary = $info->basicsalary; 
            $deminis = $info->deminis; 
            $taxcon = $info->taxcon;
            $ssscon = $info->ssscon;
            $philcon = $info->philcon;
            $pagibigcon = $info->pagibigcon; 
            $position = $info->position; 
            $branch = $info->branch; 
            $department = $info->department; 
            $startdate = $info->startdate;
            $status = $info->status; 
            $hourlyrate = $info->hourlyrate; 
            $tinnum = $info->tinnum; 
            $philnum = $info->philnum; 
            $sssnum = $info->sssnum; 
            $pagibignum = $info->pagibignum; 
            $sickleave = $info->sickleave; 
            $vacaleave = $info->vacaleave; 
            $dependent1 = $info->dependent1;
            $dependent2 = $info->dependent2;
            $dependent3 = $info->dependent3;
            $dependent4 = $info->dependent4;
            $depbday1 = $info->depbday1; 
            $depbday2 = $info->depbday2; 
            $depbday3 = $info->depbday3;
            $depbday4 = $info->depbday4;
            $banktype = $info->banktype; 
            $banknum = $info->banknum; 
		?>
	@else
		<?php 
			$emp_id =  Request::old('empid');
            $lastname = Request::old('lastname');
            $firstname = Request::old('firstname');
            $middlename = Request::old('middlename');
            $email = Request::old('emailadd');
            $birthday = Request::old('birthday');
            $civilstatus = Request::old('civil_status');
            $phone = Request::old('phonenumber');
            $religion = Request::old('religion');
            $zipcode = Request::old('zipnumber');
            $address = Request::old('address');
            $gender = Request::old('gender'); 
            $basicsalary = Request::old('basicsalary');
            $deminis = Request::old('deminis');
            $taxcon = Request::old('taxcon');
            $ssscon = Request::old('ssscon');
            $philcon = Request::old('philcon');
            $pagibigcon = Request::old('pagibigcon');
            $position = Request::old('position');
            $branch = Request::old('branch');
            $department = Request::old('department');
            $startdate = Request::old('startdate');
            $status = Request::old('employmentstatus');
            $hourlyrate = Request::old('dailyhourrate');
            $tinnum = Request::old('tinnum');
            $philnum = Request::old('philhealthnum');
            $sssnum = Request::old('sssnum');
            $pagibignum = Request::old('pagibignum');
            $sickleave = Request::old('sickleave');
            $vacaleave = Request::old('vacaleave');
            $dependent1 = Request::old('dependent1');
            $dependent2 = Request::old('dependent2');
            $dependent3 = Request::old('dependent4');
            $dependent4 = Request::old('dependent4');
            $depbday1 = Request::old('birthday1');
            $depbday2 = Request::old('birthday2');
            $depbday3 = Request::old('birthday3');
            $depbday4 = Request::old('birthday4');
            $banktype = Request::old('banktype');
            $banknum = Request::old('banknum');
			$emp_id = Request::old('empid'); 

		?>
	@endif
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
					<input class="file-path validate" type="text" placeholder="Upload Employee Picture" name="path">
					<input type="hidden" name="oldpath" value="{{$info->path}}">
				</div>
			</div>
			<div class="input-field col s6">
			
				<input id="emp_id" type="text" class="validate" name="empid" value="{{$emp_id}}" required>
				<label for="emp_id">ID</label>
			</div>
			<div class="input-field col s6">
				<input id="last_name" type="text" class="validate" name="lastname"  value="{{$lastname}}" required>
				<label for="last_name">Last Name</label>
			</div>
			<div class="input-field col s6">
				<input id="first_name" type="text" class="validate" name="firstname" value="{{$firstname}}" required>
				<label for="first_name">First Name</label>
			</div>
			<div class="input-field col s6">
				<input id="middle_name" type="text" class="validate" name="middlename" value="{{$middlename}}" required>
				<label for="middle_name">Middle Name</label>
			</div>
			<div class="input-field col s6">
				<input id="email" type="email" class="validate" name="emailadd" value="{{$email}}">
	          	<label for="email" data-error="Wrong Email" data-success="Valid Email">Emaill Address</label>
			</div>
			<div class="input-field col s6">
				<input type="date" class="datepicker" id="bday" name="birthday" value="{{$birthday}}" required> 
				<label for="bday">Birth Day</label>
			</div>
			<div class="input-field col s6">
				<select name="civil_status">
			      <option value="" disabled selected>Choose Status</option>
			      <option value="{{$civilstatus}}" selected>{{$civilstatus}}</option>
			      <option value="Single">Single</option>
			      <option value="Married">Married</option>
			      <option value="Widowed">Widowed</option>
			    </select>
	    		<label>Select Civil Status</label>
			</div>
			<div class="input-field col s6">
				<input id="phone" type="number" class="validate" name="phonenumber" onkeypress="return isNumberKey(event)" value="{{$phone}}">
				<label for="phone">Phone #</label>
			</div>
			<div class="input-field col s6">
				<input id="emp_religion" type="text" class="validate" name="religion" value="{{$religion}}" required>
				<label for="emp_religion">Religion</label>
			</div>
			<div class="input-field col s6">
				<input id="zip" type="number" class="validate" name="zipnumber" onkeypress="return isNumberKey(event)" value="{{$zipcode}}" required>
				<label for="zip">Zip Code</label>
			</div>
			<div class="input-field col s6">
	          <textarea id="addrs" class="materialize-textarea" name="address" value="{{$address}}" required>{{$info->address}}</textarea>
	          <label for="addrs">Address</label>
			</div>
			<div class="input-field col s6">
				<p>
				
				
				@if ($gender == 'Male')
			      <input name="gender" type="radio" id="gen_male" value="Male" checked/>
			      <label for="gen_male">Male</label>
			      <input name="gender" type="radio" id="gen_female" value="Female"/>
			      <label for="gen_female">Female</label>
			    @elseif ($gender  == 'Female')
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
				<input id="bs" type="text" class="validate" name="basicsalary" value="{{$basicsalary}}" required>
				<label for="bs">Basic Salary</label>
			</div>
			<div class="input-field col s6">
				<input id="minis" type="number" step="0.01" name="deminis" value="{{$deminis}}">
				<label for="minis">De Minimis Total</label>
			</div>
			<div class="input-field col s6">
				<select name="taxcon">
			      <option value="" disabled selected>Choose Contribution</option>
			      @if ($taxcon <> '')
			      <option value="{{$taxcon}}" selected>{{$taxcon}}</option>
			      @endif
			      <option value="Single">Single</option>
			    </select>
	    		<label>TAX Contribution</label>
			</div>
			<div class="input-field col s6">
				<select name="ssscon">
			      <option value="" disabled selected>Choose Contribution</option>
			      @if ($ssscon <> '')
			      <option value="{{$ssscon}}" selected>{{$ssscon}}</option>
			      @endif
			      <option value="Single">Single</option>
			    </select>
	    		<label>SSS Contribution</label>
			</div>
			<div class="input-field col s6">
				<select name="philcon">
			      <option value="" disabled selected>Choose Contribution</option>
			      @if ($philcon <> '')
			      <option value="{{$philcon}}" selected>{{$philcon}}</option>
			      @endif
			      <option value="Single">Single</option>
			    </select>
	    		<label>PhilHealth Contribution</label>
			</div>
			<div class="input-field col s6">
				<select name="pagibigcon">
			      <option value="" disabled selected>Choose Contribution</option>
			      @if ($pagibigcon <> '')
			      <option value="{{$info->pagibigcon}}" selected>{{$pagibigcon}}</option>
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
			      @if ($branch <> '')
			      <option value="{{$branch}}" selected>{{$branch}}</option>
			      @endif
			      <option value="Single">Single</option>
			    </select>
	    		<label>Select Branch</label>
			</div>
			<div class="input-field col s6">
				<input id="pos" type="text" class="validate" name="position" value="{{$position}}" required>
				<label for="pos">Position</label>
			</div>
			<div class="input-field col s6">
				<select name="department">
			      <option value="" disabled selected>Choose Department</option>
			      @if ($department <> '')
			      <option value="{{$department}}" selected>{{$department}}</option>
			      @endif
			      <option value="Single">Single</option>
			    </select>
	    		<label>Department</label>
			</div>
			<div class="input-field col s6">
				<input type="date" class="datepicker" id="startdate" name="startdate" value="{{$startdate}}" required>
				<label for="startdate">Start Date</label>
			</div>
			<div class="input-field col s6">
				<select name="employmentstatus">
			      <option value="" disabled selected>Choose Status</option>
			      @if ($info->status <> '')
			      <option value="{{$status}}" selected>{{$status}}</option>
			      @endif
			      <option value="Single">Single</option>
			    </select>
	    		<label>Employment Status</label>
			</div>
			<div class="input-field col s6">
				<input id="dh" type="number" step="0.01" class="validate" name="dailyhourrate" value="{{$hourlyrate}}">
				<label for="dh">Daily Hour</label>
			</div>
			<div class="input-field col s6">
				<input id="tin" type="text" class="validate" name="tinnum" value="{{$tinnum}}">
				<label for="tin">TIN#</label>
			</div>
			<div class="input-field col s6">
				<input id="phil" type="text" class="validate" name="philhealthnum" value="{{$philnum}}">
				<label for="phil">PhilHealth#</label>
			</div>
			<div class="input-field col s6">
				<input id="sss" type="text" class="validate" name="sssnum" value="{{$sssnum}}">
				<label for="sss">SSS#</label>
			</div>
			<div class="input-field col s6">
				<input id="hdnf" type="text" class="validate" name="pagibignum" value="{{$pagibignum}}">
				<label for="hdnf">HDMF#</label>
			</div>
	      </div>
	      <h5>Employment Information</h5>
	      <div class="divider"></div>
	      <div class="row">
			<div class="input-field col s6">
				<input id="sick" type="number" step="0.5" class="validate" name="sickleave" value="{{$sickleave}}">
				<label for="sick">Sick Leave</label>
			</div>
			<div class="input-field col s6">
				<input id="vec" type="number" step="0.5" class="validate" name="vacaleave" value="{{$vacaleave}}">
				<label for="vec">Vacation Leave</label>
			</div>
	      </div>
	      <h5>Dependents</h5>
	      <div class="divider"></div>
	      <div class="row">
			<div class="input-field col s6">
				<input id="dep1" type="text" class="validate" name="dependent1" value="{{$dependent1}}">
				<label for="dep1">Dependent 1</label>
			</div>
			<div class="input-field col s6">
				<input type="date" class="datepicker" id="bday1" name="birthday1" value="{{$depbday1}}">
				<label for="bday1">Birth Day</label>
			</div>
			<div class="input-field col s6">
				<input id="dep2" type="text" class="validate" name="dependent2" value="{{$dependent2}}">
				<label for="dep2">Dependent 2</label>
			</div>
			<div class="input-field col s6">
				<input type="date" class="datepicker" id="bday2" name="birthday2" value="{{$depbday2}}">
				<label for="bday2">Birth Day</label>
			</div>
			<div class="input-field col s6">
				<input id="dep3" type="text" class="validate" name="dependent3" value="{{$dependent3}}">
				<label for="dep3">Dependent 3</label>
			</div>
			<div class="input-field col s6">
				<input type="date" class="datepicker" id="bday4" name="birthday3" value="{{$depbday3}}">
				<label for="bday4">Birth Day</label>
			</div>
			<div class="input-field col s6">
				<input id="dep4" type="text" class="validate" name="dependent4" value="{{$dependent4}}">
				<label for="dep4">Dependent 4</label>
			</div>
			<div class="input-field col s6">
				<input type="date" class="datepicker" id="bday4" name="birthday4" value="{{$depbday4}}">
				<label for="bday4">Birth Day</label>
			</div>
	      </div>
	      <h5>Bank Details</h5>
	      <div class="divider"></div>
	      <div class="row">
			<div class="input-field col s6">
				<p>
				@if ($banktype == 'Savings')
			      <input name="banktype" type="radio" id="save" value="Savings" checked/>
			      <label for="save">Savings</label>
			      <input name="banktype" type="radio" id="curr" value="Current" />
			      <label for="curr">Current</label>
			    @elseif ($banktype == 'Current')
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
				<input id="bankacc" type="number" class="validate" name="banknum" value="{{$banknum}}">
				<label for="bankacc">Bank Account#</label>
			</div>	  
	    <div class="row center-align">
	      <button class="waves-effect waves-white btn green ">Update</button>
	    </div>
	  </div>
	</div>
</form>
@endsection