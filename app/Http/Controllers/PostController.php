<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PostController extends Controller
{
    //
	public function WritePostMethod(){

		$category = DB::table('categories')->get();
    	return view('post.writepost', compact('category'));
    }

    public function StorePostMethod(Request $request){

    	//validation
        $validatedData = $request->validate([
        'title' => 'required|max:200',
        'details' => 'required|max:3000',
        'image' => 'required | mimes:jpeg,jpg,png | max:3000',
        ]);

        $data = array();
        $data['title']       = $request->title;
        $data['category_id'] = $request->category_id;
        $data['details']     = $request->details;
        $image               = $request->file('image');

        if ($image) {
        	
        	//image path ready
        	$image_name      = str_random(6);
        	$extension       = strtolower($image -> getClientOriginalExtension());  
        	$image_full_name = $image_name.'.'.$extension;
        	$upload_path	 = 'public/frontend/image/';
        	$image_url 		 = $upload_path.$image_full_name;
        	$success 		 = $image -> move($upload_path,$image_full_name);

        	$data['image']	 = $image_url;

        	DB::table('posts')->insert($data);

        	$notification = array(
			'message' => 'Post Inserted Successfully', 
			'alert-type' => 'success'
			);

		return Redirect()->route('all.post')->with($notification);




        }else{
    	DB::table('posts')->insert($data);

        	$notification = array(
			'message' => 'Post Inserted Successfully', 
			'alert-type' => 'success'
			);

		return Redirect()->route('all.post')->with($notification);
        }

    }

    public function AllPostMethod(){

    	//$post = DB::table('posts')->get();
    	$post = DB::table('posts')
    			->join('categories','posts.category_id','categories.id')
    			->select('posts.*','categories.name')
    			->get()
    			;
    	return view('post.allpost',compact('post'));

    }



    public function ViewPostMethod($id){
    	$post = DB::table('posts')
    			->join('categories','posts.category_id','categories.id')
    			->select('posts.*','categories.name')
    			->where('posts.id',$id)
    			->first()
    			;
    	return view('post.viewpost', compact('post'));
    }


    public function DeletePostMethod($id){

    	$post = DB::table('posts')->where('id',$id)->first();

    	$image = $post->image;
    	$delete = DB::table('posts')->where('id',$id)->delete();
    	if($delete){
    		unlink($image);

    		$notification = array(
			'message' => 'Post Deleted Successfully', 
			'alert-type' => 'success'
			);
    		return Redirect()->back()->with($notification);
    	}else{
    		$notification = array(
			'message' => 'Something went wrong!', 
			'alert-type' => 'error'
			);
    		return Redirect()->back()->with($notification);

    	}

    }


    public function EditPostMethod($id){

    	$category = DB::table('categories')->get();
    	$post = DB::table('posts')->where('id',$id)->first();

    	return view('post.editpost',compact('category','post'));

    }

    public function UpdatePostMethod(Request $request,$id){

    	//validation
        $validatedData = $request->validate([
        'title' => 'required|max:200',
        'details' => 'required|max:3000',
        'image' => ' mimes:jpeg,jpg,png | max:3000',
        ]);

        $data = array();
        $data['title']       = $request->title;
        $data['category_id'] = $request->category_id;
        $data['details']     = $request->details;
        $image               = $request->file('image');

        if ($image) {
        	
        	//image path ready
        	$image_name      = str_random(6);
        	$extension       = strtolower($image -> getClientOriginalExtension());  
        	$image_full_name = $image_name.'.'.$extension;
        	$upload_path	 = 'public/frontend/image/';
        	$image_url 		 = $upload_path.$image_full_name;
        	$success 		 = $image -> move($upload_path,$image_full_name);

        	$data['image']	 = $image_url;
        	unlink($request->old_photo);

        	DB::table('posts')->where('id',$id)->update($data);

        	$notification = array(
			'message' => 'Post Updated Successfully', 
			'alert-type' => 'success'
			);

		return Redirect()->route('all.post')->with($notification);
        }else{

        	$data['image'] = $request->old_photo;
    		DB::table('posts')->where('id',$id)->update($data);

        	$notification = array(
			'message' => 'Post Updated Successfully', 
			'alert-type' => 'success'
			);

		return Redirect()->route('all.post')->with($notification);
        }

    }






}
