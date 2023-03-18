<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="utf-8">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light shadow" style="background-color: #e3f2fd;"id="navbar">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php#courses">Courses</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php#tutors">Tutors</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            About Us
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="index.php#about">About</a></li>
            <li><a class="dropdown-item" href="index.php#contact">Contact Us</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="index.php#query">Query</a>
        </li>
        <?php if(isset($_SESSION['email'])){ ?>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="logout.php">Logout</a>
        </li>
        <?php if($_SESSION['role'] == "student"){ ?>
          <li class="nav-item">
          <a class="nav-link" aria-current="page" href="student-home.php">Student home</a>
          </li>
        <?php }if($_SESSION['role'] == "tutor"){ ?>
          <li class="nav-item">
          <a class="nav-link" aria-current="page" href="tutor-home.php">Tutor home</a>
          </li>
        <?php }if($_SESSION['role'] == "admin"){ ?>
          <li class="nav-item">
          <a class="nav-link" aria-current="page" href="admin-home.php">Admin home</a>
          </li>
        <?php }} ?>

      </ul>
      <form class="d-flex"action="https://google.com/search" target="_blank" type="GET">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="q" required>
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
</body>
</html>