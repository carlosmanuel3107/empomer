@extends('dashboard')

@section('nav')
    <nav class=" ">
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


<div class="col-sm-12">
  <h1 class="display-3">Facturas</h1>    
  
  <div>
    <a style="margin: 19px;" href="{{ route('bills.create')}}" class="btn btn-primary">Agregar factura</a>
  </div> 

  <div class="col-sm-12">

    @if(session()->get('success'))
      <div class="alert alert-success">
        {{ session()->get('success') }}  
      </div>
    @endif

    @if(session()->get('failed'))
      <div class="alert alert-danger">
        {{ session()->get('failed') }}  
      </div>
    @endif
  </div>

  <table class="table table-striped">
    <thead>
        <tr>
          <td>Numero factura</td>
          <td>Fecha expedición</td>
          <td>Cedula</td>
          <td>Descripción</td>
          <td>Fecha inicio</td>          
          <td>Fecha fin</td>          
          <td colspan = 2>Opciones</td>
        </tr>
    </thead>
    <tbody>
        @forelse($bills as $bill)
        <tr>
            <td>{{$bill->id}}</td>
            <td>{{$bill->date_expedition}}</td>
            <td>{{$bill->customer_id}}</td>
            <td>{{$bill->detail->description}}</td>
            <td>{{$bill->detail->start_date}}</td>
            <td>{{$bill->detail->end_date}}</td>
            <td>
                <a href="{{ route('bills.edit',$bill->id)}}" class="btn btn-primary">Editar</a>
            </td>
            <td>
                <form action="{{ route('bills.destroy', $bill->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Borrar</button>
                </form>
            </td>
        </tr>
        @empty
          <p>No se encontraron facturas registradas.</p>
        @endforelse                
    </tbody>
  </table>
  <div>
    {{ $bills->links() }}
  </div>
<div>
</div>
@endsection