@extends('layouts.layout')
@section('content')
<div class="col-md-12">
    <div class="page-header">
        <a href="{{ url('/home') }}" class="btn btn-info" ><span class="glyphicon glyphicon-home">&nbsp;Inicio</span></a>
        <a href="{{ route('mascotas.create') }}" class="btn btn-info" >Añadir Mascota</a>
    </div>
</div>
<div class="col-md-8">
    <table class="table table-hover table-striped">
        <thead class="thead-dark">
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">Fecha de nacimiento</th>
            <th scope="col">Cedula del cliente</th>
            <th scope="col">Editar</th>
            <th scope="col">Eliminar</th>
        </thead>
        <tbody>
            @foreach($mascotas as $mascota)
                <tr>
                    <td>{{ $mascota->id }}</td>
                    <td>{{ $mascota->nombre }}</td>
                    <td>{{ $mascota->fecha_nacimiento }}</td>
                    <td>{{ $mascota->cedula_cliente }}</td>
                    <td>
                        <a class="btn btn-primary btn-xs" href="{{action('MascotasController@edit', $mascota->id)}}" >
                            <span class="glyphicon glyphicon-pencil"></span>
                        </a>
                    </td>
                    <td>
                        <form action="{{action('MascotasController@destroy', $mascota->id)}}" method="post">
                            {{csrf_field()}}
                            <input name="_method" type="hidden" value="DELETE">
                            <button class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $mascotas->render() }}
</div>
@endsection