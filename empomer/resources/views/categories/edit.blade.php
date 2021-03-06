@extends('dashboard')
@section('nav')
    <nav class="">
        <div class="nav flex-column " aria-orientation="vertical" >          
            <ul class="nav navbar-nav nav-pills nav-fill">
                <li class="nav-item" id="home">
                    <a class="nav-link" href="{{ url('home')}}" >Home</a>
                </li>
                <li class="nav-item" id="clientes">
                    <a class="nav-link" href="{{ url('customers')}}">Clientes</a>          
                </li>
                <li class="nav-item" id="facturas">
                    <a class="nav-link" href="{{ url('bills')}}">Facturas</a>
                </li>
                <li class="nav-item" id="ofrendas">
                    <a class="nav-link" href="{{ url('gifts')}}">Ofrendas</a>
                </li>
                <li class="nav-item" id="categorias">
                    <a class="nav-link active" href="{{ url('categories')}}">Categorias</a>
                </li>
            </ul>
        </div>
    </nav>
@endsection
@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Actualizar categoria</h1>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br /> 
        @endif
        <form method="post" action="{{ route('categories.update', $category->id) }}">
            @method('PATCH') 
            @csrf
            <div class="form-group">
                <label for="id">Id categoria:</label>
                <input type="text" class="form-control" name="id" readonly value={{ $category->id }} />
            </div>

            <div class="form-group">
                <label for="name">Nombre:</label>
                <input type="text" class="form-control" name="name" value={{ $category->name }} />
            </div>

            <div class="text-right">
                <a href="{{ route('categories.index')}}" class="btn btn-danger">Cancelar y volver</a>
                <button type="submit" class="btn btn-primary">Guardar</button>                            
            </div>
        </form>
    </div>
</div>
@endsection