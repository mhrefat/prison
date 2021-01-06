<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
   public function showForm()
   {
       return view('category.form');
   }

   public function processList(Request $request)
   {

   

       $request->validate([
           'name'=>'required|unique:categories',
           'capacity'=>'required',
           'description'=>'required',
       ]);

    
       

        $categories = new Category();
        $categories ->name =$request->name;
        $categories ->capacity =$request->capacity;
        $categories ->description =$request->description;
        $categories ->save();


       return redirect()->back()->with('msg','Category Created Successfully.');
   }

   public function showList()
   {
    $categories=Category::paginate(10);

    return view('category.list',compact('categories'));
   }


   //EDIT DELETE VIEW
    
   public function deleteCategory($id)
   {
        Category::find($id)->delete();
        return redirect()->back();
   }
   public function editCategory($id)
    {
            $category = Category::find($id);
    
    
            return view('category.update',compact('category'));
    }
   public function updateCategory(Request $request,$id)
   {
    $request->validate([
        'name'=>'required',
        'capacity'=>'required',
        'description'=>'required',
    ]);

     $categories =  Category::find($id);
     $categories ->name =$request->name;
     $categories ->capacity =$request->capacity;
     $categories ->description =$request->description;
     $categories ->save();


     return redirect(route('category.list'))->with('msg','Category Updated Successfully.');
   }


}
