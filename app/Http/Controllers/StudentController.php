<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\Models\Student;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /**
         * Get paginated and sorted students
         */
        $students = Student::orderBy('first_name')->paginate(20);

        return view( 'students.index', [ 'students' => $students ] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view( 'students.create' );
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
            'student_code'              =>  [ 'required', 'max:255', 'unique:'.Student::class ],
            'first_name'                =>  [ 'required', 'max:255' ],
            'father_name'               =>  [ 'required', 'max:255' ],
            'last_name'                 =>  [ 'required', 'max:255' ],
            'phone_number'              =>  [ 'nullable', 'max:255' ],
            'email'                     =>  [ 'nullable', 'email' ],
            'date_of_birth'             =>  [ 'required', 'date', 'before:today' ],
            'password'                  =>  [ 'required', 'max:255', 'confirmed' ],
            'password_confirmation'     =>  [ 'required', 'max:255' ],
        ] );

        /**
         * Insert the record
         */
        Student::create([

            'student_code'      =>  $request->student_code,
            'first_name'        =>  $request->first_name,
            'father_name'       =>  $request->father_name,
            'last_name'         =>  $request->last_name,
            'phone_number'      =>  $request->phone_number,
            'email'             =>  $request->email,
            'date_of_birth'     =>  $request->date_of_birth,
            'password'          =>  Hash::make( $request->password ),

        ]);

        return back()
        ->with('status', 'success')
        ->with('message', 'Student Created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        return view( 'students.edit', [ 'student' => $student ] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        /**
         * Validate the request
         */
        $request->validate( [
            'student_code'              =>  [ 'required', 'max:255', Rule::unique(Student::class)->ignore($student) ],
            'first_name'                =>  [ 'required', 'max:255' ],
            'father_name'               =>  [ 'required', 'max:255' ],
            'last_name'                 =>  [ 'required', 'max:255' ],
            'phone_number'              =>  [ 'nullable', 'max:255' ],
            'email'                     =>  [ 'nullable', 'email' ],
            'date_of_birth'             =>  [ 'required', 'date', 'before:today' ],
            'password'                  =>  [ 'nullable', 'max:255', 'confirmed' ],
            'password_confirmation'     =>  [ 'nullable', 'max:255' ],
        ] );

        /**
         * Create an array of model values to update
         */
        $values_to_update = $request->only([

            'student_code',
            'first_name',
            'father_name',
            'last_name',
            'phone_number',
            'email',
            'date_of_birth',

        ]);

        /**
         * Check if the password field is set
         * And add it to the array
         */
        if ( ! empty( $request->password ) ) {

            $values_to_update['password'] = Hash::make( $request->password );

        }

        /**
         * Update the database record
         */
        $student->update( $values_to_update );

        /**
         * Redirect back with success message
         */
        return back()
        ->with('status', 'success')
        ->with('message', 'Student Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();

        /**
         * Redirect back
         */
        return back();
    }
}
