<!DOCTPE html>
<html>
<head>
<title>View Student Records</title>
</head>
<body>

 <center>
    <table border = "1">
    @csrf
    <tr>
    <td>Id</td>
    <td>First Name</td>
    <td>Last Name</td>
    <td>Age</td>
    <td>Address</td>
    <td>Delete</td>
    <td>Update</td>
    </tr>

    @foreach($students as $student)
    <tr>
    <td>{{ $student->id}}</td>
    <td>{{ $student->fname }}</td>
    <td>{{ $student->lname }}</td>
    <td>{{ $student->age }}</td>
    <td>{{ $student->address}}</td>
    <td><a href ='delete/{{$student->id}}'>Delete</a></td>
    <td><a href = 'edit/{{$student->id}}'>Edit</a></td>
    </tr>
    @endforeach
  
    </table>
    </center>
</body>
</html>