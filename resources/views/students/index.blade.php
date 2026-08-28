@extends('layouts.app')

@section('title', 'Registered Students')

@section('content')
    <div class="bg-white rounded-xl shadow p-8">
        <h1 class="text-2xl font-bold text-slate-800 mb-6">Registered Students</h1>

        @if ($students->isEmpty())
            <p class="text-slate-500">No students registered yet.</p>
        @else
            <div class="divide-y divide-slate-100">
                @foreach ($students as $student)
                    <a href="{{ route('students.show', $student->id) }}"
                       class="flex items-center gap-4 py-4 hover:bg-slate-50 -mx-2 px-2 rounded-lg transition">
                        <img src="{{ asset('storage/' . $student->profile_picture) }}"
                             alt="{{ $student->full_name }}"
                             class="w-12 h-12 rounded-full object-cover border border-slate-200">
                        <div>
                            <p class="font-medium text-slate-800">{{ $student->full_name }}</p>
                            <p class="text-sm text-slate-500">{{ $student->student_id }} &middot; {{ $student->program }}</p>
                        </div>
                    </a>
                @endforeach
            </div>
        @endif
    </div>
@endsection