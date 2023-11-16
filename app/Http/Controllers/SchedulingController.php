<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Scheduling;
use App\Models\User;

class SchedulingController extends Controller
{
    public function viewCreateScheduling()
    {
        $customers = Customer::all();

        $professional = null;

        $users = User::all();

        foreach ($users as $user) {

            $hasRelationship = $user->categories()->count();

            if ($hasRelationship) {
                $professionals[] = $user;
            }
        }



        return view('agendamentos.agendamentos_create', compact('customers', 'professionals'));
    }

    public function postCreateScheduling(Request $request)
    {

        // dd($request);
        $validation = $this->validate($request, [
            'customer_id' => 'required',
            'animal_id' => 'required',
            'professional_id' => 'required',
            'service_id' => 'required',
            'category_id' => 'required',
            'data_agendamento' => 'required',
            'total' => 'required',
            'descricao' => '',
            'status' => 'required'
        ]);


        Scheduling::create($validation);

        return redirect()->route('agendamentos');
    }
}
