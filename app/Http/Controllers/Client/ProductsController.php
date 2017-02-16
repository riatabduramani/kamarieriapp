<?php

namespace App\Http\Controllers\Client;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException; 

use Auth;
use User;
use Gate;
use App\Product;
use App\Category;
use App\Ingredient;
use Illuminate\Http\Request;
use Session;

class ProductsController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {

       
        $products = Product::paginate(25);
        //$ingredients = Ingredient::all();

        //return ($products);
        return view('client.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        //$category = Category::pluck('name','id');
        $user_id = Auth::user()->id;
        $ingredients = Ingredient::where('user_id', $user_id)->pluck('name', 'id');
        $category = Category::where('user_id', $user_id)->pluck('name','id');
        
        return view('client.products.create', compact('category','ingredients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
         $this->validate($request, [
            'name' => 'required',
            'price' => 'required',
            ]);

        $products = new Product;
        $products -> name = $request->name;
        $products -> description = $request->description;
        $products -> price = $request->price;
        $products -> category_id = $request->category_id;
        $products -> user_id = Auth::user()->id;
        $products -> save();

        if($request->ingredients) {
            $id = $products->id;
            $products = Product::find($id);
            $products->ingredients()->attach($request->ingredients);    
        }
        

        Session::flash('flash_message', 'Product added!');

        return redirect('client/products');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {

        $product = Product::findOrFail($id);
        
        $this->authorize('show-product', $product);

        return view('client.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $user_id = auth()->user()->id;
        $product = Product::findOrFail($id);
        $category = Category::where('user_id', $user_id)->pluck('name','id');
        $ingredients = Ingredient::where('user_id', $user_id)->pluck('name', 'id');
        
        $this->authorize('show-product', $product);

        return view('client.products.edit', compact('product','category','ingredients'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        
        $requestData = $request->all();
        
        $product = Product::findOrFail($id);
        
     

        $product->update($requestData);
        
        if($request->ingredients) {
            $product->ingredients()->sync($request->ingredients);
        } else {
            $product->ingredients()->detach($request->ingredients);
        }

        Session::flash('flash_message', 'Product updated!');

        return redirect('client/products');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try{
        Product::destroy($id);

        Session::flash('flash_message', 'Product deleted!');

        return redirect('client/products');
        } catch(ModelNotFoundException $e) {
            //return redirect()->back();
            return abort(404);
        }
    }


    

}
