
@extends('layouts.template')

<!-- breadcrumbs -->
@include('layouts.front.filedariane')
<!-- //breadcrumbs -->

@section('sidebar')

@include('layouts.front.filedariane')
	@parent
    @endsection

    @section('contenu')
	
<body>
	@if (session('succes'))
						<div class="alert alert-success" role="alert">
							{{session('succes')}}
						</div>
						@endif

	@if (session('succes_message'))
						<div class="alert alert-warning" role="alert">
							{{session('succes_message')}}
						</div>
						@endif

	<div class="products">
		<div class="container">
		
			<div class="col-md-8 products-right">
		
				<div class="products-right-grids-bottom">

                        @foreach ($produits as $produit)

                        <div class="col-md-4 products-right-grids-bottom-grid">
                        
						<div class="new-collections-grid1 products-right-grid1 animated wow slideInUp" data-wow-delay=".5s">
							<div class="new-collections-grid1-image">
								<a href="single.html" class="product-image"><img src="{{asset('images/produits/'.$produit->image)}}"  class="img-responsive"></a>
							
							</div>
		<h4><a href="single.html">{{$produit->name}} </a></h4>
			
	<div class="simpleCart_shelfItem products-right-grid1-add-cart">

			 <span class="item_price">{{$produit->price}} </span>
			 
			<form action=" {{route('cart.store')}} " method="POST" >
				@csrf
				<input type="hidden" name="produit_id" value="{{$produit->id}}">
				<button type="submit" class="btn btn-dark" >Ajouter au Panier</button>
			</form>
							</div>
						</div>
                    </div>
                        @endforeach
						
					
			
					<div class="clearfix"> </div>
				</div>
				<nav class="numbering animated wow slideInRight" data-wow-delay=".5s">
				  <ul class="pagination paging">
					<li>
					  <a href="#" aria-label="Previous">
						<span aria-hidden="true">&laquo;</span>
					  </a>
					</li>


         {{-- pagination --}}
					<li class="active"><a href="#">1<span class="sr-only">(current)</span></a></li>
					<li><a href="#">2</a></li>
					<li><a href="#">3</a></li>
					<li><a href="#">4</a></li>
					<li><a href="#">5</a></li>
					<li>
					  <a href="#" aria-label="Next">
						<span aria-hidden="true">&raquo;</span>
					  </a>
					</li>
				  </ul>
				</nav>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
<!-- //breadcrumbs -->

@endsection
</body>
</html>