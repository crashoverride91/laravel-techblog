<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'DESC')->paginate(20);
        return view('admin.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.post.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $this->validate($request,[
            'title' => 'required|unique:posts,title',
            'image' => 'required|image',
            'description' => 'required',
            'category' =>'required', 
        ]); 

        /*  dd($request->all()); */
 
        $post = Post::create([
            'title' => $request->title,
            'slug' =>  Str::slug($request->title),
            'image' => 'image.jpg',
            'description'=> $request->description,
            'category_id'=> $request->category,
            'user_id' => auth()->user()->id,
            'published' => Carbon::now(), 
        ]); 

        if($request->has('image')){

        $image = $request->image;
        $image_new_name = time() . '.' . $image->getClientOriginalName();
        $image->move('storage/post/', $image_new_name);
        $post->image = '/storage/post/' . $image_new_name;
        $post->save();

        }
        
        Session::flash('success', 'Post created successfully');
    
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('admin.post.edit', compact(['post', 'categories']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //dd($request->all());

        $this->validate($request,[
            'title' => "required|unique:posts,title, $post->id",
            'description' => 'required',
            'category' =>'required', 
        ]); 
       
         $post->title = $request->title;
         $post->slug = Str::slug($request->title);
         $post->description = $request->description;
         $post->category_id = $request->category;
     
         
    
        if($request->hasFile('image')){

        $image = $request->image;
        $image_new_name = time() . '.' . $image->getClientOriginalName();
        $image->move('storage/post/', $image_new_name);
        $post->image = '/storage/post/' . $image_new_name;
        $post->save();

        }
        
        Session::flash('success', 'Post updated successfully');
    
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if($post){
            if(file_exists(public_path($post->image))){
         
            unlink(public_path($post->image));
            }
            
            $post->delete();
            Session::flash('post deleted with successfully');
        }

        return redirect()->back();
    }
}
