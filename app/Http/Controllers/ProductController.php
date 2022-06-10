<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewProductRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        return view('products');
    }

    /**
     * add new product
     * @param NewProductRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function new(NewProductRequest $request)
    {
        DB::insert("INSERT INTO products (name) VALUES ('".$request->name."')");

        return redirect('/products')->with('status', 'Product saved');
    }

    public function delete(Request $request)
    {
        DB::delete("DELETE FROM products WHERE id = ".$request->id);

        return redirect('/products')->with('status', 'Product was deleted');
    }
}
