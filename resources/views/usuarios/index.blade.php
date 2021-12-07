@extends('layouts.layout')
@section('content')
<div class="col-md-12">
    <div class="page-header">
        <a href="{{ url('/home') }}" class="btn btn-info" ><span class="glyphicon glyphicon-home">&nbsp;Inicio</span></a>
        <a href="{{ route('usuarios.create') }}" class="btn btn-info" >Añadir Administrador</a>
    </div>
</div>
<div class="col-md-8">
    <table class="table table-hover table-striped">
        <thead class="thead-dark">
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">Correo</th>
            <th scope="col">Cedula</th>
            <th scope="col">Fecha de nacimiento</th>
            <th scope="col">Editar</th>
            <th scope="col">Eliminar</th>
        </thead>
        <tbody>
            @foreach($usuarios as $usuario)
                <tr>
                    <td>{{ $usuario->id }}</td>
                    <td>{{ $usuario->name }}</td>
                    <td>{{ $usuario->email }}</td>
                    <td>{{ $usuario->cedula }}</td>
                    <td>{{ $usuario->fecha_nacimiento }}</td>
                    <td>
                        <a class="btn btn-primary btn-xs" href="{{action('UsuariosController@edit', $usuario->id)}}" >
                            <span class="glyphicon glyphicon-pencil"></span>
                        </a>
                    </td>
                    <td>
                        @if($usuario->id != 1)
                        <form action="{{action('UsuariosController@destroy', $usuario->id)}}" method="post">
                            {{csrf_field()}}
                            <input name="_method" type="hidden" value="DELETE">
                            <button class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                        </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $usuarios->render() }}
</div>
@endsection