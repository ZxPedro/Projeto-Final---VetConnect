<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Scheduling;
use App\Models\Service;
use App\Models\Status;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;

class SchedulingController extends Controller
{
    public function viewCreateScheduling()
    {
        $customers = Customer::all();
        $status = Status::all();

        $professionals = [];

        $users = User::all();

        foreach ($users as $user) {

            $hasRelationship = $user->categories()->count();

            if ($hasRelationship) {
                $professionals[] = $user;
            }
        }



        return view('agendamentos.agendamentos_create', compact('customers', 'professionals', 'status'));
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
                $status_scheduling = Status::find($scheduling['status_id']);

                $data = Carbon::parse($scheduling->data_agendamento);
                $data_agendamento = $data->format('d/m/Y H:i:s');

                $dashboard_schedules[] = [
                    'id' => $scheduling->id,
                    'customer_name' =>  $customer_scheduling->name,
                    'pet_name' => $pet_scheduling->name,
                    'service_name' =>  $service_scheduling->name,
                    'service_price' => $service_scheduling->price,
                    'professional_name' =>  $user_scheduling->name,
                    'status_id' =>  $status_scheduling->id,
                    'status_name' =>  $status_scheduling->status_name,
                    'date_scheduling' => $data_agendamento
                ];
            }
        } else {
            $dashboard_schedules = null;
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
                $status_scheduling = Status::find($scheduling['status_id']);

                $data = Carbon::parse($scheduling->data_agendamento);
                $data_agendamento = $data->format('d/m/Y H:i:s');

                $dashboard_schedules[] = [
                    'id' => $scheduling->id,
                    'customer_name' =>  $customer_scheduling->name,
                    'pet_name' => $pet_scheduling->name,
                    'service_name' =>  $service_scheduling->name,
                    'service_price' => $service_scheduling->price,
                    'professional_name' =>  $user_scheduling->name,
                    'status_id' =>  $status_scheduling->id,
                    'status_name' =>  $status_scheduling->status_name,
                    'date_scheduling' => $data_agendamento
                ];
            }
        } else {
            $dashboard_schedules = null;
        }



        return view('dashboard', compact('dashboard_schedules'));
    }

    public function viewServiceById($id)
    {
        $schedules = Scheduling::find($id);
        $status = Status::all();



        $customer_scheduling = Customer::find($schedules['customer_id']);
        $pet_scheduling = Animal::find($schedules['animal_id']);
        $category_scheduling = Category::find($schedules['category_id']);
        $user_scheduling = User::find($schedules['professional_id']);
        $service_scheduling = Service::find($schedules['service_id']);
        $status_scheduling = Status::find($schedules['status_id']);

        $medical_record = [
            'id' => $schedules->id,
            'customer_name' =>  $customer_scheduling->name,
            'pet_name' => $pet_scheduling->name,
            'service_name' =>  $service_scheduling->name,
            'service_price' => $service_scheduling->price,
            'professional_name' =>  $user_scheduling->name,
            'status_id' =>  $status_scheduling->id,
            'status_name' =>  $status_scheduling->status_name,
            'date_scheduling' => $schedules->data_agendamento,
            'description' => $schedules->descricao
        ];


        return view('agendamentos.medical_record', compact(['medical_record', 'status']));
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
            'status_id' => 'required'
        ]);


        Scheduling::create($validation);

        return redirect()->route('agendamentos-list');
    }

    public function updateServiceById(Request $request, $id)
    {

        $scheduling = Scheduling::find($id);


        $validation = $this->validate($request, [
            'data_agendamento' => 'required',
            'descricao' => '',
            'status_id' => 'required'
        ]);

        $validation['updated_at'] = now();

        $scheduling->update($validation);

        return redirect()->route('agendamentos-list');
    }

    public function finishService($id)
    {
        $scheduling = Scheduling::find($id);

        if (!$scheduling) {
            return redirect()->route('dashboard')->withErrors(['invalid-scheduling' => 'Agendamento não localizado']);
        }

        $request = [
            'status_id' => 4,
            'flagfinalizado' => 1
        ];

        $scheduling->update($request);

        return redirect()->route('dashboard')->withErrors(['success-finish' => 'Agendamento #' . $id . ' finalizado com sucesso!']);
    }

    public function cancelService($id)
    {
        $scheduling = Scheduling::find($id);

        if (!$scheduling) {
            return back()->withErrors(['invalid-scheduling' => 'Agendamento não localizado']);
        }

        $request = [
            'status_id' => 6,
        ];

        $scheduling->update($request);

        return back()->withErrors(['success-finish' => 'Agendamento #' . $id . ' cancelado com sucesso!']);
    }
}
