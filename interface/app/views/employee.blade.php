<tr><th>Select</th><th>EID</th><th>Name</th><th>Date of Birth</th><th>Gender</th><th>Tel</th><th>Email</th><th>Address</th><th>Department</th><th>Role</th></tr>
<?php
foreach ($data as $value)
    {
    	?>
    		<tr>
    			<td><input type="checkbox" name="{{$value->eid}}" id="{{$value->eid}}" value="{{$value->eid}}"/></td>
    			<td>{{$value->eid}}</td>
    			<td>{{$value->ename}}</td>
    			<td>{{$value->ebirth}}</td>
    			<td>{{$value->egender}}</td>
    			<td>{{$value->etel}}</td>
    			<td>{{$value->eemail}}</td>
    			<td>{{$value->eaddress}}</td>
    			<td>{{$value->dcode}}</td>
    			<td>{{$value->rcode}}</td>
    		</tr>

    	<?php
    }

?>