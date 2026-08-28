@extends('layouts.app')

@section('title', 'Student Profile')

@section('content')
    <div class="bg-white rounded-xl shadow p-8">
        @if (session('success'))
            <div class="mb-6 rounded-lg bg-green-100 border border-green-300 text-green-800 px-4 py-3">
                {{ session('success') }}
            </div>
        @endif

        <div class="flex flex-col sm:flex-row gap-6 items-start">
            <img src="{{ asset('storage/' . $student->profile_picture) }}"
                 alt="{{ $student->full_name }}"
                 class="w-32 h-32 rounded-full object-cover border-4 border-indigo-100 shadow">

            <div class="flex-1">
                <h1 class="text-2xl font-bold text-slate-800">{{ $student->full_name }}</h1>
                <p class="text-slate-500 mb-4">{{ $student->student_id }} &middot; {{ $student->program }}</p>

                <dl class="grid grid-cols-1 sm:grid-cols-2 gap-x-6 gap-y-3 text-sm">
                    <div>
                        <dt class="text-slate-400">Email</dt>
                        <dd class="text-slate-800">{{ $student->email }}</dd>
                    </div>
                    <div>
                        <dt class="text-slate-400">Mobile Number</dt>
                        <dd class="text-slate-800">{{ $student->mobile_number }}</dd>
                    </div>
                    <div>
                        <dt class="text-slate-400">Date of Birth</dt>
                        <dd class="text-slate-800">{{ $student->date_of_birth->format('F d, Y') }}</dd>
                    </div>
                    <div>
                        <dt class="text-slate-400">Gender</dt>
                        <dd class="text-slate-800">{{ $student->gender }}</dd>
                    </div>
                    <div>
                        <dt class="text-slate-400">Year Level</dt>
                        <dd class="text-slate-800">{{ $student->year_level }}</dd>
                    </div>
                    <div class="sm:col-span-2">
                        <dt class="text-slate-400">Address</dt>
                        <dd class="text-slate-800">{{ $student->address }}</dd>
                    </div>
                </dl>
            </div>
        </div>

        <a href="{{ route('students.create') }}"
           class="inline-block mt-6 text-indigo-600 hover:underline text-sm">
            &larr; Register another student
        </a>
    </div>
@endsection