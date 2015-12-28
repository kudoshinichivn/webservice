//employee.js - nguyenphuongthai94@gmail.com

function getLogin(){
	var username = $("#username").val();
	var password = $("#password").val();
	login["username"]=username;
	login["password"]=password;

	var send_data={
	login: login,
	method: "login",
	section: "",
	where: "",
	data: "",
	};
	
	var json_data=JSON.stringify(send_data);
	$.post(

		'http://localhost/webservice/process/public/',
		{json_data: json_data},
		function(result){
							
			$.post(
				'http://localhost/webservice/interface/public/',
				{json_data: result},
				function(result){
					
					$("#login_status").html(result);
				}
				);
		}
		);
}
function setProcess(method){
	if(method=="append")
	{
		$("#process_title").html("Append");
		$("#btn_append").show();
		$("#btn_update").hide();
		$("#eid").val("");

	}
	else
	{
		$("#process_title").html("Update");
		$("#btn_append").hide();
		$("#btn_update").show();
		if(countcheckbox()==1)
		{
			var inputElems = document.getElementsByTagName("input");
			
			for (var i=0; i<inputElems.length; i++) 
			{
				if (inputElems[i].type === "checkbox" && inputElems[i].checked === true) 
				{
		    		$("#eid").val(inputElems[i].value);

				}
			}
		}
	}
}
function countcheckbox()
{
	var inputElems = document.getElementsByTagName("input"),
	count = 0;
	for (var i=0; i<inputElems.length; i++) 
	{
		if (inputElems[i].type === "checkbox" && inputElems[i].checked === true) 
		{
    		count++;
		}
	}
	return count;
}
function updateEmployee(){
	if($("#eid").val()!="" && $("#ename").val()!="" && $("#ebirth").val()!="" && $("#etel").val()!="" && $("#eaddress").val()!="" && $("#eemail").val()!="" && $("#dcode").val()!="" && $("#rcode").val()!="" && $("#egender").val()!="")
	{
		$("#append_status").html("Processing...");
		var data ={
			eid: $("#eid").val(),
			ename: $("#ename").val(),
			ebirth: $("#ebirth").val(),
			egender: $("#egender").val(),
			etel: $("#etel").val(),
			eaddress: $("#eaddress").val(),
			eemail: $("#eemail").val(),
			dcode: $("#dcode").val(),
			rcode: $("#rcode").val(),
		};
		var send_data={
		login: login,
		method: "update",
		section: "employee",
		where: "",
		data: data,

		};
		
		
		var json_data=JSON.stringify(send_data);
		$.post(

		'http://localhost/webservice/process/public/',
		{json_data: json_data},
		function(result){
			
							
			$.post(
				'http://localhost/webservice/interface/public/',
				{json_data: result},
				function(result){
					$("#append_status").html(result);
					allEmployee();
				}
				);
		}
		);
	}
	else
		$("#append_status").html("Please enter information first!");
}
function removeEmployee(){
	if(countcheckbox()!=0)
	{
		$("#remove_status").html("Processing...");
		var inputElems = document.getElementsByTagName("input");
		var eids=[];
		for (var i=0; i<inputElems.length; i++) 
		{
			if (inputElems[i].type === "checkbox" && inputElems[i].checked === true) 
			{
	    		eids.push(inputElems[i].value);

			}

		}
		var send_data={
			login: login,
			method: "remove",
			section: "employee",
			where: eids,
			data: "",

			};
		var json_data=JSON.stringify(send_data);

			$.post(

			'http://localhost/webservice/process/public/',
			{json_data: json_data},
			function(result){
				
								
				$.post(
					'http://localhost/webservice/interface/public/',
					{json_data: result},
					function(result){
						$("#remove_status").html(result);
						allEmployee();
					}
					);
			}
			);
	}
	else
		$("#remove_status").html("Please select employee first!");
	
}


function appendEmployee(){
	if($("#eid").val()!="" && $("#ename").val()!="" && $("#ebirth").val()!="" && $("#etel").val()!="" && $("#eaddress").val()!="" && $("#eemail").val()!="" && $("#dcode").val()!="" && $("#rcode").val()!="" && $("#egender").val()!="")
	{
		$("#append_status").html("Processing...");
		var data ={
			eid: $("#eid").val(),
			ename: $("#ename").val(),
			ebirth: $("#ebirth").val(),
			egender: $("#egender").val(),
			etel: $("#etel").val(),
			eaddress: $("#eaddress").val(),
			eemail: $("#eemail").val(),
			dcode: $("#dcode").val(),
			rcode: $("#rcode").val(),
		};
		var send_data={
		login: login,
		method: "append",
		section: "employee",
		where: "",
		data: data,

		};
		
		
		var json_data=JSON.stringify(send_data);
		$.post(

		'http://localhost/webservice/process/public/',
		{json_data: json_data},
		function(result){
			
							
			$.post(
				'http://localhost/webservice/interface/public/',
				{json_data: result},
				function(result){
					$("#append_status").html(result);
					allEmployee();
				}
				);
		}
		);
	}
	else
		$("#append_status").html("Please enter information first!");
}




$(document).keyup(function(e){
if(e.keyCode=='13'){
   getEmployee();
}
})
function getEmployee(){
	
	var send_data={
	login: login,
	method: "get",
	section: "employee",
	where: $("#key").val(),
	data: "",
	};
	$("#loading").show();
	$("#display").empty();
	
	var json_data=JSON.stringify(send_data);
	$.post(

		'http://localhost/webservice/process/public/',
		{json_data: json_data},
		function(result){
							
			$.post(
				'http://localhost/webservice/interface/public/',
				{json_data: result},
				function(result){
					$("#loading").hide();
					
					$("#display").html(result);
				}
				);
		}
		);

}
function allEmployee(){
	var send_data={
	login: login,
	method: "get",
	section: "employee",
	data: "",
	where: "",
	};
	$("#loading").show();
	$("#display").empty();
	
	var json_data=JSON.stringify(send_data);
	$.post(

		'http://localhost/webservice/process/public/',
		{json_data: json_data},
		function(result){
							
			$.post(
				'http://localhost/webservice/interface/public/',
				{json_data: result},
				function(result){
					$("#loading").hide();
					
					$("#display").html(result);
				}
				);
		}
		);
}

