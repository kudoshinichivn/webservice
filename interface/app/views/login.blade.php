@extends('layout')
@section('content')
<body>
	<div id="login" class="uk-modal">
		
		<div class="uk-modal-dialog">
			<a class="uk-modal-close uk-close uk-close-alt"></a>
		<h3><span class="uk-text-bold uk-text-warning uk-text-center" id="login_status"></span></h3>
			
		</div>
	</div>	
	<content class="wrapper" >
	<div class="uk-grid">
		<div class="uk-container-center">
			<div class="uk-grid">
				<div class="uk-width-1-3">
					<img src="{{ URL::asset('images/employees.png') }}">
					
				</div>
				<div class="uk-width-1-3">

					<img class="" src="{{ URL::asset('images/ems.png') }}">
					<div class="uk-form">
						<div class="uk-width-1-1 uk-form-icon">
				    		<i class="uk-icon-user"></i>
				    		<input class="uk-width-1-1" id ="username" type="text" placeholder="Username..."/>
						</div>
						<p>
						<div class="uk-width-1-1 uk-form-icon">
				    		<i class="uk-icon-key"></i>
				    		<input class="uk-width-1-1" id ="password" type="password" placeholder="Password..."/>
						</div>
						<p>
						<button data-uk-modal="{target:'#login'}" onclick="getLogin();" class="uk-width-1-1 uk-button uk-button-large uk-button-primary"> <i class="uk-icon-sign-in"></i> <span> Login </span></button>
					</div>
				</div>
			</div>
			
		</div>
	</div>
	</content>
</body>

@stop

