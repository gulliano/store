<?php

namespace App\Http\Controllers;

use App\Models\Panier;
use App\Models\Commande;
use App\Models\CommandeItem;
use Illuminate\Http\Request;

class CommandeController extends Controller
{
    //


    public function index(){

        $commandes = Commande::where('user_id', auth()->user()->id)
                                ->orderBy('id', 'desc')
                                ->get() ; 


        return view('commande.lister' , compact('commandes')); 

    }
        
    /**
     *  Création de la commande 
     *  et ajout des éléments du panier dans commande Items 
     * 
     */

    public function create(){

        // lecture du panier
        $paniers = Panier::where( 'user_id' , auth()->user()->id)->get() ; 

        if(count($paniers) == 0 ){ return 'vide' ; }

        // création de la commande
        $commande = Commande::create([  'user_id' => auth()->user()->id,
                                        'numero'=> 0,
                                        'total' => 0 ]) ;

      
   
        $total = 0 ;
        foreach($paniers as $panier){

            $commandeId = $commande->id  ;       // identifiant de la commande
            $productId  = $panier->product_id ;  // identifiant du produit
            $quantite   = $panier->quantite ;       // nombre de  produit
            $price      = $panier->product->price  ; // prix du produit
            $total      +=  $price * $quantite ; // ->  $total  = $total + $price * $quantite

            // ajout dans la table Commande item
            CommandeItem::create([ 'commande_id' => $commandeId,
                               'product_id' => $productId ,
                               'quantite' => $quantite,
                               'price' => $price ]) ;
            

        }
        
      
        // mise à jour du total de la commande
        $commande->update(['numero'=>9999 ,'total' => $total]) ;
        $commande->save() ; 

        // je vide le panier 
        Panier::where( 'user_id' , auth()->user()->id)->delete() ;
        


        return 'commander' ; 


    }
}
