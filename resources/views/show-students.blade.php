@extends('dashboard')
@section('info')
    <div class="col-md-8 offset-md-2">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Email</th>
                    <th>Semester</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                <tr>
                    <td>{{$student->id}}</td>
                    <td>{{$student->student_name}}</td>
                    <td>{{$student->address}}</td>
                    <td>{{$student->email}}</td>
                    <td>{{$student->semester}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {!! $students->withQueryString()->links('pagination::bootstrap-4') !!}
    </div>
@endsection