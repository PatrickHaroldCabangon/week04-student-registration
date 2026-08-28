@extends('layouts.app')

@section('title', 'Register Student')

@section('content')
    <div>
        <p class="text-[11px] tracking-[0.2em] uppercase font-mono-lspu" style="color: var(--lspu-blue);">Form No. 001-A</p>
        <h2 class="font-display text-2xl font-semibold text-slate-800 mt-1">Student Registration Form</h2>
        <p class="text-slate-500 text-sm mt-1">Please fill in all required fields accurately. Fields marked are required for enrollment.</p>
    </div>

    @if (session('success'))
        <div class="mt-6 rounded-xl bg-green-50 border border-green-300 text-green-800 px-4 py-3 text-sm">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="mt-6 rounded-xl bg-red-50 border border-red-300 text-red-800 px-4 py-3">
            <p class="font-semibold mb-1 text-sm">Please fix the following errors:</p>
            <ul class="list-disc list-inside text-sm space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data" class="mt-8 space-y-10">
        @csrf

        {{-- SECTION I: PERSONAL INFORMATION --}}
        <div>
            <div class="flex items-center gap-3 mb-4">
                <span class="font-mono-lspu text-xs font-semibold px-2 py-0.5 rounded" style="background: var(--lspu-blue); color: white;">I</span>
                <h3 class="font-display text-base font-semibold text-slate-700">Personal Information</h3>
                <div class="flex-1 h-px bg-slate-200"></div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                <div>
                    <label class="block text-xs font-medium text-slate-500 uppercase tracking-wide mb-1.5">Student ID</label>
                    <input type="text" name="student_id" value="{{ old('student_id') }}"
                           class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm focus:ring-2 focus:outline-none"
                           style="--tw-ring-color: var(--lspu-blue);">
                </div>
                <div>
                    <label class="block text-xs font-medium text-slate-500 uppercase tracking-wide mb-1.5">Date of Birth</label>
                    <input type="date" name="date_of_birth" value="{{ old('date_of_birth') }}"
                           class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm focus:ring-2 focus:outline-none"
                           style="--tw-ring-color: var(--lspu-blue);">
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-5 mt-5">
                <div>
                    <label class="block text-xs font-medium text-slate-500 uppercase tracking-wide mb-1.5">First Name</label>
                    <input type="text" name="first_name" value="{{ old('first_name') }}"
                           class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm focus:ring-2 focus:outline-none"
                           style="--tw-ring-color: var(--lspu-blue);">
                </div>
                <div>
                    <label class="block text-xs font-medium text-slate-500 uppercase tracking-wide mb-1.5">Middle Name</label>
                    <input type="text" name="middle_name" value="{{ old('middle_name') }}"
                           class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm focus:ring-2 focus:outline-none"
                           style="--tw-ring-color: var(--lspu-blue);">
                </div>
                <div>
                    <label class="block text-xs font-medium text-slate-500 uppercase tracking-wide mb-1.5">Last Name</label>
                    <input type="text" name="last_name" value="{{ old('last_name') }}"
                           class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm focus:ring-2 focus:outline-none"
                           style="--tw-ring-color: var(--lspu-blue);">
                </div>
            </div>

            <div class="mt-5 max-w-xs">
                <label class="block text-xs font-medium text-slate-500 uppercase tracking-wide mb-1.5">Gender</label>
                <select name="gender" class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm focus:ring-2 focus:outline-none" style="--tw-ring-color: var(--lspu-blue);">
                    <option value="">Select</option>
                    <option value="Male" @selected(old('gender') == 'Male')>Male</option>
                    <option value="Female" @selected(old('gender') == 'Female')>Female</option>
                    <option value="Other" @selected(old('gender') == 'Other')>Other</option>
                </select>
            </div>
        </div>

        {{-- SECTION II: CONTACT INFORMATION --}}
        <div>
            <div class="flex items-center gap-3 mb-4">
                <span class="font-mono-lspu text-xs font-semibold px-2 py-0.5 rounded" style="background: var(--lspu-blue); color: white;">II</span>
                <h3 class="font-display text-base font-semibold text-slate-700">Contact Information</h3>
                <div class="flex-1 h-px bg-slate-200"></div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                <div>
                    <label class="block text-xs font-medium text-slate-500 uppercase tracking-wide mb-1.5">Email Address</label>
                    <input type="email" name="email" value="{{ old('email') }}"
                           class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm focus:ring-2 focus:outline-none"
                           style="--tw-ring-color: var(--lspu-blue);">
                </div>
                <div>
                    <label class="block text-xs font-medium text-slate-500 uppercase tracking-wide mb-1.5">Mobile Number</label>
                    <input type="text" name="mobile_number" value="{{ old('mobile_number') }}"
                           class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm focus:ring-2 focus:outline-none"
                           style="--tw-ring-color: var(--lspu-blue);">
                </div>
            </div>

            <div class="mt-5">
                <label class="block text-xs font-medium text-slate-500 uppercase tracking-wide mb-1.5">Address</label>
                <textarea name="address" rows="3"
                          class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm focus:ring-2 focus:outline-none"
                          style="--tw-ring-color: var(--lspu-blue);">{{ old('address') }}</textarea>
            </div>
        </div>

        {{-- SECTION III: ACADEMIC INFORMATION --}}
        <div>
            <div class="flex items-center gap-3 mb-4">
                <span class="font-mono-lspu text-xs font-semibold px-2 py-0.5 rounded" style="background: var(--lspu-blue); color: white;">III</span>
                <h3 class="font-display text-base font-semibold text-slate-700">Academic Information</h3>
                <div class="flex-1 h-px bg-slate-200"></div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                <div>
                    <label class="block text-xs font-medium text-slate-500 uppercase tracking-wide mb-1.5">Program</label>
                    <input type="text" name="program" value="{{ old('program') }}" placeholder="e.g. BS Information Technology"
                           class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm focus:ring-2 focus:outline-none"
                           style="--tw-ring-color: var(--lspu-blue);">
                </div>
                <div>
                    <label class="block text-xs font-medium text-slate-500 uppercase tracking-wide mb-1.5">Year Level</label>
                    <select name="year_level" class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm focus:ring-2 focus:outline-none" style="--tw-ring-color: var(--lspu-blue);">
                        <option value="">Select</option>
                        <option value="1st Year" @selected(old('year_level') == '1st Year')>1st Year</option>
                        <option value="2nd Year" @selected(old('year_level') == '2nd Year')>2nd Year</option>
                        <option value="3rd Year" @selected(old('year_level') == '3rd Year')>3rd Year</option>
                        <option value="4th Year" @selected(old('year_level') == '4th Year')>4th Year</option>
                    </select>
                </div>
            </div>
        </div>

        {{-- SECTION IV: PROFILE PHOTO --}}
        <div>
            <div class="flex items-center gap-3 mb-4">
                <span class="font-mono-lspu text-xs font-semibold px-2 py-0.5 rounded" style="background: var(--lspu-blue); color: white;">IV</span>
                <h3 class="font-display text-base font-semibold text-slate-700">Profile Photo</h3>
                <div class="flex-1 h-px bg-slate-200"></div>
            </div>

            <label class="block text-xs font-medium text-slate-500 uppercase tracking-wide mb-1.5">Upload 2x2 ID Picture</label>
            <input type="file" name="profile_picture" accept="image/png, image/jpeg"
                   class="w-full text-sm text-slate-600 border border-slate-300 rounded-lg px-3 py-2 file:mr-4 file:py-1.5 file:px-3 file:rounded-md file:border-0 file:text-white file:text-xs file:font-medium"
                   style="--file-bg: var(--lspu-blue);">
            <style>
                input[type="file"]::file-selector-button { background: var(--lspu-blue); }
            </style>
            <p class="text-xs text-slate-400 mt-1.5">JPG or PNG only, max 2MB.</p>
        </div>

        <button type="submit"
                class="w-full sm:w-auto px-8 py-2.5 rounded-lg text-white font-medium text-sm tracking-wide"
                style="background: var(--lspu-blue-deep);">
            Submit Registration
        </button>
    </form>
@endsection