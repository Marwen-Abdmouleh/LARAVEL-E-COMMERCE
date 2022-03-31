@extends('layouts.template')

@section('sidebar')
@include('layouts.front.banner')
	@parent
@endsection

@section('contenu')



@include('layouts.front.bannerPub')


@include('layouts.front.newCollection')


@include('layouts.front.promotion')
    
@endsection
