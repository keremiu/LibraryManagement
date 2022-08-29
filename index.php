<?php
  include("header.php");
  $tcbr = $_SESSION['tcno'];
  $sql0 = "SELECT * FROM borrower where borrower.tcno =  $tcbr";
  $query0 = mysqli_query($link,$sql0);
  $result0 = mysqli_fetch_array($query0);
  $cn= $result0['Card_no'];

  $sql = "SELECT COUNT(*) as total FROM book";
  $query = mysqli_query($link,$sql);
  $result = mysqli_fetch_array($query);
  
  $sql2 = "SELECT COUNT(*) as total FROM author";
  $query2 = mysqli_query($link,$sql2);
  $result2 = mysqli_fetch_array($query2);

  $sql3 = "SELECT COUNT(*) as total FROM borrowed_book where borrowed_book.card_no = $cn";
  $query3 = mysqli_query($link,$sql3);
  $result3 = mysqli_fetch_array($query3);
  
  $sql5 = " SELECT distinct Category  from book ";
  $query5 = mysqli_query($link,$sql5);
  $rowCount = mysqli_num_rows($query5);

?>
<div id="adminsection" class = "section" style="margin-left:25%;"> 
    <div class="card">
    <h4 class="card-title" style="font-weight: 700;color:#fff;margin-top:5%; font-size:40px; text-align:center;font-family:roboto;">Total Books</h4>
           <h1 style="font-weight: 700;color:#fff;margin-top:5%; font-size:40px; text-align:center;font-family:roboto;"><?php echo $result['total']; ?></h1>
    </div>
    <div class="card" style="top:200px;">
           <h4 class="card-title" style="font-weight: 700;color:#fff;margin-top:5%; font-size:40px; text-align:center;font-family:roboto;">Total Authors</h4>

           <h1 style="font-weight: 700;color:#fff;margin-top:5%; font-size:40px; text-align:center;font-family:roboto;"><?php echo $result2['total']; ?></h1>
    </div>
    <div class="card" style="top:-444px; left:700px;">
           <h4 class="card-title" style="font-weight: 700;color:#fff;margin-top:5%; font-size:40px; text-align:center;font-family:roboto;">Total Borrowed Books</h4>

           <h1 style="font-weight: 700;color:#fff;margin-top:5%; font-size:40px; text-align:center;font-family:roboto;"><?php echo $result3['total']; ?></h1>
    </div>
    <div class="card" style="top:-307px; left:700px;">
           <h4 class="card-title" style="font-weight: 700;color:#fff;margin-top:5%; font-size:40px; text-align:center;font-family:roboto;">Total Category</h4>

           <h1 style="font-weight: 700;color:#fff;margin-top:5%; font-size:40px; text-align:center;font-family:roboto;"><?php echo $rowCount; ?></h1>
    </div>
</div>


</body>
</html>