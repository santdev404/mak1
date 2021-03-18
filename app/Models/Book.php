<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $table = 'books';

    protected $fillable = [
        'name','publication_date','category_id', 'author', 'borrow', 'borrow_user_id'
    ];

    //Relacion de uno a muchos pero inversa (muchos a uno)

    /*
    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id');
    }
    */

    public function category(){
        return $this->belongsTo('App\Models\Category', 'category_id');
    }

    
}
