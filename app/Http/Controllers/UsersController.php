<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{

    public function viewListUsers()
    {

        $users = User::paginate(10);

        return view('users.user_list', compact('users'));
    }


    public function deleteUser(User $id)
    {


        $id->delete();
        return back();
    }
}
