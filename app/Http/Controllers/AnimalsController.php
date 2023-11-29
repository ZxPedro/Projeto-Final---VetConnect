<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\AnimalBreed;
use Illuminate\Http\Request;

class AnimalsController extends Controller
{

    public function viewCreatePets(int $id)
    {

        $customer_id = $id;

        $especies = [
            '0' => 'Cães',
            '1' => 'Gatos',
            '2' => 'Aves',
            '3' => 'Roedores',
            '4' => 'Répteis',
            '5' => 'Anfíbios',
            '6' => 'Peixes',
            '7' => 'Invertebrados'

        ];

        return view('pets.pets_create', compact('customer_id', 'especies'));
    }

    public function postCreatePet(Request $request)

    {


        $customer_id = $request['customer_id'];

        $validate = $this->validate($request, [
            'customer_id' => 'required',
            'name' => 'required',
            'especie' => 'required',
            'raca'  => 'required',
            'data_nascimento' => '',
            'flagidoso' => '',
            'flagcardiopata' => '',
            'flagepiletico' => '',
            'flaglesionado' => '',
            'flagalergico' => '',
            'observacao' => ''
        ]);

        Animal::create($validate);

        return redirect()->route('view-profile', $customer_id);
    }

    public function searchBreeds($id)
    {
        $racas = AnimalBreed::where('especie', $id)->get();
        return response()->json($racas);
    }

    public function editPet($id)
    {

        $especies = [
            '0' => 'Cães',
            '1' => 'Gatos',
            '2' => 'Aves',
            '3' => 'Roedores',
            '4' => 'Répteis',
            '5' => 'Anfíbios',
            '6' => 'Peixes',
            '7' => 'Invertebrados'

        ];

        $pet = Animal::find($id);

        return view('pets.pets_create', compact('pet', 'especies'));
    }

    public function updatePet(Request $request, $id)
    {
        $pet = Animal::find($id);

        $customer_id = $request['customer_id'];

        if (!$pet) {

            return redirect()->route('view-profile', $customer_id)->withErrors(['wrong-pet' => 'Animal não localizado!']);
        }


        $validate = $this->validate($request, [
            'customer_id' => 'required',
            'name' => 'required',
            'especie' => 'required',
            'raca'  => 'required',
            'data_nascimento' => '',
            'flagidoso' => '',
            'flagcardiopata' => '',
            'flagepiletico' => '',
            'flaglesionado' => '',
            'flagalergico' => '',
            'observacao' => ''
        ]);

        isset($validate['flagidoso']) ?  $validate['flagidoso'] = 1 : $validate['flagidoso'] = '0';



        isset($validate['flagcardiopata']) ?  $validate['flagcardiopata'] = 1 : $validate['flagcardiopata'] = 0;
        isset($validate['flagepiletico']) ?  $validate['flagepiletico'] = 1 : $validate['flagepiletico'] = 0;
        isset($validate['flaglesionado']) ?  $validate['flaglesionado'] = 1 : $validate['flaglesionado'] = 0;
        isset($validate['flagalergico']) ?  $validate['flagalergico'] = 1 : $validate['flagalergico'] = 0;

        $validate['updated_at'] = now();

        $pet->update($validate);

        return redirect()->route('view-profile', $customer_id)->withErrors(['sucess-pet' => 'Animal alterado com sucesso']);
    }

    public function deletePet($id)
    {

        $pet = Animal::find($id);

        if (!$pet) {
            return back()->withErrors(['wrong-pet' => 'Animal não localizado!']);
        }

        $pet->delete();

        return back()->withErrors(['success-delete' => 'Animal deletado com sucesso!']);
    }
}
