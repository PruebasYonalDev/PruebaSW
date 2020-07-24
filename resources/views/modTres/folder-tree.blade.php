@extends('layout.layout')

@section('content')


<div class="container p-3">
    <div class="row">
        <h1>Árbol de carpetas</h1>
    </div>
    


    <div id="folder_jstree"></div>

    <textarea id="txt_folderjsondata" cols="30" rows="10">{{ $foldersAll }}</textarea>
</div>



@endsection