<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\City;
use Illuminate\Http\Request;
use PHPUnit\Framework\MockObject\Builder\Stub;

class StudentController extends Controller
{
    /**
     * Afficher la liste des étudiants.
     */
    public function index()
    {
        $students = Student::all();
        return view('student.index', ['students' => $students]);
    }

    /**
     * Afficher le formulaire pour créer un nouvel étudiant.
     */
    public function create() 
    {
        $cities = City::all();
        return view('student.create', ['cities' => $cities]);
    }

    /**
     * Créer un nouvel étudiant dans la base de données et valider les données du formulaire.
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
     * Afficher l'étudiant spécifié.
     */
    public function show(Student $student)
    {
        return view('student.show', ['student' => $student]);
    }

    /**
     * Afficher le formulaire pour modifier l'étudiant spécifié.
     */
    public function edit(Student $student)
    {
        $cities = City::all();
        return view('student.edit', ['student' => $student, 'cities' => $cities]);
    }

    /**
     * Modifier l'étudiant spécifié dans la base de données et valider les données du formulaire.
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
     * Supprimer l'étudiant spécifié de la base de données.
     */
    public function destroy(Student $student)
    {
        $id = $student->id;
        $student->delete();
        return redirect()->route('student.index')->with('success', 'L\'étudiant a été supprimé.');
    }
}
