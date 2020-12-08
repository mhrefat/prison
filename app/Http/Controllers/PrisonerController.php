<?php

namespace App\Http\Controllers;
use App\Models\Prisoner;
use Illuminate\Http\Request;

class PrisonerController extends Controller
{

    public function showForm()
        {
            return view('prisoner.form');
        }
        public function processList(Request $request)
        {
            {
                $request->validate([
                    'prisoner_name'=>'required',
                    'crime'=>'required',
                    'address'=>'required',
                    'punishment'=>'required',
                    'age'=>'required',  
                    'gender'=>'required',
                ]);
            
            $prisoners = new Prisoner();
            $prisoners->prisoner_name =$request->prisoner_name;
            $prisoners->crime =$request->crime;
            $prisoners->address =$request->address;
            $prisoners->punishment =$request->punishment;
            $prisoners->age =$request->age;
            $prisoners->gender =$request->gender;
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
                    'crime'=>'required',
                    'address'=>'required',
                    'punishment'=>'required',
                    'age'=>'required',  
                    'gender'=>'required',
                ]);
            
            $prisoners =  Prisoner::find($id);
            $prisoners->prisoner_name =$request->prisoner_name;
            $prisoners->crime =$request->crime;
            $prisoners->address =$request->address;
            $prisoners->punishment =$request->punishment;
            $prisoners->age =$request->age;
            $prisoners->gender =$request->gender;
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

