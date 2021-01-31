<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bill;
use App\Models\Detail;
use App\Models\Gift;
use App\Models\Customer;


class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bills = Bill::with('detail')->paginate(5);        
        return view('bills.index', compact('bills'));      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $gifts = Gift::all();  
        $customers = Customer::all();        
        return view('bills.create', compact('gifts','customers'));
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
            'date_expedition'=>'required|date',
            'customer_id'=>'required|integer|exists:customers,id',
            'description'=>'required',
            'price'=>'required|integer',
            'start_date'=>'required|date',
            'end_date'=>'required|date|after_or_equal:start_date',
            'gift_id' => 'required|integer|exists:gifts,id'
        ];                

        $customMessages = [
            'required' => 'Todos los campos deben estar llenos.',
            //'id.unique'=> 'ya existe un cliente resgistrado con este número de cedula.',
            //'name.required' => 'Cuidado!! el campo del nombre no se admite vacío',
        ];
        $validatedData = $request->validate($rules, $customMessages);
                  
        $bill_id = Bill::generate_id();
        
        $bill = new Bill([
            'id' => $bill_id,
            'date_expedition' => $request->get('date_expedition'),
            'customer_id' => $request->get('customer_id')
        ]);

        $detail = new Detail([            
            'description' => $request->get('description'),
            'price' => $request->get('price'),
            'start_date' => $request->get('start_date'),
            'end_date' => $request->get('end_date'),
            'bill_id' => $bill_id,
            'gift_id' => $request->get('gift_id')            
        ]);
        
        $bill->save();
        $detail->save();        
        
        return redirect('/bills')->with('success', 'Se ha registrado la factura con id '.$bill_id.' con exito!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {                
        $bill = Bill::with('detail')->find($id);        
        return view('bills.edit',compact('bill'));
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
            'id' => 'exists:bills,id',
            'date_expedition'=>'required|date',           
            'detail_id'=>'exists:details,id',
            'description'=>'required',
            'price'=>'required|integer',
            'start_date'=>'required|date',
            'end_date'=>'required|date|after_or_equal:start_date',                     
        ];                

        $customMessages = [
            'required' => 'Todos los campos deben estar llenos.'
            //'id.unique'=> 'ya existe un cliente resgistrado con este número de cedula.',
            //'name.required' => 'Cuidado!! el campo del nombre no se admite vacío',
        ];
        $validatedData = $request->validate($rules, $customMessages);
        
        $bill = Bill::find($id);
        $bill->date_expedition=$request->get('date_expedition');
        $bill->save();
        
        $detail = Detail::find($request->get('detail_id'));
        $detail->description=$request->get('description');
        $detail->price=$request->get('price');
        $detail->start_date=$request->get('start_date');
        $detail->end_date=$request->get('end_date');             
        $detail->save();        
        
        return redirect('/bills')->with('success', 'Se ha actualizado la factura con número '.$id.' con exito!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bill = Bill::find($id);
        $bill->delete();

        return redirect('/bills')->with('success', 'La factura de número '.$id.' ha sido eliminado!');
    }
}
