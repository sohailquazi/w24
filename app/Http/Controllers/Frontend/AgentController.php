<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AgentController extends Controller
{
	function __construct(){
		$this->middleware('auth');
	}
    function agentDashboard(){
    	return view('agent_panel.dashboard');
    }
}
