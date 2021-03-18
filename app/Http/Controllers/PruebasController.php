<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;
use App\Models\User;
use App\Models\Borrow;

class PruebasController extends Controller
{
    public function index(){
        $titulo = 'titulo';
        $animales = ['Perro', 'gato'];

        return view('pruebas.index', array(
            'titulo' => $titulo,
            'animales'=>$animales
        ));
    }

    public function testOrm(){

        $Users = User::all();
        foreach($Users as $user){
            //echo "<h1>".$user->books."</h1>";
            //echo "<spam>{$book->user->name}</spam>";
        }

        $books = Book::all();
        foreach($books as $book){
            //echo "<h1>".$book->name."</h1>";
            //echo "<spam>{$book->user->name}-{$book->category->name}</spam>";
        }

        $categories = Category::all();
        foreach($categories as $category){

            //echo "<h1>".$category->name."</h1>";

            foreach($category->books as $book){
                //echo "<h1>".$book->name."</h1>";
                //echo "<spam>{$book->user->name}-{$book->category->name}</spam>";
            }

        }

        $borrows = Borrow::all();
        foreach($borrows as $borrow){
            echo "<p>".$borrow->user->name."</p>";
            echo "<p>".$borrow->book->name."</p>";

           
        }
        


        die();
    }
}
