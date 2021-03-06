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
                    <a class="nav-link active" href="{{ url('gifts')}}">Ofrendas</a>
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
  <h1 class="display-3">Ofrendas </h1>    
  
  <div>
    <a style="margin: 19px;" href="{{ route('gifts.create')}}" class="btn btn-primary">Agregar ofrenda</a>
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
          <td>Id ofrenda</td>
          <td>Nombre</td>
          <td>Precio por --</td>
          <td>Categoria</td>          
          <td colspan = 2>Opciones</td>
        </tr>
    </thead>
    <tbody>
        @forelse($gifts as $gift)
        <tr>
            <td>{{$gift->id}}</td>
            <td>{{$gift->name}}</td>
            <td>{{$gift->price}}</td>
            <td>{{$gift->category->name}}</td>            
            <td>
                <a href="{{ route('gifts.edit',$gift->id)}}" class="btn btn-primary">Editar</a>
            </td>
            <td>
                <form action="{{ route('gifts.destroy', $gift->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Borrar</button>
                </form>
            </td>
        </tr>
        @empty
          <p>No se encontraron ofrendas registradas.</p>
        @endforelse                
    </tbody>
  </table>
  <div>
    {{ $gifts->links() }}
  </div>
<div>
</div>
@endsection