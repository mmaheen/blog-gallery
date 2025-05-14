<?php

namespace App\Http\Controllers\Frontend;

use Faker\Factory;
use App\Models\Blog;
use App\Models\User;
use App\Models\Photo;
use App\Models\Skill;
use App\Models\Category;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SiteController extends Controller
{
    //
    public function index(){
        $categories = Category::select('id','image')->get();
        $random_categories = Category::inRandomOrder()->select('id','title')->take(10)->get();
        $users = User::select('name','id','image','role')->inRandomOrder()->take(4)->get();
        $photos = Photo::latest()->paginate(15);
        $testimonials = Testimonial::inRandomOrder()->take(5)->get();
        $blogs = Blog::latest()->take(6)->get();
        $skills = Skill::all();
        $faker = Factory::create();
        return view ('frontend.index',compact('categories','photos','random_categories','users','testimonials','blogs','skills','faker'));
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

    public function photoDetails($id){
        // return $id;
        $photo = Photo::find($id);
        return view ('frontend.photo.details',compact('photo'));
    }
}
