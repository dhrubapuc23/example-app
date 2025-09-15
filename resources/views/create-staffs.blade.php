<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Staff Information</h1>
    <form action="{{route('staffs.store')}}" method="post">
        @csrf
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" name="name" id="name" class="form-control" placeholder="" autocomplete="off">
        </div>
        <div class="form-group">
          <label for="semester">Semester</label>
          <input type="number" name="semester" id="semester" class="form-control" placeholder="" autocomplete="off">
        </div>
        <input type="submit" value="Submit" class="btn btn-info">
    </form>
</body>
</html>