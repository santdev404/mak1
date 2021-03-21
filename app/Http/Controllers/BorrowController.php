<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Models\Book;
use App\Models\Category;
use App\Models\User;
use App\Models\Borrow;

class BorrowController extends Controller
{
    public function pruebas(Request $request){
        return "Accion de pruebas de borrow controller";
    }


    //Buscar relacion entre book & user mediante user_id, borrow =1

    public function getUserByBookId($id){


        $result = DB::table('books')
                ->join('users', function ($join) use($id){
                    $join->on('books.borrow_user_id', '=', 'users.id')
                    ->where('books.id', '=', $id);
                })
                ->selectRaw('books.*, users.name as userName, users.surname as userSurname')
                ->get();


        if(is_object($result)){
            $data = [
                'code' => 200,
                'status' => 'success',
                'result' => $result
            ];
        }else{
            $data = [
                'code' => 404,
                'status' => 'error',
                'message' => 'La categoria no existe'
            ];
        }

        return response()->json($data, $data['code']);

    }

    //Actualizar tabla book cuando se asigen a un usuario

    public function updateAssignedTo($id, $user_id){

        //ID book
        //ID user

        $book = DB::table('books')
        ->where('id', $id)
        ->update(['borrow' => 1, 'borrow_user_id' =>  $user_id]);

        //Devolver data
        $data = array(
            'code'   => 200,
            'status' => 'success',
            'book'   => $book
        );
        
        return response()->json($data,$data['code']);

    }
    
    //Actualizar tabla book cuando el libre no este asignado a un usuario
    public function updateUnassignedTo($id){

        //ID book
        //ID user

        $book = DB::table('books')
        ->where('id', $id)
        ->update(['borrow' => 0, 'borrow_user_id' =>  0]);

        //Devolver data
        $data = array(
            'code'   => 200,
            'status' => 'success',
            'book'   => $book
        );
        
        return response()->json($data,$data['code']);
    }




}
