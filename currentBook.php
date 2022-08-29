
<?php   
        include("book.php");
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
                <div class="card" style="margin-left: 20%; margin-top:1%; background-color:#b873d0 !important;position:fixed; ;width: 1200px; height: 700px !important;">
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
<script>
        let elements = document.getElementsByClassName("formmmm")
        for (let i = 0; i < elements.length; i++) {
            elements[i].style.visibility = "hidden"
        }
</script>

</div>
</div>
</body>
</html>