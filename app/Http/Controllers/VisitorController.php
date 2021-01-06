<?php

namespace App\Http\Controllers;
use App\Models\Visitor;

use Illuminate\Http\Request;

class VisitorController extends Controller
{
    public function showForm()
    {
        return view('visitor.form');
    }
    public function processList(Request $request)
    {
        
        $request->validate(
         [
             'visitor_name'=>'required',
             'nid'=>'required|unique:visitors|size:10',
             'relation'=>'required',
             'mobile'=>'required|min:10',
             'address'=>'required',
             'time'=>'required',
             'date'=>'required',
             'gender'=>'required',
             'purpose'=>'required',

         ]
        );
        
        $visitors = new Visitor();
        $visitors->visitor_name = $request->visitor_name;
        $visitors->nid = $request->nid;
        $visitors->relation = $request->relation;
        $visitors->mobile = $request->mobile;
        $visitors->address = $request->address;
        $visitors->time = $request->time;
        $visitors->date = $request->date;
        $visitors->gender = $request->gender;
        $visitors->purpose = $request->purpose;
        $visitors->save();

        return redirect()->back()->with('message','Visitor Added Successfully');

    }
    public function showList()
        {
            $list=Visitor::paginate(5);

            return view('visitor.list',compact('list'));
        }

    //edit delete view



    public function deleteVisitor($id)
        {
            Visitor::find($id)->delete();
            return redirect()->back()->with('message','Visitor Deleted Successfully');
        }

        public function editVisitor($id)
        {
                $visitor = Visitor::find($id);
        
        
                return view('visitor.update',compact('visitor'));
        }
        public function updateVisitor(Request $request,$id)
        {
            {
                $request->validate([
                    'visitor_name'=>'required',
                    'nid'=>'required|min:10|unique:visitors',
                    'relation'=>'required',
                    'mobile'=>'required|min:10',
                    'address'=>'required',
                    'time'=>'required',
                    'date'=>'required',
                    'gender'=>'required',
                    'purpose'=>'required',
                ]);
            
            $visitors =  Visitor::find($id);
            $visitors->visitor_name = $request->visitor_name;
            $visitors->nid = $request->nid;
            $visitors->relation = $request->relation;
            $visitors->mobile = $request->mobile;
            $visitors->address = $request->address;
            $visitors->time = $request->time;
            $visitors->date = $request->date;
            $visitors->gender = $request->gender;
            $visitors->purpose = $request->purpose;
            $visitors->save();
    
            return redirect(route('visitor.list'))->with('message','Visitor Updated Successfully.');
                }  
        }
        //view
        public function viewVisitor($id)
          {
             return view('visitor.view',
             [
               'visitor'=> Visitor::findorFail($id)
             ]);  
          }    
}

