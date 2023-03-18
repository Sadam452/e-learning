<?php
session_start();
if(!isset($_SESSION['email']))
header('location:http://localhost/learnwithus/index.php');
if($_SESSION['role'] == "student" || $_SESSION['role'] == "tutor"){
    header('location:http://localhost/learnwithus/index.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Home - Admin</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php
include('header.php');
?>

<section class="position-relative py-4 py-xl-5 mt-0" id="sec-1">
    <div class="container py-4" id="admin-home">
        <div class="row d-lg-flex justify-content-evenly align-items-lg-center mb-0">
            <div
                class="col-md-8 col-xl-3 text-center d-xxl-flex flex-lg-column justify-content-lg-center align-items-xxl-center">
				<button class="btn btn-light" id="btn" onclick="window.location.href='register.php' ">Add Tutor / Student</button><br>
				<button class="btn btn-light" id="btn" onclick="window.location.href='delete.php' " >Delete Tutor / Student</button><br>
				<button class="btn btn-light" id="btn" onclick="window.location.href='generateReport.php' ">Generate Student Report</button><br>
				<button class="btn btn-light" id="btn" type="submit">Generate Tutor Report</button><br>
				<!-- <button class="btn btn-light" id="btn" type="submit">Update Personal Details</button><br> -->
				<button class="btn btn-light" id="btn" onclick="window.location.href='password.php' ">Change Password</button><br>
                <span style="color:red;" id="queryMessage"></span>
            </div>

            <div class="col-md-6 col-xl-7" id="admin-home-right">                
			<div class="card mt-5 rounded-3" style="box-shadow: 0px 0px 20px 8px var(--bs-gray-800);background: rgb(255,251,251);">
                    <div class="card-body d-flex flex-column align-items-center py-5">

                        <h2 class="mb-5"><b>Delete Student/Tutor</b></h2>
                        <span class="alert alert-danger">The student or tutor record will be permanantly deleted!</span>
						<form class="text-center w-100 mx-5 px-3" method="post" action="delete.php">
							<select required class="form-control" name="email">
                        	  <option value="">-- Select Email --</option>
                        	  <?php
                        	  $con=mysqli_connect('localhost','root','12345');
							  mysqli_select_db($con,'elearning');
							  $q="SELECT email FROM students";
							  $status=mysqli_query($con,$q);
							  while($rows = mysqli_fetch_array($status)){ ?>
                        		<option value="<?php echo $rows['email'] ?>"><?php echo $rows['email'] ?> | Student</option>
                        	<?php } 
                        	  $con=mysqli_connect('localhost','root','12345');
							  mysqli_select_db($con,'elearning');
							  $q="SELECT email FROM tutors";
							  $status=mysqli_query($con,$q);
							  while($rows = mysqli_fetch_array($status)){ ?>
                        		<option value="<?php echo $rows['email'] ?>"><?php echo $rows['email'] ?> | Tutor</option>
                        	<?php } ?>
                        </select>
                        <select required class="form-control" name="type">
                        	<option value="">-- Select user type --</option>
                        	<option value="student">Student</option>
                        	<option value="tutor">Tutor</option>
                        </select>
                        
						<div class="mb-3">
							<button class="btn btn-success d-block w-100 mt-2" type="submit" name="button" value="delete">Delete</button>
						</div>
                        </form>
                        <span id="errorMessage" style="color: red;"></span>
					</div>
			</div>
            </div>
        </div>
    </div>
</section>

<?php
  if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['button'] == "delete"){
  $email=$_POST['email'];
  $type=$_POST['type'];
  $status=0;
  $con=mysqli_connect('localhost','root','12345');
  mysqli_select_db($con,'elearning');

  if($type == "student"){
  	$c="SELECT * FROM students WHERE email='$email' ";
  	$q="DELETE FROM students WHERE email='$email' ";}
  else if($type=="tutor"){
  	$c="SELECT * FROM tutors WHERE email='$email' ";
  	$q="DELETE FROM tutors WHERE email='$email' ";}

	$res=mysqli_query($con,$c);
	$num=mysqli_num_rows($res);
  $status=mysqli_query($con,$q);
  if($num==1)
  	echo"
          <script type=\"text/JavaScript\"> 
          alert(\"Record deleted successfully\");
          </script>
      ";
  else
  	echo"
          <script type=\"text/JavaScript\"> 
          alert(\"We were unable to process your request, please choose correct user type!!!\");
          </script>
      ";
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