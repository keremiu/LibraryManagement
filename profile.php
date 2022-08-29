<?php
  session_start();
  $link = mysqli_connect("localhost","root","","librarymanagement");
  $link -> set_charset("utf8mb4");
  if (mysqli_connect_errno()){
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
    $id = $_SESSION['tcno'];
?>
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
    <h1 style="margin-left:40%; font-family:roboto; letter-spacing:1.5px; font-size:20px; color:#fff;">KNA Library</h1>
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
            
        </ul>
    </nav>     
</div>
<?php
        $sql = "SELECT * FROM borrower WHERE \"$id\" = borrower.TCno ";
        if ($res = mysqli_query($link, $sql)) {
                if (mysqli_num_rows($res) > 0) {
                     while ($row = mysqli_fetch_array($res)) {
        ?>                
                        <nav id="bookInfNav" class="sidebar-nav" style="font-size:25px; margin-top:5%; margin-left:20%;font-family:roboto;font-weight: 700;" >
                        <div class="card" style="margin-top:-10% !important; margin-left:-5% !important;width: 500px !important; height:300px !important;" >
                                <p style="font-weight:500;color:#fff;font-size:23px;font-family:roboto;"><?php echo "Name: ".$row['Fname']." ".$row['Lname']."<br>\n";?><p>
                                <p style="font-weight:500;color:#fff;font-size:23px;font-family:roboto;"><?php echo "TcNo : ".$row['TCno']."<br>\n";?><p>
                                <p style="font-weight:500;color:#fff;font-size:23px;font-family:roboto;"><?php echo "Address : ".$row['Address']."<br>\n";?><p>
                                <p style="font-weight:500;color:#fff;font-size:23px;font-family:roboto;"><?php echo "Card Number : ".$row['Card_no']."<br>\n";?><p>
                        </div>
                         </nav>
       
        <?php
                        }
                        echo "</table>";
                        mysqli_free_result($res);
                }
                else {
                        echo "No matching records are found.";
                }
        }
        else {
        echo "ERROR: Could not able to execute $sql. "
                                .mysqli_error($link);
        }
        ?>
