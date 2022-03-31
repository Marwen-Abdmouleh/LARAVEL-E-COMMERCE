@extends('layouts.back.template')
<a href="{{route('produits.index')}}" class="act">Produits</a>
@section('contenu')
    <div class="row">
        <div class="col-lg-12">
            <div class="pull-left">
                <h2>Gestion des Categories</h2>
            </div>
            <div class="float-end mb-2" style="margin-right: -30px">
                <a class="btn btn-success" href="{{ route('categories.create') }}"> Ajouter une nouvelle categorie</a>
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
     
            <th width="250px">Action</th>
        </tr>
        @foreach ($categories as $category)
        <tr>
            <td>{{ $category->id}}</td>
            <td>{{ $category->nom }}</td>
       

            <td>
                <form action="{{ route('categories.destroy',$category->id) }}" method="POST">
   
                    <a class="btn btn-primary" href="{{ route('categories.edit',$category->id) }}">Modifier</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
@endsection