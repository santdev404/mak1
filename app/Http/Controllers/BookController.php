<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Book;
use App\Models\Category;
use App\Models\User;
use App\Models\Borrow;

class BookController extends Controller
{
    
    public function index(){
        //Buscar como paginar
        $books = Book::all()->load('category');

        //$books = Book::all()->paginate(2)->load('category');

        //$books = Book::paginate(10)->load('category');


        
        return  response()->json([
            'code'      => 200,
            'status'    => 'success',
            'post'      => $books
        ]);
    }

    public function show($id){

        $book = Book::find($id)->load('category');

        if(is_object($book)){
            $data = [
                'code'      => 200,
                'status'    => 'success',
                'book'      => $book
            ];
        }else{
            $data = [
                'code'      => 404,
                'status'    => 'error',
                'book'      => 'La entrada no existe'
            ];
        }

        return response()->json($data, $data['code']);

    }

    public function store(Request $request){

        //Recoger datos por post
        $json           = $request->input('json',null);
        $params         = json_decode($json);
        $params_array   = json_decode($json, true);

        if(!empty($params_array)){

            $validate = \Validator::make($params_array,[
                'category_id'       => 'required',
                'name'              => 'required',
                'publication_date'  => 'required',
                'author'            => 'required',
            ]);

            if($validate->fails()){
                
                $data = [
                    'code'      => 400,
                    'status'    => 'error',
                    'message'   => 'No se ha guardado el libro, faltan datos'
                ];               
                
            }else{
                
                //Recrear book tabla insertar solo category_id as FK
                //Guardar el libro
                $book = new Book();
                //$book->user_id          = "1";
                $book->category_id      = $params->category_id;
                $book->name             = $params->name;
                $book->publication_date = $params->publication_date;
                $book->author           = $params->author;
                $book->borrow           = 0;
                
                $book->save();
                
                $data = [
                    'code'      => 200,
                    'status'    => 'success',
                    'book'      => $book
                ];

                
            }

        }else{
            $data = [
                'code'      => 400,
                'status'    => 'error',
                'mensage'   => 'Envia los datos correctos'
            ];
        }

        //Devolver la respuesta
        return response()->json($data,$data['code']);


    }


    public function update($id, Request $request){
        //Recoger datos por post
        $json = $request->input('json', null);
        $params_array = json_decode($json,true);
        
        //Datos para revolver
        $data = array(
            'code'      => 400,
            'status'    => 'error',
            'message'   => 'Datos enviados incorrectos'
        );
        
        if(!empty($params_array)){
            ////Validar datos
            $validate = \Validator::make($params_array,[
                'category_id'       => 'required',
                'name'              => 'required',
                'publication_date'  => 'required',
                'author'            => 'required'
            ]);
            
            if($validate->fails()){
                
                $data['errors'] = $validate->errors();
                return response()->json($data,$data['code']);
                
            }

            //eliminar lo que no queremos actualizar
            unset($params_array['id']);
            unset($params_array['user_id']);
            unset($params_array['created_at']);

            //Buscar el registro a actualizar
            $book = Book::where('id',$id)
            ->first();
            
            if(!empty($book) && is_object($book)){
                
                ////Actualizar el registro en concreto
                $book->update($params_array);
                
                //Devolver data
                $data = array(
                    'code'   => 200,
                    'status' => 'success',
                    'post'   => $book,
                    'change' => $params_array
                );
            }
            
        }
        
        return response()->json($data,$data['code']);
    }

    

    public function destroy($id, Request $request){
        
        //Conseguir el book
        $book = Book::where('id',$id)
                    ->first();
        
        if(!empty($book)){
            //Borrarlo
            $book->delete();

            //Devolver algo

            $data = [
                'code'      => 200,
                'status'    => 'success',
                'post'      => $book
            ];
            
        }else{
            
            $data = [
                'code'      => 400,
                'status'    => 'error',
                'message'   => 'Book no identificado'
            ];
            
        }

        return response()->json($data,$data['code']);
    }


    public function bookStatus($id, Request $request){

        //Recoger datos por post
        $json = $request->input('json', null);
        $params_array = json_decode($json,true);
        
        //Datos para revolver
        $data = array(
            'code'      => 400,
            'status'    => 'error',
            'message'   => 'Datos enviados incorrectos'
        );
        
        if(!empty($params_array)){
            ////Validar datos
            $validate = \Validator::make($params_array,[
                'borrow'         => 'required',
            ]);
            
            if($validate->fails()){
                
                $data['errors'] = $validate->errors();
                return response()->json($data,$data['code']);
                
            }

            //eliminar lo que no queremos actualizar
            unset($params_array['id']);
            unset($params_array['user_id']);
            unset($params_array['category_id']);
            unset($params_array['name']);
            unset($params_array['publication_date']);
            unset($params_array['author']);
            unset($params_array['content']);
            unset($params_array['created_at']);

            

            //Buscar el registro a actualizar
            $book = Book::where('id',$id)
            ->first();
            
            if(!empty($book) && is_object($book)){
                
                ////Actualizar el registro en concreto
                $book->update($params_array);
                
                //Devolver data
                $data = array(
                    'code'   => 200,
                    'status' => 'success',
                    'post'   => $book,
                    'change' => $params_array
                );
            }
            
        }
        
        return response()->json($data,$data['code']);
    }


    




}
