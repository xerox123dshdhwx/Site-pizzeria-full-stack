<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index(){

        $users =  DB::table('users')->get();
        return view('users.template',['users' => $users]);
    }
    public function editform(Request $request,$id)
    {
        $user = User::query()->findOrFail($id);
        return view('users.modifier',['user'=>$user]);
    }

    public function edit(Request $request,$id){
        $user = User::query()->findOrFail($id);

        $v = $request->validate([
            'nom' => 'required|alpha|max:255',
            'mdp' => '|required'
        ]);

        $user->nom = $v['nom'];
        $user->mdp = Hash::make($request->mdp);
        $user->save();

        $request->session()->flash('etat', 'modification effectué !');

        return redirect('/');

    }

}
