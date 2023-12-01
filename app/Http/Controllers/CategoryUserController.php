<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryUserController extends Controller
{

    public function viewListProfessionals()
    {

        $users = User::all();

        foreach ($users as $user) {

            $hasRelationship = $user->categories()->count();

            if ($hasRelationship) {
                $user['categories_user'] = count($user->categories);
            }

            $working_days = DB::table('category_user')
                ->select('working_days')
                ->where('user_id', $user->id)->limit(1)->get();


            foreach ($working_days as $days) {
                foreach ($days as $day) {

                    $caracteres = ['"', ',', '[', ']', ' '];
                    $day = str_replace($caracteres, '', explode(",", $day));

                    $user['working_days'] = count($day);
                }
            }
        }

        return view('cadastros.professionals.professionals_list', compact('users'));
    }


    public function viewCreateProfessionals()
    {

        $users = User::all();
        $categories = Category::all();
        $days = $this->days();

        return view('cadastros.professionals.professionals_create', compact(['users', 'categories', 'days']));
    }

    public function postCreateProfessionals(Request $request)
    {


        $validation = $this->validate($request, [
            'user_id' => 'required',
            'working_days' => 'required',
            'category_id' => 'required',
        ]);

        $user = User::find($validation['user_id']);

        $categories = $validation['category_id'];

        foreach ($categories as $category) {
            $user->categories()->attach($category, [
                'working_days' => json_encode($validation['working_days']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        return redirect()->route('professionals-list');
    }

    public function editProfessional($id)
    {
        $users = User::all();
        $categories = Category::all();
        $days = $this->days();
        $professional = User::find($id);

        if (!$professional) {
            return redirect()->route('professionals-list')->withErrors(['invalid-professional' => 'Profissional não localizado']);
        }

        $week = DB::table('category_user')
            ->select('working_days')
            ->where('user_id', $professional->id)->limit(1)->get();


        foreach ($week as $working_days) {
            foreach ($working_days as $working_day) {

                $caracteres = ['"', ',', '[', ']', ' '];
                $working_day = str_replace($caracteres, '', explode(",", $working_day));

                $professional['working_days'] = $working_day;
            }
        }


        $categories_professional[] = $professional->categories;


        foreach ($categories_professional as $specialties) {
            foreach ($specialties as $specialty) {
                $professional_specialty[] = $specialty->id;
            }
        }

        $professional['specialties'] = $professional_specialty;


        return view('cadastros.professionals.professionals_create', compact(['users', 'categories', 'days', 'professional']));
    }

    public function updateProfessional(Request $request, $id)
    {
        $professional = User::find($id);

        if (!$professional) {
            return redirect()->route('professionals-list')->withErrors(['invalid-professional' => 'Profissional não localizado']);
        }

        $professional->categories()->detach();

        $validation = $this->validate($request, [
            'user_id' => 'required',
            'working_days' => 'required',
            'category_id' => 'required',
        ]);

        $categories = $validation['category_id'];

        foreach ($categories as $category) {
            $professional->categories()->attach($category, [
                'working_days' => json_encode($validation['working_days']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        return redirect()->route('professionals-list');
    }

    public function deleteProfessional($id)
    {
        $professional = User::find($id);

        if (!$professional) {
            return redirect()->route('professionals-list')->withErrors(['invalid-professional' => 'Profissional não localizado']);
        }

        $professional->categories()->detach();

        return redirect()->route('professionals-list');
    }

    protected function days(): array
    {

        $days = [
            [
                "name" => "segunda",
                "value" => "Segunda-feira"

            ],
            [
                "name" => "terça",
                "value" => "Terça-feira"
            ],
            [
                "name" => "quarta",
                "value" => "Quarta-feira"

            ],
            [
                "name" => "quinta",
                "value" => "Quinta-feira"

            ],
            [
                "name" => "sexta",
                "value" => "Sexta-feira"

            ],
            [
                "name" => "sabado",
                "value" => "Sábado"

            ],
            [
                "name" => "domingo",
                "value" => "Domingo"
            ]
        ];

        return $days;
    }

    public function searchProfessionals(Request $request)
    {
        $query = $request->input('query');

        $users = User::where('name',  'like', "%" . $query . "%")->get();

        foreach ($users as $user) {

            $hasRelationship = $user->categories()->count();

            if ($hasRelationship) {
                $user['categories_user'] = count($user->categories);
            }

            $working_days = DB::table('category_user')
                ->select('working_days')
                ->where('user_id', $user->id)->limit(1)->get();


            foreach ($working_days as $days) {
                foreach ($days as $day) {

                    $caracteres = ['"', ',', '[', ']', ' '];
                    $day = str_replace($caracteres, '', explode(",", $day));

                    $user['working_days'] = count($day);
                }
            }
        }

        return response()->json($users);
    }
}
