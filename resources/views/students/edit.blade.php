@extends('layouts.app')
@extends('layouts.navbar')

@section('content')
    <div class="w-4/12 bg-white p-6 rounded-lg">

        @if (session('status'))

            <div class="mb-4 text-center w-full font-semibold text-sm">

                @switch(session('status'))

                    @case('success')

                        <div class="text-green-500">
                            {{ session('message') }}
                        </div>

                        @break
                    @case('failure')

                        <div class="text-red-500">
                            {{ session('message') }}
                        </div>

                        @break
                    @default

                        <div>
                            {{ session('message') }}
                        </div>

                @endswitch

            </div>

        @endif

        <div class="flex justify-between">
            <h2 class="text-lg font-semibold leading-7 text-gray-600 sm:text-xl sm:truncate">
                Edit Student - <span class="text-blue-400">{{ $student->first_name }} {{ $student->father_name }} {{ $student->last_name }} #{{ $student->student_code }}</span>
            </h2>
        </div>

        <hr class="my-2">

        <form action="{{ route('students.update', [ 'student' => $student ]) }}" method="POST" class="mt-4">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="student_code" class="sr-only">Student Code (required)</label>
                <input type="text" name="student_code" id="student_code" placeholder="Student Code *" class="bg-gray-100 border-2 w-full p-4 rounded-lg focus:border-blue-300 @error('student_code') border-red-500 @enderror" value="{{ empty( old('student_code') ) ? $student->student_code : old('student_code') }}">

                @error('student_code')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="first_name" class="sr-only">First Name (required)</label>
                <input type="text" name="first_name" id="first_name" placeholder="First Name *" class="bg-gray-100 border-2 w-full p-4 rounded-lg focus:border-blue-300 @error('first_name') border-red-500 @enderror" value="{{ empty( old('first_name') ) ? $student->first_name : old('first_name') }}">

                @error('first_name')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="father_name" class="sr-only">Father Name (required)</label>
                <input type="text" name="father_name" id="father_name" placeholder="Father Name *" class="bg-gray-100 border-2 w-full p-4 rounded-lg focus:border-blue-300 @error('father_name') border-red-500 @enderror" value="{{ empty( old('father_name') ) ? $student->father_name : old('father_name') }}">

                @error('father_name')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="last_name" class="sr-only">Last Name (required)</label>
                <input type="text" name="last_name" id="last_name" placeholder="Last Name *" class="bg-gray-100 border-2 w-full p-4 rounded-lg focus:border-blue-300 @error('last_name') border-red-500 @enderror" value="{{ empty( old('last_name') ) ? $student->last_name : old('last_name') }}">

                @error('last_name')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="phone_number" class="sr-only">Phone Number</label>
                <input type="tel" name="phone_number" id="phone_number" placeholder="Phone Number" class="bg-gray-100 border-2 w-full p-4 rounded-lg focus:border-blue-300 @error('phone_number') border-red-500 @enderror" value="{{ empty( old('phone_number') ) ? $student->phone_number : old('phone_number') }}">

                @error('phone_number')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="email" class="sr-only">Email</label>
                <input type="email" name="email" id="email" placeholder="Email" class="bg-gray-100 border-2 w-full p-4 rounded-lg focus:border-blue-300 @error('email') border-red-500 @enderror" value="{{ empty( old('email') ) ? $student->email : old('email') }}">

                @error('email')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="date_of_birth" class="sr-only">Date of Birth (required)</label>
                <input type="date" name="date_of_birth" id="date_of_birth" placeholder="Date of Birth *" class="bg-gray-100 border-2 w-full p-4 rounded-lg focus:border-blue-300 @error('date_of_birth') border-red-500 @enderror" value="{{ empty( old('date_of_birth') ) ? substr( $student->date_of_birth, 0, 10 ) : substr( old('date_of_birth'), 0, 10 ) }}">

                @error('date_of_birth')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password" class="sr-only">New Password</label>
                <input type="password" name="password" id="password" placeholder="New Password" class="bg-gray-100 border-2 w-full p-4 rounded-lg focus:border-blue-300 @error('password') border-red-500 @enderror">

                @error('password')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password_confirmation" class="sr-only">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password" class="bg-gray-100 border-2 w-full p-4 rounded-lg focus:border-blue-300 @error('password_confirmation') border-red-500 @enderror">

                @error('password_confirmation')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded-lg font-medium w-full">
                    Update Student
                </button>
            </div>
        </form>

    </div>
@endsection
