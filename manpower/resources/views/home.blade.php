<!DOCTYPE html>
<html>
<head>

	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="{{ url(elixir('css/all.css')) }}">
	
	<title></title>


</head>
<body>
	<ul id="dropdown1" class="dropdown-content">
	  <li><a href="#!">one</a></li>
	  <li><a href="#!">two</a></li>
	  <li class="divider"></li>
	  <li><a href="#!">three</a></li>
	</ul>
		<nav>
		    <div class="nav-wrapper">
		    <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
		      <a href="#" class="brand-logo center">Logo</a>
		      <ul id="nav-mobile" class="left hide-on-med-and-down">
		        <li><a href="">Home</a></li>
		        <li><a class="dropdown-button" href="#!" data-activates="dropdown1">Company<i class="material-icons right">arrow_drop_down</i></a></li>
		        <li><a class="dropdown-button" href="#!" data-activates="dropdown1">Employees<i class="material-icons right">arrow_drop_down</i></a></li>
		        <li><a class="dropdown-button" href="#!" data-activates="dropdown1">Payroll<i class="material-icons right">arrow_drop_down</i></a></li>
		        <li><a class="dropdown-button" href="#!" data-activates="dropdown1">Reports<i class="material-icons right">arrow_drop_down</i></a></li>
		        <li><a href="">Feedback</a></li>
		      </ul>
				<ul class="right hide-on-med-and-down">
				<li>
					<a class="dropdown-button" href="#!" data-activates="dropdown1">
						<div class="chip">
			      			<img class="responsive-img circle" src="http://materializecss.com/images/yuna.jpg">
			      			Charlie De Arce
			      		</div>
						<i class="material-icons right">arrow_drop_down</i>
					</a>
				</li>
			    </ul>
				    <ul class="side-nav" id="mobile-demo">
				        <li><a href="sass.html">Sass</a></li>
				        <li><a href="badges.html">Components</a></li>
				        <li><a href="collapsible.html">Javascript</a></li>
				        <li><a href="mobile.html">Mobile</a></li>
				    </ul>
		    </div>
		 </nav>
	@if(count($errors) > 0)
			<?php $i=0;?>
		@foreach($errors->all() as $error)
			<input type="hidden" value="{{$error}}" id="msg{{$i}}">
			<input type="hidden" value="{{count($errors)}}" id="errorcount">
			<?php $i++;?>
		@endforeach
	@endif
	<button id="showtoast" style="display:none;"></button>
	@if(session()->has('message'))
		@if(session('msgtype') == 'success')
			<input type="hidden" value="success" id="msgtype">
			<input type="hidden" value="{{session('message')}}" id="systemmsg">
		@elseif(session('msgtype') == 'error')
			<input type="hidden" value="error" id="msgtype">
			<input type="hidden" value="{{session('message')}}" id="systemmsg">
		@elseif(session('msgtype') == 'info')
			<input type="hidden" value="info" id="msgtype">
			<input type="hidden" value="{{session('message')}}" id="systemmsg">
		@elseif(session('msgtype') == 'warning')
			<input type="hidden" value="warning" id="msgtype">
			<input type="hidden" value="{{session('message')}}" id="systemmsg">
		@endif
		<button id="showtoastsuccess" style="display:none;"></button>
	@endif
	<div class="container">
		@yield('content')
	</div>

  	<script type="text/javascript" src="{{ asset('js/jquery-2.1.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ url(elixir('js/all.js')) }}"></script>
    
<script>
  
</script>


   
</body>
</html>