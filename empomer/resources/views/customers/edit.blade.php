@extends('dashboard')
@section('nav')
    <nav class="">
        <div class="nav flex-column " aria-orientation="vertical" >          
            <ul class="nav navbar-nav nav-pills nav-fill">
                <li class="nav-item" id="home">
                    <a class="nav-link" href="{{ url('home')}}" >Home</a>
                </li>
                <li class="nav-item" id="clientes">
                    <a class="nav-link active" href="{{ url('customers')}}">Clientes</a>          
                </li>
                <li class="nav-item" id="facturas">
                    <a class="nav-link" href="{{ url('bills')}}">Facturas</a>
                </li>
                <li class="nav-item" id="ofrendas">
                    <a class="nav-link" href="{{ url('gifts')}}">Ofrendas</a>
                </li>
                <li class="nav-item" id="categorias">
                    <a class="nav-link" href="{{ url('categories')}}">Categorias</a>
                </li>
            </ul>
        </div>
    </nav>
@endsection
@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Actualizar cliente</h1>

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
        <form method="post" action="{{ route('customers.update', $customer->id) }}">
            @method('PATCH') 
            @csrf
            <div class="form-group">
                <label for="id">Cedula:</label>
                <input type="text" class="form-control" name="id" readonly value={{ $customer->id }} />
            </div>

            <div class="form-group">
                <label for="first_name">Nombres:</label>
                <input type="text" class="form-control" name="first_name" value={{ $customer->first_name }} />
            </div>

            <div class="form-group">
                <label for="last_name">Apellidos:</label>
                <input type=text class="form-control" name="last_name" value={{ $customer->last_name }} />
            </div>

            <div class="form-group">
                <label for="extract">Extracto:</label>
                <input type="text" class="form-control" name="extract" value={{ $customer->extract }} />
            </div>       

            <div class="form-group">
                <label for="direction">Dirección:</label>
                <input type="text" class="form-control" name="direction" value={{ $customer->direction }} />
            </div>

            <div class="form-group">
                <label for="telephone">Teléfono:</label>
                <input type="text" class="form-control" name="telephone" value={{ $customer->telephone }} />
            </div>       

            <div class="text-right">
                <a href="{{ route('customers.index')}}" class="btn btn-danger">Cancelar y volver</a>
                <button type="submit" class="btn btn-primary">Guardar</button>                            
            </div>
        </form>
    </div>
</div>
@endsection