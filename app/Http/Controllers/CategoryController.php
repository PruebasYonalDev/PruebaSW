<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $categories = Category::where('state_category', 1)->get();
        return view('modDos.categories.category', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $this->validate($request, [
            'name_category' => 'required',
            'description_category' => 'required',
        ]);

        Category::create([
            'name_category' => request('name_category'),
            'description_category' => request('description_category'),
            'state_category' => 1
        ]);

        return back()->with('success', 'Categoria creada');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $this->validate($request, [
            'name_category' => 'required',
            'description_category' => 'required',
        ]);

        Category::where('id_category', $id)->update([
                'name_category' => $request['name_category'],
                'description_category' => $request['description_category']
            ]);
        
        return back()->with('success', 'Categoria actualizada');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Category::where('id_category', $id)->update(['state_category' => 0]);
        return back()->with('success', 'Categoria Eliminada');

    }
}
