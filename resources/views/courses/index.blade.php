@extends('layouts.app')
@extends('layouts.navbar')

@section('content')
    <div class="w-8/12 bg-white p-6 rounded-lg">

        <div class="flex justify-between">
            <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">
                Courses
            </h2>
            <a href="{{ route('courses.create') }}" class="border-solid border-2 transition-all border-blue-400 bg-blue-300 hover:bg-blue-400 text-white font-semibold text-sm rounded-2xl py-2 px-4">
                <i class="fas fa-plus mr-1"></i> Add New
            </a>
        </div>

        <hr class="my-2">

        <div class="flex flex-col my-4">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
              <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow-md overflow-hidden border-b border-gray-200 sm:rounded-lg">
                  <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                      <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                          Name
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                          Code
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                          Added
                        </th>
                        <th scope="col" class="relative px-6 py-3">
                          <span class="sr-only">Edit</span>
                          <span class="sr-only">Delete</span>
                        </th>
                      </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">

                    {{-- check if there are any records --}}
                    @if ($courses->count())
                        @foreach ($courses as $course)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        {{-- <div class="flex-shrink-0 h-10 w-10">
                                        <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60" alt="">
                                        </div> --}}
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ $course->name }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                {{-- <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-500">{{ $course->course_code }}</div>
                                </td> --}}
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="p-2 px-4 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        {{ $course->course_code }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    {{ $course->created_at->diffForHumans() }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="{{ route('courses.edit', ['course' => $course]) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                <span class="mx-2">-</span>
                                <form action="{{ route('courses.destroy', ['course' => $course]) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                                </form>
                                </td>
                          </tr>
                        @endforeach

                    @else
                        <tr><td class="px-6 py-4 whitespace-nowrap text-gray-500" rowspan="5">No courses found</td></tr>
                    @endif

                    </tbody>
                  </table>
                </div>
              </div>
            </div>
        </div>

        {{ $courses->links() }}

    </div>
@endsection
