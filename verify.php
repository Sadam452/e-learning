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
	<title>Verify users- admin home</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="style.css">
	  <script>
        function printReport() {
            var divContents = document.getElementById("report").innerHTML;
            var a = window.open('', '', 'height=800, width=1000');
            a.document.write('<html>');
            // a.document.write('<body > <h1>Student Report<br>');
            a.document.write(divContents);
            a.document.write('</body></html>');
            a.document.close();
            a.print();
        }
    </script>
</head>
<body>
<?php
include('header.php');
?>

<section class="position-relative py-4 py-xl-5 mt-0" id="sec-1">
    <div class="container py-4" id="admin-home">
        <div class="row d-lg-flex justify-content-evenly align-items-lg-center mb-0">

            <div class="col-md-6 col-xl-7" id="admin-home-right">                
			<div class="mt-5 rounded-3">
                    <div class="card-body d-flex flex-column align-items-center py-5">

                      <?php
					    $con=mysqli_connect('localhost','root','12345');
					    mysqli_select_db($con,'elearning');
					  	$q="SELECT * FROM tutors";
						$status=mysqli_query($con,$q);
						$num=mysqli_num_rows($status);
						mysqli_close($con);
						if($num>=1){ ?>

							<div class="mx-auto card mt-0" style="width: 700px;" id="report">
								<div class="alert alert-primary" role="alert">
					  				<h3>Non verified users</h3>
								</div>
							<table class="table table-hover">
								    <tr>
										<td>#id</td>
										<td>#firstName</td>
										<td>#lastName</td>
										<td>#Email</td>
										<td>#Address</td>
										<td>#State</td>
										<td>#userType</td>
										<td>#Status</td>
									</tr>
						    <?php while ($rows = mysqli_fetch_array($status)) { ?>
						    		<?php if($rows['status'] == "not_verified"){?>
								    <tr>
										<td><?php echo $rows['sNo'] ?></td>
										<td><?php echo $rows['firstName'] ?></td>
										<td><?php echo $rows['lastName'] ?></td>
										<td><?php echo $rows['email'] ?></td>
										<td><?php echo $rows['address'] ?></td>
										<td><?php echo $rows['state'] ?></td>
										<td>Tutor</td>
										<form action="verify.php" method="post">
										<td><button class="btn btn-primary" type="submit" name="verifyTutor" value="<?php echo $rows['email'] ?>">Verify</button></td>
									</form>
									</tr>

						<?php	}}}
						?>   
						<?php
					    $con=mysqli_connect('localhost','root','12345');
					    mysqli_select_db($con,'elearning');
					  	$q="SELECT * FROM students";
						$status=mysqli_query($con,$q);
						$num=mysqli_num_rows($status);
						mysqli_close($con);
						if($num>=1){ ?>
							<?php while ($rows = mysqli_fetch_array($status)) { ?>
									<?php if($rows['status'] == "not_verified"){?>
								    <tr>
										<td><?php echo $rows['sNo'] ?></td>
										<td><?php echo $rows['firstName'] ?></td>
										<td><?php echo $rows['lastName'] ?></td>
										<td><?php echo $rows['email'] ?></td>
										<td><?php echo $rows['address'] ?></td>
										<td><?php echo $rows['state'] ?></td>
										<td>Student</td>
										<form action="verify.php" method="post">
										<td><button class="btn btn-primary" type="submit" name="verifyStudent" value="<?php echo $rows['email'] ?>">Verify</button></td>
									</form>
									</tr>

						<?php	}}}
						?> 
						
                             </table>
                            <button class="btn btn-success d-inline mt-2" type="submit" name="button" value="report" onclick="printReport()">Download Report</button>
                        </div>
                        
					</div>
			</div>
            </div>
        </div>
    </div>
</section>

<?php
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
  	$con=mysqli_connect('localhost','root','12345');
  	mysqli_select_db($con,'elearning');
  	if(!empty($_POST['verifyTutor'])){
  		$email = $_POST['verifyTutor'];
  		$q="UPDATE tutors SET status='verified' WHERE email='$email' ";
  	}
  	else if(!empty($_POST['verifyStudent'])){
  		$email = $_POST['verifyStudent'];
  		$q="UPDATE students SET status='verified' WHERE email='$email' ";
  	}
  	$status=mysqli_query($con, $q);
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