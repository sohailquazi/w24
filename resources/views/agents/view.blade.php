@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('View Agent') }}</div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>First Name</th>
                            <td>
                                @isset($agent)
                                    {{$agent->first_name}}
                                @endisset
                            </td>
                        </tr>
                        <tr>
                            <th>Last Name</th>
                            <td>
                                @isset($agent)
                                    {{$agent->last_name}}
                                @endisset
                            </td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>
                                @isset($agent)
                                    {{$agent->email}}
                                @endisset
                            </td>
                        </tr>
                        <tr>
                            <th>Contact Number</th>
                            <td>
                                @isset($agent)
                                    {{$agent->contact_number}}
                                @endisset
                            </td>
                        </tr>
                        <tr>
                            <th>Group</th>
                            <td>
                                @if(isset($agent) && isset($groups))
                                    @foreach($groups as $group)
                                        @if($agent->group_id==$group->id)
                                            {{$group->name}}
                                        @endif
                                    @endforeach
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Manager</th>
                            <td>
                                @if(isset($agent) && isset($managers))
                                    @foreach($managers as $manager)
                                        @if($agent->user_id==$manager->id)
                                            {{$manager->first_name}} {{$manager->last_name}}
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