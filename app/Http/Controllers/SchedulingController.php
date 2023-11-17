<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Scheduling;
use App\Models\Service;
use App\Models\User;
use Carbon\Carbon;

class SchedulingController extends Controller
{
    public function viewCreateScheduling()
    {
        $customers = Customer::all();

        $professionals = [];

        $users = User::all();

        foreach ($users as $user) {

            $hasRelationship = $user->categories()->count();

            if ($hasRelationship) {
                $professionals[] = $user;
            }
        }



        return view('agendamentos.agendamentos_create', compact('customers', 'professionals'));
    }

    public function viewListScheduling()
    {
        $schedules = Scheduling::all();


        if (count($schedules) > 0) {
            foreach ($schedules as $scheduling) {

                $customer_scheduling = Customer::find($scheduling['customer_id']);
                $pet_scheduling = Animal::find($scheduling['animal_id']);
                $category_scheduling = Category::find($scheduling['category_id']);
                $user_scheduling = User::find($scheduling['professional_id']);
                $service_scheduling = Service::find($scheduling['service_id']);

                $data = Carbon::parse($scheduling->data_agendamento);
                $data_agendamento = $data->format('d/m/Y H:i:s');

                $dashboard_schedules[] = [
                    'id' => $scheduling->id,
                    'customer_name' =>  $customer_scheduling->name,
                    'pet_name' => $pet_scheduling->name,
                    'service_name' =>  $service_scheduling->name,
                    'service_price' => $service_scheduling->price,
                    'professional_name' =>  $user_scheduling->name,
                    'status' => $scheduling->status,
                    'date_scheduling' => $data_agendamento
                ];
            }
        } else {
            $dashboard_schedules[] = [];
        }


        return view('agendamentos.agendamentos_list', compact('dashboard_schedules'));
    }

    public function viewSchedulesDashboard()
    {

        $schedules = Scheduling::orderby('data_agendamento', 'asc')->get();


        if (count($schedules) > 0) {
            foreach ($schedules as $scheduling) {

                $customer_scheduling = Customer::find($scheduling['customer_id']);
                $pet_scheduling = Animal::find($scheduling['animal_id']);
                $category_scheduling = Category::find($scheduling['category_id']);
                $user_scheduling = User::find($scheduling['professional_id']);
                $service_scheduling = Service::find($scheduling['service_id']);

                $data = Carbon::parse($scheduling->data_agendamento);
                $data_agendamento = $data->format('d/m/Y H:i:s');

                $dashboard_schedules[] = [
                    'id' => $scheduling->id,
                    'customer_name' =>  $customer_scheduling->name,
                    'pet_name' => $pet_scheduling->name,
                    'service_name' =>  $service_scheduling->name,
                    'service_price' => $service_scheduling->price,
                    'professional_name' =>  $user_scheduling->name,
                    'status' => $scheduling->status,
                    'date_scheduling' => $data_agendamento
                ];
            }
        } else {
            $dashboard_schedules[] = [];
        }


        return view('dashboard', compact('dashboard_schedules'));
    }

    public function viewServiceById($id)
    {
        $schedules = Scheduling::find($id);




        $customer_scheduling = Customer::find($schedules['customer_id']);
        $pet_scheduling = Animal::find($schedules['animal_id']);
        $category_scheduling = Category::find($schedules['category_id']);
        $user_scheduling = User::find($schedules['professional_id']);
        $service_scheduling = Service::find($schedules['service_id']);

        $medical_record = [
            'id' => $schedules->id,
            'customer_name' =>  $customer_scheduling->name,
            'pet_name' => $pet_scheduling->name,
            'service_name' =>  $service_scheduling->name,
            'service_price' => $service_scheduling->price,
            'professional_name' =>  $user_scheduling->name,
            'status' => $schedules->status,
            'date_scheduling' => $schedules->data_agendamento,
            'description' => $schedules->descricao
        ];




        return view('agendamentos.medical_record', compact('medical_record'));
    }
    public function postCreateScheduling(Request $request)
    {

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

    public function finishService($id)
    {
        $scheduling = Scheduling::find($id);

        if (!$scheduling) {
            return redirect()->route('dashboard')->withErrors(['invalid-scheduling' => 'Agendamento não localizado']);
        }

        $request = [
            'status' => 'Finalizado',
            'flagfinalizado' => 1
        ];

        $scheduling->update($request);

        return redirect()->route('dashboard')->withErrors(['success-finish' => 'Agendamento #' . $id . ' finalizado com sucesso!']);
    }
}
