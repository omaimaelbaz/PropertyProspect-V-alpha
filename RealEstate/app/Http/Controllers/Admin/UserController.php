<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\properties;
use App\Models\Reservations;
use App\Models\Roles;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $totalProperties = properties::count();
        $totalBookings = Reservations::count();
        $pendingProperties= properties::where('postStatus', 'pending')->count();
        // $activeProperties= properties::where('postStatus', 'active')->count();

        return view('Admin.dashboard',compact('totalProperties', 'totalBookings' ,'pendingProperties'));
    }

    public function banUsers($id)
    {
        $user = User::find($id);

        if ($user) {
            if ($user->IsBan == 0) {
                $user->IsBan = 1;
            } else {
                $user->IsBan = 0;
            }
            $user->save();
        }

        return back();
    }

    public function ShowUsers()
    {
        $users = User::get();

        return view('Admin.user', compact('users'));
    }

    public function deleteUsers($id)
    {
        $user = User::find($id);
        if ($user) {
            $user->delete();
        }

        return back();
    }

    public function Create()
    {
        $roles = Roles::get();

        return view('Admin.addUser', compact('roles'));
    }

    public function store(UserRequest $request)
    {
        $validateData  = $request->validated();
        $user = User::create([
            'name' => $validateData['name'],
            'email' => $validateData['email'],
            'password' => bcrypt($validateData['password']),
            'role_id' => $validateData['role'],

        ]);
        return redirect('/user');
    }

    public function updateUser($id)
    {
        $user = User::find($id);
        return view("Admin.updateUser", compact('user'));
    }
    public function modify(UserRequest $request, $id)
    {

        $validatedData = $request->validated();

        $user = User::find($id);
        $user->update($validatedData);
        return redirect('/user');
    }

}
