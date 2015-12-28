


@extends('layout')
@section('content')
<body onload="allEmployee();">
<script type="text/javascript">
	
	var login={
		username:"{{$username}}",
		password:"{{$password}}"
	};
</script>
<header class="wrapper">
	<div class="uk-width-1-1">
	<div class="uk-grid">
		<div class="uk-width-1-1 uk-width-medium-1-3 uk-width-small-1-1 uk-text-center"><a href="#"><img  alt="Employees Managerment System" src="images/logo.png"/></a></div>
		<div style="padding-top: 1%;" class="uk-width-1-1 uk-width-medium-1-2 uk-width-small-1-1 uk-text-middle">
			<ul class="navibar">
				
				<li><a data-uk-modal="{target:'#develop'}" ><i class="uk-icon-flag"></i> Help </a></li>
				<li><a data-uk-modal="{target:'#develop'}" ><i class="uk-icon-history"></i> Your Info </a></li>
				<li><a href="{{ URL::asset('logout') }}"><i class="uk-icon-sign-out"></i> Logout </a></li>
				
			</ul>	
		
				
		</div>
	</div>
	</div>
</header>
<content class="wrapper" >
	<div class="uk-width-1-1">
		<div class="uk-grid">
			<div class="uk-width-1-1 uk-width-large-1-4 uk-width-medium-1-3 uk-width-small-1-1 uk-container-center">
				<h3 class="tittle">Menu</h3>
				<div class="content-bg">
					<div style="height:195px;" class="uk-scrollable-box">
						<button onclick="allEmployee()" style="margin:1px 0px;" class="uk-width-1-1 uk-button uk-button-primary uk-text-left"><i class="uk-icon-group"></i> Employees </button>
						<button data-uk-modal="{target:'#develop'}" style="margin:1px 0px;" class="uk-width-1-1 uk-button uk-button-primary uk-text-left"><i class="uk-icon-calendar"></i> Worksdays </button>
						<button data-uk-modal="{target:'#develop'}" style="margin:1px 0px;" class="uk-width-1-1 uk-button uk-button-primary uk-text-left"><i class="uk-icon-money"></i> Salary </button>
						<button data-uk-modal="{target:'#develop'}" style="margin:1px 0px;" class="uk-width-1-1 uk-button uk-button-primary uk-text-left"><i class="uk-icon-cube"></i> Departments </button>
						<button data-uk-modal="{target:'#develop'}" style="margin:1px 0px;" class="uk-width-1-1 uk-button uk-button-primary uk-text-left"><i class="uk-icon-cubes"></i> Roles </button>
						
						
					</div>

				</div>
				<h3 class="tittle">Tìm kiếm</h3>
				<div class="content-bg">
					<div class="uk-form">
						<div class="uk-form-icon uk-width-1-1"><i class="uk-icon-search"></i><input class="uk-width-1-1" type="text" name="key" id="key"/></div>
					</div>
				</div>
			</div>	
			<div class="uk-width-1-1 uk-width-large-3-4 uk-width-medium-2-3 uk-width-small-1-1 uk-container-center">
				
				<h3 class="tittle">Detail Infomation</h3>
				<div class="content-bg">

					<div style="height:300px;" class="uk-scrollable-box">
						<table id="listcheck" border="0">
						
							<tr id="table_title"></tr>
							<tbody id="display">
								

							
							
							
							
							</tbody>
						</table>
					
						<div style="margin: 5% auto; display:none;" id="loading" class='uk-text-center'>
							<span class='tittle'><img src='images/loading.gif'/> Loading... </span>
						</div>
					</div>
				</div>
				<div class="button_group">
					<button onclick="setProcess('append');" data-uk-modal="{target:'#process'}" style="margin-top:10px;" class="uk-button uk-button-large class uk-button-primary"><i class="uk-icon-plus-square"></i> Append </button>
					<button onclick="setProcess('update');" data-uk-modal="{target:'#process'}" style="margin-top:10px;" class="uk-button uk-button-large class uk-button-success"><i class="uk-icon-edit "></i> Update </button>		
					<button onclick="removeEmployee();" data-uk-modal="{target:'#remove'}" style="margin-top:10px;" class="uk-button uk-button-large class uk-button-danger"><i class="uk-icon-remove"></i> Remove </button>
				</div>
				
			</div>
							
		</div>
				
	</div>
	
</content>
<footer class="wrapper">
	<div class="uk-width-1-1">
	<div class="uk-grid">
		<div style="padding: 1% 0 1% 10%;" class="uk-width-1-1 uk-width-medium-1-2 uk-width-small-1-1 uk-text-middle">
			<div class="uk-text-left">
			<p>
			<p>
			<p>
			<span><i class="uk-icon-support"></i> Support</span><br>
			<span><i class="uk-icon-envelope"></i> Email: nguyenphuongthai94@gmail.com</span><br>
			<span><i class="uk-icon-phone"></i> Hotline: 01694905894</span><br>
			</div>
			
		</div>
		<div style="padding: 1% 0 1% 10%;" class="uk-width-1-1 uk-width-medium-1-2 uk-width-small-1-1 uk-text-middle">
			<div style="margin-left:3%;" class="uk-text-left">
			<p>
			<p>
			<p>
			
			<span><i class="uk-icon-language"></i> Language: <a onclick="language('en');">English</a>-<a onclick="language('vi');">Vietnamese</a></span>
			<p>
			<p>
			<span>Employees Managerment Copyright <i class="uk-icon-copyright"></i> 2015 All rights reserved.</span>
			
			
			
			</div>
		
		</div>
		
	</div>
	</div>
</footer>

<div id="process" class="uk-modal">
	<div class="uk-modal-dialog">
		
		<a  class="uk-modal-close uk-close uk-close-alt"></a>
		
				
		<h3><span id="process_title" class="uk-text-bold uk-text-success uk-text-center-medium">Append</span><span class="uk-text-bold uk-text-danger uk-text-center-medium"> Employee</span></h3>
		
		<span class="uk-text-bold uk-text-warning uk-text-center" id="append_status"></span>
		<div class="uk-form">	
			<div class="uk-form-icon">
	    		<i class="uk-icon-key"></i>
	    		<input id ="eid" type="text" placeholder="EID..."/>
			</div>
			<div class="uk-form-icon">
	    		<i class="uk-icon-user"></i>
	    		<input id ="ename" type="text" placeholder="Full Name..."/>
			</div>
			<div class="uk-form-icon">
	    		<i class="uk-icon-calendar"></i>
	    		<input id="ebirth" placeholder="Date Of Birth..."  type="text" data-uk-datepicker="{weekstart:0, format:'YYYY-MM-DD'}">
			</div>

            
	        <div class="uk-form-icon">
	    		<i class="uk-icon-phone"></i>
	    		<input id="etel" type="text" placeholder="Telephone..."/>
			</div>
			 <div class="uk-form-icon">
	    		<i class="uk-icon-envelope"></i>
	    		<input id="eemail" type="text" placeholder="Email..."/>
			</div>
			 <div class="uk-form-icon">
	    		<i class="uk-icon-home"></i>
	    		<input id="eaddress" type="text" placeholder="Address..."/>
			</div>
			<div class="uk-form-row">
		
			<select id="egender">
				<option value="">Select Gender</option>
                <option value="1">Male</option>
                <option value="0">Female</option>
                
            </select>
           
          
			<select id="dcode">
				<option value="">Select Derpartment</option>
                <option value="admin">Administrator</option>
                <option value="app">Application</option>
                <option value="comter">Comter & QA</option>
                <option value="graph">Graphic</option>
                <option value="rese">Research</option>
                
            </select>
           
       
            <select id="rcode">
            	<option value="">Select Role</option>
                <option value="em">Employee</option>
                <option value="lea">Leader</option>
                <option value="mas">Master</option>
                <option value="dir">Director</option>
                
            </select>    
            </div>  
            <div class="uk-form-row">
            <button id="btn_append" onclick="appendEmployee();" class="uk-button uk-button-large uk-width-1-1 uk-button-primary"> <i class="uk-icon-plus-square"></i> <span> Append </span></button>
            <button id="btn_update" onclick="updateEmployee();" class="uk-button uk-button-large uk-width-1-1 uk-button-primary"> <i class="uk-icon-plus-square"></i> <span> Update </span></button>
	        </div>
		</div>
		
		
		
		
		
	</div>
</div>	
<div id="remove" class="uk-modal">
	
	<div class="uk-modal-dialog">
		<a class="uk-modal-close uk-close uk-close-alt"></a>
	<h3><span id="remove_status" class="uk-text-bold uk-text-warning uk-text-center"></span></h3>
		
	</div>
</div>	
<div id="develop" class="uk-modal">
	
	<div class="uk-modal-dialog">
		<a class="uk-modal-close uk-close uk-close-alt"></a>
	<h3><span id="remove_status" class="uk-text-bold uk-text-warning uk-text-center">
		This functionality is being developed, please try again later!
	</span></h3>
		
	</div>
</div>
</body>
@stop


