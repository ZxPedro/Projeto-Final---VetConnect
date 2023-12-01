<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\AnimalBreed;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Service;
use App\Models\Status;
use App\Models\User;
use App\Rules\CPFValidationRule;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CustomersController extends Controller
{

    public function viewListCustomers()
    {

        $customers = Customer::paginate(10);

        foreach ($customers as $customer) {
            $customer->data_nascimento = Carbon::parse($customer->data_nascimento)->format('d/m/Y');
        }

        return view('customers.customers_list', compact('customers'));
    }

    public function viewCreateCustomers()
    {
        return view('customers.customers_create');
    }

    public function postCreateCustomer(Request $request)
    {

        $validation = $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:customers',
            'cpf' => [
                'required',
                'unique:customers',
                new CPFValidationRule
            ],
            'data_nascimento' => 'required',
            'telefone' => 'required',
            'genero' => 'required'
        ]);


        Customer::create($validation);

        return redirect('customer/');
    }

    public function viewProfile($id)
    {

        $profile = Customer::find($id);

        if (!$profile) {
            return redirect()->route('customer-list')->withErrors(['invalid-profile' => 'Perfil não localizado']);
        }

        $profile['pets'] = $profile->animais;


        foreach ($profile['pets'] as $key => $pet) {
            $pet->data_nascimento = Carbon::parse($pet->data_nascimento)->format('d/m/Y');
            $profile['pets'][$key]['raca'] = AnimalBreed::find($pet->raca)->name;
        }


        $profile['address'] = $profile->address;

        $schedules = $profile->scheduling;


        if (count($schedules) > 0) {
            foreach ($schedules as $scheduling) {

                $pet_scheduling = Animal::find($scheduling['animal_id']);
                $category_scheduling = Category::find($scheduling['category_id']);
                $user_scheduling = User::find($scheduling['professional_id']);
                $service_scheduling = Service::find($scheduling['service_id']);
                $status_scheduling = Status::find($scheduling['status_id']);

                $customer_scheduling[] = [
                    'id' => $scheduling->id,
                    'pet_name' => $pet_scheduling->name,
                    'category_name' => $category_scheduling->name,
                    'service_name' =>  $service_scheduling->name,
                    'service_price' => $service_scheduling->price,
                    'professional_name' =>  $user_scheduling->name,
                    'status_id' =>  $status_scheduling->id,
                    'status_name' =>  $status_scheduling->status_name,
                    'date_scheduling' => Carbon::parse($scheduling->data_agendamento)->format('d/m/Y H:i:s')
                ];
            }

            $profile['schedules'] = $customer_scheduling;
        } else {
            $profile['schedules'] = [];
        }

        return view('customers.profile', compact('profile'));
    }

    public function editProfile(Request $request, int $id)
    {

        $profile = Customer::find($id);

        if (!$profile) {
            return redirect()->route('customer-list')->withErrors(['invalid-profile' => 'Perfil não localizado']);
        }

        $validation = $this->validate($request, [
            'name' => 'required',
            'email' => [
                'required',
                'email',
                Rule::unique('customers', 'email')->ignore($id)
            ],

            'cpf' => [
                'required',
                'size:11',
                Rule::unique('customers', 'cpf')->ignore($id),
            ],

            'data_nascimento' => 'required',
            'telefone' => 'required',
            'genero' => 'required'
        ]);

        $validation['updated_at'] = now();

        $profile->update($validation);

        return redirect()->route('view-profile', $id)->withErrors(['sucess-profile' => 'Perfil alterado com sucesso']);
    }

    public function deleteProfile(int $id)
    {

        $profile = Customer::find($id);

        if (!$profile) {
            return redirect()->route('customer-list')->withErrors(['invalid-profile' => 'Perfil não localizado']);
        }

        $profile->delete();

        return back()->withErrors(['success-delete' => 'Perfil deletado com sucesso!']);
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $customer = Customer::where('name', 'like', "%$query%")->get();

        return response()->json($customer);
    }

    public function searchAnimalsCustomer($id)
    {

        $customer = Customer::find($id);

        $customer_pet = $customer->animais;

        return response()->json($customer_pet);
    }

    public function searchCustomers(Request $request)
    {
        $query = $request->input('query');

        $customers = Customer::where('name',  'like', "%" . $query . "%")->get();

        foreach ($customers as $customer) {
            $customer->data_nascimento = Carbon::parse($customer->data_nascimento)->format('d/m/Y');
        }

        return response()->json($customers);
    }
}
