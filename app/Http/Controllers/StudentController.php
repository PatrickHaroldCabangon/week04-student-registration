<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::latest()->get();

        return view('students.index', compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_id'      => 'required|string|max:20|unique:students,student_id',
            'first_name'      => 'required|string|max:100',
            'middle_name'     => 'nullable|string|max:100',
            'last_name'       => 'required|string|max:100',
            'email'           => 'required|email|unique:students,email',
            'mobile_number'   => 'required|numeric|digits_between:7,15',
            'date_of_birth'   => 'required|date|before:today',
            'gender'          => 'required|in:Male,Female,Other',
            'program'         => 'required|string|max:150',
            'year_level'      => 'required|string|max:50',
            'address'         => 'required|string|max:255',
            'profile_picture' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ], [
            'mobile_number.numeric'        => 'Mobile number must contain digits only.',
            'profile_picture.required'     => 'Please upload a profile picture.',
            'profile_picture.image'        => 'The uploaded file must be an image.',
            'profile_picture.mimes'        => 'Only JPG, JPEG, or PNG images are allowed.',
            'profile_picture.max'          => 'The image may not be larger than 2MB.',
        ]);

        $path = $request->file('profile_picture')->store('profile_pictures', 'public');
        $validated['profile_picture'] = $path;

        $student = Student::create($validated);

        return redirect()
            ->route('students.show', $student->id)
            ->with('success', 'Student registered successfully!');
    }

    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }
}