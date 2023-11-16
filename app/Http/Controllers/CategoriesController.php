<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function viewListCategories()
    {

        $categories = Category::paginate(10);

        return view('cadastros.categories.categories_list', compact('categories'));
    }

    public function viewCreateCategories()
    {
        return view('cadastros.categories.categories_create');
    }

    public function postCreateCategories(Request $request)
    {
        $validation = $this->validate($request, [
            'name' => 'required'
        ]);

        Category::create($validation);

        return redirect('/cadastros/categories');
    }

    public function editCategory(int $id)
    {

        $category = Category::find($id);

        if (!$category) {
            return redirect()->route('categories-list')->withErrors(['invalid-category' => 'Categoria não localizada']);
        }

        return view('cadastros.categories.categories_create', compact('category'));
    }

    public function updateCategory(Request $request, $id)
    {
        $category = Category::find($id);

        if (!$category) {
            return redirect()->route('categories-list')->withErrors(['invalid-category' => 'Categoria não localizada']);
        }

        $validation = $this->validate($request, [
            'name' => 'required'
        ]);

        $validation['updated_at'] = now();

        $category->update($validation);

        return redirect()->route('categories-list', $id)->withErrors(['sucess-category' => 'Categoria alterada com sucesso']);
    }

    public function deleteCategory(int $id)
    {

        try {
            $category = Category::find($id);

            if (!$category) {
                return redirect()->route('categories-list')->withErrors(['invalid-category' => 'Categoria não localizada']);
            }

            $category->delete();

            return back()->withErrors(['success-delete' => 'Categoria deletada com sucesso!']);
        } catch (\Throwable $th) {
            return back()->withErrors(['wrong-delete' => 'Algo deu errado, tente novamente!']);
        }
    }

    public function searchServicesCategory($id)
    {

        $category = Category::find($id);

        $services_category = $category->service;

        // dd($services_category);
        return response()->json($services_category);
    }
}
