@extends('layouts.back.template')

@section('contenu')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="float-start">
            <h2>Ajouter un produit</h2>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-right">
            <button type="button" class="btn btn-light"  ><a href="{{ route('produits.index') }}"> Retour</a></button>
            
        </div>
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Oups! </strong> Il y a eu des problèmes avec votre entrée.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('produits.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="categorie">Categorie :</label>
                <select name="category_id" class="form-control" id="event_id">
                  @foreach ($categories as $category)
                      <option value="{{$category->id}}">{{$category->nom}}</option>
                  @endforeach
                </select>
              </div>
            <div class="form-group">
                <strong>name produit:</strong>
                <input type="text" name="name" class="form-control" placeholder="Saisir le name du produit" value="{{old('name')}}" >
            </div>
            <div class="form-group">
                <strong>price:</strong>
                <input type="text" name="price" class="form-control" placeholder="Saisir le price" value="{{old('price')}}" >
            </div>
            <div class="form-group">
                <strong>Description:</strong>
                <input type="text" name="description" class="form-control" placeholder="Saisir la descreption" value="{{old('description')}}" >
            </div>
            <div class="form-group">
                <strong>image:</strong>
                <input type="file" name="image" class="form-control"  >
            </div>
        </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Ajouter</button>
                
        </div>
    </div>

</form>
@endsection
