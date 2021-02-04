<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use App\Models\User;
use App\Models\Contact;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FrontEndController extends Controller
{
    public function home()
    {
        $posts = Post::with('category', 'user')->orderBy('created_at', 'DESC')->take(5)->get();
        $firstPosts2 = $posts->splice(0, 2);
        $middlePost = $posts->splice(0, 1);
        $lastPosts = $posts->splice(0);

        $footerPosts = Post::with('category', 'user')->inRandomOrder()->limit(4)->get();
        $firstFooterPost = $footerPosts->splice(0, 1);
        $firstfooterPosts2 = $footerPosts->splice(0, 2);
        $lastFooterPost = $footerPosts->splice(0, 1);
        
       
        
        
        $recentPosts = Post::with('category', 'user')->orderBy('created_at', 'DESC')->paginate(9);

        return view('website.home', compact(['posts', 'recentPosts', 'firstPosts2', 'middlePost', 
        'lastPosts', 'firstFooterPost', 'firstfooterPosts2', 'lastFooterPost']));
    }

    public function about()
    {
        $user = User::first();
        return view('website.about', compact('user'));
    }

    public function category($slug)
    {
        $category = Category::where('slug', $slug)->first();
 
        if($category){
            $posts = Post::where('category_id', $category->id)->paginate(6);

            return view('website.category', compact(['category', 'posts']));
        }else{
            return redirect()->route('website');
        }
       
    } 

    public function contact()
    {

        return view('website.contact');
    }

    public function post($slug)
    {
        $post = Post::with('category', 'user')->where('slug', $slug)->first();
        $posts = Post::with('category', 'user')->inRandomOrder()->limit(3)->get();

        //more related posts
        $relatedPosts= Post::orderBy('category_id','desc' )->inRandomOrder()->take(4)->get();
        $firstRelatedPost = $relatedPosts->splice(0, 1);
        $firstRelatedPosts2 = $relatedPosts->splice(0, 2);
        $lastRelatedPost = $relatedPosts->splice(0, 1);
       
        $categories = Category::all();

        $tags = Tag::all();

        if($post){

            return view('website.post', compact(['post', 'posts','categories', 'tags', 'firstRelatedPost', 'firstRelatedPosts2' ,'lastRelatedPost']));
        }else {

            return redirect('/');
        }
        

    }

    public function send_message(Request $request)
    {

        /* dd($request->all()); */

        $this->validate($request,[

            'name' => 'required|max:255',
            'email' => 'required|email|max:200',
            'subject'=>'required|max:255',
            'message'=>'required|min:100',
        ]);

        $contact = Contact::create($request->all());

        Session::flash('message-send', 'Contact Message send successfully');
        return redirect()->back();
    }
}
