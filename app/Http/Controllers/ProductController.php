<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Nullable;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $all = DB::table('productos')
            ->join('categorias', 'categorias.id_categoria', '=', 'productos.categoria_id')
            ->orderBy('productos.created_at')
            ->get();
        $categories = DB::table('categorias')->get();

        return view('modDos.products.product')->with('categories', $categories)->with('all', $all);
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
        // dd($request->all());

        $this->validate($request, [
            'nombre_producto' => 'required',
            'descripcion_producto' => 'required',
            'categoria_id' => 'required',
            'precio' => 'required',
        ]);

        if ($request->hasFile('imagen')) {
            $true = $request->file('imagen')->store('public');
        }else{
            $true = 'Default.jpg';
        }

        DB::table('productos')->insert([
            'imagen' => $true,
            'nombre_producto' => $request['nombre_producto'],
            'descripcion_producto' => $request['descripcion_producto'],
            'categoria_id' => $request['categoria_id'],
            'precio' => $request['precio'],
            'created_at' => Carbon::now('America/Bogota')
        ]);        

        return back()->with('success', 'Producto Guardado');
        // return response()->json($request);

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
        return view('modDos.products.editproduct');
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

        // return $request;

        $this->validate($request, [
            'nombre_producto' => 'required',
            'id_categoria' => 'required',
            'precio' => 'required',
        ]);

        if ($request->hasFile('imagen')) {

            DB::table('productos')
            ->where('id_producto', $id)
            ->update([
                'imagen' => $request->file('imagen')->store('public'),
                'nombre_producto' => $request['nombre_producto'],
                'descripcion_producto' => $request['descripcion_producto'],
                'categoria_id' => $request['id_categoria'],
                'precio' => $request['precio'],
                'updated_at' => Carbon::now('America/Bogota')
            ]);
        }

        DB::table('productos')
        ->where('id_producto', $id)
        ->update([
            'nombre_producto' => $request['nombre_producto'],
            'descripcion_producto' => $request['descripcion_producto'],
            'categoria_id' => $request['id_categoria'],
            'precio' => $request['precio'],
            'updated_at' => Carbon::now('America/Bogota')
        ]);

        return back()->with('success', 'Producto Guardado');
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
        DB::table('productos')->where('id_producto', $id)->delete();
        return back()->with('success', 'Producto eliminado exitosamente');
    }
}
