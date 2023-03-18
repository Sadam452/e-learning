<?php
session_start();
if(!isset($_SESSION['email']))
header('location:http://localhost/learnwithus/index.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Change Password</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php
include('header.php');
?>

<section class="position-relative py-4 py-xl-5 mt-0">
    <div class="container card mt-5 p-5 rounded-3" style="box-shadow: 0px 0px 20px 8px var(--bs-gray-800);background: rgb(255,251,251);">
   		<form action="password.php" method="post">
   		<label for="staticEmail" class="col-sm-2 col-form-label">Email</label>    
        <input type="text" readonly class="form-control" id="staticEmail" value="<?php echo $_SESSION['email'] ?>">
    	<label for="inputPassword1" class="col-sm-2 col-form-label">Old Password</label>
	    <input type="password" class="form-control" id="inputPassword1" name="passwordOld" required>
    	<label for="inputPassword" class="col-sm-2 col-form-label">New Password</label>
	    <input type="password" class="form-control" id="inputPassword" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 6 or more characters"required>
	    <button type="submit" class="btn btn-success mt-2" name="button" value="password">Change Password</button>
		</form>
	</div>
</section>

<?php
  if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['button'] == "password"){
  $oldPassword=$_POST['passwordOld'];
  $password=$_POST['password'];
  $email = $_SESSION['email'];
  $con=mysqli_connect('localhost','root','12345');
  mysqli_select_db($con,'elearning');
  if($_SESSION['role'] == "student")
  $q="SELECT * FROM students WHERE email='$email' && password='$oldPassword' ";
  else if($_SESSION['role'] == "tutor")
  $q="SELECT * FROM tutors WHERE email='$email' && password='$oldPassword' ";
  else if($_SESSION['role'] == "admin")
  $q="SELECT * FROM admins WHERE email='$email' && password='$oldPassword' ";
  $status=mysqli_query($con,$q);
  $num=mysqli_num_rows($status);

  if($num==1){
  	    if($_SESSION['role'] == "student")
  		$q = "UPDATE students SET password='$password' WHERE email='$email' ";
  		else if($_SESSION['role'] == "tutor")
  		$q = "UPDATE tutors SET password='$password' WHERE email='$email' ";
  		else if($_SESSION['role'] == "admin")
  		$q = "UPDATE admins SET password='$password' WHERE email='$email' ";
  		$status = mysqli_query($con,$q);
  		?>
  		<div class="alert alert-success text-center" role="alert">
  			Password changed successfully!
		</div>
  <?php}
  else{ ?>
<?php  }
   mysqli_close($con);
}?>


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