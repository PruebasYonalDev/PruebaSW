<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        $categorias = DB::table('categorias')->get();

        return view('modDos.categories.category', ['categorias' => $categorias]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Retorna el modal para crear la categoria
        // return view('modDos.categories.createCategory');
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
            'nombre_categoria' => 'required',
            'descripcion_categoria' => 'required',
        ]);

        DB::table('categorias')->insert([
            'nombre_categoria' => $request['nombre_categoria'],
            'descripcion_categoria' => $request['descripcion_categoria'],
            'created_at' => Carbon::now('America/Bogota'),
        ]);

        return back();
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
        $cat = DB::table('categorias')->where('id', $id)->get();

        // return $cat;
        return view('modDos.categories.editCategory', ['cat' => $cat]);
        // return view('modDos.categories.editCategory')->with('cat');
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
            'nombre_categoria' => 'required',
            'descripcion_categoria' => 'required',
        ]);

        DB::table('categorias')
        ->where('id_categoria', $id)
        ->update([
            'nombre_categoria' => $request['nombre_categoria'],
            'descripcion_categoria' => $request['descripcion_categoria'],
            'updated_at' => Carbon::now('America/Bogota'),
        ]);

        return back()->with('success', 'categoria actualizada');
        
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

        DB::table('categorias')->where('id_categoria', $id)->delete();

        return back()->with('success', 'Categoria Eliminada');

    }
}
