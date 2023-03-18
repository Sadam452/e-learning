<?php
session_start();
if(isset($_SESSION['email'])){
    if($_SESSION['role'] != "admin")
    header('location:http://localhost/learnwithus/home.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Learn With Us - Register</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>
<?php include('header.php'); ?>
<br>

<div id="register" class="shadow">
    <form class="row g-3" method="post" action="register.php">
    <div class="col-md-6">
        <label for="fname" class="form-label">First name</label>
        <input type="text" name="fname" class="form-control" id="fname" placeholder="John" required>
    </div>
    <div class="col-md-6">
        <label for="lname" class="form-label">Last name</label>
        <input type="text" name="lname" class="form-control" id="lname" placeholder="Doe" required>
    </div>
    <div class="col-md-6">
        <label for="inputEmail4" class="form-label">Email</label>
        <input type="email" name="email" class="form-control" id="inputEmail4" required>
    </div>
    <div class="col-md-6">
        <label for="inputPassword4" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" id="inputPassword4" required>
    </div>
    <div class="col-12">
        <label for="inputAddress" class="form-label">Address</label>
        <input type="text" name="address" class="form-control" id="inputAddress" placeholder="1234 Main St" required>
    </div>

    <div class="col-md-6">
        <label for="inputCity" class="form-label">City</label>
        <input type="text" name="city" class="form-control" id="inputCity" required>
    </div>
    <div class="col-md-4">
        <label for="inputState" class="form-label">State</label>
        <select id="inputState" class="form-select" name="state" required>
        <option selected value="">-- Select your state --</option>
        <option value="California">California</option>
        <option value="Alaska">Alaska</option>
        <option value="Florida">Florida</option>
        <option value="New York">New York</option>
        <option value="Ohio">Ohio</option>
        <option value="Texas">Texas</option>
        <option value="Wyoming">Wyoming</option>
        <option value="South Dakota">South Dakota</option>
        <option value="New Jersey">New Jersey</option>
        <option value="Nevada">Nevada</option>
        <option value="Oregan">Oregan</option>
        <option value="Vermont">Vermont</option>
        </select>
    </div>
    <div class="col-md-2">
        <label for="inputZip" class="form-label">Zip</label>
        <input type="text" name="zip" class="form-control" id="inputZip" required>
    </div>
    <div class="col-md-4">
        <p>Gender</p>
        <input class="form-check-input" type="radio" id="gridCheck" name="gender" value="M" required>
        <label class="form-check-label" for="gridCheck">
            Male
        </label>
        <input class="form-check-input" type="radio" id="gridCheck2" name="gender" value="F" required>
        <label class="form-check-label" for="gridCheck2">
            Female
        </label>
        <input class="form-check-input" type="radio" id="gridCheck3" name="gender" value="O" required>
        <label class="form-check-label" for="gridCheck3">
            Others
        </label>
    </div>
    <div class="col-md-8">
        <label for="Type" class="form-label">Registration Type</label>
        <select id="Type" class="form-select" name="type" required>
        <option selected value="">Select your role</option>
        <option value="student">Student</option>
        <option value="tutor">Tutor</option>
        </select>
    </div>
    <div class="col-12">
        <button type="submit" class="btn btn-primary">Register</button>
    </div>
    </form>
</div>
<div class="alert alert-primary" role="alert" id="message">

</div>
<hr class="dropdown-divider">
<?php include('footer.php'); ?>
</body>
</html>

<?php
    $status = "not_verified";
    if(isset($_SESSION['email'])){
        if($_SESSION['role'] == "admin")
        $status = "verified";
    }
    echo "
    <script type=\"text/JavaScript\"> 
    document.getElementById(\"message\").style.display = 'none';
    </script>
    ";
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // $check = 5;
        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $gender=$_POST['gender'];
        $address=$_POST['address'];
        $city=$_POST['city'];
        $state=$_POST['state'];
        $zip=$_POST['zip'];
        $type=$_POST['type'];
        $con=mysqli_connect('localhost','root','12345');
        mysqli_select_db($con,'elearning');
        if($type =="student")
        $q="INSERT INTO students (firstName,lastName,email,gender,address,city,state,zip,password,status) values ('$fname','$lname','$email','$gender','$address','$city','$state','$zip','$password','$status')";
        else if($type == "tutor")
        $q="INSERT INTO tutors (firstName,lastName,email,gender,address,city,state,zip,password,status) values ('$fname','$lname','$email','$gender','$address','$city','$state','$zip','$password','$status')";
        
        $status=mysqli_query($con,$q);
        mysqli_close($con);
        echo "
            <script type=\"text/JavaScript\"> 
            document.getElementById(\"message\").style.display = 'block';
            </script>
        ";
        if($status==1){
            echo "
                <script type=\"text/JavaScript\"> 
                document.getElementById(\"message\").innerHTML = \"You have successfully registered, You will be able to login once your account is successfully verified.\";
                </script>
            ";
        }
        else{
            echo "
                <script type=\"text/JavaScript\"> 
                document.getElementById(\"message\").innerHTML = \"Uh-Oh! Some error occured, try again! [This email is already in use or server is down] Make sure that all the fields are filled correctly\";
                </script>
            ";
        }
    }
?>