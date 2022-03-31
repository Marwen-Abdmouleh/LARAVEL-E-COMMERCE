<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;

class HomController extends Controller
{
   public function welcome(){
       $categories=Category::all();
       return view('layouts.pages.welcome',compact('categories'));
   }
   public function presentation (){
    $categories=Category::all();
    return view('layouts.pages.presentation',compact('categories'));
}

public function contact (){
    $categories=Category::all();
    return view('layouts.pages.contact',compact('categories'));
}

}

