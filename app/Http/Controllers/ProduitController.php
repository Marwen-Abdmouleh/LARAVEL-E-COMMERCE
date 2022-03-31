<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\Category;
use Illuminate\Http\Request;


class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
        $produits=Produit::all();
        return view ('admin.produit.index', compact('produits'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        return view ('admin.produit.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'description' => 'required',
            'price' => 'required',
            'name' => 'required|unique:produits',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $inputs=$request->all();
        if($image=$request->file("image")){
            $newfile=strtotime(date("Y-m-d H:i:s")).".".$image->getClientOriginalExtension();
            $image->move('images/produits/',$newfile);
            $inputs['image']=$newfile;
        }
        Produit::create($inputs);

        return redirect()->route('produits.index')
        ->with ('success','produit Ajouter avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function show(Produit $produit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function edit(Produit $produit)
    {
        $produit=Produit::find($produit)->first();
        $categories=Category::all();
        return view ('admin.produit.edit', compact('produit','categories'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produit $produit)
    {
    
        $request->validate([
            'name'=>'required|unique:produits,name,'.$produit->id,
            'price'=>'required|unique:produits,price,'.$produit->id,
            'image'=>'required|unique:produits,image,'.$produit->id,
            'description'=>'required|unique:produits,description,'.$produit->id,
        ]); 
    
        $inputs=$request->all();
        
        if($image=$request->file("image")){
            unlink('images/produits/'.$produit->image);
            $newfile=strtotime(date("Y-m-d H:i:s")).".".$image->getClientOriginalExtension();
            $image->move('images/produits/',$newfile);
            $inputs['image']=$newfile;

        }
  
  
           $produit->update($inputs);
           return redirect()-> route('produits.index')
           ->with ('success','produit modifier avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produit $produit)
    {
  
        unlink('images/produits/'.$produit->image);
        $produit->delete();
        return redirect()-> route('produits.index')
        ->with ('success','produit suprimer avec succès.');
    }
}
