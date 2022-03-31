<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers\front;
use App\Models\Produit;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::all();
        
        return view ('layouts.pages.panier',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $duplicata = Cart::search(function ($cartItem, $rowId) use ($request) {
          return $cartItem->id == $request->produit_id;
      });
      $produit=Produit::find($request->produit_id);
      if ($duplicata->isNotEmpty()){
          return redirect()->route ('Front.produit', $produit->category_id)->with('succes_message','le produit ete deja ajouter');
      }
if(($request->action == 'increse') && ($request->has('action')) ){
    $produit=Produit::find($request->produit_id);
    Cart::add($produit->id,$produit->name,1,$produit->price)->associate('App\Models\Produit') ;
    return redirect()->route ('Front.produit', $produit->category_id)->with('succes','le produit ete bien ajouter');
}else{
    $produit=Produit::find($request->produit_id);
    Cart::add($produit->id,$produit->name,1,$produit->price)->associate('App\Models\Produit') ;
    return redirect()->route ('Front.produit', $produit->category_id)->with('succes','le produit ete bien ajouter');

}
  
          
      }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        Cart::update($request->rowId, $request->quantity);

        return redirect()->route('cart.index')->with(['quantity'=>$request->quantity,'success', 'Product Quantity was Updated Successfully !']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($rowId)
    {
        Cart::remove($rowId);
        
        return back()->with('succes_message','le produit ete bien supprimer');
      
    }
}
