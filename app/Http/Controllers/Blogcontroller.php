<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage; 

class Blogcontroller extends Controller
{
    //STORING BLOG
    function add(Request $request){
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string|max:2555',
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

        //SHOW BLOG
        function show (Request $request){
            $user=Blog::all();
            return view('show',['blog'=>$user]);

        }
        //DELETE BLOG

        function delete($id){
        $user=Blog::destroy($id);
        return redirect('show');
        }
        //EDIT BLOG
                function edit($id){
                    $user=Blog::find($id);
                    return view('edit',['blog'=>$user]);
                }
                //UPDATE BLOG
      function update(Request $request,$id)
       {
        $request->validate([
                   
                    
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048', 
        ]);
                $blog = Blog::findOrFail($id);
                
          
            $blog->title = $request->title;
            $blog->content = $request->content;
            if ($request->hasFile('file')) 
            {
            if ($blog->path) 
                {
                    Storage::delete('public/' . $blog->path);
                }
                $filePath = $request->file('file')->store('public','public');
                        $blog->path = basename($filePath);
                        }
                        elseif ($request->hasFile('file')) {
                            // Handle file upload
                            if ($blog->path) {
                                Storage::delete('public/' . $blog->path); // Delete old image if exists
                            }
                            $filePath = $request->file('file')->store('public', 'public');
                            $blog->path = basename($filePath); // Save the new image path
                        }

                        $blog->save();
                        return redirect('show');
                }

                //DETAIL BLOG 
                public function detail($id)
                {
                    $detail = Blog::findOrFail($id);
                    return view('detail', ['show' => $detail]); 
                }

                //SHOW CURRENT THREE BLOG IN HOME PAGE
                public function home()
            {

                $blogs = Blog::latest()->take(5)->get(); 
                return view('welcome',['data' => $blogs]);
            }
      
                   
                              
           
    
 
          
  
}
