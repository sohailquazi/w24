<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\Group;
use Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::get();
        // dd($users);
        return view('managers.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $groups = Group::get();
        return view('managers.add',compact('groups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $roles = \Spatie\Permission\Models\Role::all();
        $params = $request->all();
        $params['password'] = Hash::make($params['password']);
        $user = User::create($params);
        $user->assignRole('manager');
        return redirect()->route('managers');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $groups = Group::get();
        return view('managers.view',compact('user','groups'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $groups = Group::get();
        return view('managers.edit',compact('user','groups'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $params = $request->all();
        unset($params['_token']);
        User::where('id',$id)->update($params);
        return redirect()->route('managers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::where('id',$id)->delete();
        return redirect()->route('managers');
    }

    public function createRoles()
    {
        \Spatie\Permission\Models\Role::create(['name' => 'manager']);
        \Spatie\Permission\Models\Role::create(['name' => 'super admin']);
        \Spatie\Permission\Models\Role::create(['name' => 'agent']);
        // $roles = \Spatie\Permission\Models\Role::all();
        // dd($roles);
    }
}
