<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HelloController extends Controller
{
    public function ContactMethod(){

    	return view('pages.contact');
    }
    public function AboutMethod(){

    	return view('pages.about');
    }

    public function IndexMethod(){

    	$post = DB::table('posts')->join('categories', 'posts.category_id', 'categories.id')->select('posts.*', 'categories.name', 'categories.slug')->paginate(3);


    	return view('pages.index', compact('post'));
    }


}
