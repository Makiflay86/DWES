@extends('layouts.app')

@section('title')
<title>Lista de productos</title>    
@endsection
@section('favicon')
<link rel="shortcut icon" href="{{ asset('img/favicon-productos.svg') }}" type="image/svg+xml">    
@endsection

@section('content')
    <div class="container-flud w-50 mx-auto my-5">
        <div class="text-center mb-5">
            <h1>Listado de los productos → 🧅</h1>
        </div>
        <table class="table table-bordered shadow-sm text-center align-middle">
            <tr class="table-dark">
                <th>ID</th>
                <th>CÓDIGO</th>
                <th>DESCRIPCIÓN</th>
                <th>PRECIO</th>
                <th>ACCIÓN</th>
            </tr>
            @foreach ($productos as $producto)
            <tr>
                <td>{{$producto->id}}</td>
                <td>{{$producto->codigo}}</td>
                <td>{{$producto->descripcion}}</td>
                <td>{{$producto->precio}} €</td>
                <td>
                    <a href="" class="btn btn-warning">
                        <i class="bi bi-pencil-square"></i>
                    </a>
                    <a href="" class="btn btn-danger">
                        <i class="bi bi-x-square"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
@endsection