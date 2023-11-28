<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function viewListProducts()
    {
        $products = Product::paginate(10);

        foreach ($products as $product) {
            $category_product = Category::find($product['category_id']);

            $product['category_name'] = $category_product->name;
        }

        return view('products.products_list', compact('products'));
    }

    public function viewCreateProduct()
    {
        $categories = Category::all();

        return view('products.products_create', compact('categories'));
    }

    public function postCreateProduct(Request $request)
    {

        $validation = $this->validate($request, [
            'name' => 'required',
            'amount' => 'required',
            'security_amount' => 'required',
            'category_id' => ''
        ]);

        Product::create($validation);

        return redirect()->route('products-list');
    }

    public function editProduct($id)
    {

        $product = Product::find($id);
        $categories = Category::all();

        if (!$product) {
            return back()->withErrors(['invalid-product' => 'Produto não localizado']);
        }

        return view('products.products_create', compact('product', 'categories'));
    }

    public function updateProduct(Request $request, $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return back()->withErrors(['invalid-product' => 'Produto não localizado']);
        }

        $validation = $this->validate($request, [
            'name' => 'required',
            'amount' => 'required',
            'security_amount' => 'required',
            'category_id' => ''
        ]);

        $validation['updated_at'] = now();

        $product->update($validation);

        return redirect()->route('products-list')->withErrors(['success-update' => 'Produto atualizado com sucesso!']);
    }

    public function deleteProduct($id)
    {

        $product = Product::find($id);

        if (!$product) {
            return back()->withErrors(['invalid-product' => 'Produto não localizado']);
        }


        $product->delete();

        return back()->withErrors(['success-delete' => 'Produto deletado com sucesso!']);
    }

    public function updateStock(Request $request)
    {

        $validation = $this->validate($request, [
            'product_id' => 'required',
            'amount' => '',
            'option_id' => 'required',
        ]);

        $product = Product::find($validation['product_id']);

        if ($validation['option_id'] == 0) {
            $new_stock = $product->amount += $validation['amount'];
        } else {
            $new_stock = $product->amount -= $validation['amount'];
        }

        $product->update([
            'amount' => $new_stock,
            'updated_at' => now()
        ]);


        return back()->withErrors(['success-stock' => 'Estoque atualizado com sucesso!']);
    }
}
