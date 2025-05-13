<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Blog;
use App\Models\Photo;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SiteController extends Controller
{
    //
    public function index(){
        $categories = Category::select('id','image')->get();
        $random_categories = Category::inRandomOrder()->select('id','title')->take(10)->get();
        // return $random_categories;
        $photos = Photo::latest()->paginate(15);
        return view ('frontend.index',compact('categories','photos','random_categories'));
    }

    public function blog(){
        $categories = Category::select('id','title')->inRandomOrder()->take(10)->get();
        $blogs = Blog::inRandomOrder()->paginate(6);
        $recent_blogs = Blog::latest()->take(10)->get();
        return view ('frontend.blog.index',compact('blogs','categories','recent_blogs'));
    }

    public function blogDetails(string $id){
        $blog = Blog::find($id);
        return view ('frontend.blog.details',compact('blog'));
    }
}
