<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

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
            'email' => 'required|email',
            'cpf' => 'required|size:11',
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
}
