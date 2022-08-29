<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="style.css">

<title>Blog</title>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light" id="firstnav">
  <a class="navbar-brand" ><img src="user.png" style="width:30px;"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="index.php" style="color:#ffffff; font-size:18px;" >Main Menu <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="profile.php" style="color:#ffffff; font-size:18px;">Profile</a>
      </li>
      
	</ul>
    <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button style= "border-color:#ffffff" class="btn btn-outline-success" type="submit" id="searchbtn">Search</button>
    </form>
  </div>
    <a href="login.php"><button style="background-color:#ffffff; border-color:#440758" type="submit" class="btn btn-warning" id="giris" name="cikis">Logout</button></a>
</nav>
<div id="left-sidebar" class="menu-nav ">
    <nav id="left-sidebar-nav" class="sidebar-nav">
        <ul class="metismenu"> 
            <br><br>
            <a href="book.php"><button style="border-color:#440758" class="btn btn-outline-success" type="submit" id="Book" name="Book"><img src="arrow.png" style="margin-right:8%; width:15px;">Books</button></a><br><br>     
            <a href="author.php"><button style="border-color:#440758" type="submit" class="btn btn-outline-success" id="Author" name="Author"><img src="arrow.png" style="margin-right:8%; width:15px;">Authors</button></a><br><br>  
            <a href="category.php"><button style="border-color:#440758" type="submit" class="btn btn-outline-success" id="Category" name="Category"><img src="arrow.png" style="margin-right:8%; width:15px;">Categories</button></a><br><br><br><br><br><br>

            <a href="borrowed.php"><button style="border-color:#440758" type="submit" class="btn btn-outline-success" id="BorrowedBooks" name="Borrowed Books"><img src="arrow.png" style="margin-right:8%; width:15px;">Borrowed Books</button></a><br><br>

            <a href="help.php"><button style="border-color:#440758" type="submit" class="btn btn-outline-success" id="Help" name="Help"><img src="arrow.png" style="margin-right:8%; width:15px;">Help</button></a><br><br>  
            <a href="contact.php"><button style="border-color:#440758" type="submit" class="btn btn-outline-success" id="Contact" name="Contact"><img src="arrow.png" style="margin-right:8%; width:15px;">Contact</button></a><br><br>  
            <a href="settings.php"><button style="border-color:#440758" type="submit" class="btn btn-outline-success" id="Settings" name="Settings"><img src="arrow.png" style="margin-right:8%; width:15px;">Settings</button></a><br><br>  
  
        </ul>
    </nav>     
</div>
