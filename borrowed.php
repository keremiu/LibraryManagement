<?php
    include("header.php");
    $id = $_SESSION['tcno'];
?>

<?php
        $sql = "SELECT Card_no FROM borrower WHERE \"$id\" = borrower.TCno ";
        $query = mysqli_query($link,$sql);
        $result = mysqli_fetch_array($query);

        
        if($result==null){
            
          echo "There is no borrowed book.";
            
        }
        else{
          $Card_no= $result['Card_no'];
          $sql = "SELECT * FROM borrowed_book inner join book on book.book_id = borrowed_book.book_id WHERE borrowed_book.Card_no = \"$Card_no\"";
          $query = mysqli_query($link,$sql);
          $result = mysqli_fetch_array($query);
          $Book_id= $result['Book_id'];
          
          if ($res = mysqli_query($link, $sql)) {
                  if (mysqli_num_rows($res) > 0) {
                      while ($row = mysqli_fetch_array($res)) {

          ?>              <div class="card" style="float:left; margin-left:17%;">
                                <nav id="bookInfNav" class="sidebar-nav" style="font-size:25px; margin-top:5%; margin-left:20%;font-family:roboto;font-weight: 700;" >
                                        <p style="font-weight:500;color:#fff;font-size:23px;font-family:roboto;"><?php echo "Title : ".$row['Title']."<br>\n";?><p>
                                        <p style="font-weight:500;color:#fff;font-size:23px;font-family:roboto;"><?php echo "Start date : ".$row['Start_date']."<br>\n";?><p>
                                        <p style="font-weight:500;color:#fff;font-size:23px;font-family:roboto;"><?php echo "Due date: ".$row['Duration']."<br>\n";?><p> <!-- işlem lazım !!!!!!!!!!!!!!!!!!!!!!!11-->
                                </nav>
                        </div>
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
      }
        ?>
