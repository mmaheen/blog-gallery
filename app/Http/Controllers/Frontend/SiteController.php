<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SiteController extends Controller
{
    //
    public function index(){
        $categories = Category::select('image','id')->get();
        return view ('frontend.index',compact('categories'));
    }

    public function blog(){
        return view ('frontend.blog.index');
    }

    public function blogDetails(){
        return view ('frontend.blog.details');
    }
}
