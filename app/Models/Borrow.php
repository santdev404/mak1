<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    use HasFactory;

    protected $table = 'borrows';

    //Relacion de uno a muchos pero inversa (muchos a uno)
    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id');
    }


    public function book(){
        return $this->belongsTo('App\Models\Book', 'book_id');
    }
}
