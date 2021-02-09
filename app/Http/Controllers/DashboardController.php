<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {   
        $posts = Post::orderBy('created_at', 'DESC')->take(20)->get();
        $postCount = Post::all()->count();
        $categoryCount = Category::all()->count();
        $tagCount = Tag::all()->count();
        $userCount = User::all()->count();
        return view ('admin.dashboard.index', compact(['posts', 'postCount', 'categoryCount', 'tagCount', 'userCount']));
    }
    
}
