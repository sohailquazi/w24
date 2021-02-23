@csrf
<div class="row">
	<div class="col-sm-6">
		<div class="from-group">
			<label>First Name</label>
			<input type="text" name="first_name" class="form-control" value="@isset($user){{$user->first_name}}@endisset" required="">
		</div>
	</div>

	<div class="col-sm-6">
		<div class="from-group">
			<label>Last Name</label>
			<input type="text" name="last_name" class="form-control" value="@isset($user){{$user->last_name}}@endisset" required="">
		</div>
	</div>

	<div class="col-sm-12">
		<div class="form-group">
			<label>Email Address</label>
			<input type="email" name="email" class="form-control" value="@isset($user){{$user->email}}@endisset" required="">
		</div>
	</div>

	@if(!isset($user))
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
			<select name="group_id" required="" class="form-control">
				<option value="">Select Group</option>
				@isset($groups)
					@foreach($groups as $group)
						<option value="{{$group->id}}" @isset($user)@if($user->group_id==$group->id) selected="" @endif @endisset >{{$group->name}}</option>
					@endforeach
				@endisset
			</select>
		</div>
	</div>

	<div class="col-sm-12">
		<div class="form-group">
			<button class="btn btn-primary">Save</button>
		</div>
	</div>

</div>
