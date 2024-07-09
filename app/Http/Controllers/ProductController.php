<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /** 
     *  Home :  show last products and all categories
     * 
     */
    public  function index()  {

            $categories = Category::all() ; 
            //dd($categories) ;

            $products = Product::orderBy('id', 'desc')->paginate(8) ;
           
            return view('product.products', compact('categories', 'products')) ;
    }

    /** 
     *  productByCategory :  show last products by category
     * 
     */
    public  function productByCategory($id = 0 )  {

        $categories = Category::all() ; 
        
        // filtre les produits de la categorie $id
        $products = Product::where('category_id', $id)
                            ->orderBy('id', 'desc')
                            ->paginate(8) ;
       
        return view('product.products', compact('categories', 'products')) ;
    }


      /** 
     *  Detail :  show product detail
     * 
     */
    public  function show(Product $product )  {

        //,,,

        $products = Product::where('category_id', $product->category_id  )
                            ->inRandomOrder()
                            ->limit(5)
                            ->get();

       

        return view('product.show',compact('product' ,'products'));
    }
}