<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{

    public function viewListUsers()
    {

        $users = User::paginate(10);

        return view('users.user_list', compact('users'));
    }

    public function viewCreateUser()
    {
        return view('users.user_create');
    }

    public function postCreateUser(Request $request)
    {
        $validate = $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|confirmed'
        ]);

        $validate['password'] = Hash::make($validate['password']);

        User::create($validate);

        return redirect('users/');
    }


    public function deleteUser(User $id)
    {
        $id->delete();
        return back();
    }
}
