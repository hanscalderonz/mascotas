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
        {{Session::get('success')}}
    @endif
    <div class="col-md-8">
        <form method="POST" action="{{ route('mascotas.update', $mascotas->id) }}" role="form">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PATCH">
            <h2>Editar Mascotas</h2>
            <table class="table">
                <thead>
                    <th><h4>Nombre</h4></th>
                    <th><h4>Fecha de nacimiento</h4></th>
                    <th><h4>Cedula</h4></th>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="text" name="nombre" id="nombre" class="form-control input-sm" value="{{$mascotas->nombre}}"></td>
                        <td><input type="text" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control input-sm" value="{{$mascotas->fecha_nacimiento}}"></td>
                        <td><input type="text" name="cedula_cliente" id="cedula_cliente" class="form-control input-sm" value="{{$mascotas->cedula_cliente}}"></td>
                    </tr>
                    <tr>
                        <td><button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-refresh">Actualizar</span></button></td>
                        <td><a href="{{ route('mascotas.index') }}" class="btn btn-info" ><span class="glyphicon glyphicon-share-alt">Atras</span></a></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
@endsection