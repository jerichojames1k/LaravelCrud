<!DOCTPE html>
<html>
<head>
<title>View Student Records</title>
</head>
<body>
    <center>
    @foreach ($user as $student)
    <form method="post" action="/update/{{$student->id}}">  
    @csrf
        <p>FirstName</p>
        <input class="form-control" value="{{old('fname',$student->fname)}}"  type="text" name="fname" required><br>
        <p>LastName</p>
        <input class="form-control" value="{{old('lname',$student->lname)}}"  type="text" name="lname" required><br>
        <p>Age</p>
        <input class="form-control" value="{{old('age',$student->age)}}"  type="number" name="age" required><br>
        <p>Address</p>
        <input class="form-control" value="{{old('address',$student->address)}}"  type="text" name="address" required><br><br>
        <button type="submit">Update</button>
    </form>
    @endforeach
    </center> 
</body>
</html>