<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate(5);        
        return view('categories.index', compact('categories'));  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
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
            'name'=>'required'            
        ];
        $customMessages = [
            'required' => 'El nombre es obligatorio.'            
        ];
        $validatedData = $request->validate($rules, $customMessages);
                
        $category = new Category([            
            'name' => $request->get('name')            
        ]);
        $category->save();
        
        return redirect('/categories')->with('success', 'La categoria '.$request->get('name').' ha sido registrada!');
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
        $category = Category::find($id);
        return view('categories.edit', compact('category'));
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
            'id'=>'exists:categories,id',
            'name'=>'required'            
        ];
        $customMessages = [
            'required' => 'El nombre es obligatorio.'            
        ];
        $validatedData = $request->validate($rules, $customMessages);
                
        $category = Category::find($id);
        $category->name =  $request->get('name');
        $category->save();
        
        return redirect('/categories')->with('success', 'La categoria '.$request->get('name').' ha sido actualizada!');
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
            $category = Category::find($id);
            $name = $category->name;
            $category->delete();
        
        }catch (\Illuminate\Database\QueryException $e){
            return redirect('/categories')->with('failed', 'La categoria '.$name.' no ha sido eliminada, puede ser que exista alguna ofrenda con esta categoria.');
        }

        return redirect('/categories')->with('success', 'La categoria '.$name.' ha sido eliminada!');
    }
}
