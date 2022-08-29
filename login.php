<?php
  session_start();
  $link = mysqli_connect("localhost","root","","librarymanagement");
  $link -> set_charset("utf8mb4");
  if (isset($_POST["submit"])) {
    $tc = $_POST["login_id"];
    $sql = "SELECT usertype FROM employee WHERE employee.tcno = $tc";
    $query = mysqli_query($link,$sql);
    $result = mysqli_fetch_array($query);

    if ($result == null){
      $sql = "SELECT usertype FROM borrower WHERE borrower.tcno = $tc";
      $query = mysqli_query($link,$sql);
      $result = mysqli_fetch_array($query);
      $usertype= $result['usertype'];
    }
    else{
      $usertype= $result['usertype'];
    }
    session_destroy();
    if($result == null){
      header("location:login.php?msg=failed");
    }  
    else if($usertype == 2){
      header("location:header2.php?$tc");
    }
    else if($usertype == 1){
      header("location:header.php?$tc");
    }
    else if($usertype == 0){
      header("location:header2.php?$tc");
    }
  }
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
<div class='bold-line'></div>
 <div class='container'>
  <div class='window'>
    <div class='overlay'></div>
      <div class='content' style=" margin-top:20%">
      <div id=""><img src="book.png" style="width:80px;"></div>
      <div class='input-fields'>
        <form method="post" action='login.php' id="formmmm"> 
          <input type='text' placeholder='Identity Number' class='input-line full-width' name='login_id'></input>
          <input type='password' placeholder='Password' class='input-line full-width' name='login_password'></input>
          <input type='submit' class='ghost-round full-width' value='Login' name='submit'>
          <?php if (isset($_GET["msg"]) && $_GET["msg"] == 'failed') {
                      if(isset($_POST["submit"])==null){
                        ?><h1 style="text-align:center;letter-spacing:1.5px;font-size:15px;font-family:roboto;font-weight:700;color:#fff">
                        <?php echo "Incorrect identity number or password!"?></h1><?php
                      }
                }
          ?>
        </form>
      </div>
    </div>
  </div>
</div>


</body>
</html>