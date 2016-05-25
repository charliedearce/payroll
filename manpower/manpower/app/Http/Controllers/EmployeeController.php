<?php

namespace App\Http\Controllers;
use App\Employee;
use App\scheduleday;
use App\scheduletime;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use PDF;
use App;
class EmployeeController extends Controller
{
    public function employees(){
        if(isset($_GET['search'])){
            $search = $_GET['search'];
            

            $employee = Employee::get()->filter(function($record) use($search) {
                $pattern =  str_replace('%', '.*', preg_quote('%'. $search .'%', '/'));
                if(preg_match("/^{$pattern}$/i", $record->firstname) or preg_match("/^{$pattern}$/i", $record->lastname) or preg_match("/^{$pattern}$/i", $record->firstname. " " .$record->lastname) or preg_match("/^{$pattern}$/i", $record->lastname. " " .$record->firstname)) {
                    return $record;
                }
            });
             return view('employees/employee')
            ->with('employees', $employee)
            ->with('ago', new Timeago);
        }else{
            $employee = Employee::orderBy('updated_at', 'desc')->paginate(20);
            return view('employees/employee')
            ->with('employees', $employee)
            ->with('ago', new Timeago);
        }
    }


    public function saveEmployees(Request $request){
        $employee = new Employee;
    	$messsages = array(
        'file.image'=>'File must be image.',
        'file.mimes'=>'Employee picture must be in jpeg,bmp,png format',
        'file.max'=>'Employee picture file size must not be greater than :max kb',
        'lastname.required'=>'Last Name must be fill up',
        'lastname.regex'=>'Last Name can only contain Alpha Characters',
        'firstname.required'=>'First Name must be fill up',
        'firstname.regex'=>'First Name can only contain Alpha Characters',
        'middlename.required'=>'Middle Name must be fill up',
        'middlename.regex'=>'Middle Name can only contain Alpha Characters',
        'birthday.required'=>'Birthday must be fill up',
        'civilstatus.required'=>'Plase select employee civil status',
        'religion.required'=>'Religion must be fill up',
        'religion.regex'=>'Religion can only contain Alpha Characters',
        'address.required'=>'Address must be fill up',
        'basicsalary.required'=>'Basic salary must be fill up',
        'basicsalary.numeric'=>'Basic Salary can only contain Numeric Characters',
        'taxcon.required'=>'Please select WHTAX Contribution',
        'ssscon.required'=>'Please select SSS Contribution',
        'pagibigcon.required'=>'Please select Pag-ibig Contribution',
        'philcon.required'=>'Please select Philhealth Contribution',
        'type.required'=>'Please select Employee Type',
        'position.required'=>'Please select Employee position',
        'branch.required'=>'Please select Employee branch designation',
        'department.required'=>'Please select Employee department designation',
        'startdate.required'=>'Employee Starting date must be fill up',
        'employmentstatus.required'=>'Employee Status must be fill up',
        'sickleave.numeric'=>'Sick leave can only contain Numeric Characters',
        'vacaleave.numeric'=>'Vacation Leave can only contain Numeric Characters',
        'hourlyrate.numeric'=>'Hourly Rate can only contain Numeric Characters',
        'dependent1.regex'=>'Dependent-1 name can only contain Alpha Characters',
        'dependent2.regex'=>'Dependent-2 name can only contain Alpha Characters',
        'dependent3.regex'=>'Dependent-3 name can only contain Alpha Characters',
        'dependent4.regex'=>'Dependent-4 name can only contain Alpha Characters',
        'empid.required'=>'Employee ID must be fill up',
        'empid.max'=>'Employee ID can only contain :max Characters',
        'empid.unique'=>'Employee ID is already taken.',
        'lastname.max'=>' Last Name can only contain :max Characters',
        'firstname.max'=>' First Name can only contain :max Characters',
        'middlename.max'=>' Middle Name can only contain :max Characters',
        'religion.max'=>' Religion can only contain :max Characters',
        'basicsalary.max'=>'Basic Salary can only contain not greater than :max',
        'sickleave.max'=>'Sick Leave can only contain not greater than :max',
        'vacaleave.max'=>'Vacation Leave can only contain not greater than :max',
        'hourlyrate.max'=>'Hourly Rate can only contain not greater than :max',
        'dependent1.max'=>'Dependent-1 name can only contain :max Characters',
        'dependent2.max'=>'Dependent-2 name can only contain :max Characters',
        'dependent3.max'=>'Dependent-3 name can only contain :max Characters',
        'dependent4.max'=>'Dependent-3 name can only contain :max Characters',
        'banknum.max'=>'Bank number can only contain :max Characters',
        'tinnum.max'=>'TIN number can only contain :max Characters',
        'philnum.max'=>'Philhealth number can only contain :max Characters',
        'sssnum.max'=>'SSS number can only contain :max Characters',
        'pagibignum.max'=>'PAG-IBIG number can only contain :max Characters',
    );

    $rules = array(
        'file'=>'image|mimes:jpeg,bmp,png|max:3000',
        'empid'=>'required|max:50|unique:employees,emp_id',
        'lastname'=>'required|Regex:/^([A-Za-z\s]+$)+/|max:50',
        'firstname'=>'required|Regex:/^([A-Za-z\s]+$)+/|max:50',
        'middlename'=>'required|Regex:/^([A-Za-z\s]+$)+/|max:50',
        'birthday'=>'required',
        'civil_status'=>'required',
        'religion'=>'required|Regex:/^([A-Za-z\s]+$)+/|max:50',
        'address'=>'required|max:150',
        'basicsalary'=>'required|numeric|max:1000000',
        'taxcon'=>'required',
        'ssscon'=>'required',
        'philcon'=>'required',
        'pagibigcon'=>'required',
        'type'=>'required',
        'position'=>'required',
        'branch'=>'required',
        'department'=>'required',
        'startdate'=>'required',
        'employmentstatus'=>'required',
        'sickleave'=>'numeric|max:500',
        'vacaleave'=>'numeric|max:500',
        'hourlyrate'=>'numeric|max:50000',
        'banknum'=>'max:50',
        'tinnum'=>'max:50',
        'philnum'=>'max:50',
        'sssnum'=>'max:50',
        'pagibignum'=>'max:50',
        'dependent1'=>'Regex:/^([A-Za-z\s]+$)+/|max:50',
        'dependent2'=>'Regex:/^([A-Za-z\s]+$)+/|max:50',
        'dependent3'=>'Regex:/^([A-Za-z\s]+$)+/|max:50',
        'dependent4'=>'Regex:/^([A-Za-z\s]+$)+/|max:50',
    );


    $validator = Validator::make(Input::all(), $rules, $messsages);
    if ($validator->fails()){

    	return redirect()
                    ->back()
                    ->withInput($request->all())
                    ->withErrors($validator);
    }else{
            $fileName = null;
                if(Input::hasFile('file')){
                $file = $request->file('file');
                $extension = Input::file('file')->getClientOriginalExtension();
                $fileName = rand(1,9999999999999999). $request['empid']. date("ydmhis") . rand(1,9999999999999999).'.'.$extension;
                    Storage::disk('local')->put($fileName, File::get($file));
                }

            $employee->user_id = '1';
            $employee->path = $fileName;
            $employee->emp_id =  $request->input('empid');
            $employee->lastname = $request->input('lastname');
            $employee->firstname = $request->input('firstname');
            $employee->middlename = $request->input('middlename');
            $employee->email = $request->input('emailadd');
            $employee->birthday = $request->input('birthday');
            $employee->civilstatus = $request->input('civil_status');
            $employee->phone = $request->input('phonenumber');
            $employee->religion = $request->input('religion');
            $employee->zipcode = $request->input('zipnumber');
            $employee->address = $request->input('address');
            $employee->gender = $request->input('gender'); 
            $employee->basicsalary = $request->input('basicsalary');
            $employee->deminis = $request->input('deminis');
            $employee->taxcon = $request->input('taxcon');
            $employee->ssscon = $request->input('ssscon');
            $employee->philcon = $request->input('philcon');
            $employee->pagibigcon = $request->input('pagibigcon');
            $employee->type = $request->input('type');
            $employee->position = $request->input('position');
            $employee->branch = $request->input('branch');
            $employee->department = $request->input('department');
            $employee->startdate = $request->input('startdate');
            $employee->status = $request->input('employmentstatus');
            $employee->hourlyrate = $request->input('dailyhourrate');
            $employee->tinnum = $request->input('tinnum');
            $employee->philnum = $request->input('philhealthnum');
            $employee->sssnum = $request->input('sssnum');
            $employee->pagibignum = $request->input('pagibignum');
            $employee->sickleave = $request->input('sickleave');
            $employee->vacaleave = $request->input('vacaleave');
            $employee->dependent1 = $request->input('dependent1');
            $employee->dependent2 = $request->input('dependent2');
            $employee->dependent3 = $request->input('dependent4');
            $employee->dependent4 = $request->input('dependent4');
            $employee->depbday1 = $request->input('birthday1');
            $employee->depbday2 = $request->input('birthday2');
            $employee->depbday3 = $request->input('birthday3');
            $employee->depbday4 = $request->input('birthday4');
            $employee->banktype = $request->input('banktype');
            $employee->banknum = $request->input('banknum');
            $employee->save();
            
            for ($x = 0; $x <= 2; $x++) {
                $scheduleday = new scheduleday;
                $scheduleday->user_id = '1';
                $scheduleday->emp_id = $employee->id;
                $scheduleday->shift = $x;
                $scheduleday->save();
            }
            return redirect::to('home/employees')
                ->with('message', 'Employee data Successfully added.')
                ->with('msgtype', 'success');
        }
    }

    public function addEmployees(){
        return view('employees/addEmployee');
    }
    public function editEmployee($empid){
        $employee = Employee::where('id','=', $empid)->where('user_id', '=', 1)->get();
        if ($employee->isEmpty()){
            return redirect::to('home/employees')
            ->with('message', 'Employee not found.')
            ->with('msgtype', 'error');
        }else{
            return view('employees/editEmployee')
            ->with('info', $employee);
        }
    }
    public function updateEmployee(Request $request, $empid){
        $employee = employee::where('id','=', $empid)->where('user_id', '=', 1)->first();
        $messsages = array(
        'file.image'=>'File must be image.',
        'file.mimes'=>'Employee picture must be in jpeg,bmp,png format',
        'file.max'=>'Employee picture file size must not be greater than :max kb',
        'lastname.required'=>'Last Name must be fill up',
        'lastname.regex'=>'Last Name can only contain Alpha Characters',
        'firstname.required'=>'First Name must be fill up',
        'firstname.regex'=>'First Name can only contain Alpha Characters',
        'middlename.required'=>'Middle Name must be fill up',
        'middlename.regex'=>'Middle Name can only contain Alpha Characters',
        'birthday.required'=>'Birthday must be fill up',
        'civilstatus.required'=>'Plase select employee civil status',
        'religion.required'=>'Religion must be fill up',
        'religion.regex'=>'Religion can only contain Alpha Characters',
        'address.required'=>'Address must be fill up',
        'basicsalary.required'=>'Basic salary must be fill up',
        'basicsalary.numeric'=>'Basic Salary can only contain Numeric Characters',
        'taxcon.required'=>'Please select WHTAX Contribution',
        'ssscon.required'=>'Please select SSS Contribution',
        'pagibigcon.required'=>'Please select Pag-ibig Contribution',
        'philcon.required'=>'Please select Philhealth Contribution',
        'type.required'=>'Please select Employee Type',
        'position.required'=>'Please select Employee position',
        'branch.required'=>'Please select Employee branch designation',
        'department.required'=>'Please select Employee department designation',
        'startdate.required'=>'Employee Starting date must be fill up',
        'employmentstatus.required'=>'Employee Status must be fill up',
        'sickleave.numeric'=>'Sick leave can only contain Numeric Characters',
        'vacaleave.numeric'=>'Vacation Leave can only contain Numeric Characters',
        'hourlyrate.numeric'=>'Hourly Rate can only contain Numeric Characters',
        'dependent1.regex'=>'Dependent-1 name can only contain Alpha Characters',
        'dependent2.regex'=>'Dependent-2 name can only contain Alpha Characters',
        'dependent3.regex'=>'Dependent-3 name can only contain Alpha Characters',
        'dependent4.regex'=>'Dependent-4 name can only contain Alpha Characters',
        'empid.required'=>'Employee ID must be fill up',
        'empid.max'=>'Employee ID can only contain :max Characters',
        'empid.unique'=>'Employee ID is already taken.',
        'lastname.max'=>' Last Name can only contain :max Characters',
        'firstname.max'=>' First Name can only contain :max Characters',
        'middlename.max'=>' Middle Name can only contain :max Characters',
        'religion.max'=>' Religion can only contain :max Characters',
        'basicsalary.max'=>'Basic Salary can only contain not greater than :max',
        'sickleave.max'=>'Sick Leave can only contain not greater than :max',
        'vacaleave.max'=>'Vacation Leave can only contain not greater than :max',
        'hourlyrate.max'=>'Hourly Rate can only contain not greater than :max',
        'dependent1.max'=>'Dependent-1 name can only contain :max Characters',
        'dependent2.max'=>'Dependent-2 name can only contain :max Characters',
        'dependent3.max'=>'Dependent-3 name can only contain :max Characters',
        'dependent4.max'=>'Dependent-3 name can only contain :max Characters',
        'banknum.max'=>'Bank number can only contain :max Characters',
        'tinnum.max'=>'TIN number can only contain :max Characters',
        'philnum.max'=>'Philhealth number can only contain :max Characters',
        'sssnum.max'=>'SSS number can only contain :max Characters',
        'pagibignum.max'=>'PAG-IBIG number can only contain :max Characters',
    );

    $rules = array(
        'file'=>'image|mimes:jpeg,bmp,png|max:3000',
        'empid'=>'required|max:50|unique:employees,emp_id,'.$employee->id,
        'lastname'=>'required|Regex:/^([A-Za-z\s]+$)+/|max:50',
        'firstname'=>'required|Regex:/^([A-Za-z\s]+$)+/|max:50',
        'middlename'=>'required|Regex:/^([A-Za-z\s]+$)+/|max:50',
        'birthday'=>'required',
        'civil_status'=>'required',
        'religion'=>'required|Regex:/^([A-Za-z\s]+$)+/|max:50',
        'address'=>'required|max:150',
        'basicsalary'=>'required|numeric|max:1000000',
        'taxcon'=>'required',
        'ssscon'=>'required',
        'philcon'=>'required',
        'pagibigcon'=>'required',
        'type'=>'required',
        'position'=>'required',
        'branch'=>'required',
        'department'=>'required',
        'startdate'=>'required',
        'employmentstatus'=>'required',
        'sickleave'=>'numeric|max:500',
        'vacaleave'=>'numeric|max:500',
        'hourlyrate'=>'numeric|max:50000',
        'banknum'=>'max:50',
        'tinnum'=>'max:50',
        'philnum'=>'max:50',
        'sssnum'=>'max:50',
        'pagibignum'=>'max:50',
        'dependent1'=>'Regex:/^([A-Za-z\s]+$)+/|max:50',
        'dependent2'=>'Regex:/^([A-Za-z\s]+$)+/|max:50',
        'dependent3'=>'Regex:/^([A-Za-z\s]+$)+/|max:50',
        'dependent4'=>'Regex:/^([A-Za-z\s]+$)+/|max:50',
    );
        $validator = Validator::make(Input::all(), $rules, $messsages);
        if ($validator->fails()){
            return redirect()
                    ->back()
                    ->withInput($request->all())
                    ->withErrors($validator);
        }else{

            $fileName = null;
            if(Input::hasFile('file')){
            $file = $request->file('file');
            $extension = Input::file('file')->getClientOriginalExtension();
            $fileName = rand(1,9999999999999999). $request['empid']. date("ydmhis") . rand(1,9999999999999999).'.'.$extension;
                Storage::disk('local')->put($fileName, File::get($file));
            }
            $employee->user_id = '1';
            
            
            if ($fileName <> ('' or null)){
                if ($employee->path <> ('' or null)){
                    if(Storage::disk('local')->exists($employee->path)){
                        Storage::disk('local')->Delete($employee->path);
                        $employee->path = $fileName;
                    }
                }
                $employee->path = $fileName;
            }
            
            $employee->emp_id =  $request->input('empid');
            $employee->lastname = $request->input('lastname');
            $employee->firstname = $request->input('firstname');
            $employee->middlename = $request->input('middlename');
            $employee->email = $request->input('emailadd');
            $employee->birthday = $request->input('birthday');
            $employee->civilstatus = $request->input('civil_status');
            $employee->phone = $request->input('phonenumber');
            $employee->religion = $request->input('religion');
            $employee->zipcode = $request->input('zipnumber');
            $employee->address = $request->input('address');
            $employee->gender = $request->input('gender'); 
            $employee->basicsalary = $request->input('basicsalary');
            $employee->deminis = $request->input('deminis');
            $employee->taxcon = $request->input('taxcon');
            $employee->ssscon = $request->input('ssscon');
            $employee->philcon = $request->input('philcon');
            $employee->pagibigcon = $request->input('pagibigcon');
            $employee->type = $request->input('type');
            $employee->position = $request->input('position');
            $employee->branch = $request->input('branch');
            $employee->department = $request->input('department');
            $employee->startdate = $request->input('startdate');
            $employee->status = $request->input('employmentstatus');
            $employee->hourlyrate = $request->input('dailyhourrate');
            $employee->tinnum = $request->input('tinnum');
            $employee->philnum = $request->input('philhealthnum');
            $employee->sssnum = $request->input('sssnum');
            $employee->pagibignum = $request->input('pagibignum');
            $employee->sickleave = $request->input('sickleave');
            $employee->vacaleave = $request->input('vacaleave');
            $employee->dependent1 = $request->input('dependent1');
            $employee->dependent2 = $request->input('dependent2');
            $employee->dependent3 = $request->input('dependent4');
            $employee->dependent4 = $request->input('dependent4');
            $employee->depbday1 = $request->input('birthday1');
            $employee->depbday2 = $request->input('birthday2');
            $employee->depbday3 = $request->input('birthday3');
            $employee->depbday4 = $request->input('birthday4');
            $employee->banktype = $request->input('banktype');
            $employee->banknum = $request->input('banknum');
            $employee->save();
            return redirect::to('home/employees')
            ->with('message', 'Employee data Successfully updated.')
            ->with('msgtype', 'success');
        } 
    }

    public function getImage($filename){
        $file = Storage::disk('local')->get($filename);
        return new Response ($file, 200);
    }

    public function deleteEmployee($empid){
        $employee = Employee::where('id','=', $empid)->where('user_id', '=', 1)->first();
            if ($employee->isEmpty()){
                    return redirect::to('home/employees')
                    ->with('message', 'Employee schedule not found.')
                    ->with('msgtype', 'error');
            }else{
                if ($employee->path <> ('' or null)){
                            if(Storage::disk('local')->exists($employee->path)){
                                Storage::disk('local')->Delete($employee->path);
                                $employee->delete();
                    }else{
                        $employee->delete();
                    }
                }
            
            $scheduleday = scheduleday::where('emp_id','=', $empid)->where('user_id', '=', 1);
            $scheduleday->delete();
            $scheduletime = scheduletime::where('emp_id','=', $empid);
            $scheduletime->delete();
            return redirect::to('home/employees')
                ->with('message', 'Employee data Successfully deleted.')
                ->with('msgtype', 'success');
        }
    }
    public function EmployeeSchedule($empid){
            $employee = Employee::where('id','=', $empid)->where('user_id', '=', 1)->get();
            $scheduleday1 = scheduleday::where('emp_id','=', $empid)->where('user_id', '=', 1)->where('shift', '=', 1)->get();
            $day_id = null;
            foreach ($scheduleday1 as $day) {
                $day_id = $day->id;
            }
            $scheduleday2 = scheduleday::where('emp_id','=', $empid)->where('user_id', '=', 1)->where('shift', '=', 2)->get();
            $night_id = null;
            foreach ($scheduleday2 as $night) {
                $night_id = $night->id;
            }
            $su1 = scheduletime::where('sched_id','=', $day_id)->where('day','=', 1)->get();
            $mo1 = scheduletime::where('sched_id','=', $day_id)->where('day','=', 2)->get();
            $tu1 = scheduletime::where('sched_id','=', $day_id)->where('day','=', 3)->get();
            $we1 = scheduletime::where('sched_id','=', $day_id)->where('day','=', 4)->get();
            $th1 = scheduletime::where('sched_id','=', $day_id)->where('day','=', 5)->get();
            $fr1 = scheduletime::where('sched_id','=', $day_id)->where('day','=', 6)->get();
            $sa1 = scheduletime::where('sched_id','=', $day_id)->where('day','=', 7)->get();
            
            $su2 = scheduletime::where('sched_id','=', $night_id)->where('day','=', 1)->get();
            $mo2 = scheduletime::where('sched_id','=', $night_id)->where('day','=', 2)->get();
            $tu2 = scheduletime::where('sched_id','=', $night_id)->where('day','=', 3)->get();
            $we2 = scheduletime::where('sched_id','=', $night_id)->where('day','=', 4)->get();
            $th2 = scheduletime::where('sched_id','=', $night_id)->where('day','=', 5)->get();
            $fr2 = scheduletime::where('sched_id','=', $night_id)->where('day','=', 6)->get();
            $sa2 = scheduletime::where('sched_id','=', $night_id)->where('day','=', 7)->get();
            if (Empty($day_id) or Empty($night_id)){
                return redirect::to('home/employees')
                    ->with('message', 'Employee schedule not found.')
                    ->with('msgtype', 'error');
            }else{
            return view('employees/EmployeeSchedule')
                ->with('employee', $employee)
                ->with('scheduleday1', $scheduleday1)
                ->with('scheduleday2', $scheduleday2)
                ->with('su1', $su1)
                ->with('mo1', $mo1)
                ->with('tu1', $tu1)
                ->with('we1', $we1)
                ->with('th1', $th1)
                ->with('fr1', $fr1)
                ->with('sa1', $sa1)
                ->with('su2', $su2)
                ->with('mo2', $mo2)
                ->with('tu2', $tu2)
                ->with('we2', $we2)
                ->with('th2', $th2)
                ->with('fr2', $fr2)
                ->with('sa2', $sa2)
                ->with('empid', $empid);
            }
    }

        public function deleteSchedule(Request $request){
        $scheduletime = scheduletime::where('id','=', $request->input('sched_id'))->first();
        $scheduletime->delete();
        return redirect()->back()
            ->with('message', 'Schedule data Successfully deleted.')
            ->with('msgtype', 'success');
        }

        public function addSchedule(Request $request, $day){
            if (strtotime($request->input('in')) >= strtotime($request->input('out'))){
                return redirect()->back()
                ->with('message', 'Please check your Time-in and Time-out.')
                ->with('msgtype', 'error');
            }elseif(strtotime($request->input('bin')) <= strtotime($request->input('bout'))){
                return redirect()->back()
                ->with('message', 'Please check your Break-in and Break-out.')
                ->with('msgtype', 'error');
            }elseif(strtotime($request->input('bin')) >= strtotime($request->input('out'))){
                return redirect()->back()
                ->with('message', 'Please check you Break-in and Time-out.')
                ->with('msgtype', 'error');
            }elseif(strtotime($request->input('bout')) <= strtotime($request->input('in'))){
                return redirect()->back()
                ->with('message', 'Please check you Break-out and Time-in.')
                ->with('msgtype', 'error');
            }else{
            $scheduletime = new scheduletime;
            $in = date("H:i", strtotime($request->input('in')));
            $out = date("H:i", strtotime($request->input('out')));
            $bin = date("H:i", strtotime($request->input('bin')));
            $bout = date("H:i", strtotime($request->input('bout')));
            if($day == 'su1'){
                $scheduletime->day = 1;
                $scheduletime->sched_id = $request->input('sched_id');
                $scheduletime->emp_id = $request->input('empid');
                $scheduletime->in = $in;
                $scheduletime->out = $out;
                $scheduletime->breakin = $bin;
                $scheduletime->breakout = $bout;
                $scheduletime->save();
            return redirect()->back()
                ->with('message', 'Sunday (day shift) Schedule Successfully added.')
                ->with('msgtype', 'success');
            }else if($day == 'mo1'){
                $scheduletime->day = 2;
                $scheduletime->sched_id = $request->input('sched_id');
                $scheduletime->emp_id = $request->input('empid');
                $scheduletime->in = $in;
                $scheduletime->out = $out;
                $scheduletime->breakin = $bin;
                $scheduletime->breakout = $bout;
                $scheduletime->save();
            return redirect()->back()
                ->with('message', 'Monday (day shift) Schedule Successfully added.')
                ->with('msgtype', 'success');
            }else if($day == 'tu1'){
                $scheduletime->day = 3;
                $scheduletime->sched_id = $request->input('sched_id');
                $scheduletime->emp_id = $request->input('empid');
                $scheduletime->in = $in;
                $scheduletime->out = $out;
                $scheduletime->breakin = $bin;
                $scheduletime->breakout = $bout;
                $scheduletime->save();
            return redirect()->back()
                ->with('message', 'Tuesday (day shift) Schedule Successfully added.')
                ->with('msgtype', 'success');
            }else if($day == 'we1'){
                $scheduletime->day = 4;
                $scheduletime->sched_id = $request->input('sched_id');
                $scheduletime->emp_id = $request->input('empid');
                $scheduletime->in = $in;
                $scheduletime->out = $out;
                $scheduletime->breakin = $bin;
                $scheduletime->breakout = $bout;
                $scheduletime->save();
            return redirect()->back()
                ->with('message', 'Wednesday (day shift) Schedule Successfully added.')
                ->with('msgtype', 'success');
            }else if($day == 'th1'){
                $scheduletime->day = 5;
                $scheduletime->sched_id = $request->input('sched_id');
                $scheduletime->emp_id = $request->input('empid');
                $scheduletime->in = $in;
                $scheduletime->out = $out;
                $scheduletime->breakin = $bin;
                $scheduletime->breakout = $bout;
                $scheduletime->save();
            return redirect()->back()
                ->with('message', 'Thursday (day shift) Schedule Successfully added.')
                ->with('msgtype', 'success');
            }else if($day == 'fr1'){
                $scheduletime->day = 6;
                $scheduletime->sched_id = $request->input('sched_id');
                $scheduletime->emp_id = $request->input('empid');
                $scheduletime->in = $in;
                $scheduletime->out = $out;
                $scheduletime->breakin = $bin;
                $scheduletime->breakout = $bout;
                $scheduletime->save();
            return redirect()->back()
                ->with('message', 'Friday (day shift) Schedule Successfully added.')
                ->with('msgtype', 'success');
            }else if($day == 'sa1'){
                $scheduletime->day = 7;
                $scheduletime->sched_id = $request->input('sched_id');
                $scheduletime->emp_id = $request->input('empid');
                $scheduletime->in = $in;
                $scheduletime->out = $out;
                $scheduletime->breakin = $bin;
                $scheduletime->breakout = $bout;
                $scheduletime->save();
            return redirect()->back()
                ->with('message', 'Saturday (day shift) Schedule Successfully added.')
                ->with('msgtype', 'success');

            }else if($day == 'su2'){
                $scheduletime->day = 1;
                $scheduletime->sched_id = $request->input('sched_id');
                $scheduletime->emp_id = $request->input('empid');
                $scheduletime->in = $in;
                $scheduletime->out = $out;
                $scheduletime->breakin = $bin;
                $scheduletime->breakout = $bout;
                $scheduletime->save();
            return redirect()->back()
                ->with('message', 'Sunday (night shift) Schedule Successfully added.')
                ->with('msgtype', 'success');
            }else if($day == 'mo2'){
                $scheduletime->day = 2;
                $scheduletime->sched_id = $request->input('sched_id');
                $scheduletime->emp_id = $request->input('empid');
                $scheduletime->in = $in;
                $scheduletime->out = $out;
                $scheduletime->breakin = $bin;
                $scheduletime->breakout = $bout;
                $scheduletime->save();
            return redirect()->back()
                ->with('message', 'Monday (night shift) Schedule Successfully added.')
                ->with('msgtype', 'success');
            }else if($day == 'tu2'){
                $scheduletime->day = 3;
                $scheduletime->sched_id = $request->input('sched_id');
                $scheduletime->emp_id = $request->input('empid');
                $scheduletime->in = $in;
                $scheduletime->out = $out;
                $scheduletime->breakin = $bin;
                $scheduletime->breakout = $bout;
                $scheduletime->save();
            return redirect()->back()
                ->with('message', 'Tuesday (night shift) Schedule Successfully added.')
                ->with('msgtype', 'success');
            }else if($day == 'we2'){
                $scheduletime->day = 4;
                $scheduletime->sched_id = $request->input('sched_id');
                $scheduletime->emp_id = $request->input('empid');
                $scheduletime->in = $in;
                $scheduletime->out = $out;
                $scheduletime->breakin = $bin;
                $scheduletime->breakout = $bout;
                $scheduletime->save();
            return redirect()->back()
                ->with('message', 'Wednesday (night shift) Schedule Successfully added.')
                ->with('msgtype', 'success');
            }else if($day == 'th2'){
                $scheduletime->day = 5;
                $scheduletime->sched_id = $request->input('sched_id');
                $scheduletime->emp_id = $request->input('empid');
                $scheduletime->in = $in;
                $scheduletime->out = $out;
                $scheduletime->breakin = $bin;
                $scheduletime->breakout = $bout;
                $scheduletime->save();
            return redirect()->back()
                ->with('message', 'Thursday (night shift) Schedule Successfully added.')
                ->with('msgtype', 'success');
            }else if($day == 'fr2'){
                $scheduletime->day = 6;
                $scheduletime->sched_id = $request->input('sched_id');
                $scheduletime->emp_id = $request->input('empid');
                $scheduletime->in = $in;
                $scheduletime->out = $out;
                $scheduletime->breakin = $bin;
                $scheduletime->breakout = $bout;
                $scheduletime->save();
            return redirect()->back()
                ->with('message', 'Friday (night shift) Schedule Successfully added.')
                ->with('msgtype', 'success');
            }else if($day == 'sa2'){
                $scheduletime->day = 7;
                $scheduletime->sched_id = $request->input('sched_id');
                $scheduletime->emp_id = $request->input('empid');
                $scheduletime->in = $in;
                $scheduletime->out = $out;
                $scheduletime->breakin = $bin;
                $scheduletime->breakout = $bout;
                $scheduletime->save();
            return redirect()->back()
                ->with('message', 'Saturday (night shift) Schedule Successfully added.')
                ->with('msgtype', 'success');
            }else{
                return redirect()->back()
                ->with('message', 'Unable to add schedule, please call the site administrator.')
                ->with('msgtype', 'error');
            }
        }
        }
        public function employeeFilter(Request $request){
         $employee = Employee::where('firstname','LIKE','%'. $search .'%')->take(10)->get();
        return view('employees/employee')
        ->with('employees', $employee)
        ->with('ago', new Timeago);
    }
         public function pdfEmployee($empid) {
            $employee = Employee::where('id','=', $empid)->where('user_id', '=', 1)->get();
            if ($employee->isEmpty()){
                return redirect::to('home/employees')
                ->with('message', 'Employee not found.')
                ->with('msgtype', 'error');
            }else{
                $pdf = PDF::loadview('employees/pdfEmployee', ['info' => $employee]);
                return $pdf->stream();
                /*return view('employees/pdfEmployee')
                ->with('info', $employee);*/
            }
    }
}

class Timeago {
    public function ago($time)
    {
       $periods = array("second", "minute", "hour", "day", "week", "month", "year", "decade");
       $lengths = array("60","60","24","7","4.35","12","10");

       $now = time();

           $difference     = $now - $time;
           $tense         = "ago";

       for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {
           $difference /= $lengths[$j];
       }

       $difference = round($difference);

       if($difference != 1) {
           $periods[$j].= "s";
       }

       return $difference .' '. $periods[$j] . ' ago';
    }
}