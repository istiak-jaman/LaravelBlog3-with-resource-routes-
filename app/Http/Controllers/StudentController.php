<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student = Student::all();
        return view('student.all_students',compact('student'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
        'name' => 'required|max:25|min:3',
        'phone' => 'required|unique:students|max:20|min:11',
        'email' => 'required|unique:students',
        ]);

        //Insert with Eloquent ORM
        $student = new Student ;

        $student->name = $request->name;
        $student->email = $request->email;
        $student->phone = $request->phone;

        $student->save();
        if($student){
            $notification = array(
                'message'=>'Student Data Inserted Successfully.',
                'alert-type'=>'success'
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //DB::table('students')->where('id',$id)->first();
        $student = Student::findorfail($id);

        return view('student.view_student',compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::findorfail($id);

        
        return view('student.edit_student',compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $student = Student::findorfail($id);

        $student->name = $request->name;
        $student->email = $request->email;
        $student->phone = $request->phone;

        $student->save();

        $notification = array(
                'message'=>'Student Data Updated Successfully.',
                'alert-type'=>'success'
            );
            return Redirect()->to('/student')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //DB::table('students')->where('id',$id)->delete();

        $student = Student::findorfail($id);
        $student->delete();

        $notification = array(
                'message'=>'Student Data Deleted Successfully.',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
    }
}
