@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>First Name</th>
                            <td>
                                @isset($user)
                                    {{$user->first_name}}
                                @endisset
                            </td>
                        </tr>
                        <tr>
                            <th>Last Name</th>
                            <td>
                                @isset($user)
                                    {{$user->last_name}}
                                @endisset
                            </td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>
                                @isset($user)
                                    {{$user->email}}
                                @endisset
                            </td>
                        </tr>
                        <tr>
                            <th>Group</th>
                            <td>
                                @if(isset($user) && isset($groups))
                                    @foreach($groups as $group)
                                        @if($user->group_id==$group->id)
                                            {{$group->name}}
                                        @endif
                                    @endforeach
                                @endif
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection