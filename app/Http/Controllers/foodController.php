<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\food;

class foodController extends Controller

  
{
  
    public function index()
    {
        $foods = food::all();
      return view ('Billing.Addnew.f_index')->with('foods', $foods);
    }
 
    
    public function create()
    {
        return view('Billing.Addnew.f_create');
    }
 
  
    public function store(Request $request)
    {
        $input = $request->all();
        food::create($input);
        return redirect('food')->with('flash_message', 'Item Addedd!');  
    }
 
    
   
 
    
    public function edit($id)
    {
        $food = food::find($id);
        return view('Billing.Addnew.f_edit')->with('foods', $food);
    }
 
  
    public function update(Request $request, $id)
    {
        $food = food::find($id);
        $input = $request->all();
        $food->update($input);
        return redirect('food')->with('flash_message', 'Item Updated!');  
    }
 
  
    public function destroy($id)
    {
        food::destroy($id);
        return redirect('food')->with('flash_message', 'Item deleted!');  
    }
}