<?php
    include("header2.php");
    $control=0;
        if(isset($_POST["submit"]))
        {
        $conn = mysqli_connect("localhost", "root", "", "librarymanagement");
        if($conn === false){
            die("ERROR: Could not connect. "
                . mysqli_connect_error());
        }
        $Fname =  $_POST['Fname'];
        $Lname = $_POST['Lname'];
        $Id =  $_POST['Id'];
        if(strlen($Id)==10)
        {
            $sql = "INSERT INTO author VALUES ('$Fname','$Lname','$Id')";
            if(mysqli_query($conn, $sql)){
                $control=1;
            } else{
                $control=2;
            }
            mysqli_close($conn);
        }
        else{
            $control=2;
        }
        }
        ?>

<html lang="en">
    <div class="container2" style="margin-left:24%; margin-top:2%">
    <div class="content" style="text-align: center;">
        <div class="overlay2">
            <div class="input-line2">
            <h1 style="margin-top:15px;">Add Author</h1>
            <form action="addAuthor.php" method="POST">
                
                <p>
                <label for="Fname">First Name:</label>
                <input type="text" class='w3-input' style="width:70%;border-radius: 25px;" name="Fname" id="firstName">
                </p>        
                <p>
                <label for="Lname">Last Name:</label>
                <input type="text" class='w3-input' style="width:70%;border-radius: 25px;" name="Lname" id="lastName">
                </p>           
                    <p>
                <label for="Id">Id:</label>
                <input type="text" class='w3-input' style="width:62%;border-radius: 25px;" name="Id" id="Id">
                </p>           
                <input class='ghost-round2 full-width' style="width:45%;border-radius: 25px;" type="submit" name="submit" value="Submit">
                <?php
                if($control==2) {
                    ?><p style="color#fff;"><?php echo "Id size has to be 10 in length. Please enter correct values.";?></p><?php
                }
                else if($control==1){
                    ?><p style="color#fff;"><?php echo "Succeed!"; ?></p><?php
                }
                ?>
            </form>
         </div>
        </div>
</body>
</html>