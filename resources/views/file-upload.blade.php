@extends('dashboard')
@section('info')
    <div class="col-md-8 offset-md-2">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <form action="{{route('file.upload.submit')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="">Upload file</label>
              <input type="file" name="file" id="file" class="form-control" >
              @error('file')
                  <span>{{$message}}</span>
              @enderror    
            </div>
            <input type="submit" value="Upload" class="btn btn-info">
        </form>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>File Path</th>
                    <th>File</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($files as $file)
                <tr>
                    <td scope="row">{{$file->id}}</td>
                    <td>{{$file->filepath}}</td>
                    <td><img src="{{asset($file->filepath)}}" alt="" srcset="" width="50" height="50"></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection