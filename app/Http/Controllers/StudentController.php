<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\City;
use Illuminate\Http\Request;
use PHPUnit\Framework\MockObject\Builder\Stub;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();
        return view('student.index', ['students' => $students]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() 
    {
        $cities = City::all();
        return view('student.create', ['cities' => $cities]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:191',
            'address' => 'required|string|max:191',
            'phone' => 'required|string|max:191',
            'email' => 'required|email|max:191',
            'dob' => 'required|date|before:today',
            'city_id' => 'required'
        ]);

        $student = Student::create([
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
            'dob' => $request->dob,
            'city_id' => $request->city_id
        ]);

        return redirect()->route('student.show', $student->id)->with('success', 'L\'étudiant a été créé.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        return view('student.show', ['student' => $student]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        $cities = City::all();
        return view('student.edit', ['student' => $student, 'cities' => $cities]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name' => 'required|string|max:191',
            'address' => 'required|string|max:191',
            'phone' => 'required|string|max:191',
            'email' => 'required|email|max:191',
            'dob' => 'required|date|before:today',
            'city_id' => 'required'
        ]);

        $student->update([
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
            'dob' => $request->dob,
            'city_id' => $request->city_id
        ]);

        return redirect()->route('student.show', $student->id)->with('success', 'Les informations de l\'étudiant ont été modifiés.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
    }
}
