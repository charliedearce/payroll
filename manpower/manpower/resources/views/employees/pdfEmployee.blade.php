<!DOCTYPE html>
<html>
@foreach($info as $info)
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
@endforeach
<head>
       <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
       <link rel="stylesheet" href="{{ asset('css/pdf.css') }}">
       <title>{{$info->firstname}} {{$info->lastname}}'s Info</title>
       <style>
       body{
            color:#000000 !important;
       }
       </style>
</head>
<body>

<div class="row">
      <div class="col s12 left">
            <b>Employee Information</b><br>
            Full name: {{strtoupper($info->firstname)}} {{strtoupper($info->middlename)}}  {{strtoupper($info->lastname)}} <br>
            Birth day: {{$info->birthday}} <br>
            Religion: {{$info->religion}} <br>
            Address: {{$info->address}} &bull; {{$info->zipcode}}<br>
            Phone #: {{$info->phone}}<br>
            Email: {{$info->email}} <br>
            Sex: {{$info->gender}} <br>
            <hr>
            <b>Salary Details</b><br>
            Basic salary: {{$info->basicsalary}}<br>
            Allowance: {{$info->deminis}}<br>
            <hr>
            <b>Job Details</b><br>
            Branch: {{$info->branch}}<br>
            Position: {{$info->position}}<br>
            Department: {{$info->department}}<br>
            Start Date: {{$info->startdate}}<br>
            <hr>
            <b>Employment Information</b><br>
            TIN: {{$info->tinnum}} <br>
            Phil. Health: {{$info->philnum}}<br>
            SSS: {{$info->sssnum}}<br>
            Pag-ibig: {{$info->pagibignum}}<br>
            Sick Leave: {{$info->sickleave}}<br>
            Vacation Leave: {{$info->vacaleave}}<br>
            Work Status: {{$info->status}}<br>
            <hr>
            <b>Dependents</b><br>
            Dependent 1: {{$info->dependent1}}<br>
            Birthday: {{$info->depbday1}}<br>
            Dependent 2: {{$info->dependent2}}<br>
            Birthday: {{$info->depbday2}}<br>
            Dependent 3: {{$info->dependent3}}<br>
            Birthday: {{$info->depbday3}}<br>
            Dependent 4: {{$info->dependent4}}<br>
            Birthday: {{$info->depbday4}}<br>
            <hr>
            <b>Bank Details</b><br>
            Account type: {{$info->banktype}}<br>
            Account #: {{$info->banknum}}
      </div>
</div>
</body>
</html>

