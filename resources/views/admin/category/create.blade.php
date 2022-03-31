@extends('layouts.back.template')
@section('contenu')

@if ($errors->any())
<ul class="alert alert-danger" >
    @foreach ($errors->all() as $error)
        <li> {{$error}} </li>
    @endforeach
</ul>  
@endif

<form action="{{ route('categories.store')}}" method="POST">
    <label for="nom">Nom Categorie</label>
   <input type="text" name="nom" 
   value="{{old('nom')}}"
    {{-- value=" {{old('nom')}} " ->he4i t5alili nom le9dim --}}
    required
      @error('nom')
      class="alert alert-danger" 
   @enderror  >

   <input type="submit" value="Ajouter" class="btn btn-primary">

    @csrf


</form>
@endsection