@extends('layouts.app')

@section('title')
<title>Suma</title>    
@endsection


@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6">

            <form class="form bg-info-subtle rounded shadow p-5" action="/suma" method="POST">
                <div class="text-center bg-info rounded shadow-sm p-2 mb-3">
                    <h1>Dame dos números y te los sumo</h1>
                </div>

                @csrf  {{-- ver código fuente --}}

                <div class="mb-3">
                    <label for="numero1" class="form-label">Número 1:</label>
                    <input type="text" name="numero1" id="numero1" class="form-control"><br>
                </div>

                <div class="mb-3">
                    <label for="numero2" class="form-label">Número 2:</label>
                    <input type="text" name="numero2" id="numero2" class="form-control"><br>
                </div>
                
                <div class="mb-3">
                    <input type="submit" value="Enviar" class="btn btn-primary">
                </div>
            </form>

            @if(isset($resul))
                <div class="text-center m-5 py-2 bg-light shadow rounded">
                    <h3>Resultado de la suma: {{$resul}}</h3>
                </div>
            @endif

        </div>
    </div>
</div>
@endsection