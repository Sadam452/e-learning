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
			<div class="card mt-5 rounded-3" style="box-shadow: 0px 0px 20px 8px var(--bs-gray-800);background: rgb(255,251,251);">
                    <div class="card-body d-flex flex-column align-items-center py-5">

                        <h2 class="mb-5"><b>Create a Quiz</b></h2>
						<span> Now it is easy to create quizzes for your students by following these simple steps:</span>
							<ol>
								<li>Register with us</li>
								<li>Login</li>
								<li>Click "Create Quiz"</li>
								<li>Submit questions</li>
								<li>View quiz results & many more...</li>
							</ol>
						<div class="mb-3"><button class="btn btn-success d-block w-100 mt-2" type="submit" name="button" onclick="window.location.href='createQuiz.php';" value="start">Create Quiz</button>
						</div>
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