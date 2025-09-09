@extends('dashboard')
@section('info')
    <div class="col-md-2 mt-4 mb-4">
        <form action="{{route('student.search')}}" method="post">
            @csrf
            <div class="form-group">
              <input type="number" name="search" id="search" class="form-control" autocomplete="off">
            </div>
            <input type="submit" value="Search" class="btn btn-info">
        </form>
    </div>
    <div class="col-md-10">
        <h2>All Students</h2>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
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
                @foreach ($students as $student)
                <tr>
                    <td>{{$student->id}}</td>
                    <td>{{$student->student_name}}</td>
                    <td>{{$student->address}}</td>
                    <td>{{$student->email}}</td>
                    <td>{{$student->semester}}</td>
                    <td><a href="{{route('student.edit',[$student->id])}}" class="btn btn-primary">Edit</a></td>
                    <td><a href="{{route('student.delete',[$student->id])}}" class="btn btn-danger" onclick="confirm('Are you sure?')">Delete</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {!! $students->withQueryString()->links('pagination::bootstrap-4') !!}
    </div>
@endsection