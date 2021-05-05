@section('navbar')
    <nav class="p-6 bg-white flex justify-between">
        <ul class="flex items-center">
            <li>
                <a href="{{ route('home') }}" class="p-3">Home</a>
            </li>
        </ul>
        <ul class="flex items-center">
            <li>
                <a href="{{ route('students.index') }}" class="p-3">Students</a>
            </li>
            <li>
                <a href="{{ route('courses.index') }}" class="p-3">Courses</a>
            </li>
            <li>
                <a href="#" class="p-3">Registrations</a>
            </li>
        </ul>
    </nav>
@endsection
