<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage; // Add this line

class Blogcontroller extends Controller
{
    function add(Request $request){
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048', 
        ]);
        
        $path=$request->file('file')->store('public','public');
        $imagarray=explode('/',$path);
        $image=$imagarray[1];
        $imge=new Blog();
        $imge->title=$request->title;
        $imge->content=$request->content;
        $imge->path=$image;
        $imge->user_id = Auth::id();
        $imge->save();
        return redirect('show');


    }
    function show (Request $request){
        $user=Blog::all();
        return view('show',['blog'=>$user]);

    }
    function delete($id){
     $user=Blog::destroy($id);
     return redirect('show');
    }
    function edit($id){
        $user=Blog::find($id);
        return view('edit',['blog'=>$user]);
    }
    function update(Request $request,$id){
     
      
        $blog = Blog::findOrFail($id);

    $blog->title = $request->title;
    $blog->content = $request->content;
 
    
   if ($request->hasFile('file')) 
   {
      
        if ($blog->path) {
            Storage::delete('public/' . $blog->path);
        }
        
        $filePath = $request->file('file')->store('public','public');
                $blog->path = basename($filePath);
                
            }
        if ($request->has('remove_image') && $request->remove_image == 1) {
                if ($blog->path) {
                    Storage::delete('public/' . $blog->path);
                    $blog->path = null;  
                }
                
        }

        $blog->save();

        return redirect('show');

    }
    public function detail($id){
        $detail = Blog::findOrFail($id);
        return view('detail', ['show' => $detail]); 
    }
    public function home()
{

    $blogs = Blog::latest()->take(3)->get(); 
    return view('welcome',['data' => $blogs]);
}
}
