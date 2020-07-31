<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
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
        $all = Product::where('state_product', 1)
            ->join('category', 'category.id_category', '=', 'products.FK_id_category')
            ->get();
        
        $categories = Category::where('state_category', 1)->get();

        return view('modDos.products.product')->with('categories', $categories)->with('alls', $all);
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
        if ($request->hasFile('image')) {
            $true = $request->file('image')->store('public');
        }else{
            $true = 'Default.jpg';
        }

        $this->validate($request, [
            'name_product' => 'required',
            'description_product' => 'required',
            'FK_id_category' => 'required',
            'price' => 'required',
        ]);

        Product::create([
            'image' => $true,
            'name_product' => request('name_product'),
            'description_product' => request('description_product'),
            'FK_id_category' => request('FK_id_category'),
            'price' => request('price'),
            'state_product' => 1,
        ]);
           
        return back()->with('success', 'Producto creado');

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

        // return $req = request()->file('image')->store('public');

        $this->validate($request, [
            'name_product' => 'required',
            'description_product' => 'required',
            'FK_id_category' => 'required',
            'price' => 'required',
        ]);

        if ($request->hasFile('image')) {

            Product::where('id_product', $id)->update([
                'image' => request()->file('image')->store('public'),
                'name_product' => request('name_product'),
                'description_product' => request('description_product'),
                'FK_id_category' => request('FK_id_category'),
                'price' => request('price'),
            ]);
        }

        Product::where('id_product', $id)->update([
            'name_product' => request('name_product'),
            'description_product' => request('description_product'),
            'FK_id_category' => request('FK_id_category'),
            'price' => request('price'),
        ]);

        return back()->with('success', 'Producto Actualizado');
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
        Product::where('id_product', $id)->update(['state_product' => 0]);
        return back()->with('success', 'Producto Eliminado');
    }
}
