@extends('layout.layout')

@section('content')
<div class="container p-3">
    <div class="row justify-content-center">
        <h1 class="pb-1">Prueba tecnica Software Web</h1>

        <div class="col-12" style="background-color: black;">
            <img src=" {{ asset('logo.png') }} " class="mx-auto d-block pb-2" alt="Responsive image" style="width: 100%; ">
        </div>
        <div class="container p-3">
            <ul>
                <li>EJRC 1: <strong>100%</strong></li>
                <li>EJRC 2: <strong>100%</strong></li>
                <li>EJRC 3: <strong>10%</strong></li>
                <li>EJRC 4: <strong>85%</strong></li>
            </ul>
            <p>Repositorio en git <a href="https://github.com/PruebasYonalDev/pruebaSW" target="_blank" rel="noopener noreferrer">github.com/PruebasYonalDev/pruebaSW</a></p>
            <ul>
                <li>Master: <strong>Proyecto listo para despliegue</strong></li>
                <li>Develop: <strong>Proyecto listo para ser aprobado</strong></li>
                <li>Feature/Auth: <strong>Solución de requerimientos</strong></li>
                <li>Feature/CrudProducts: <strong>Solución de requerimientos</strong></li>
                <li>Feature/emailsandfiles: <strong>Proyecto con requerimientos por terminar</strong></li>
            </ul>
        </div>
    </div>
</div>
@endsection