<?php

namespace App\Http\Controllers;

use App\Models\CustomerAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomersAddressController extends Controller
{
    public function postCreateAddress(Request $request)
    {

        $customer_id = $request['customer_id']; 

        $address_id = $request['address_id']; 

        $validation = $this->validate($request, [
            'customer_id' => 'required',
            'endereco_cep' => 'required',
            'endereco' => 'required',
            'endereco_numero' => 'required',
            'endereco_bairro' => 'required',
            'endereco_complemento' => '',
            'uf' => 'required',
            'cidade' => 'required',
            'flagprincipal' => ''
        ]);

        $check_flagprincipal = DB::table('customer_address')
            ->where('customer_id', $customer_id)
            ->where('flagprincipal', 1)->get();

        if ($address_id) {

            $customer_address = CustomerAddress::find($address_id);
            if (isset($validation['flagprincipal']) && count($check_flagprincipal) > 0) {

                $check_flagprincipal = json_decode($check_flagprincipal, true);


                if ($address_id == $check_flagprincipal[0]['id']) {

                    $validation['updated_at'] = now();

                    $customer_address->update($validation);

                    return redirect()->route('view-profile', $customer_id)->withErrors(['sucess-address' => 'Endereço alterado com sucesso!']);
                }

                return back()->withErrors(['wrong-mainaddress' => 'Você já possui um endereço principal']);
            } else {

                if (!isset($validation['flagprincipal'])) {
                    $validation['flagprincipal'] = false;
                }

                $validation['updated_at'] = now();

                $customer_address->update($validation);

                return redirect()->route('view-profile', $customer_id)->withErrors(['sucess-address' => 'Endereço alterado com sucesso!']);
            }
        } else {

            if (isset($validation['flagprincipal']) &&  count($check_flagprincipal) > 0) {
                return back()->withErrors(['wrong-mainaddress' => 'Você já possui um endereço principal']);
            }

            CustomerAddress::create($validation);

            return redirect()->route('view-profile', $customer_id)->withErrors(['sucess-address' => 'Endereço cadastrado com sucesso!']);
        }
    }

    public function searchAddress($id)
    {

        $customer_address = CustomerAddress::find($id);

        if (!$customer_address) {
            return back()->withErrors(['wrong-naddress' => 'Endereço não localizado!']);
        }

        return response()->json($customer_address);
    }

    public function deleteAddress($id)
    {
        $address = CustomerAddress::find($id);

        if (!$address) {
            return back()->withErrors(['wrong-address' => 'Endereço não localizado!']);
        }

        $address->delete();

        return back()->withErrors(['success-delete' => 'Endereço deletado com sucesso!']);
    }
}
