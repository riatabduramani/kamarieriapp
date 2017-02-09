<?php

namespace App\Http\Controllers\Client;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Auth;
use DB;

use App\Ingredient;
use Illuminate\Http\Request;
use Session;

class IngredientsController extends Controller
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
        $user_id = Auth::user()->id;
        $ingredients = Ingredient::where('user_id', $user_id)->paginate(25);

        return view('client.ingredients.index', compact('ingredients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('client.ingredients.create');
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
        
        ///$requestData = $request->all();
        
        //Ingredient::create($requestData);

        $this->validate($request, [
            'name' => 'required',
            'price' => 'required',
            ]);

        $ingredient = new Ingredient;
        $ingredient -> name = $request->name;
        $ingredient -> price = $request->price;
        $ingredient -> user_id = Auth::user()->id;
        $ingredient -> save();

        Session::flash('flash_message', 'Ingredient added!');

        return redirect('client/ingredients');
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
        try {
            $user_id = Auth::user()->id;
            $ingredient = Ingredient::where('user_id', $user_id)->findOrFail($id);

            return view('client.ingredients.show', compact('ingredient'));

            } catch(ModelNotFoundException $e) {
            return redirect()->back();
        }
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
        try {

            $user_id = Auth::user()->id;
            $ingredient = Ingredient::where('user_id', $user_id)->findOrFail($id);

            return view('client.ingredients.edit', compact('ingredient'));
            } catch(ModelNotFoundException $e) {
            
            return redirect()->back();
        }
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
        
        $user_id = Auth::user()->id;
        $ingredient = Ingredient::where('user_id', $user_id)->findOrFail($id);
        $ingredient->update($requestData);

        Session::flash('flash_message', 'Ingredient updated!');

        return redirect('client/ingredients');
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

        Ingredient::destroy($id);

        Session::flash('flash_message', 'Ingredient deleted!');

        return redirect('client/ingredients');
    }
}
