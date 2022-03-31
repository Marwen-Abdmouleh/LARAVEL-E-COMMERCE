@extends('layouts.back.template')
@section('contenu')

@if ($errors->any())
<ul class="alert alert-danger" >
    @foreach ($errors->all() as $error)
        <li> {{$error}} </li>
    @endforeach
</ul>  
@endif

<form action="{{ route('produits.update',$produit->id)}}" method="post" enctype="multipart/form-data" >
    @csrf
    @method('PUT') 
   <div>
   <label for="name">name Produit</label>
  <input type="text" name="name" 
  value= "{{$produit->name}}"
   {{-- value=" {{old('name')}} " ->he4i t5alili name le9dim --}}
   required
     @error('name')
     class="alert alert-danger" 
  @enderror value= "{{$produit->name}}  >
   </div>

<div class="form-group" >
    <label for="image">image</label>
    <input type="file" name="image" class="form-control" required 
       @error('image') class="alert alert-danger" @enderror
       value= "{{$produit->image}}" >
</div>
<div>
    <label for="description">Description</label>
    <input type="text" name="description" required
     @error('description') class="alert alert-danger" @enderror
     value= "{{$produit->description}}" >
</div>
<div class="form-group" >
    <label for="categorie">Categorie</label>
    <select name="category_id" class="form-control"  id="category_id">
        @foreach ($categories as $category)
            <option value=" {{$category->id}} "> {{$category->nom}} </option>
        @endforeach
    </select>
</div>

<div>
    <label for="price">price</label>
    <input type="text" name="price" required 
    @error('price') class="alert alert-danger" @enderror 
    value= "{{$produit->price}}" >
</div>


<br>
   <input type="submit" value="Modifier" class="btn btn-primary">

</form>
@endsection