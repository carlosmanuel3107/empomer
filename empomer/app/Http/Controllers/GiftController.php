<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gift;
use App\Models\Category;

class GiftController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gifts = Gift::with('category')->paginate(5);        
        return view('gifts.index', compact('gifts')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {        
        $categories = Category::all();        
        return view('gifts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name'=>'required',                        
            'price'=>'required|integer',            
            'category_id' => 'required|integer|exists:categories,id'
        ];                

        $customMessages = [
            'required' => 'Todos los campos deben estar llenos.',
            //'id.unique'=> 'ya existe un cliente resgistrado con este número de cedula.',
            //'name.required' => 'Cuidado!! el campo del nombre no se admite vacío',
        ];
        $validatedData = $request->validate($rules, $customMessages);                          
        
        $gift = new Gift([            
            'name' => $request->get('name'),
            'price' => $request->get('price'),
            'category_id' => $request->get('category_id'),
        ]);        
                
        $gift->save();        
        
        return redirect('/gifts')->with('success', 'Se ha registrado la ofrenda con exito!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {        
        $categories = Category::all();                
        $gifts = Gift::with('category')->find($id);                  
        return view('gifts.edit', compact('gift','categories')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'id'=>'required|integer|exists:gifts,id',
            'name'=>'required',                        
            'price'=>'required|integer',            
            'category_id' => 'required|integer|exists:categories,id'
        ];                

        $customMessages = [
            'required' => 'Todos los campos deben estar llenos.',
            //'id.unique'=> 'ya existe un cliente resgistrado con este número de cedula.',
            //'name.required' => 'Cuidado!! el campo del nombre no se admite vacío',
        ];
        $validatedData = $request->validate($rules, $customMessages);                          
        
        
        $gift = Gift::find($id);
        $gift->name = $request->get('name');
        $gift->price = $request->get('price');
        $gift->category_id = $request->get('category_id');
        $gift->save();
        
        return redirect('/gifts')->with('success', 'La ofrenda '.$request->get('name').' ha sido actualizada!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $name = ''; 
        try {
            $gift = Gift::find($id);
            $name = $gift->name;
            $gift->delete();
        
        }catch (\Illuminate\Database\QueryException $e){
            return redirect('/gifts')->with('failed', 'La ofrenda '.$name.' no ha sido eliminada, hay algunos errores desconocidos.');
        }

        return redirect('/gifts')->with('success', 'La ofrenda '.$name.' ha sido eliminada!');
    }
}
