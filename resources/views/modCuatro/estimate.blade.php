@extends('layout.layout')

@section('content')

<div class="container p-3">
    <div class="row">
        <h1>Cotización</h1>
    </div>

    <section id="html">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row justify-content-center">
                            <a href="{{ route('estimate.create') }}" type="button" class="btn btn-success">Crear Cotización</a>
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
                                            <th>Codigo</th>
                                            <th>Cliente</th>
                                            <th>Descripcion</th>
                                            <th>Fecha Creación</th>
                                            <th>Total</th>
                                            <th>Accion</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($ordenes as $orden)

                                        <tr>
                                            <td>{{ $orden->id_orden }}</td>
                                            <td>{{ $orden->id_cliente }}</td>
                                            <td>{{ $orden->observacion }}</td>
                                            <td>{{ $orden->created_at }}</td>
                                            <td>{{ $orden->total }}</td>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <a href="{{route('pdf',  $orden->id_cliente)}}" target="_blank" class="btn btn-primary">Descargar</a>
                                                    <button type="button" class="btn btn-danger deleteBtnP">Enviar</button>
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