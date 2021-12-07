@extends('layouts.layout')
@section ('content')
    <div class="col-md-12">
        <div class="page-header">
            <a href="{{ route('usuarios.index') }}" class="btn btn-info" >Gestion de Administradores</a>
        </div>
    </div>
    <div class="col-md-12">
        <div class="page-header">
            <a href="{{ route('mascotas.index') }}" class="btn btn-info" >Gestion de Mascotas</a>
        </div>
    </div>
@endsection