<?php
session_start();
if(!isset($_SESSION['email']))
header('location:http://localhost/learnwithus/index.php');
if($_SESSION['role'] == "student" || $_SESSION['role'] == "admin"){
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
				<button class="btn btn-light" id="btn" onclick="window.location.href='createQuiz.php' ">Create Quiz</button><br>
				<button class="btn btn-light" id="btn" onclick="window.location.href='generateReport.php' ">Generate Student Report</button><br>
				<button class="btn btn-light" id="btn" onclick="window.location.href='uploadResources.php' ">Upload Resources</button><br>
				<button class="btn btn-light" id="btn" onclick="window.location.href='viewResults.php' ">Quiz Results</button><br>
				<button class="btn btn-light" id="btn" onclick="window.location.href='password.php' ">Change Password</button><br>
                <span style="color:red;" id="queryMessage"></span>
            </div>

            <div class="col-md-6 col-xl-7" id="admin-home-right">                
			<div class="mt-5 rounded-3">
                    <div class="card-body d-flex flex-column align-items-center py-5">

                        <h2 class="mb-5"><b>Create a Quiz</b></h2>
                        <form action="createQuiz.php" method="post">
                        <table class="table table-hover">
	            		<tr>
			  				<td>#sNo</td>
			  				<td>Subject</td>
			  				<td>Question</td>
			  				<td>Answer(1-4)</td>
			  			</tr>
            			<tr>
			  				<td>1</td>
			  				<td><input type="text" name="subject" required></td>
			  				<td><input type="text" name="question" required></td>
			  				<td><input type="number" name="answer" min="1" max="4"></td>
			  			</tr> 
			  			<tr>
			  				<td>Options</td>
			  			</tr>
			  			<tr>
			  				<td><input type="text" name="option1" required></td>
			  				<td><input type="text" name="option2" required></td>
			  				<td><input type="text" name="option3" required></td>
			  				<td><input type="text" name="option4" required></td>
			  			</tr>
						</table>
						
						<div class="mb-3"><button class="btn btn-success d-block w-100 mt-2" type="submit" name="button" value="upload">Upload Question</button>
						</div>
						</form>
					</div>
			</div>
            </div>
        </div>
    </div>
</section>
<?php
  if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['button'] == "upload"){
  $subject=$_POST['subject'];
  $question=$_POST['question'];
  $answer = $_POST['answer'];
  $option1 = $_POST['option1'];
  $option2 = $_POST['option2'];
  $option3 = $_POST['option3'];
  $option4 = $_POST['option4'];
  $con=mysqli_connect('localhost','root','12345');
  mysqli_select_db($con,'elearning');
  $q="SELECT * FROM questions";
  $status=mysqli_query($con, $q);
  $num=mysqli_num_rows($status);
  $ansRows="SELECT * FROM answers";
  $status=mysqli_query($con, $ansRows);
  $ansNum=mysqli_num_rows($status);
  $ansNum += $answer;
  $num++;
  $q="INSERT INTO answers (answer,ans_id,subject) VALUES ('$option1','$num','$subject'),('$option2','$num','$subject'),('$option3','$num','$subject'),('$option4','$num','$subject') ";
  $status=mysqli_query($con,$q);
  $q="INSERT INTO questions (subject,question,ans_id) VALUES ('$subject','$question','$ansNum') ";
  $status=mysqli_query($con,$q);

  if($status==1){
  		?>
  		<div class="alert alert-success text-center" role="alert">
  			Quiz created successfully!
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