<?php

namespace App\Http\Controllers\front;
use App\Models\Produit;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ClientProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(int $cat)
    {
      
        $categories=Category::all();
        $produits=Produit::where('category_id',$cat)->get();
        return view ('layouts.pages.products', compact('produits','categories'));
    }

}
