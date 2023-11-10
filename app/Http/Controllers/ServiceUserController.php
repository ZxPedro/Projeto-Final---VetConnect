<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;

class ServiceUserController extends Controller
{
    public function viewCreateProfessionals()
    {

        $users = User::all();
        $services = Service::all();

        return view('cadastros.professionals.professionals_create', compact(['users', 'services']));
    }

    public function postCreateProfessionals(Request $request)
    {


        $validation = $this->validate($request, [
            'user_id' => 'required',
            'working_days' => 'required',
            'services_id' => 'required',
        ]);

        $user = User::find($request['user_id']);

        $services = $request['services_id'];

        foreach ($services as $service) {
            $user->services()->attach($service, [
                'working_days' => json_encode($request['working_days']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        return redirect()->route('dashboard');
    }
}
