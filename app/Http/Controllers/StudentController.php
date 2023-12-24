<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return Inertia::render('Student/index',['students'=>$students]);
    }

    public function create()
    {
        return Inertia::render('Student/create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        Student::create([
            "first_name"=>$request->first_name,
            "last_name"=>$request->last_name,
            "email"=>$request->email,
            "password"=>$request->password,
        ]);

        return to_route('dashboard');
    }

    public function destroy($id)
    {
        Student::where('id',$id)->delete();
    }

    public function edit($id)
    {
        $studenteditRecord = Student::where('id',$id)->first();
        return Inertia::render('Student/edit',['studenteditRecord'=>$studenteditRecord]);
    }

    public function update(Request $request ,$id)
    {
        Student::where('id',$request->id)->update([
           'first_name'=>$request->first_name,
          'last_name'=>$request->last_name,
        ]);
        return to_route('student');
    }
}
