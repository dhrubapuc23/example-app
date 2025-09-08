@extends('dashboard')
@section('info')
<div class="col-md-4 offset-md-4">
        <h2>Update Student Information</h2>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="{{route('student.update',[$student->id])}}" method="post">
        @csrf
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" name="name" id="name" class="form-control" autocomplete="off" value="{{$student->student_name}}">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" name="email" id="email" class="form-control" autocomplete="off" value="{{$student->email}}">
        </div>
        <div class="form-group">
          <label for="address">Address</label>
          <textarea name="address" id="address" cols="30" rows="10" class="form-control" autocomplete="off">{{$student->address}}</textarea>
        </div>
        <div class="form-group">
          <label for="semester">Semester</label>
          <input type="number" name="semester" id="semester" class="form-control" autocomplete="off" value="{{$student->semester}}">
        </div>
        <div class="form-group">
          <label for="gpa">GPA</label>
          <input type="text" name="gpa" id="gpa" class="form-control" autocomplete="off" value="{{$student->gpa}}">
        </div>
        <input type="submit" value="update" class="btn btn-primary">
        </form>
    </div>
    
@endsection