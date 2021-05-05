<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /**
         * Get paginated and sorted courses
         */
        $courses = Course::orderByDesc('created_at')->paginate(5);

        return view('courses.index', [ 'courses' => $courses ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('courses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /**
         * Validate the request
         */
        $request->validate( [
            'course_code'   =>  [ 'required', 'max:255', 'unique:'.Course::class ],
            'name'          =>  [ 'required', 'max:255' ],
        ] );

        /**
         * Insert the record
         */
        Course::create([

            'course_code'   =>  $request->course_code,
            'name'          =>  $request->name,

        ]);

        return back()
        ->with('status', 'success')
        ->with('message', 'Course Created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        return view( 'courses.edit', [ 'course' => $course ] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
         /**
         * Validate the request
         */
        $request->validate( [
            'course_code'   =>  [ 'required', 'max:255', Rule::unique(Course::class)->ignore($course) ],
            'name'          =>  [ 'required', 'max:255' ],
        ] );

        /**
         * Create an array of model values to update
         */
        $values_to_update = $request->only([

            'course_code',
            'name',

        ]);

        /**
         * Update the database record
         */
        $course->update( $values_to_update );

        /**
         * Redirect back with success message
         */
        return back()
        ->with('status', 'success')
        ->with('message', 'Course Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $course->delete();

        /**
         * Redirect back
         */
        return back();
    }
}
