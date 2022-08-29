
<?php   
        include("author.php");
        $var = $_SESSION['AuthorId'];
        

 ?>
        
        <?php
        $sql = "SELECT * FROM book WHERE book.author_id = $var ";

        $sql2 = " SELECT Fname,Lname FROM author WHERE  $var = author.Id";
        $query = mysqli_query($link,$sql2);
        $result = mysqli_fetch_array($query);
        $fname= $result['Fname'];
        $lname= $result['Lname'];
        ?>
        <h1 style="text-align:center;margin-left:18%; margin-top:-300px"><img src="wingrotated.png" style="width:80px;"></h><h style="text-align:center;letter-spacing:1.5px;font-size:40px;font-family:roboto;font-weight:700;color:#460c5a">
        <?php echo " ".$fname." ".$lname."'s Books  " ?><img src="wing.png" style="width:80px;"></h1><br>
        <?php
        if ($res = mysqli_query($link, $sql)) {
                if (mysqli_num_rows($res) > 0) { /*type="button" class="btn btn-light*/
                     while ($row = mysqli_fetch_array($res)) { ?>                 
                        <nav id="authorInfNav" class="sidebar-nav" style="letter-spacing:1.2px;font-size:25px;font-family:roboto;margin-left:18%;font-weight:400; text-align:center;" >
                            <form method="post" action="currentBook.php">
                            <button style="border-color:#440758; font-weight: 700;text-transform: uppercase; letter-spacing:1.5px; font-family:roboto; background-color:#e2cfe8; width:1384px; font-size:20px; font-width:50%;" type="submit" class="btn btn-outline-secondary " name="<?php echo $row["Book_id"]?>" onclick="press()">
                            <?php echo $row["Title"];?>
                            </form>
                         </nav>
                        
        <?php
                        }
                        echo "</table>";
                        mysqli_free_result($res);
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


</body>
</html>