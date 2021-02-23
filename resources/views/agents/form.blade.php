@csrf
<div class="row">
	<div class="col-sm-6">
		<div class="from-group">
			<label>First Name</label>
			<input type="text" name="first_name" class="form-control" value="@isset($agent){{$agent->first_name}}@endisset" required="">
		</div>
	</div>

	<div class="col-sm-6">
		<div class="from-group">
			<label>Last Name</label>
			<input type="text" name="last_name" class="form-control" value="@isset($agent){{$agent->last_name}}@endisset" required="">
		</div>
	</div>

	<div class="col-sm-12">
		<div class="form-group">
			<label>Email Address</label>
			<input type="email" name="email" class="form-control" value="@isset($agent){{$agent->email}}@endisset" required="">
		</div>
	</div>

	<div class="col-sm-12">
		<div class="form-group">
			<label>Contact Number</label>
			<input type="text" name="contact_number" class="form-control" value="@isset($agent){{$agent->contact_number}}@endisset" required="">
		</div>
	</div>

	@if(!isset($agent))
	<div class="col-sm-6">
		<div class="form-group">
			<label>Password</label>
			<input type="text" name="password" class="form-control" required="">
		</div>
	</div>
	@endif

	<div class="col-sm-6">
		<div class="form-group">
			<label>Group</label>
			<select name="group_id" required="" class="form-control" id="group_id" >
				<option value="">Select Group</option>
				@isset($groups)
					@foreach($groups as $group)
						<option value="{{$group->id}}" @isset($agent)@if($agent->group_id==$group->id) selected="" @endif @endisset >{{$group->name}}</option>
					@endforeach
				@endisset
			</select>
		</div>
	</div>
	
	<div id="managers" class='col-sm-6'>
		@if(isset($managers))
			<label>Managers</label>
			<select class='form-control' name='user_id' required='required'>
	        	<option value=''>Select Manager</option>
	        	@if(isset($managers) && isset($agent))
	        		@foreach($managers as $manager)
	        			<option value='{{$manager->id}}' @if($agent->user_id==$manager->id) selected="" @endif >{{$manager->first_name}}</option>
	        		@endforeach
	        	@endif
	        </select>
        @endif
	</div>

	<div class="col-sm-12">
		<div class="form-group">
			<button class="btn btn-primary">Save</button>
		</div>
	</div>

</div>

<script type="text/javascript">
	$(document).ready(function(){
		$('#group_id').on('change', function() {
		  var group_id = this.value;
		  console.log(group_id);
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                /* the route pointing to the post function */
                url: '/getGroupAgent',
                type: 'POST',
                /* send the csrf-token and the input to the controller */
                data: {_token: CSRF_TOKEN, group_id:group_id},
                dataType: 'html',
                /* remind that 'data' is the response of the AjaxController */
                success: function (data) { 
                	// alert(data);
                	// console.log(data);
                	if(data==''){
                		$("#inner-manager").remove();
                	}
                	else{
                    	$("#managers").html(data); 
                	}
                }
            }); 
		});
	});

</script>