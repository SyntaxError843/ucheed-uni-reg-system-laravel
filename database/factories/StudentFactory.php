<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Student::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'student_code'  => $this->faker->randomNumber(5, true),
            'first_name'    => $this->faker->firstName(),
            'father_name'   => $this->faker->firstNameMale(),
            'last_name'     => $this->faker->lastName(),
            'phone_number'  => $this->faker->optional()->phoneNumber(),
            'email'         => $this->faker->optional()->safeEmail(),
            'date_of_birth' => $this->faker->dateTime('yesterday'),
            'password'      => Hash::make('password'),
        ];
    }
}
