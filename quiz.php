<?php
session_start();
if(!isset($_SESSION['email']))
header('location:http://localhost/learnwithus/index.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Quiz</title>
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
                class="col-md-6 col-xl-3 text-center d-xxl-flex flex-lg-column justify-content-lg-center align-items-xxl-center">
				<button class="btn btn-light" id="btn" onclick="window.location.href='quiz.php' ">Take Quiz</button><br>
				<button class="btn btn-light" id="btn" onclick="window.location.href='quizResults.php' " >Quiz Results</button><br>
				<button class="btn btn-light" id="btn" onclick="window.location.href='resources.php' ">Resources</button><br>
				<!-- <button class="btn btn-light" id="btn" type="submit">Update Personal Details</button><br> -->
				<button class="btn btn-light" id="btn" onclick="window.location.href='password.php' ">Change Password</button><br>
                <span style="color:red;" id="queryMessage"></span>
            </div>

            <div class="col-md-6 col-xl-7" id="admin-home-right">                
			<div class="card mt-0 rounded-3" style="box-shadow: 0px 0px 20px 8px var(--bs-gray-800);background: rgb(255,251,251);">
                    <div class="overflow-scroll text-center p-1">

                        <p>Welcome <?php echo $_SESSION['firstName']; ?>, Don't cheat while taking this quiz. Best of the luck :)</p>
                        <form class="row g-3" action="quiz.php" method="post">
                        <div class="col-md-8">
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
                        </div>
                        <div class="col-md-2">
                        	<button class="btn-primary form-control" type="submit" value="quiz" name="button">Start Quiz</button>
                        </div>
                        </form>
                        <form action="solutions.php" method="post">
                        	<br>
                         <?php
							 if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['button'] == "quiz"){
							  $subject=$_POST['subject'];
							  $con=mysqli_connect('localhost','root','12345');
							  mysqli_select_db($con,'elearning');
							  $q="SELECT * FROM questions WHERE subject='$subject' ";
							  $status=mysqli_query($con,$q);
							  $num=mysqli_num_rows($status);
							  mysqli_close($con);

							  if($num>=1){
							  $_SESSION['subject'] = $subject;
							  $count = 0; 
							  	//for($i=0; $i<$num; $i++){
							  	while($rows = mysqli_fetch_array($status)){ $count++;?>
							  		<div>
							  			<br><b class="card-header"><?php echo $rows['question']?></b><br>
							  			<?php 
							  				$con=mysqli_connect('localhost','root','12345');
							  				mysqli_select_db($con,'elearning');
							  				$query="SELECT * FROM answers WHERE ans_id='".$rows['qid']."' ";
							  				$status1=mysqli_query($con,$query);
							  				while($rows_ = mysqli_fetch_array($status1)){ ?>
							  					<br><input type="radio" name="quizBox[<?php echo $rows['qid']?>]" value="<?php echo $rows_['aid'] ?>">
							  					<span><?php echo $rows_['answer'] ?></span>
							  			<?php	}
							  			?>
							  		</div>
							      
							<?php
							  } ?>
							  <input type="number" name="totalQuestions" value="<?php echo $count ?>" hidden>
							 <hr> <button class="btn-success" type="submit" name="finish" value="finish">Finish Test</button>
							  	</form>
							<?php }
							  else{ ?>
							      <div class="alert alert-danger mt-2" role="alert">
							  			<span>Uh - Oh! No quiz found with input subject, please select other subject</span>
							  	</div>
							  	<?php
							  }
							}
							?>
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