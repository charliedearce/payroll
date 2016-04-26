<?php

namespace App\Http\Controllers;

use App\Employees;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
class EmployeeController extends Controller
{
    public function employees(){
    	return view('employees/employee');
    }

    public function saveEmployees(Request $request){
        $employee = new Employees;
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
        'position.required'=>'Please select Employee Position',
        'branch.required'=>'Please select Employee branch designation',
        'department.required'=>'Please select Employee department designation',
        'startdate.required'=>'Employee Starting date must be fill up',
        'employmentstatus.required'=>'Employee Status must be fill up',
        'sickleave.numeric'=>'Sick leave can only contain Numeric Characters',
        'vacaleave.numeric'=>'Vacation Leave can only contain Numeric Characters',
        'hourlyrate.numeric'=>'Hourly Rate can only contain Numeric Characters',
        'banknum.numeric'=>'Bank number can only contain Numeric Characters',
        'tinnum.numeric'=>'TIN number can only contain Numeric Characters',
        'philnum.numeric'=>'Philhealth number can only contain Numeric Characters',
        'sssnum.numeric'=>'SSS number can only contain Numeric Characters',
        'pagibignum.numeric'=>'PAG-IBIG number can only contain Numeric Characters',
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
        'position'=>'required',
        'branch'=>'required',
        'department'=>'required',
        'startdate'=>'required',
        'employmentstatus'=>'required',
        'sickleave'=>'numeric|max:500',
        'vacaleave'=>'numeric|max:500',
        'hourlyrate'=>'numeric|max:50000',
        'banknum'=>'numeric',
        'tinnum'=>'numeric',
        'philnum'=>'numeric',
        'sssnum'=>'numeric',
        'pagibignum'=>'numeric',
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
        $fileName = rand(1,9999999999999999). $request['empid']. str_shuffle('abcdefghiklmnopqrstuvwxyz') . rand(1,9999999999999999).'.'.$extension;
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
        
        return redirect()->back();
    }


    }

    public function deletePhoto(){
        Storage::disk('local')->Delete('3957769071810779061.png');
        echo "hehe";
    }

    public function addEmployees(){
        return view('employees/addEmployee');
    }
    public function editEmployee($empid){
        $employee = Employees::where('id','=', $empid)->where('user_id', '=', 1)->get();
        if ($employee->isEmpty()){
            return redirect('home');
        }else{
            return view('employees/editEmployee')
            ->with('info', $employee);
        }
    }
    public function updateEmployee(Request $request, $empid){
        try {
            $employee = Employees::where('id','=', $empid)->where('user_id', '=', 1)->first();
            $employee->banknum = $request->input('banknum');
            $employee->save();
        }catch(\Exception $e){
            echo "im horny";
        }
    }

    public function getImage($filename){
        $file = Storage::disk('local')->get($filename);
        return new Response ($file, 200);
    }
}
