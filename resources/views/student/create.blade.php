<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <title></title>
</head>
<body>
<div class="card">
  <div class="card-header  text-center">
     User Information
  </div>
  <div class="card-body">
  <form action="{{route('student.index')}}" method="post" class="ml-5" enctype="multipart/form-data" >
    @csrf
    <div class="form-group mb-3">
        <label for="student_name">Student Name</label>
        <input
            type="text"
            name="student_name"
            class="form-control"
        >
        @error('student_name')
        <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
    <div class="form-group mb-3">
        <label for="class">Class</label>
        <input
                type="text"
                name="class"
                class="form-control"
        >
        @error('class')
        <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
    <div class="form-group mb-3">
        <label for="father_name">Father Name</label>
        <input
                type="text"
                name="father_name"
                class="form-control"
        >
        @error('father_name')
        <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
    <div class="form-group mb-3">
        <label for="mother_name">Mother Name</label>
        <input
                type="text"
                name="mother_name"
                class="form-control"
        >
        @error('mother_name')
        <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
    
    <div class="form-group mb-3">
        <label for="mobile">Mobile</label>
        <input
                type="number"
                name="mobile"
                class="form-control"
        >
        @error('mobile')
        <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
    <div class="form-group mb-3">
        <label for="email">Email</label>
        <input
                type="email"
                name="email"
                class="form-control"
        >
        @error('email')
        <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
    <div class="form-group mb-3">
        <label for="image">Photo</label>
        <input
                type="file"
                name="image"
                class="form-control"
        >
        @error('image')
        <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
    
    <input
    type="submit"
    name="ctg-btn"
    class="btn btn-primary btn-block"
    value="Save"
    >
</form>
  </div>
</div>

</body>
</html>