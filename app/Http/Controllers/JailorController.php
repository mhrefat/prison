<?php

namespace App\Http\Controllers;
use App\Models\Jailor;
use Illuminate\Http\Request;

class JailorController extends Controller
{
    public function showForm()
    {
        return view('jailor.form');
    }

    public function processList(Request $request)
    {
        {
            $request->validate([
                'jailor_name'=>'required',
                'email'=>'required|email',
                'password'=>'required|min:8',
                'age'=>'required',  
                'gender'=>'required',
            ]);
        
        $jailors = new Jailor();
        $jailors->jailor_name =$request->jailor_name;
        $jailors->email =$request->email;
        $jailors->password =$request->password;
        $jailors->age =$request->age;
        $jailors->address =$request->address;
        $jailors->gender =$request->gender;
        $jailors->save();

        return redirect()->back()->with('message','Jailor Created Successfully.');
            } 
    }
    public function showList()
    {
        $list=Jailor::paginate(5);

        return view('jailor.list',compact('list'));
    }
    //DELETE UPDATE VIEW
    public function deleteJailor($id)
    {
        Jailor::find($id)->delete();
        return redirect()->back();
    }
    //edit
    public function editJailor($id)
    {
            $jailor = Jailor::find($id);
    
    
            return view('jailor.update',compact('jailor'));
    }
    public function updateJailor(Request $request,$id)
    {
        {
            $request->validate([
                'jailor_name'=>'required',
                'email'=>'required|email',
                'password'=>'required|min:8',
                'age'=>'required',  
                'gender'=>'required',
            ]);
        
        $jailors =  Jailor::find($id);
        $jailors->jailor_name =$request->jailor_name;
        $jailors->email =$request->email;
        $jailors->password =$request->password;
        $jailors->age =$request->age;
        $jailors->address =$request->address;
        $jailors->gender =$request->gender;
        $jailors->save();

        return redirect(route('jailor.list'))->with('message','Jailor Updated Successfully.');
            } 
    }
    public function viewJailor($id)
    {
        
        return view('jailor.view',
       [
           'jailor'=> Jailor::findorFail($id)
       ]);
           
    }

}
