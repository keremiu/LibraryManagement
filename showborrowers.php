<?php
  include("header2.php");
  
?>	
<?php
        $sql = "SELECT * FROM borrower";
        $query = mysqli_query($link,$sql);
        $result = mysqli_fetch_array($query);
        
        if ($res = mysqli_query($link, $sql)) {
                if (mysqli_num_rows($res) > 0) {
                     while ($row = mysqli_fetch_array($res)) {
        ?>  
                       <div class="flip-card" style="float:left; margin-left:20%;">
                                <div class="flip-card-inner">
                                    <div class="flip-card-front">
                                        <p style="font-weight:500;color:#fff;font-size:23px;font-family:roboto;"><?php echo "Name : ".$row['Fname']." ".$row['Lname']."<br>\n";?><p>
                                        <p style="font-weight:500;color:#fff;font-size:23px;font-family:roboto;"><?php echo "Adress: ".$row['Address']."<br>\n";?><p>
                                        <p style="font-weight:500;color:#fff;font-size:23px;font-family:roboto;"><?php echo "Card number : ".$row['Card_no']."<br>\n";?><p>
                                        <p style="font-weight:500;color:#fff;font-size:23px;font-family:roboto;"><?php echo "Email: ".$row['email']."<br>\n";?><p>
                                    </div>
                                    <div class="flip-card-back"><?php
                                            $cnp = $row['Card_no'];
                                            $sql2 = "SELECT * FROM book inner join borrowed_book on book.book_id = borrowed_book.book_id where \"$cnp\" = borrowed_book.Card_no ";
                                            $query2 = mysqli_query($link,$sql2);
                                            $result2 = mysqli_fetch_array($query2);
                                            
                                            if ($res2 = mysqli_query($link, $sql2)) {
                                                if (mysqli_num_rows($res2) > 0) {
                                                     while ($row2 = mysqli_fetch_array($res2)) {?>
                                                     <?php $Start_date = $row2['Start_date']; 
                                                     $remain = $row2['Duration'];
                                                     ?>
                                                            <p style="font-weight:500;color:#fff;font-size:23px;font-family:roboto;"><?php echo "Title : ".$row2['Title']."<br>";?>
                                                            <p style="font-weight:500;color:#fff;font-size:23px;font-family:roboto; margin-top:-5%;"><?php echo "Due Date : ".date('Y-m-d', strtotime($Start_date. ' + '.$remain.' days'))."<br>\n";?></p>
                                                    <?php
                                                     }
                                                }
                                            }
                                        ?>
                                    </div>
                                </div>
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
        ?>