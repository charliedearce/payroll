<?php

namespace App\Http\Controllers;

use App\attendance;
use App\payroll;
use App\specialday;
use App\scheduleday;
use App\time;
use App\leave;
use App\Employee;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class payrollController extends Controller
{
    public function viewAttendance(Request $request, $payrollid,$empid){
    	

    	$employee = Employee::where('id','=', $empid)->where('user_id', '=', 1)->get();
    	$payroll = payroll::where('id','=', $payrollid)->where('user_id', '=', 1)->get();
        if ($employee->isEmpty()){
        	return redirect::to('home')
        	->with('message', 'Payroll not found.')
            ->with('msgtype', 'warning');
        }elseif($payroll->isEmpty()){
        	return redirect::to('home')
        	->with('message', 'Employee not found.')
            ->with('msgtype', 'warning');
        }else{
        	$attendance = attendance::where('payroll_id','=', $payrollid)->where('emp_id', '=', $empid)->where('user_id', '=', 1)->get();
        	return view('payroll/attendance')
        	->with('attendance', $attendance)
        	->with('cur_url', $request->fullUrl());
        }
    }

    public function addAttendance(Request $request,$payrollid,$empid){
    	$daytype = '';
    	$leave_type = '';
    	$wdate = $request->input('workdate');
    	$specialday = specialday::where('user_id', '=', 1)->where('date','=',$wdate)->get();
    	if(Empty($specialday)){
    		$daytype = 0;
    	}else{
    		foreach ($specialday as $special) {
    		$daytype = $special->type;
    		}
    	}
    	
    	$leave = leave::where('user_id', '=', 1)->where('emp_id', '=', $empid)->where('from','<=',$wdate)->where('to','>=',$wdate)->get();
    	if(Empty($leave)){
    		$leave_type = 0;
    	}else{
    		foreach ($leave as $myleave) {
    		$leave_type = $myleave->leave_type;
    		}
    	}
    	
    	$attendance = new attendance;
    	$attendance->payroll_id = $payrollid;
    	$attendance->emp_id = $empid;
    	$attendance->user_id = 1;
    	$attendance->shift = $request->input('shift');
    	$attendance->date = $request->input('workdate');
    	$attendance->in = $request->input('in');
    	$attendance->out = $request->input('out');
    	$attendance->breakin = $request->input('bin');
    	$attendance->breakout = $request->input('bout');
    	$attendance->daytype = $daytype;
    	$attendance->leave = $leave_type;
    	$attendance->save();
    	return redirect()->back();
    }
}
