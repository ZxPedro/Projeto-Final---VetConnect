<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Service;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function viewListServices()
    {
        $services = Service::paginate(10);

        foreach ($services as $key => $service) {
            $services[$key]['category'] = $service->category;
            $service['price'] = number_format($service['price'], 2, '.', '');
        }


        return view('cadastros.services.services_list', compact('services'));
    }

    public function viewCreateServices()
    {

        $categories = Category::all();

        return view('cadastros.services.services_create', compact('categories'));
    }

    public function postCreateServices(Request $request)
    {

        $validation = $this->validate($request, [
            'name' => 'required',
            'price' => 'required',
            'category_id' => 'required',
        ]);


        Service::create($validation);

        return redirect()->route('services-list');
    }

    public function editService($id)
    {

        $service = Service::find($id);
        $categories = Category::all();

        if (!$service) {
            return redirect()->route('services-list')->withErrors(['invalid-service' => 'Serviço não localizado']);
        }


        $service['category'] = $service->category;

        return view('cadastros.services.services_create', compact(['service', 'categories']));
    }

    function updateService(Request $request, $id)
    {
        $service = Service::find($id);


        if (!$service) {
            return redirect()->route('services-list')->withErrors(['invalid-service' => 'Serviço não localizado']);
        }

        $validation = $this->validate($request, [
            'name' => 'required',
            'price' => 'required',
            'category_id' => 'required',
        ]);

        $validation['updated_at'] = now();

        $service->update($validation);

        return redirect()->route('services-list')->withErrors(['success-edit' => 'Serviço editado com sucesso!']);
    }



    function deleteService($id)
    {
        $service = Service::find($id);


        if (!$service) {
            return redirect()->route('services-list')->withErrors(['invalid-service' => 'Serviço não localizado']);
        }

        $service->delete();

        return back()->withErrors(['success-delete' => 'Serviço deletado com sucesso!']);
    }

    public function getPriceService($id)
    {

        $service = Service::find($id);

        return response()->json($service);
    }

    public function searchServices(Request $request)
    {
        $query = $request->input('query');

        $services = Service::where('name',  'like', "%" . $query . "%")->get();

        foreach ($services as $key => $service) {
            $services[$key]['category'] = $service->category;
            $service['price'] = number_format($service['price'], 2, '.', '');
        }


        return response()->json($services);
    }
}
