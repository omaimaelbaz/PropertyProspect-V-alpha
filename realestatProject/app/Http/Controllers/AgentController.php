<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AgentController extends Controller
{
    public function index()
    {
        $agents = User::where('role_id', '3')->get();
        return view('Admin.agent',compact('agents'));
    }
  
}
