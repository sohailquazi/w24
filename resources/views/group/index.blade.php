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
                        <a href="{{route('add_grup')}}" class="btn btn-info text-white">Add</a>
                    </p>
                    <table class="table">
                        <thead>
                            <th>Name</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                        	@isset($groups)
                        		@foreach($groups as $group)
                        	<tr>
	                            <td>{{$group->name}}</td>
	                            <td>
	                                <a href="{{route('edit_grup',$group->id)}}">Edit</a> | 
	                                <a href="{{route('destroy_grup',$group->id)}}" onclick="return confirm('Do you want to delete this item?')">Delete</a>
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