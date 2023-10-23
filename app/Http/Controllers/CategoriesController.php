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
}
