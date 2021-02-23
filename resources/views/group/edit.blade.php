@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <form method="post" action="{{route('update_grup',$group->id)}}">
                        @include('group.form')
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection