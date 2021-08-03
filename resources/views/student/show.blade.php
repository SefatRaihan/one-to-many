<!DOCTYPE html>
<html lang="en" ---->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
<div class="card">
    <div class="card-header  text-center">
        Student Information
    </div>
    
    <div class="card-body">
        <dl class="dl-horizontal">
            <dt>student id:</dt>
            <dd>{{$student->id}}</dd>
            <dt>Student Name</dt>
            <dd>{{$student->student_name}}</dd>
            <dt>Class</dt>
            <dd>{{$student->class}}</dd>
            <dt>Father Name</dt>
            @foreach($student->profiles as $profile)
            <dd>{{$profile->father_name}}</dd>
            <dt>Mother Name</dt>
            <dd>{{$profile->mother_name}}</dd>
            @foreach($student->contacts as $contact)
            <dt>Email</dt>
            <dd>{{$contact->email}}</dd>
            <dt>Contact</dt>
            <dd>{{$contact->mobile}}</dd>
            @endforeach
            <dt>Photo</dt>
            <dd><img src="{{ $profile->image }} " width="50px", height="50"></dd>
            @endforeach
        </dl>
    </div>
</div>
</body>
</html>

