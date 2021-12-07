@extends('layouts.layout')
@section('content')
    @if (count($errors) > 0)
        <strong>Error!</strong>
        Revise los campos obligatorios.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    @if(Session::has('success'))
        {{ Session::get('success') }}
    @endif
    <div class="col-md-8">
        <h2>Nuevo Administrador</h2>
        <table class="table">
            <thead>
                <th><h4>Nombre</h4></th>
                <th><h4>Correo</h4></th>
                <th><h4>Password</h4></th>
                <th><h4>Cedula</h4></th>
                <th><h4>Fecha de nacimiento</h4></th>
            </thead>
            <form method="POST" action="{{ route('usuarios.store') }}" role="form">
                {{ csrf_field() }}
                <tbody>
                    <tr>
                        <td><input type="text" name="name" id="name" class="form-control input-sm" placeholder="Nombre del administrador"></td>
                        <td><input type="text" name="email" id="email" class="form-control input-sm" placeholder="Correo del administrador"></td>
                        <td><input type="password" name="password" id="password" class="form-control input-sm" placeholder="Digite el password"></td>
                        <td><input type="text" name="cedula" id="cedula" class="form-control input-sm" placeholder="Cedula del administrador"></td>
                        <td><input type="text" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control input-sm" placeholder="Fecha de nacimiento"></td>
                    </tr>
                    <tr>
                        <td><button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"> Guardar</span></button></td>
                        <td><a href="{{ route('usuarios.index') }}" class="btn btn-info" ><span class="glyphicon glyphicon-share-alt"> Atras</span></a></td>
                        <td></td>
                    </tr>
                </tbody>
            </form>
        </table>
    </div>
@endsection