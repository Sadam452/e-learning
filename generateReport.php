<?php
session_start();
if(!isset($_SESSION['email']))
header('location:http://localhost/learnwithus/index.php');
if($_SESSION['role'] == "student"){
    header('location:http://localhost/learnwithus/index.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Home - Tutor</title>
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
            <div
                class="col-md-8 col-xl-3 text-center d-xxl-flex flex-lg-column justify-content-lg-center align-items-xxl-center">
                <?php if($_SESSION['role'] == "tutor"){ ?>
				<button class="btn btn-light" id="btn" onclick="window.location.href='createQuiz.php' ">Create Quiz</button><br><?php } ?>
				<button class="btn btn-light" id="btn" onclick="window.location.href='generateReport.php' ">Generate Student Report</button><br>
				<?php if($_SESSION['role'] == "tutor"){ ?>
				<button class="btn btn-light" id="btn" onclick="window.location.href='uploadResources.php' ">Upload Resources</button><br>
				<button class="btn btn-light" id="btn" onclick="window.location.href='viewResults.php' ">Quiz Results</button><br><?php } ?>
				<button class="btn btn-light" id="btn" onclick="window.location.href='password.php' ">Change Password</button><br>
                <span style="color:red;" id="queryMessage"></span>
            </div>

            <div class="col-md-6 col-xl-7" id="admin-home-right">                
			<div class="mt-5 rounded-3">
                    <div class="card-body d-flex flex-column align-items-center py-5">

                        <h2 class="mb-5"><b>Generate a Report</b></h2>
                        <form action="generateReport.php" method="post">
                        <select required class="form-control" name="subject">
                        	<option value="">-- Select Subject --</option>
                        	  <?php
                        	  $con=mysqli_connect('localhost','root','12345');
							  mysqli_select_db($con,'elearning');
							  $q="SELECT DISTINCT subject FROM questions";
							  $status=mysqli_query($con,$q);
							  while($rows = mysqli_fetch_array($status)){ ?>
                        		<option value="<?php echo $rows['subject'] ?>"><?php echo $rows['subject'] ?></option>
                        	<?php } ?>
                        </select>
                        <select required class="form-control" name="student">
                        	<option value="">-- Select Student --</option>
                        	  <?php
                        	  $con=mysqli_connect('localhost','root','12345');
							  mysqli_select_db($con,'elearning');
							  $q="SELECT email FROM students";
							  $status=mysqli_query($con,$q);
							  while($rows = mysqli_fetch_array($status)){ ?>
                        		<option value="<?php echo $rows['email'] ?>"><?php echo $rows['email'] ?></option>
                        	<?php } ?>
                        	</select>					
						<div class="mb-3">
							<button class="btn btn-success d-block w-100 mt-2" type="submit" name="button" value="report">View Report</button>
						</div>
						</form>
					</div>
			</div>
            </div>
        </div>
    </div>
</section>
<?php
  if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['button'] == "report"){
    $subject=$_POST['subject'];
    $student=$_POST['student'];
    $con=mysqli_connect('localhost','root','12345');
    mysqli_select_db($con,'elearning');
  	$q="SELECT * FROM quiz_users WHERE email='$student' && subject='$subject' ";
	$status=mysqli_query($con,$q);
	$num=mysqli_num_rows($status);
	mysqli_close($con);
	if($num>=1){ ?>

		<div class="mx-auto card mt-5" style="width: 700px;" id="report">
			<div class="alert alert-primary" role="alert">
  				<h3>Report</h3>
			</div>
		<table class="table table-hover">
			    <tr>
					<td>#sNo</td>
					<td>Subject</td>
					<td>Total Questions</td>
					<td>Questions Attempted</td>
					<td>Correct Answers</td>
				</tr>
	    <?php while ($rows = mysqli_fetch_array($status)) { ?>

			    <tr>
					<td><?php echo $rows['sNo'] ?></td>
					<td><?php echo $rows['subject'] ?></td>
					<td><?php echo $rows['totalQuestions'] ?></td>
					<td><?php echo $rows['questionsAttempted'] ?></td>
					<td><?php echo $rows['correctAnswers'] ?></td>
				</tr>

	<?php	}
	?>   
        </table>
    <button class="btn btn-success d-inline mt-2" type="submit" name="button" value="report" onclick="printReport()">Download Report</button>
</div>
        
<?php
}}
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