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
		    	$attendance = new attendance;
		    	$in = date("H:i", strtotime($request->input('in')));
	            $out = date("H:i", strtotime($request->input('out')));
	            $bin = date("H:i", strtotime($request->input('bin')));
	            $bout = date("H:i", strtotime($request->input('bout')));
		    	$attendance->payroll_id = $payrollid;
		    	$attendance->emp_id = $empid;
		    	$attendance->user_id = 1;
		    	$attendance->shift = $request->input('shift');
		    	$attendance->date = $request->input('workdate');
		    	$attendance->in = $in;
		    	$attendance->out = $out;
		    	$attendance->breakin = $bin;
		    	$attendance->breakout = $bout;
		    	$attendance->daytype = $daytype;
		    	$attendance->leave = $leave_type;
		    	$attendance->save();
		    	return redirect()->back()
		    	->with('message', '<center>Attendance added.</center>')
		        ->with('msgtype', 'success');
		    }
    }
}
