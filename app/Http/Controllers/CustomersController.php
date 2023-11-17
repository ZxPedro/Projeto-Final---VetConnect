<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CustomersController extends Controller
{

    public function viewListCustomers()
    {

        $customers = Customer::paginate(10);


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
            'cpf' => 'required|size:11|unique:customers',
            'data_nascimento' => 'required',
            'telefone' => 'required',
            'genero' => 'required'
        ]);


        Customer::create($validation);

        return redirect('customer/');
    }

    public function viewProfile(int $id)
    {

        $profile = Customer::find($id);

        if (!$profile) {
            return redirect()->route('customer-list')->withErrors(['invalid-profile' => 'Perfil não localizado']);
        }

        $profile['pets'] = $profile->animais;

        $profile['address'] = $profile->address;

        $schedules = $profile->scheduling;


        if (count($schedules) > 0) {
            foreach ($schedules as $scheduling) {

                $pet_scheduling = Animal::find($scheduling['animal_id']);
                $category_scheduling = Category::find($scheduling['category_id']);
                $user_scheduling = User::find($scheduling['professional_id']);
                $service_scheduling = Service::find($scheduling['service_id']);

                $customer_scheduling[] = [
                    'pet_name' => $pet_scheduling->name,
                    'category_name' => $category_scheduling->name,
                    'service_name' =>  $service_scheduling->name,
                    'service_price' => $service_scheduling->price,
                    'professional_name' =>  $user_scheduling->name,
                    'status' => $scheduling->status,
                    'date_scheduling' => $scheduling->data_agendamento
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
}
