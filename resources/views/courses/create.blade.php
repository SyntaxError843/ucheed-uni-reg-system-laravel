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
                Add New Course
            </h2>
        </div>

        <hr class="my-2">

        <form action="{{ route('courses.store') }}" method="POST" class="mt-4">
            @csrf

            <div class="mb-4">
                <label for="course_code" class="sr-only">Course Code (required)</label>
                <input type="text" name="course_code" id="course_code" placeholder="Course Code *" class="bg-gray-100 border-2 w-full p-4 rounded-lg focus:border-blue-300 @error('course_code') border-red-500 @enderror" value="{{ old('course_code') }}">

                @error('course_code')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="name" class="sr-only">Course Name (required)</label>
                <input type="text" name="name" id="name" placeholder="Course Name *" class="bg-gray-100 border-2 w-full p-4 rounded-lg focus:border-blue-300 @error('name') border-red-500 @enderror" value="{{ old('name') }}">

                @error('name')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded-lg font-medium w-full">
                    Add Course
                </button>
            </div>
        </form>

    </div>
@endsection
