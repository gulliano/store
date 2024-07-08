<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    /** 
     *  Home :  show last products and all categories
     * 
     */
    public  function index()  {

            return 'home' ;
    }

    /** 
     *  productByCategory :  show last products by category
     * 
     */
    public  function productByCategory()  {

        return 'Product By Category ' ;
    }


      /** 
     *  Detail :  show product detail
     * 
     */
    public  function show()  {

        return 'detail' ;
    }
}
