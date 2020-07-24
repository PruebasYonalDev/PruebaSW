@extends('layout.layout')

@section('content')


<div class="container p-1">
<!-- HTML (DOM) sourced data -->
<section id="html">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <h1>Productos</h1>
                    </div>
                    <div class="row justify-content-center">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#saveModal">Crear Producto</button>
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

                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                            <!-- <li><a data-action="close"><i class="ft-x"></i></a></li> -->
                        </ul>
                    </div>
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
                                        <th>Categoria</th>
                                        <th>Precio</th>
                                        <th>Accion</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($all as $one)
                                    <tr>
                                        <td>{{ $one->id_producto }} </td>
                                        <td><img width="100px" src="{{Storage::url($one->imagen)}}" alt="Imagen de producto"></td>
                                        <td>{{ $one->nombre_producto }}</td>
                                        <td>{{ $one->descripcion_producto }}</td>
                                        <td>{{ $one->nombre_categoria}}</td>
                                        <td>{{ $one->precio }}</td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a href="#" type="button" class="btn btn-primary editBtnP">Editar</a>
                                                <button type="button" class="btn btn-danger deleteBtnP">Eliminar</button>
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
        </div>
    </div>
</section>
<!--/ HTML (DOM) sourced data -->
</div>


<!-- Modal Crear Productos -->
<div class="modal fade" id="saveModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Crear Producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>


            <form method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">

                @csrf

                <div class="modal-body">
                    <div class="form-row">
                        <label for="">Selecciona una imagen para el producto</label>
                        <div class="input-group mb-1">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Imagen</span>
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" aria-describedby="inputGroupFileAddon01" id="customFileLang" name="imagen" accept="image/*" lang="es">
                                <label class="custom-file-label" for="inputGroupFile01">Click Aquí</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputAddress">Nombre</label>
                        <input type="text" class="form-control" placeholder="Nombre del producto" name="nombre_producto">
                    </div>
                    <div class="form-group">
                        <label for="inputAddress2">Descripcion</label>
                        <input type="text" class="form-control" placeholder="Descrpcion del producto" name="descripcion_producto">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-7">
                            <label for="inputState">Categoria</label>
                            <select class="form-control" name="categoria_id">
                                <option selected>Elije una Categoria...</option>

                                @foreach($categories as $category)
                                <option value="{{$category->id_categoria}}">{{$category->nombre_categoria}}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputZip">Precio</label>
                            <input type="text" class="form-control" name="precio">
                        </div>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-success">Guardar Producto</button>
                </div>
            </form>


        </div>
    </div>
</div>

<!-- Modal Editar Productos -->
<div class="modal fade" id="editModalP" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>


            <form id="editFormP" method="POST" action="/product" enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="modal-body">
                    <div class="form-group">
                        <img class="border border-secondary rounded-sm mx-auto d-block" width="150px" src="" alt="" id="imagenP">
                    </div>
                    <div class="form-row">
                        <label for="">Selecciona si deseas cambiar la imagen</label>
                        <div class="input-group mb-1">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupFileAddon01">Imagen</span>
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" aria-describedby="inputGroupFileAddon01" name="imagen">
                                <label class="custom-file-label" for="inputGroupFile01">Click Aquí</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputAddress">Nombre</label>
                        <input type="text" class="form-control" id="nombre_producto" placeholder="Nombre del producto" name="nombre_producto">
                    </div>
                    <div class="form-group">
                        <label for="inputAddress2">Descripcion</label>
                        <input type="text" class="form-control" id="descripcion_producto" placeholder="Descrpcion del producto" name="descripcion_producto">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-7">
                            <label for="inputState">Categoria</label>
                            <select id="categoria_idP" class="form-control" name="id_categoria">
                                @foreach($categories as $category)
                                <option value="{{ $category->id_categoria }}">{{ $category->nombre_categoria }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputZip">Precio</label>
                            <input type="text" class="form-control" id="precioP" name="precio">
                        </div>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success editBtnP">Guardar</button>
                </div>
            </form>


        </div>
    </div>

</div>

<!-- Modal Elimiar Productos -->
<div class="modal fade" id="deleteModalP" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="">Crear Producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>


            <form id="deleteFormP" method="POST" action="/productos">
                @csrf
                @method('DELETE')
                <div class="modal-body">

                    <h3>Estas a punto de eliminar un producto !!!</h3>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-danger">Eliminar Producto</button>
                </div>
            </form>


        </div>
    </div>
</div>

@endsection