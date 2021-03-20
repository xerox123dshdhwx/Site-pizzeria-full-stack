<?php

namespace App\Http\Controllers;

use App\Models\Pizza;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PizzaController extends Controller
{
    public function print(){
        $pizzas = DB::table('pizzas')->get();
        return view('pizzas.template',['pizzas' => $pizzas]);

    }

    public function showEditForm(Request $request,$id){
        $pizza = Pizza::query()->findOrFail($id);
        return view('pizzas.modifier',['pizza'=>$pizza]);
    }
    public function edit(Request $request,$id){
        $validated = $request->validate([
            'nom' => 'nullable|alpha|max:255',
            'description' => 'nullable|max:255',
        ]);

        $nom = Pizza::query()->findOrFail($id);

        if(isset($validated['nom'])){
            $nom->nom = $validated['nom'];
        }
        if(isset($validated['description'])){
            $nom->description = $validated['description'];
        }

        $nom->updated_at = now();
        $nom->save();


        return redirect('/pizza');
    }

    public function nomDeleteForm(Request $request,$id){
        $pizza = Pizza::query()->findOrFail($id);
        return view('pizzas.supprimer',['pizza'=>$pizza]);
    }

    public function delete(Request $request,$id){

        $pizza = Pizza::query()->findOrFail($id);

        try {
            $pizza->delete();
            $request->session()->flash('etat', 'Supression effectué !');
        } catch (\Exception $e) {
            $request->session()->flash('etat', 'Echec de la suppression !');

        }


        return redirect('/pizza');
    }


    public function createForm_pizza()
    {
        return view('pizzas.create');
    }
    public function create_pizza(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|alpha|max:40',
            'prix' => 'required|integer|max:40',
            'description' => 'required|max:255',
        ]);

        $user = new Pizza();
        $user->nom = $validated['nom'];
        $user->prix = $validated['prix'];
        $user->description = $validated['description'];
        $user->save();

        $request->session()->flash('etat', 'Ajout effectué !');

        return redirect('/');
    }

    public function add_panier_form(Request $request,$id){

        $pizza = Pizza::query()->findOrFail($id);
        $key = 'pizza.'.$pizza->id;
        if(Session::has($key)){
            $value = Session::get($key);
            $value = $value +1;
            Session::forget($key);
            Session::put('pizza.'.$pizza->id,$value);
        }else{
            Session::put('pizza.'.$pizza->id,1);
        }
        $pizzas = DB::table('pizzas')->get();
        $request->session()->flash('etat', 'Ajout effectué !');

        return redirect('/pizza');
        }

    public function store (Request $request){
           $request->validate([
               'value' => 'required'
               ]);
            Session::put('request',$request);

           $pizzas = DB::table('pizzas')->get();
           return view('panier',['pizzas' => $pizzas]);
       }

    public function panier_modif (Request $request,$id){
           $pizza = Pizza::query()->findOrFail($id);
           $request->validate([
               'value' => 'required'
           ]);
           $key = 'pizza.'.$pizza->id;
           Session::forget($key);
           Session::put('pizza.'.$pizza->id,$request['value']);


           $pizzas = DB::table('pizzas')->get();
           return view('panier',['pizzas' => $pizzas]);
       }

    public function vue_panier (Request  $request){
           $pizzas = DB::table('pizzas')->get();
           return view('panier',['pizzas' => $pizzas]);

       }
    public function delete_pizza(Request $request,$id){
           $pizza = Pizza::query()->findOrFail($id);
           $key = 'pizza.'.$pizza->id;
           Session::forget($key);

           $pizzas = DB::table('pizzas')->get();
           return view('panier',['pizzas' => $pizzas]);
       }



}
