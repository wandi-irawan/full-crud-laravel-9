<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Models\Student;

class StudentController extends Controller
{
    public function index()
    {
        return view('student.index', [
            'student'       => Student::latest()->get()
        ]);
    }

    // insert
    public function store(StudentRequest $request)
    {
        // validasi studentrequest
        $request->validate();

        Student::create($request->all());
        return back()->with('success', 'Student ' . $request->name . ' has been created');
    }

    // detail
    public function show($id)
    {
        return view('student.show', [
            // 'student'   =>  Student::where('id', $id)->firs(), 1. cara
            'student'   =>  Student::whereId($id)->first()
        ]);
    }

    // hapus
    public function destroy($id)
    {
        Student::find($id)->delete();
        return back()->with('success', 'Student  has been deleted');
    }
    

    // update
    public function update(Student $student, StudentRequest $request)
    {
        $request->validate();

        Student::find($student->id)->update($request->all());
        return back()->with('success', 'Student ' . $request->name . ' has been updated');
    }
}
