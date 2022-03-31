
@extends('layouts.template')

<!-- breadcrumbs -->
@include('layouts.front.filedariane')
<!-- //breadcrumbs -->

@section('sidebar')

@include('layouts.front.filedariane')
	@parent
@endsection

@section('contenu')
@if (session('succes_message'))
<div class="alert alert-warning" role="alert">
	{{session('succes_message')}}
	
</div>
@endif

<!-- checkout -->
	<div class="checkout">
		<div class="container">
			<h3 class="animated wow slideInLeft" data-wow-delay=".5s">Your shopping cart contains: <span>{{Cart::count()}} Products</span></h3>
			<div class="checkout-right animated wow slideInUp" data-wow-delay=".5s">
				<table class="timetable_sub">
					<thead>
						<tr>
							<th>Id</th>	
							<th>Product</th>
							<th>Quantity</th>
							<th>Product Name</th>
							<th>Prix unitaire</th>
							<th>Prix Total</th>
							<th>Remove</th>
						</tr>
					</thead>
					@if (Cart::count()>0)
						
					
					@foreach (Cart::content() as $item)
					<tr class="rem1">
						<td class="invert">{{$item->id}}</td>
						<td class="invert-image" width="350px"  ><a href="single.html">
							<img src="{{asset('images/produits/'.$item->model->image)}}"  
							alt=" " class="img-responsive"  /></a></td>
							<td class="invert">

                                <form id="form" action="{{ route('cart.update') }}" method="POST">
                                    @csrf
									
									<div class="row ml-4" >

									
									<button type="submit" class="btn btn-success "
									onclick="decrese(event,{{$item->id}},{{$item->qty}})" >-</button>
                                    
									@if (session('succes_message'))
								<input type="number" name="quantity" value="{{session('quantity')}}" min="1"   class="w-6 text-center bg-gray-300" onchange="update"
								id="{{$item->id}}" />	
								@else
	<input type="number" name="quantity" value="{{$item->qty}}" min="1" 
	id="{{$item->id}}" class="text-center bg-gray-300" style="width:50px"  />
									@endif
                                    <button type="submit" class="btn btn-success  " 
									onclick="increse(event,
									{{$item->id}},
									{{$item->qty}})" >+</button></div>
									<input type="number" value=""  id="action" hidden >
									<input type="hidden" name="rowId" value="{{ $item->rowId}}" >
                                </form>
                            </td>
						<td class="invert">{{$item->model->name}}</td>
						<td class="invert">{{$item->model->price}}  </td>
						<td class="invert">{{$item->model->price * $item->qty}}  </td>
						
						<td class="invert">
							<div class="rem">
								{{-- <div class="close1"> </div> --}}
								<form action=" {{route('cart.destroy',$item->rowId)}} " method="POST">
									@csrf
									@method('DELETE')
									<input type="hidden" value="{{ $item->rowId }}" name="rowId">
									<button class="btn btn-danger">x</button>
								</form>
							</div>
					
						</td>
					</tr>		
					@endforeach
					@else
					<p>Panier est vide</p>
					@endif


								<!--quantity-->
									<script>
	var form = document.getElementById('form') ;
	var action = document.getElementById('action') ;						
function increse(e,id,qty){
	var input = document.getElementById(id) ;
qty = qty+1;
input.value = qty	;
action.value = 'increse'	;
	console.log(input);
	};

	function decrese(e,id,qty){
	var input = document.getElementById(id) ;
qty = qty-1;
input.value = qty	;
action.value = 2	;

	};
									</script>
								<!--quantity-->
				</table>
			</div>
			<div class="checkout-left">	
				<div class="checkout-left-basket animated wow slideInLeft" data-wow-delay=".5s">
					<h4>détaille de la commande</h4>
					<ul>
						<li><i>Sous-Total</i> <span> {{getPrice(cart::subtotal())}} </span></li>
						<li><i>Taxe </i> <span>{{getPrice(cart::tax())}} </span></li>
						<li> <i>Total</i> <span>{{getPrice(cart::total())}} </span></li>
					</ul>
				</div>
				<div class="checkout-right-basket animated wow slideInRight" data-wow-delay=".5s">
					<a href="single.html"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Continue Shopping</a>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
<!-- //checkout -->

</body>
</html>



@endsection
</body>
</html>