@extends('dashboard')
@section('info')
    <div class="col-md-8 offset-md-2">
        <h2>Student Record for ID: {{$student->id}}</h2>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Email</th>
                    <th>Semester</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$student->id}}</td>
                    <td>{{$student->student_name}}</td>
                    <td>{{$student->address}}</td>
                    <td>{{$student->email}}</td>
                    <td>{{$student->semester}}</td>
                    <td><a href="{{route('student.edit',[$student->id])}}" class="btn btn-primary">Edit</a></td>
                    <td><a href="{{route('student.delete',[$student->id])}}" class="btn btn-danger" onclick="confirm('Are you sure?')">Delete</a></td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection