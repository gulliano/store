<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Favorite;
use Illuminate\Http\Request;

class FavorisController extends Controller
{
    //
    public function index(){

        return 'index' ; 
    }

    public function edit(Product $product){

        $favoris =  Favorite::where('user_id' , auth()->user()->id) 
                            ->where('product_id', $product->id)->first() ;
        
        if(isset($favoris)){

            $favoris->delete() ; 

        }else{
            Favorite::create(['user_id' => auth()->user()->id,
                            'product_id'=> $product->id]) ;
        }

        

        return back() ; 
    }

}
