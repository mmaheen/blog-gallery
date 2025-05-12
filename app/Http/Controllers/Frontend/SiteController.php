<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Photo;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SiteController extends Controller
{
    //
    public function index(){
        $categories = Category::select('image','id')->get();
        $photos = Photo::all();
        return view ('frontend.index',compact('categories','photos'));
    }

    public function blog(){
        return view ('frontend.blog.index');
    }

    public function blogDetails(){
        return view ('frontend.blog.details');
    }
}
