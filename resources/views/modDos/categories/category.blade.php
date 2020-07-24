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
                            <h1>Categorías</h1>
                        </div>
                        <div class="row justify-content-center">
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">Crear Categoria</button>
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
                                            <th>Nombre</th>
                                            <th>Descripcion</th>
                                            <th>Fecha Creacion</th>
                                            <th>Accion</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach($categorias as $categoria)
                                        <tr>
                                            <td>{{$categoria->id_categoria}}</td>
                                            <td>{{$categoria->nombre_categoria}}</td>
                                            <td>{{$categoria->descripcion_categoria}}</td>
                                            <td>{{$categoria->created_at}}</td>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <a href="#" class="btn btn-primary editBtn">Editar</a>
                                                    <a href="#" class="btn btn-danger deleteBtn">Eliminar</a>
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

<!-- Modal Crear Categoria -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Crear Categoria</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="POST" action="{{ route('category.store') }}">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Nombre:</label>
                        <input type="text" class="form-control" name="nombre_categoria">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Descripcion:</label>
                        <textarea class="form-control" name="descripcion_categoria"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-success">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Modal Editar Categoria -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Categoria</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="POST" action="/categorias" id="editForm">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Nombre:</label>
                        <input type="text" class="form-control" name="nombre_categoria" id="nombre">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Descripcion:</label>
                        <textarea class="form-control" name="descripcion_categoria" id="descripcion"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-success">Actualizar Categoria</button>
                </div>
            </form>

        </div>
    </div>
</div>

<!-- Modal Eliminar Categoria -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Eliminar Categoria</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="POST" action="/categorias" id="deleteForm">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    <h3>Estas a punto de eliminar está categoria !!!</h3>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-danger">Eliminar Categoria</button>
                </div>
            </form>

        </div>
    </div>
</div>



@endsection