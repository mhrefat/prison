<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
   

    public function registrationForm()
    {

       return view('login.registration');
    } 

    public function processRegistration(Request $request)
    {
        
        {
            $request->validate([
                'name'=>'required',
                'username'=>'required',
                'nid'=>'required|min:10|unique:jailors',
                'age'=>'required',  
                'address'=>'required',  
                'gender'=>'required',
                'email'=>'required|email',
                'password'=>'required',
                
            ]);
            $file_name='';
            if($request->has('image')) 
            {
                $avatar = $request->file('image');
                $file_name = date('Ymdhms').'.' . $avatar->getClientOriginalExtension();
                
                $avatar->storeAs('user', $file_name);
            }
        
        $users = new User();
        $users->name =$request->name;
        $users->username =$request->username;
        $users->nid =$request->nid;
        $users->age =$request->age;
        $users->address =$request->address;
        $users->gender =$request->gender;
        $users->email =$request->email;
        $users->password =bcrypt($request->password);
        $users->image=$file_name;
        $users->save();

        return redirect(route('login.form'))->with('message','Registration Done Successfully.');
            } 
    }


    public function showForm()
    {
        return view('login.form');
    }

    public function processLogin(Request $request)
    {
        
        $request->validate([
            'email'=>'required|email',
            'password'=>'required',
        ]);
      
        $credentials = $request->except('_token');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
           // return redirect()->intended('/admin')->with('message','Login Success!');
            return redirect()->route('dashboard')->with('message','Login Success!');
        }
        else
        {
            return redirect()->back()->withErrors('Invalid Credentials');
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.form')->with('message','Logout Success!');
    }

    public function viewUser($id)
    {
        return view('login.view',
             [
               'user'=> User::findorFail($id)
             ]); 
    }


    // admin login
    public function login()
    {
        return view('admin.login');
    }

    public function process(Request $request)
    {
       $login = $request->only('email','password');
       if (Auth::attempt($login)) {
           $request->session()->regenerate();
           return redirect()->route('dashboard')->with('message','Login Success!!');
       }
       else
       {
           return redirect()->back()->withErrors('Invalid Credentials');
       }
    }
   
}
