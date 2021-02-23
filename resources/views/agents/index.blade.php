@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Agent Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p class="text-right">
                        <a href="{{route('create_agents')}}" class="btn btn-info text-white">Add Agent</a>
                    </p>
                    <table class="table">
                        <thead>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Contact Number</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                        	@isset($agents)
                        		@foreach($agents as $agent)
                        	<tr>
	                            <td>{{$agent->first_name}}</td>
	                            <td>{{$agent->last_name}}</td>
	                            <td>{{$agent->email}}</td>
	                            <td>{{$agent->contact_number}}</td>
	                            <td>
	                                <a href="{{route('show_agents',$agent->id)}}">View</a> | 
	                                <a href="{{route('edit_agents',$agent->id)}}">Edit</a> | 
	                                <a href="{{route('destroy_agents',$agent->id)}}" onclick="return confirm('Do you want to delete this item?')">Delete</a>
	                            </td>
                        	</tr>
                        		@endforeach
                        	@endisset
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection