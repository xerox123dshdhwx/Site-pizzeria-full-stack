<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','status','created_at','updated_at'];

    public function user(){
        return $this->belongsTo(User::class,'id');
    }

    function pizza(){
        return $this->belongsToMany(Pizza::class, 'commande_pizza', 'commande_id', 'pizza_id')
            ->withPivot('qte');
    }



}
