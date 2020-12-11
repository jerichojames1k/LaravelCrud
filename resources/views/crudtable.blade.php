
<!DOCTYPE html>
<title></title>

<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

/* Add a background color when the inputs get focus */
input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for all buttons */
button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

button:hover {
  opacity:1;
}

/* Extra styles for the cancel button */
.cancelbtn {
  padding: 14px 20px;
  background-color: #f44336;
}

/* Float cancel and signup buttons and add an equal width */
.cancelbtn, .signupbtn {
  float: left;
  width: 50%;
}

/* Add padding to container elements */
.container {
  padding: 16px;
}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: #474e5d;
  padding-top: 50px;
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
}

/* Style the horizontal ruler */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}
 
/* The Close Button (x) */
.close {
  position: absolute;
  right: 35px;
  top: 15px;
  font-size: 40px;
  font-weight: bold;
  color: #f1f1f1;
}

.close:hover,
.close:focus {
  color: #f44336;
  cursor: pointer;
}

/* Clear floats */
.clearfix::after {
  content: "";
  clear: both;
  display: table;
}
td { 
  white-space: nowrap;
   }
#del{
    background:red;
}
/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px) {
  .cancelbtn, .signupbtn {
     width: 100%;
  }
}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- <script type = "text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> -->
<script type = "text/javascript" language = "javascript">
function onshow(id,fname,lname,age,address){
    document.getElementById("request").action ="/update/"+document.getElementById(id).innerText;
    document.getElementById("fname").value=document.getElementById(fname).innerText;
    document.getElementById("lname").value=document.getElementById(lname).innerText;
    document.getElementById("age").value=document.getElementById(age).innerText;
    document.getElementById("address").value=document.getElementById(address).innerText;
    document.getElementById('id01').style.display='block';
}

// Get the modal
var modal = document.getElementById('id01');
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
$(document).ready(function(){

});

//  function onshow(id,fname,lname,age,address){
//    alert($("#"+fname).text())
//     //$("#request").attr('action',"/update/"+$("#"+id).text());
//     // $("#fname").val($("#"+fname).text());
//     // $("#lname").val($("#"+lname).text());
//     // $("#age").val($("#"+age).text());
//     // $("#address").val($("#"+address).text());
//     document.getElementById('id01').style.display='block';
// }
</script>

<body>


<div id="id01" class="modal">
  <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
  <form class="modal-content" id="request" method="post" action="">
  @csrf
    <div class="container">
      <h1>Data</h1>
      <p>Please fill in to update your data</p>
      <hr>
      <label for="fname"><b>Firstname</b></label>
      <input type="text" id="fname" value="{{old('fname')}}"  name="fname" required>

      <label for="lname"><b>Lastname</b></label>
      <input type="text" id="lname" value="{{old('lname')}}" name="lname" required>

      <label for="age"><b>Age</b></label>
      <input type="number" id="age" value="{{old('age')}}" name="age" required>
      <br>
      <label for="address"><b>Address</b></label>
      <input type="text" id="address" value="{{old('address')}}" name="address" required>
      
           <div class="clearfix">
        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
        <button type="submit" class="signupbtn">Update</button>
      </div>
    </div>
  </form>
</div>

<center>
   <form method="post" action="{{route('create')}}" id="form1">
   @csrf
   <p>FirstName</p>
    <input class="form-control" value="{{old('fname')}}"  type="text" name="fname" required><br>
    <p>LastName</p>
    <input class="form-control" value="{{old('lname')}}"  type="text" name="lname" required><br>
    <p>Age</p>
    <input class="form-control" value="{{old('age')}}"  type="number" name="age" required><br>
    <p>Address</p>
    <input class="form-control" value="{{old('address')}}"  type="text" name="address" required><br><br>
    <button type="submit">Submit</button>
   </form>
</center> <br><br>


 <center>
    <table border = "1" id="form2">
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
    <td id='{{$student->id}}'>{{$student->id}}</td>
    <td id='{{$student->fname}}'>{{$student->fname}}</td>
    <td id='{{$student->lname}}'>{{$student->lname}}</td>
    <td id='{{$student->age}}'>{{$student->age}}</td>
    <td id='{{$student->address}}'>{{$student->address}}</td>
    <!-- <td><a href ='delete/{{$student->id}}'>Delete</a></td> -->
    <td><form method="get" action="{{route('deleter',$student->id)}}"><button id="del">Delete</button></form></td>
    <!-- <td><a href = 'edit/{{$student->id}}'>Edit</a></td> -->
    <td><button id="editbtn" onclick="onshow('{{$student->id}}','{{$student->fname}}','{{$student->lname}}','{{$student->age}}','{{$student->address}}')" style="width:auto;">Edit</button></td>
    </tr>
    @endforeach
    </table>
    </center> 

</body>
</html>
