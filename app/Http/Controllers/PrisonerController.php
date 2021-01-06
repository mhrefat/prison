<?php

namespace App\Http\Controllers;
use App\Models\Prisoner;
use App\Models\P_Case;
use App\Models\Category;
use App\Models\Cell;
use Illuminate\Http\Request;

class PrisonerController extends Controller
{

    public function showForm()
        {
            $cases=P_Case::all();
            $cells=Cell::all();
            $categories=Category::all();
        
            
            return view('prisoner.form',compact('cases','cells','categories'));
        }
        public function processList(Request $request)
        {
            { 
               
              
                $request->validate([
                    'prisoner_name'=>'required',
                    'nid'=>'required|min:10|unique:prisoners',
                    'crime'=>'required',
                    'address'=>'required',
                    'punishment'=>'required',
                    'date_in'=>'required',
                    'age'=>'required',  
                    'gender'=>'required',
                    'status'=>'required',
                ]);
               
            $prisoners = new Prisoner();
            $prisoners->prisoner_name =$request->prisoner_name;
            $prisoners->nid =$request->nid;
            $prisoners->crime =$request->crime;
            $prisoners->crime_details =$request->crime_details;
            $prisoners->case_id =$request->case;
            $prisoners->category_id =$request->category;
            $prisoners->cell_id =$request->cell;
            $prisoners->address =$request->address;
            $prisoners->punishment =$request->punishment;
            $prisoners->date_in =$request->date_in;
            $prisoners->date_out =$request->date_out;
            $prisoners->age =$request->age;
            $prisoners->gender =$request->gender;
            $prisoners->status =$request->status;
            $prisoners->save();
    
            return redirect()->back()->with('message','Prisoner Created Successfully.');
                }  
        }
        public function showList()
        {
            $list=Prisoner::paginate(5);

            return view('prisoner.list',compact('list'));
        }

        //EDIT DELETE VIEW

        public function deletePrisoner($id)
        {
            Prisoner::find($id)->delete();
            return redirect()->back()->with('message','Prisoner Deleted Successfully');
        }

        public function editPrisoner($id)
        {
                $prisoner = Prisoner::find($id);
        
        
                return view('prisoner.update',compact('prisoner'));
        }
        public function updatePrisoner(Request $request,$id)
        {
            {
                
                $request->validate([
                    'prisoner_name'=>'required',
                    'nid'=>'required|min:10',
                    'crime'=>'required',
                    'address'=>'required',
                    'punishment'=>'required',
                    'age'=>'required',  
                    'gender'=>'required',
                    'status'=>'required',
                ]);
               
            $prisoners =  Prisoner::find($id);
            $prisoners->prisoner_name =$request->prisoner_name;
            $prisoners->nid =$request->nid;
            $prisoners->crime =$request->crime;
            $prisoners->crime_details =$request->crime_details;
           // $prisoners->case_id =$request->category;
           // $prisoners->cell_id =$request->cell;
            $prisoners->address =$request->address;
            $prisoners->punishment =$request->punishment;
            $prisoners->age =$request->age;
            $prisoners->gender =$request->gender;
            $prisoners->status =$request->status;
            $prisoners->save();
    
            return redirect(route('prisoner.list'))->with('message','Prisoner Updated Successfully.');
                }  
        }
        //view
        public function viewPrisoner($id)
          {
              
             return view('prisoner.view',
             [
               'prisoner'=> Prisoner::findorFail($id)
             ]); 
           
          }
}

