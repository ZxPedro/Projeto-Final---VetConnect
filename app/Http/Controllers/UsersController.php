<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

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

    public function editUser($id)
    {

        $user = User::find($id);

        return view('users.user_create', compact('user'));
    }


    public function updateUser(Request $request, $id)
    {

        $user = User::find($id);

        if ($user) {



            $validate = $this->validate($request, [
                'name' => 'required',
                'email' => [
                    'required',
                    Rule::unique('users', 'email')->ignore($id),
                ],
                'password' => 'confirmed'

            ]);

            if (isset($validate['password'])) {

                $validate['password'] = Hash::make($validate['password']);

                $user->update([
                    'name' => $validate['name'],
                    'email' => $validate['email'],
                    'password' => $validate['password']
                ]);
            } else {
                $user->update([
                    'name' => $validate['name'],
                    'email' => $validate['email'],
                ]);
            }



            return redirect('users/');
        }
    }


    public function deleteUser($id)
    {

        try {
            $user = User::find($id);

            if (!$user) {
                return redirect()->route('user-list')->withErrors(['invalid-user' => 'Usuário não localizado']);
            }

            $user->delete();

            return back()->withErrors(['success-delete' => 'Usuário deletado com sucesso!']);
        } catch (\Throwable $th) {
            return back()->withErrors(['wrong-delete' => 'Algo deu errado, tente novamente!']);
        }
    }

    public function userCategories($id)
    {

        $professional = User::find($id);

        $professional_categories = $professional->categories;

        return response()->json($professional_categories);
    }

    // public function searchUsers(Request $request){

    //     $query = $request->input('query');

    //     $users = User::where('name',  'like', "%" . $query . "%")->get();

    //     foreach ($users as $user) {
    //         $user->created_at = preg_replace('\/[a-zA-Z]/', '', $$user->created_at);
    //     }

    //     return response()->json($users);
        
    // }
}
