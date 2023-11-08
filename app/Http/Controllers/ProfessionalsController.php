<?php

namespace App\Http\Controllers;

use App\Models\ProfessionalService;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;

class ProfessionalsController extends Controller
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

        $services = $request['services_id'];

        foreach ($services as $service) {
            ProfessionalService::create([
                'user_id' => $validation['user_id'],
                'service_id' => $service,
                'working_days' => json_encode($validation['working_days']),
            ]);
        }

        return redirect()->route('professionals-list');
    }
}
