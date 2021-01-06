<?php

namespace App\Http\Controllers;
use App\Models\P_Case;
use Illuminate\Http\Request;

class PCaseController extends Controller
{
    Public Function showForm()
    {
        return view('case.form');
    }

    Public Function processList(Request $request)
    {   
  
        $request->validate([
        'name'=>'required',
        'details'=>'required',
        'status'=>'required',
        ]);


        $cases = new P_Case;
        $cases->name = $request->name;
        $cases->details = $request->details;
        $cases->status = $request->status;
        $cases->save();
        return redirect()->back()->with('message','Prisoner Case Created Successfully.');
    }

    Public Function showList()
    {
        $list=P_Case::paginate(5);
        return view('case.list',compact('list'));
    }

}
