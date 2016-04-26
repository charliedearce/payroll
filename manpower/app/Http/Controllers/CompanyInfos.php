<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class CompanyInfos extends Controller
{
    public function infos(){
    	return view('companyinfos');
    }

    public function htax(){
    	return view('tax_table');
    }

}
