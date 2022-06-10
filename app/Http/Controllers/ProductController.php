<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewProductRequest;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * list products
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    /**
     * add new product
     * @param NewProductRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function new(NewProductRequest $request)
    {
        $newProduct = Product::create($request->all());

        if (!$newProduct) {
            return redirect()
                ->route('products.index')
                ->with('error', 'Product could not be saved.');
        }

        // add tags to the products
        $rawTagNames = explode(',', $request->tags ?? '');
        $newProduct->addTags($rawTagNames);

        return redirect()
            ->route('products.index')
            ->with('status', 'Product saved');
    }

    /**
     * delete a product
     * @param Product $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete(Product $product)
    {
        if ($product->delete()) {
            return redirect()
                ->route('products.index')
                ->with('status', 'Product was deleted');
        }

        return redirect()
            ->route('products.index')
            ->with('error', 'Product could not be deleted');
    }
}
