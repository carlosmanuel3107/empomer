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
                    <a class="nav-link active" href="{{ url('bills')}}">Facturas</a>
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
    <h1 class="display-3">Registrar factura</h1>
  <div>
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('bills.store') }}">
          @csrf                      
          <div class="form-group">
              <label for="date_expedition">Fecha de expedición:</label>
              <input type="date" class="form-control" name="date_expedition"/>
          </div>

          <div class="form-group">    
              <label for="customer_id">Identificación del cliente:</label>
              <input type="text" class="form-control" name="customer_id" list="list"/>
              <datalist id="list">
                    @foreach($customers as $customer)
                    <option>{{$customer->id}}</option>
                    @endforeach
            </datalist>  
          </div>                    

          <div class="form-group">
              <label for="description">Descripción:</label>
              <input type="text" class="form-control" name="description"/>
          </div>

          <div class="form-group">
              <label for="price">Valor a pagar:</label>
              <input type="text" class="form-control" name="price"/>
          </div>

          <div class="form-group">
              <label for="start_date">Fecha de inicio:</label>
              <input type="date" class="form-control" name="start_date"/>
          </div>

          <div class="form-group">
              <label for="end_date">Fecha fin:</label>
              <input type="date" class="form-control" name="end_date"/>
          </div>

          <div class="form-group">
            <label for="gift">Servicio:</label>            
            <select class="form-control" name="gift_id" id="FormControlSelect">
                    @foreach($gifts as $gift)
                    <option value={{$gift->id}}>{{$gift->name}} </option>
                    @endforeach
            </select>             
          </div>                   
          
          <div class="text-right">
            <a href="{{ route('bills.index')}}" class="btn btn-danger">Cancelar y volver</a>
            <button type="submit" class="btn btn-primary">Guardar</button>
          </div>
      </form>
  </div>
</div>
</div>
@endsection