@extends('layouts.dashboard')

@section('estilos_especificos')

@section('title', 'Index')
@section('subtittle', 'Index')
@section('navegacion')
    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="">Pages</a>
        </li>
        <li class="breadcrumb-item text-sm text-dark active" aria-current="page"> <a href="">Index</a>
        </li>
    </ol>
@endsection

@section('content')
    <div class="container">
        HOLA
    </div>

    <script>
        function confirmarEliminar() {
            return confirm('¿Estás seguro de eliminar esta Aula?');
        }
    </script>
@endsection
