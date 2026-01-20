@extends('layouts.app')

@section('title')
<title>Mi vista hola mundo</title>    
@endsection

@section('content')
<div class="container-fluid w-50 mx-auto text-center my-5">

    <div class="mb-4">
        <h1>Laravel vs PHP Nativo</h1>
    </div>
    <table class="table table-bordered">
        <tr class="table-dark">
            <th>Aspecto</td>
            <th>Ventajas de Laravel</th>
            <th>Ventajas de PHP Nativo</th>
        </tr>
        <tr>
            <th>Productividad</th>
            <td>
                Ofrece herramientas listas (ORM, rutas, colas, migraciones) que aceleran el desarrollo.
            </td>
            <td>
                Permite escribir solo lo necesario, sin cargar componentes adicionales.
            </td>
        </tr>
        <tr>
            <th>Estructura del código</th>
            <td>
                Sigue el patrón MVC, lo que facilita mantener y escalar proyectos.
            </td>
            <td>
                Libertad total para organizar el código como quieras.
            </td>
        </tr>
        <tr>
            <th>Seguridad</th>
            <td>
                Incluye protección contra CSRF, XSS, SQL Injection y hashing de contraseñas.
            </td>
            <td>
                Control absoluto sobre la seguridad, sin capas adicionales.
            </td>
        </tr>
        <tr>
            <th>Comunidad y ecosistema</th>
            <td>
                Gran comunidad, paquetes oficiales, documentación extensa.
            </td>
            <td>
                No depende de frameworks; funciona en cualquier entorno con PHP.
            </td>
        </tr>
        <tr>
            <th>Curva de aprendizaje</th>
            <td>
                Estandariza buenas prácticas, lo que ayuda a aprender desarrollo moderno.
            </td>
            <td>
                Más fácil para principiantes que empiezan desde cero con PHP
            </td>
        </tr>
    </table>

</div>
@endsection