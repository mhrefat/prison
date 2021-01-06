<?php

namespace App\Http\Controllers;
use App\Models\Cell;
use App\Models\Category;

use Illuminate\Http\Request;

class CellController extends Controller
{
  public function showForm()
  { 

    $categories=Category::all();
   
    return view('cell.form',compact('categories'));
  }
  

  public function processList(Request $request)
    {
        
        
       
            $request->validate([
                'cell_name'=>'required',
                'status'=>'required',  
                
                
            ]);
       
        $cells = new Cell();
        $cells->cell_name =$request->cell_name;
        $cells->status =$request->status;
        $cells->category_id=$request->category;
       
        $cells->save();

        return redirect()->back()->with('message','Cell Created Successfully.');
            
    }
    public function showList()
    {
      $list=Cell::paginate(5);

        return view('cell.list',compact('list'));
    }

    //edit
    
 
}
