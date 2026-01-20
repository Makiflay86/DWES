@extends('layouts.app')

@section('title')
<title>Lista de productos</title>    
@endsection

@section('content')
    <div class="container-flud w-50 mx-auto my-5">
        <div class="text-center mb-3">
            <h1>Soy un producto → 🧅</h1>
        </div>
        <table class="table table-bordered shadow-sm">
            <tr class="table-dark">
                <th>ID</th>
                <th>CÓDIGO</th>
                <th>DESCRIPCIÓN</th>
                <th>PRECIO</th>
            </tr>
            @foreach ($productos as $producto)
            <tr>
                <td>{{$producto->id}}</td>
                <td>{{$producto->codigo}}</td>
                <td>{{$producto->descripcion}}</td>
                <td>{{$producto->precio}} €</td>
            </tr>
            @endforeach
        </table>
    </div>
@endsection