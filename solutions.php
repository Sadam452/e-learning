<?php
session_start();
if(!isset($_SESSION['email']))
header('location:http://localhost/learnwithus/index.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Quiz Results!</title>
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
				<button class="btn btn-light" id="btn" onclick="window.location.href='quiz.php' ">Take Quiz</button><br>
				<button class="btn btn-light" id="btn" onclick="window.location.href='quizResults.php' " >Quiz Results</button><br>
				<button class="btn btn-light" id="btn" onclick="window.location.href='resources.php' ">Resources</button><br>
				<!-- <button class="btn btn-light" id="btn" type="submit">Update Personal Details</button><br> -->
				<button class="btn btn-light" id="btn" onclick="window.location.href='password.php' ">Change Password</button><br>
                <span style="color:red;" id="queryMessage"></span>
            </div>

            <div class="col-md-6 col-xl-7" id="admin-home-right"> 
            <?php 
            	$con = mysqli_connect('localhost','root','12345');
            	mysqli_select_db($con,'elearning');
            	if(isset($_POST['finish'])){
            	if(!empty($_POST['quizBox'])){
            		$count = count($_POST['quizBox']);
            		//echo "Questions attempted =".$count."out of".$_POST['totalQuestions'];
            		$selected = $_POST['quizBox'];
            		//print_r($selected);
            		$q = "SELECT * FROM questions WHERE subject='".$_SESSION['subject']."' ";
            		//echo  $_SESSION['subject']; 
            		$status=mysqli_query($con,$q);
            		$result = 0;
            		//$i = 3;
            		while ($rows = mysqli_fetch_array($status)) {
            			//print_r($rows['ans_id']);
            			$i = $rows['qid'];
            			if(isset($selected[$i])) {
            			$checked = $rows['ans_id'] == $selected[$i] ;
            			if($checked){
            				$result++;
            			}}
            			//$i++;
            		}
            		//echo $result;
            	}}

            	//insert data into quiz_users database
            	$q = "INSERT INTO quiz_users (email,totalQuestions,questionsAttempted,correctAnswers,subject) VALUES('".$_SESSION['email']."','".$_POST['totalQuestions']."','$count','$result','".$_SESSION['subject']."')";
            	$status = mysqli_query($con,$q);
            	mysqli_close($con);
            ?>   
            <div class="alert alert-success text-center" role="alert">
			  <h2>Quiz Results!</h2>
			</div>            
			<table class="table table-hover">
  			<tr>
  				<td>#sNo</td>
  				<td>Subject</td>
  				<td>Total Questions</td>
  				<td>Questions Attempted</td>
  				<td>Correct Answers</td>
  			</tr>
  			<tr>
  				<td>01</td>
  				<td><?php echo $_SESSION['subject'] ?></td>
  				<td><?php echo $_POST['totalQuestions'] ?></td>
  				<td><?php echo $count ?></td>
  				<td><?php echo $result ?></td>
  			</tr>
			</table>
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