@extends('layout.layout')

@section('content')


<div class="container p-3">
    <div class="row">
        <h1>Formulario Cotización</h1>
    </div>

    @if(count($errors) > 0)
    <div class="alert alert-danger mt-1">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    @if(\Session::has('success'))
    <div class="alert alert-success mt-1">
        <p>{{ \Session::get('success') }}</p>
    </div>
    @endif

    <form action="{{ route('estimate.store') }}" method="post">

        @csrf
        <div class="form-row">
            <div class="form-group col-md-5">
                <label for="inputState">Cliente</label>
                <select class="form-control" name="FK_id_user" id="FK_id_user">
                    <option selected>Elije una Categoria...</option>
                    @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-2">
                <label for="inputZip">Desc en %</label>
                <input type="text" class="form-control" id="descuentoP" name="descuentoP">
            </div>
            <div class="form-group col-md-2">
                <label for="inputZip">Desc en $</label>
                <input type="text" class="form-control" id="descuentoM" name="descuentoM">
            </div>
            <div class="form-group col-md-3">
                <label for="inputZip">Total</label>
                <input type="text" class="form-control" id="total" name="total" value="{{ old('total') }}">
            </div>
        </div>
        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">Observaciones</span>
            </div>
            <textarea class="form-control" aria-label="Observaciones" name="commet" id="commet" value="{{ old('commet') }}"></textarea>
        </div>

        <div class="form-group form-row justify-content-center">
            <button type="button" class="btn btn-primary btn-lg" id="aplicardesc">Aplicar Descuento</button>
            <button type="submit" class="btn btn-success btn-lg ml-1 ">Guardar Cotización</button>
        </div>


    </form>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nombre</th>
                <th scope="col">Precio</th>
            </tr>
        </thead>
        <tbody id="tr">
        </tbody>
    </table>


    <div class="row p-1">
        <h1>Lista de productos</h1>
    </div>

    <div class="card-content collpase show">
        <div class="card-body card-dashboard dataTables_wrapper dt-bootstrap">
            <div class="table-responsive">
                <table id="datatable" class="table table-striped table-bordered sourced-data">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Imagen</th>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th>Precio</th>
                            <th>Accion</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($products as $product)
                        <tr>
                            <td>{{ $product->id_product }}</td>
                            <td><img width="100px" src="{{Storage::url($product->image)}}" alt="Imagen de producto"></td>
                            <td>{{ $product->name_product }}</td>
                            <td>{{ $product->description_product }}</td>
                            <td>{{ $product->price }}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="#" type="button" class="btn btn-primary addBtn">Agregar</a>
                                </div>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>



@endsection