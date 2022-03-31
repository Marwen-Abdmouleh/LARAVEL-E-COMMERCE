@extends('layouts.back.template')

<nav class="navbar navbar-dark bg-dark">

    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-item nav-link active" href="{{route('welcome')}}">Home <span class="sr-only">(current)</span></a>
        <a class="nav-item nav-link " href="{{route('categories.index')}}">Categories <span class="sr-only">(current)</span></a>

      </div>
    </div>
  </nav>




{{-- <a href="{{route('welcome')}}" class="act">Home</a>
<a href="{{route('categories.index')}}" class="act">Categories</a> --}}
@section('contenu')
    <div class="row">
        <div class="col-lg-12">
            <div class="pull-left">
                <h2>Gestion des Produits</h2>
            </div>
            <div class="float-end mb-2" style="margin-right: -30px">
                <a class="btn btn-success" href="{{ route('produits.create') }}"> Ajouter un nouvel produit</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th width="70px">id</th>
            <th>Nom</th>
            <th>photo</th>
            <th>description</th>
            <th>categorie</th>
            <th>prix</th>
            <th width="250px">Action</th>
        </tr>
        @foreach ($produits as $produit)
        <tr>
            <td>{{ $produit->id}}</td>
            <td>{{ $produit->name}}</td>
            <td><img src="{{ asset('images/produits/'.$produit->image) }}" height="70" > </td>  
            <td>{{ $produit->description }}</td>
            <td>{{ $produit->category->nom }}</td>
            <td>{{ $produit->price }}</td>
            <td>
                <form action="{{ route('produits.destroy',$produit->id) }}" method="POST">
   
                    <a class="btn btn-primary" href="{{ route('produits.edit',$produit->id) }}">Modifier</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
@endsection