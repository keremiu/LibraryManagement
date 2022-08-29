
<?php   
        include("bookadmin.php");
        $var_value = $_SESSION['idBook'];
        

 ?>
        <?php
        /*ISBN, Title Author_id Language Publisher_name Pub_date edition Page_num*/
        $sql = "SELECT * FROM book WHERE $var_value=book.book_id";
        $query = mysqli_query($link,$sql);
        $result = mysqli_fetch_array($query);
        $authorid= $result['Author_id'];
        /* Author name */
        $sql2 = " SELECT * FROM author WHERE author.id = \"$authorid\" ";
        $query2 = mysqli_query($link,$sql2);
        $result2 = mysqli_fetch_array($query2);
        $fnameAu= $result2['Fname'];
        $lnameAu= $result2['Lname'];
        ?>
        <div id="adminsection" class = "section"> 
                <div class="card" style="margin-left: 20%; margin-top:3%; background-color:#b873d0 !important; position:fixed ;width: 1200px; height: 700px !important;">
        <?php
        if ($res = mysqli_query($link, $sql)) {
                if (mysqli_num_rows($res) > 0) {
                     while ($row = mysqli_fetch_array($res)) {
        ?>            
                        
                        <nav id="bookInfNav" class="sidebar-nav" style="font-size:25px; margin-top:5%; margin-left:20%;font-family:roboto;font-weight: 700;" >
                        <p style="font-weight:700;color:#fff;font-size:30px;font-family:roboto;"><?php echo "Title: ".$row['Title']."<br>\n";?><p>
                        <p style="font-weight:700;color:#fff;font-size:30px;font-family:roboto;"><?php echo "Author Name: ".$fnameAu." ".$lnameAu."<br>\n";?><p>
                        <p style="font-weight:700;color:#fff;font-size:30px;font-family:roboto;"><?php echo "Category : ".$row['Category']."<br>\n";?><p>
                        <p style="font-weight:700;color:#fff;font-size:30px;font-family:roboto;"><?php echo "Publisher Name: ".$row['Publisher_name']."<br>\n";?><p>
                        <p style="font-weight:700;color:#fff;font-size:30px;font-family:roboto;"><?php echo "Published Date: ".$row['Pub_date']."<br>\n";?><p>
                        <p style="font-weight:700;color:#fff;font-size:30px;font-family:roboto;"><?php echo "Edition: ".$row['edition']."<br>\n";?><p>
                        <p style="font-weight:700;color:#fff;font-size:30px;font-family:roboto;"><?php echo "Number Of Pages: ".$row['Page_num']."<br>\n";?><p>
                        <p style="font-weight:700;color:#fff;font-size:30px;font-family:roboto;"><?php echo "ISBN: ".$row['ISBN']."<br>\n";?><p>
                        <form action="currentbookadmin.php" method="post">
                        <label style="margin-left:-25% !important; color:#fff !important;" for="Title ">Card No:</label>
                        <input type="text" placeholder="Borrower's card number" style="color:#000;width:40%;border-radius: 25px;" name="CardNo" id="CardNo">
                            <button style="border-radius: 12px;border-color:#440758; font-weight: 700;text-transform: uppercase; letter-spacing:1.5px; font-family:roboto; background-color:#e2cfe8; font-size:20px; font-width:50%;" id="BorrowedButton" type="submit" class="btn btn-outline-secondary" type="submit" name="submit">Lend The Book</button>
                        </form>
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

        if(isset($_POST["submit"])){
                if(isset($_POST["CardNo"]) && $_POST["CardNo"] != ""){

                        $tc = $_SESSION['tcno'];
                        $staff_sql = "SELECT * from employee where $tc = employee.TCno";
                        $query = mysqli_query($link,$staff_sql);
                        $result = mysqli_fetch_array($query);
                        $staff_id = $result["Staff_id"];
                        
                        $date_sql = "SELECT CURDATE();";
                        $query = mysqli_query($link,$date_sql);
                        $result = mysqli_fetch_array($query);
                        $date = $result["CURDATE()"];
                        

                        if(isset($_POST["CardNo"])){


                        $card_no = $_POST["CardNo"];
                        $count = "SELECT count(*) as total from borrowed_book where  $card_no = borrowed_book.card_no";
                        $query = mysqli_query($link,$count);
                        $result = mysqli_fetch_array($query);
                        $count= $result['total'];
                        if($count >= 5){
                                ?><p style="font-weight:700;color:#fff;font-size:20px;font-family:roboto;"><?php echo "The borrower can not have more than 5 books!";?></p><?php
                        }
                        else{
                                $sql_insert = "INSERT INTO BORROWED_BOOK VALUES('$card_no', '$var_value', 30, '$date', '$staff_id');";
                                if(mysqli_query($link,$sql_insert)){
                                        ?><p style="margin-top:2%;font-weight:700;color:#fff;font-size:20px;font-family:roboto;text-align:center;"><?php echo "Succed!";?></p><?php
                                }
                                else{
                                        ?><p style="margin-top:2%;%font-weight:700;color:#fff;font-size:20px;font-family:roboto;text-align:center;"><?php echo "Failed! Please enter correct card number!";?></p><?php
                                }
                        }
                        }
                }
                else{
                        ?><p style="margin-top:12%;font-weight:700;color:#67287c;font-size:20px;font-family:roboto;text-align:center;"><?php echo "Failed! Please enter a card number!";?></p><?php
                }
        }
        ?>
<script>
        let elements = document.getElementsByClassName("formmmm")
        for (let i = 0; i < elements.length; i++) {
            elements[i].style.visibility = "hidden"
            elements[i].style.height = "0"
        }
</script>

</div>
</div>
</body>
</html>