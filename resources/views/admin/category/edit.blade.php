@extends('layouts.back.template')
@section('contenu')
<form action="{{ route('categories.update',$category)}}" method="post">
    @csrf
    @method('PUT')
    @if ($errors->any())
    <ul class="alert alert-danger" >
        @foreach ($errors->all() as $error)
            <li> {{$error}} </li>
        @endforeach
    </ul>  
    @endif
    <label for="nom">Nom Categorie</label>
   <input type="text" name="nom"
   @error('nom')
   class="alert alert-danger" 
@enderror
     value= "{{$category->nom}}">

   <input type="submit" value="Modifier" class="btn btn-primary">

  
</form>
@endsection