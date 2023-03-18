<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Learn With Us - Home</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

 <?php
 session_start();
 include('header.php');
 if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['button'] == "login"){
  $email=$_POST['email'];
  $role=$_POST['role'];
  $password=$_POST['password'];
  $con=mysqli_connect('localhost','root','12345');
  mysqli_select_db($con,'elearning');
  if($role =="student")
  $q="SELECT * FROM students WHERE email='$email' && password='$password' && status='verified' ";
  else if($role == "tutor")
  $q="SELECT * FROM tutors WHERE email='$email' && password='$password' && status='verified' ";
  else if($role == "admin")
  $q="SELECT * FROM admins WHERE email='$email' && password='$password' ";
  $status=mysqli_query($con,$q);
  $num=mysqli_num_rows($status);
  mysqli_close($con);

  if($num==1){
      echo"
          <script type=\"text/JavaScript\"> 
          alert(\"You are successfully logged in\");
          </script>
      ";
      $_SESSION['email']=$email;
      $_SESSION['role']=$role;
      $row=mysqli_fetch_array($status);
      $_SESSION['firstName'] = $row['firstName'];
      if($role == "student")
      header('location:http://localhost/learnwithus/student-home.php');
      else if($role == "tutor")
      header('location:http://localhost/learnwithus/tutor-home.php');
      if($role == "admin")
      header('location:http://localhost/learnwithus/admin-home.php');
  }
  else{
      echo"
          <script type=\"text/JavaScript\"> 
            alert(\"Uh-Oh! Some error occured, The email or password is wrong or the account is not verified.\");
          </script>
      ";
  }
}
if(!isset($_SESSION['email'])){
?>
<section class="position-relative py-4 py-xl-5 mt-0" id="sec-1">
    <div class="container py-4">
        <div class="row d-lg-flex justify-content-evenly align-items-lg-center mb-5">
            <div
                class="col-md-8 col-xl-6 text-center d-xxl-flex flex-lg-column justify-content-lg-center align-items-xxl-center">
                <img src="images/3.png"style="width: 300px; height: 300px;">
                <h2 class="text-white"style="text-align: left;"id="line"><b>Develop a passion for<br> Learning new things</b></h2>
                <span style="color:red;" id="queryMessage"></span>
            </div>

            <div class="col-md-6 col-xl-4">                
                <div class="card mt-5 rounded-3" style="box-shadow: 0px 0px 20px 8px var(--bs-gray-800);background: rgb(255,251,251);">
                    <div class="card-body d-flex flex-column align-items-center py-5">

                        <h2 class="mb-5"><b>Login</b></h2>
                        <form class="text-center w-100 mx-5 px-3" method="post" action="index.php">
                        
                          <div class="col">
                          <input type="email" class="form-control" placeholder="Email" aria-label="Email" name="email" required="">
                          </div><br>
                          <select class="form-select" aria-label="Default select example" name="role" required>
                          <option selected value="">Select Login Type</option>
                          <option value="admin">Admin</option>
                          <option value="tutor">Tutor</option>
                          <option value="student">Student</option>
                          </select><br>
                          <div class="col">
                          <input type="password" class="form-control" placeholder="password" aria-label="Password" name="password" required>
                            </div><br>
                            <div class="mb-3"><button class="btn btn-primary d-block w-100 mt-2" type="submit" name="button" value="login">Login</button>
                            </div>
                            <a href="password_reset.html" class="text-decoration-none"><p class="text-muted">Forgot your password?</p></a>
                            <div class="my-3">
                                <a class="btn btn-outline-primary rounded-pill px-lg-5 mb-3 px-3" href="register.php">Create an account</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
}
?>
<!--  -->
<br>
<h2 style="text-align: center;">Online Courses We Teach!</h2>
<h4 style="text-align: center;">Our achievements speak!</h4>
<h5 id="h5">Most Popular<small>(04)</small></h5>
<div id="courses">
<div class="card shadow" style="width: 18rem;" id="c1">
  <img src="images\4.png" class="card-img-top" alt="Web development">
  <div class="card-body">
    <h5 class="card-title">Web Development</h5>
    <p class="card-text">Learn with us, how to build a website from scratch</p>
    <a href="#courses" class="btn btn-primary stretched-link">Know more ></a>
  </div>
</div>
<div class="card shadow" style="width: 18rem;"id="c2">
  <img src="images\6.png" class="card-img-top" alt="Programming">
  <div class="card-body">
    <h5 class="card-title">Programming with C</h5>
    <p class="card-text">Build a strong programming foundation by learning C with us</p>
    <a href="#courses" class="btn btn-primary stretched-link">Know more ></a>
  </div>
</div>
<div class="card shadow" style="width: 18rem;"id="c3">
  <img src="images\6.png" class="card-img-top" alt="Android application">
  <div class="card-body">
    <h5 class="card-title">Android app development</h5>
    <p class="card-text">Learn with us, how to build an android application from scratch</p>
    <a href="#courses" class="btn btn-primary stretched-link">Know more ></a>
  </div>
</div>
<div class="card  shadow" style="width: 18rem;"id="c4">
  <img src="images\4.png" class="card-img-top" alt="Machine learning">
  <div class="card-body">
    <h5 class="card-title">IoT</h5>
    <p class="card-text">Learn the IoT from scratch and take the first step towards IoT!</p>
    <a href="#courses" class="btn btn-primary stretched-link">Know more ></a>
  </div>
</div>
</div>
<!--  -->
<br><hr class="dropdown-divider">
<!--  -->
<br>
<h2 style="text-align: center;">Our Tutors</h2>
<h4 style="text-align: center;">Buy a course and learn from your favourite Tutor!</h4>
<h5 id="h5">Most Popular<small>(04)</small></h5>
<div id="tutors">
<div class="card shadow" style="width: 18rem;" id="t1">
  <img src="images\8.png" class="card-img-top" alt="Web development">
  <div class="card-body">
    <h5 class="card-title">Dr Ajit Singh</h5>
    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ultrices libero ut justo porttitor, quis mattis orci gravida.</p>
    <a href="#tutors" class="btn btn-primary stretched-link">Know more ></a>
  </div>
</div>
<div class="card shadow" style="width: 18rem;"id="t2">
  <img src="images\8.png" class="card-img-top" alt="Programming">
  <div class="card-body">
    <h5 class="card-title">Dr Sanchit Jain</h5>
    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ultrices libero ut justo porttitor, quis mattis orci gravida.</p>
    <a href="#tutors" class="btn btn-primary stretched-link">Know more ></a>
  </div>
</div>
<div class="card shadow" style="width: 18rem;"id="t3">
  <img src="images\8.png" class="card-img-top" alt="Android application">
  <div class="card-body">
    <h5 class="card-title">Ajay Ravindran</h5>
    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ultrices libero ut justo porttitor, quis mattis orci gravida.</p>
    <a href="#tutors" class="btn btn-primary stretched-link">Know more ></a>
  </div>
</div>
<div class="card  shadow" style="width: 18rem;"id="t4">
  <img src="images\8.png" class="card-img-top" alt="Machine learning">
  <div class="card-body">
    <h5 class="card-title">Dr Rehan</h5>
    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ultrices libero ut justo porttitor, quis mattis orci gravida.</p>
    <a href="#tutors" class="btn btn-primary stretched-link">Know more ></a>
  </div>
</div>
</div>
<!--  -->
<br>
<section class="position-relative py-4 py-xl-5 mt-0" id="query">
    <div class="container py-4">
        <div class="row d-lg-flex justify-content-evenly align-items-lg-center mb-5">
            <div class="col-md-8 col-xl-6 text-center d-xxl-flex flex-lg-column justify-content-lg-center align-items-xxl-center">
                <img src="images/9.png"style="width: 300px; height: 300px;">
                <h2 class="text-black"style="text-align: left;" id="line"><b>Raise a query with us</b></h2>
                <p>We will try our best to reach out to you as soon as possible</p>
            </div>
            <div class="col-md-6 col-xl-4">                
                <div class="card mt-5 rounded-3" style="box-shadow: 0px 0px 20px 8px var(--bs-gray-800);background: rgb(255,251,251);">
                    <div class="card-body d-flex flex-column align-items-center py-5">
                    <h2 class="mb-5"><b>Register a Query</b></h2>
                    <form action="index.php" method="post">

                    <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email" required>
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>

                    <div class="mb-3">
                    <label for="name_" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name_"required name="userName">
                    </div>

                    <div class="mb-3">
                    <label for="Message" class="form-label">Message</label>
                    <small style="font-size:10px; color:red;">(Max length : 300 characters)</small>
                    <textarea class="form-control" id="Message" name="message" rows="1" cols="50" required></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary" value="query" name="button">Submit</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
     </div>
</section>
<?php
include('footer.php');
?>
<!--  -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script>
var form=document.querySelector("form");
form.addEventListener("submit",function(e){
e.preventDefault();
var search=form.querySelector("input[type=search]");
search.value=search.value;
form.submit();
});
</script>
</body>
</html>

<?php
if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['button'] == "query"){
$email=$_POST['email'];
$name=$_POST['userName'];
$message=$_POST['message'];
$con=mysqli_connect('localhost','root','12345');
mysqli_select_db($con,'elearning');
$q="INSERT INTO queries (email,name,message) VALUES ('$email','$name','$message') ";
$result=mysqli_query($con,$q);
if($result==1)
{
  echo "
  <script type=\"text/JavaScript\"> 
  document.getElementById(\"queryMessage\").innerHTML = \"We have successfully recieved your query! Thank you!\";
  </script>
  ";
}
else
{
  echo "
  <script type=\"text/JavaScript\"> 
  document.getElementById(\"queryMessage\").innerHTML = \"Uh-Oh! some problem occured!\";
  </script>
  ";
}
}
?>