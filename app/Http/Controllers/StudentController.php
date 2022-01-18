<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function home()
    {
        return view('student');
    }

    public function uploadimage(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'department' => 'required',
            

        ]);
        $student = new Student();
        $student->name = $request->name;
        $student->email = $request->email;
        $student->department = $request->department;
        $student->save();
        if ($request->image) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $name = time() . '-' . $student->id . '.' . $ext;
            $path = "images/books";
            $file->move($path, $name);
            $student->image = $name;
            $student->save();
        }



        return response()->json($student);
    }

   
}

