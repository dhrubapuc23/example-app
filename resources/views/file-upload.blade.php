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
    </div>
@endsection