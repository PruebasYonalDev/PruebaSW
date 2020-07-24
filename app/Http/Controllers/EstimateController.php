<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \Barryvdh\DomPDF\Facade as PDF;

class EstimateController extends Controller
{

    

    public function reporte($id)
    {
        $idC = $id;

        $alls = DB::table('ordenes')
        ->join('users', 'users.id', '=', 'ordenes.id_cliente')
        ->select([
            'users.id',
            'users.name',
            'users.email',
            'ordenes.id_orden',
            'ordenes.observacion',
            'ordenes.total'
        ])
        ->where('id_cliente', $idC)->get();

        $products = DB::table('productos')
        ->join('cotizaciones', 'productos.id_producto', '=', 'cotizaciones.id_producto')
        ->where('cotizaciones.id_cliente', $idC)
        ->select([
            'productos.id_producto',
            'productos.nombre_producto',
            'productos.descripcion_producto',
            'productos.precio',
        ])
        ->get();


        $pdf = PDF::loadView('modCuatro.pdf', compact('products'), compact('alls'));
        return $pdf->download('cotizacion.pdf');
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
         $ordenes = DB::table('ordenes')->get();

        return view('modCuatro.estimate')->with('ordenes', $ordenes);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    
    public function create()
    {
        //

        $users = DB::table('users')->get();
        $products = DB::table('productos')->get();

        return view('modCuatro.create_estimate')->with('users', $users)->with('products', $products);
    }

    public function addCotizacion(Request $request)
    {
        $c = DB::table('cotizaciones')->insert([

            'id_cliente' => $request->detalle['idUser'],
            'id_producto' => $request->detalle['id'],
            'created_at' => Carbon::now('America/Bogota')
        ]);

        return true;
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
            'id_cliente' => 'required',
            'observacion' => 'required',
            'total' => 'required',
        ]);

        DB::table('ordenes')->insert([
            'id_cliente' => $request['idUser'],
            'observacion' => $request['observacion'],
            'total' => $request['total'],
            'created_at' => Carbon::now('America/Bogota')
        ]);

        return redirect()->route('estimate.index')->with('success', 'Producto Actualizado');
        
    }
    
    public function addProducto($producto)
    {
        // dd($producto);
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
    }
}
