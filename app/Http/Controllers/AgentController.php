<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\Group;
use Hash;

class AgentController extends Controller
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
        // $roles = \Spatie\Permission\Models\Role::all();
        // dd($roles);
        $agents = User::whereHas("roles", function($q){ $q->where("name", "agent"); })->get();
        return view('agents.index',compact('agents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $groups = Group::get();
        return view('agents.add',compact('groups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $params = $request->all();
        $params['password'] = Hash::make($params['password']);
        $user = User::create($params);
        $user->assignRole('agent');
        return redirect()->route('index_agents');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $agent = User::find($id);
        $groups = Group::get();
        $managers = User::whereHas("roles", function($q){ $q->where("name", "manager"); })->get();
        // dd($managers);
        return view('agents.view',compact('agent','groups','managers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $agent = User::find($id);
        $groups = Group::get();
        $managers = User::whereHas("roles", function($q){ $q->where("name", "manager"); })->where('group_id',$agent->group_id)->get();
        return view('agents.edit',compact('agent','groups','managers'));
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
        // dd($request->all());
        $params = $request->all();
        unset($params['_token']);
        User::where('id',$id)->update($params);
        return redirect()->route('index_agents');
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
        return redirect()->route('index_agents');
    }

    public function getGroupAgent(Request $request){
        if(!is_null($request['group_id'])){
        // dd($request->all());
        $params = $request->all();
        $managers = User::whereHas("roles", function($q){ $q->where("name", "manager"); })->where('group_id',$params['group_id'])->get();
            $output = "
                <div class='form-group' id='inner-manager'>
                <label>Manager</label>
                <select class='form-control' name='user_id' required='required'>
                <option value=''>Select Manager</option>";
                foreach ($managers as $key => $value) {
                    $output.="<option value=".$value->id.">".$value->first_name."</option>";
                }
            $output.="
                </select>
                </div>
            ";
        }
        else{
            $output = '';
        }
        return $output;
    }
}
