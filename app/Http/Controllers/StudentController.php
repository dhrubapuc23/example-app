<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StudentRequest;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = DB::table('students')->select('student_name','email','gpa')->get();
        dd($students);
    }

    public function getcoursedetails()
    {
        $result = DB::table('students')
                ->join('courses', 'students.id', '=', 'courses.student_id')
                ->select('students.student_name','students.email', 'courses.course_title', 'courses.course_code')
                ->get();
        dd($result);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('student');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StudentRequest $request)
    {
        // $request->validate([
        //     'name' => 'required|min:3|max:50',
        //     'email' => 'required|email',
        //     'address' => 'required|min:10|max:100',
        //     'semester' => 'required|integer|min:1|max:8',
        //     'gpa' => 'required|min:2.0|max:4.0'
        // ],
        // [
        //     'name.required' => 'Name is required',
        //     'name.min' => 'Name must be at least 3 characters',
        //     'name.max' => 'Name must not exceed 50 characters',
        //     'email.required' => 'Email is required',
        //     'email.email' => 'Email must be a valid email address',
        //     'address.required' => 'Address is required',
        //     'address.min' => 'Address must be at least 10 characters',
        //     'address.max' => 'Address must not exceed 100 characters',
        //     'semester.required' => 'Semester is required',
        //     'semester.integer' => 'Semester must be an integer',
        //     'semester.min' => 'Semester must be at least 1',
        //     'semester.max' => 'Semester must not exceed 8',
        //     'gpa.required' => 'GPA is required',
        //     'gpa.min' => 'GPA must be at least 2.0',
        //     'gpa.max' => 'GPA must not exceed 4.0',
        // ]);
        DB::table('students')->insert([
            'student_name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'semester' => $request->semester,
            'gpa' => $request->gpa
        ]);
        //dd('form submitted');
       return redirect()->route('student.create')->with('success', 'Student created successfully');
    }

    public function getData()
    {
        $students = DB::table('students')->paginate(20);
        return view('show-students',['students'=>$students]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $student = DB::table('students')->find($id);
        return view('edit-student',['student'=>$student]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StudentRequest $request, string $id)
    {
        DB::table('students')->where('id',$id)->update([
            'student_name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'semester' => $request->semester,
            'gpa' => $request->gpa
        ]);
        return redirect()->route('student.show')->with('success', 'Student updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
