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
            'cpf' => 'required|size:11',
            'data_nascimento' => 'required',
            'telefone' => 'required',
            'genero' => 'required'
        ]);


        Customer::create($validation);

        return redirect('customer/');
    }
}
