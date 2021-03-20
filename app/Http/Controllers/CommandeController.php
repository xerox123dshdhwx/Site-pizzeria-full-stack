<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\Pizza;
use Illuminate\Http\Request;
class CommandeController extends Controller
{
    public function produitsListPaginare(Request $request){
        $p = Commande::paginate(3);
        return view('commandes.list-paginate',['commandes'=>$p]);
    }


    public function create_commande(Request $request){

        $e = Pizza::where('id','nom')->first();
        $c = Commande::where('id','user_id')->first();

        $e->commande()->attach($c,['qte'=>'value']);


    }



}
