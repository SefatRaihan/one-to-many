<?php

namespace App\Http\Controllers;


use App\Models\Students;
use App\Models\Profiles;
use App\Models\Contacts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\File;
use Symfony\Component\HttpKernel\Profiler\Profile;


class StudentsController extends Controller
{
    public function index(){
        $student_datas = Students::all();
        // @dd($student_datas);
        return view('student.index', compact('student_datas'));
    }

    public function create(){
        return view('student.create');
    }

    public function store(Request $request){
        $request->validate([
            'student_name' => 'required',
            'class' => 'required',
            'father_name' => 'required',
            'mother_name' => 'required',
            'mobile' => 'required',
            'email' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $student_data = Students::create($request->all());


        if ($image = $request->file('image')) {
            $destinationPath = 'images/upload/';
            $profileImage = $destinationPath.date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
        }else{
            unset($profileImage);
        }
       
        $student_data->profiles()->create([
            'image' =>$profileImage,
            'father_name' => $request->father_name,
            'mother_name'=> $request->mother_name
        ]);
        
        $student_data->contacts()->create([
            'mobile' =>$request->mobile,
            'email' =>$request->email
        ]);
        return Redirect()->route('student-index')->with('success', "Student profile uploaded successfully");

    }

    public function edit($student_id){
        $student = Students::findOrFail($student_id);
        return view('student.edit', compact('student'));
        
    }
    
    public function update(Request $request, $id){

        $request->validate([
            'student_name' => 'required',
            'class' => 'required',
            'father_name' => 'required',
            'mother_name' => 'required',
            'mobile' => 'required',
            'email' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        Students::findOrFail($id)->update([
            'student_name' =>$request->student_name,
            'class' =>$request->class,
        ]);

        if ($image = $request->file('image')) {
            
            $destination = Profiles::find($id);
    
            if (File::exists($destination->image)) 
            {
                File::delete($destination->image);
            };
            
            $destinationPath = 'images/upload/';
            $profileImage = $destinationPath.date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);

            Profiles::findOrFail($id)->update([
                'image' => $profileImage,
                'father_name' => $request->father_name,
                'mother_name'=> $request->mother_name
            ]);  
        }else{
            Profiles::findOrFail($id)->update([
                'father_name' => $request->father_name,
                'mother_name'=> $request->mother_name
            ]);  
        }
        
      
        Contacts::findOrFail($id)->update([
            'mobile' =>$request->mobile,
            'email' =>$request->email
        ]);
        return Redirect()->route('student-index')->with('success', "Student profile updated successfully");
    }



    public function delete($student_id){
        $student_data = Students::findOrFail($student_id);
        $student_data->delete();
        return Redirect()->route('student-index')->with('delete-msg', 'Student data has been successfully deleted');
    }

    public function show($student_id){
        $student = Students::findOrFail($student_id);
        return view('student.show', compact('student'));
    }

}
