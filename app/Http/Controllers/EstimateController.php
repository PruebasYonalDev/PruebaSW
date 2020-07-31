<?php

namespace App\Http\Controllers;

use App\Estimate;
use App\Mail\Cotizacion;
use App\Order;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use \Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Mail;

class EstimateController extends Controller
{

    public function reporte($id)
    {
        $alls = Order::where('FK_id_user', $id)
        ->join('users', 'users.id', '=', 'orders.FK_id_user')
        ->select([
            'users.id',
            'users.name',
            'users.email',
            'orders.id_order',
            'orders.commet',
            'orders.total'
        ])->get();

        $products = Product::where('estimate.FK_id_user', $id)
        ->join('estimate', 'products.id_product', '=', 'estimate.FK_id_product')
        ->select([
            'products.id_product',
            'products.name_product',
            'products.description_product',
            'products.price',
        ])
        ->get();

        $namePdf = $alls[0]['name'];
        $ruta = storage_path('app/public/');

        $pdf = PDF::loadView('modCuatro.pdf', compact('products'), compact('alls'));
        return $pdf->save($ruta."$namePdf.pdf")->stream('download.pdf');
        
    }

    public function email($id)
    {
        $alls = Order::where('FK_id_user', $id)
        ->join('users', 'users.id', '=', 'orders.FK_id_user')
        ->select([
            'users.id',
            'users.name',
            'users.email',
            'orders.id_order',
            'orders.commet',
            'orders.total'
        ])->get();

        $products = Product::where('estimate.FK_id_user', $id)
        ->join('estimate', 'products.id_product', '=', 'estimate.FK_id_product')
        ->select([
            'products.id_product',
            'products.name_product',
            'products.description_product',
            'products.price',
        ])
        ->get();

        $nameUser = $alls[0]['name'];
        $ruta = storage_path('app/public/');

        $pdf = PDF::loadView('modCuatro.pdf', compact('products'), compact('alls'));
        $pdf->save($ruta."$nameUser.pdf");

        $user = User::find($id);
        $emailUser = $user->email;

        Mail::to($emailUser)->send(new Cotizacion($user));

        return redirect()->route('estimate.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     
        $orders = Order::where('state_order', 1)->get();

        return view('modCuatro.estimate')->with('orders', $orders);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    
    public function create()
    {
        //

        $users = User::all();
        $products = Product::where('state_product', 1)->get();

        return view('modCuatro.create_estimate')->with('users', $users)->with('products', $products);
    }

    public function addCotizacion(Request $request)
    {

        Estimate::create([
            'FK_id_user' => request()->detalle['FK_id_user'],
            'FK_id_product' => request()->detalle['idProduct'],
            'state_estimate' => 1,
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

        // return $request;

        $this->validate($request, [
            'FK_id_user' => 'required',
            'commet' => 'required',
            'total' => 'required',
        ]);

        Order::create([
            'FK_id_user' => request('FK_id_user'),
            'commet' => request('commet'),
            'total' => request('total'),
            'state_order' => 1
        ]);

        return redirect()->route('estimate.index')->with('success', 'Cotizacion Creada');
        
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
