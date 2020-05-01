<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HeyController extends Controller
{
    

    public function AddCategoryMethod(){

    	return view('post.add_category');
    }

    public function StoreCategoryMethod(Request $request){

        //validation
        $validatedData = $request->validate([
        'name' => 'required|unique:categories|max:50|min:4',
        'slug' => 'required|unique:categories|max:50|min:4',
        ]);

    	$data = array();
    	$data['name'] = $request->name;
    	$data['slug'] = $request->slug;
    	$category = DB::table('categories')->insert($data);

    	if ($category) {
    		$notification = array(
			'message' => 'Category Added Successfully', 
			'alert-type' => 'success'
			);

		return Redirect()->route('all.category')->with($notification);
    		
    	}else{
    		$notification = array(
    			'message'=>'Something Went Wrong!',
    			'alert-type'=>'error'
    		);
    		return Redirect()->back()->with($notification);


    	}
    }


    public function AllCategoryMethod(){

        $category = DB::table('categories')->get();

        return view('post.all_category',compact('category'));
    }

    public function ViewCategoryMethod($id){

        $cat = DB::table('categories')->where('id',$id)->first();

       // return view('post.category_view')->with('cat',$category);
        return view('post.category_view',compact('cat'));
    }

    public function DeleteCategoryMethod($id){

        $delete = DB::table('categories')->where('id',$id)->delete();

        if ($delete) {
            $notification = array(
            'message' => 'Category Deleted Successfully', 
            'alert-type' => 'success'
            );

        return Redirect()->back()->with($notification);
            
        }else{
            $notification = array(
                'message'=>'Something Went Wrong!',
                'alert-type'=>'error'
            );
            return Redirect()->back()->with($notification);


        }

    }

    public function EditCategoryMethod($id){
        $edit = DB::table('categories')->where('id',$id)->first();
        return view('post.edit_category', compact('edit'));

    }

    public function UpdateCategoryMethod(Request    $request, $id){

        $validatedData = $request->validate([
        'name' => 'required|max:50|min:4',
        'slug' => 'required|max:50|min:4',
        ]);

        $data = array();
        $data['name'] = $request->name;
        $data['slug'] = $request->slug;
        $update = DB::table('categories')->where('id',$id)->update($data);

        if ($update) {
            $notification = array(
            'message' => 'Category Updated Successfully', 
            'alert-type' => 'success'
            );

        return Redirect()->route('all.category')->with($notification);
            
        }else{
            $notification = array(
                'message'=>'Nothing to Update!',
                'alert-type'=>'error'
            );
            return Redirect()->route('all.category')->with($notification);


        }

    }




}
