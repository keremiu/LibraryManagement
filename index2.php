<?php
  include("header2.php");
  $sql = "SELECT COUNT(*) as total FROM book";
  $query = mysqli_query($link,$sql);
  $result = mysqli_fetch_array($query);
  
  $sql2 = "SELECT COUNT(*) as total FROM borrower";
  $query2 = mysqli_query($link,$sql2);
  $result2 = mysqli_fetch_array($query2);

  $sql3 = "SELECT COUNT(*) as total FROM employee";
  $query3 = mysqli_query($link,$sql3);
  $result3 = mysqli_fetch_array($query3);

  $sql4 = "SELECT COUNT(*) as total FROM publisher";
  $query4 = mysqli_query($link,$sql4);
  $result4 = mysqli_fetch_array($query4);


?>
<div id="adminsection" class = "section" style="margin-left:25%;"> 
    <div class="card">
    <h4 class="card-title" style="font-weight: 700;color:#fff;margin-top:5%; font-size:40px; text-align:center;font-family:roboto;">Total Books</h4>
           <h1 style="font-weight: 700;color:#fff;margin-top:5%; font-size:40px; text-align:center;font-family:roboto;"><?php echo $result['total']; ?></h1>
    </div>
    <div class="card" style="top:200px;">
           <h4 class="card-title" style="font-weight: 700;color:#fff;margin-top:5%; font-size:40px; text-align:center;font-family:roboto;">Total Members</h4>

           <h1 style="font-weight: 700;color:#fff;margin-top:5%; font-size:40px; text-align:center;font-family:roboto;"><?php echo $result2['total']; ?></h1>
    </div>
    <div class="card" style="top:-444px; left:700px;">
           <h4 class="card-title" style="font-weight: 700;color:#fff;margin-top:5%; font-size:40px; text-align:center;font-family:roboto;">Total Employees</h4>

           <h1 style="font-weight: 700;color:#fff;margin-top:5%; font-size:40px; text-align:center;font-family:roboto;"><?php echo $result3['total']; ?></h1>
    </div>
    <div class="card" style="top:-307px; left:700px;">
           <h4 class="card-title" style="font-weight: 700;color:#fff;margin-top:5%; font-size:40px; text-align:center;font-family:roboto;">Total Publishers</h4>

           <h1 style="font-weight: 700;color:#fff;margin-top:5%; font-size:40px; text-align:center;font-family:roboto;"><?php echo $result4['total']; ?></h1>
    </div>
</div>


</body>
</html>