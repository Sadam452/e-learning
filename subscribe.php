<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Learn With Us - Home</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="style.css">
	<style type="text/css">
        #success- {
            margin-top: 100px;
            width: 50%;
            margin-left: 25%;
        }
		@media(max-width:600px){
			#courses,#tutors {
				display: block;
			}
		#c1,#c2,#c3,#c4,#h5,#t1,#t2,#t3,#t4,#line {
			margin-left: 25%;
			margin-top: 5px;
		}
}
	</style>
</head>
<body>
    <?php
    include("header.php");
    ?>
    <br><br><br>
<div class="alert alert-warning alert-dismissible fade show" role="alert" id="success-">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<?php
    include("footer.php");
?>
</body>
</html>
<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
$email=$_POST['email'];
$con=mysqli_connect('localhost','root','12345');
mysqli_select_db($con,'elearning');
$q="INSERT INTO subscribers (email) VALUES ('$email') ";
$result=mysqli_query($con,$q);
if($result==1)
{
  echo "
  <script type=\"text/JavaScript\"> 
  document.getElementById(\"success-\").innerHTML = \"You have successfully subscribed to our services! Thank you!\";
  </script>
  ";
}
else
{
  echo "
  <script type=\"text/JavaScript\"> 
  document.getElementById(\"success-\").innerHTML = \"Uh-Oh! some problem occured, This email is already in use!\";
  </script>
  ";
}
}
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>