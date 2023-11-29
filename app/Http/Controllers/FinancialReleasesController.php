<?php

namespace App\Http\Controllers;

use App\Models\FinancialRelease;
use App\Models\Scheduling;
use Illuminate\Http\Request;

class FinancialReleasesController extends Controller
{

    function viewReleases()
    {
        $despesas = FinancialRelease::where('type', 'D')->get();
        $creditos = FinancialRelease::where('type', 'C')->get();
        $atendimentos = Scheduling::where('status_id', 4)->get();

        $total_despesas = FinancialRelease::where('type', 'D')->sum('price');



        $receitas = [];

        foreach ($creditos as $credito) {
            $receitas[] = [
                'id' => $credito->id,
                'name' => $credito->name,
                'price' => $credito->price
            ];
        }

        foreach ($atendimentos as $atendimento) {
            $receitas[] = [
                'id' => null,
                'name' => 'Atendimento #' . $atendimento->id,
                'price' => $atendimento->total,
            ];
        }



        $total_receitas = array_sum(array_column($receitas, 'price'));

        return view('finance.finance_releases', compact(['despesas', 'receitas', 'total_receitas', 'total_despesas']));
    }

    function postReleases(Request $request)
    {
        $validation = $this->validate($request, [
            'name' => 'required',
            'price' => 'required',
            'descricao' => '',
            'type' => 'required'
        ]);

        FinancialRelease::create($validation);

        return back();
    }

    function deleteReleases($id)
    {
        $release = FinancialRelease::find($id);

        if (!$release) {
            return back()->withErrors(['invalid-release' => 'Lançamento não localizado']);
        }


        $release->delete();

        return back()->withErrors(['success-delete' => 'Lançamento deletado com sucesso!']);
    }
}
