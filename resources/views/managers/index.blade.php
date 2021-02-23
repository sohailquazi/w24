@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p class="text-right">
                        <a href="{{route('add_manager')}}" class="btn btn-info text-white">Add</a>
                    </p>
                    <table class="table">
                        <thead>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                        	@isset($users)
                        		@foreach($users as $users)
                        	<tr>
	                            <td>{{$users->first_name}}</td>
	                            <td>{{$users->last_name}}</td>
	                            <td>{{$users->email}}</td>
	                            <td>
	                                <a href="{{route('show_manager',$users->id)}}">View</a> | 
	                                <a href="{{route('edit_manager',$users->id)}}">Edit</a> | 
	                                <a href="{{route('destroy_manager',$users->id)}}" onclick="return confirm('Do you want to delete this item?')">Delete</a>
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