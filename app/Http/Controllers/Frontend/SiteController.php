<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    //
    public function index(){
        return view ('frontend.index');
    }

    public function blog(){
        return view ('frontend.blog.index');
    }

    public function blogDetails(){
        return view ('frontend.blog.details');
    }
}
