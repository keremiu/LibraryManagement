<?php
  include("header2.php");
  $control = 0;
  if(isset($_POST["submit"]))
  {
        $conn = mysqli_connect("localhost", "root", "", "librarymanagement");
        if($conn === false){
            die("ERROR: Could not connect. "
                . mysqli_connect_error());
        }
        $TCno  =  $_POST['TCno'];
        $Fname =  $_POST['Fname'];
        $Lname  =  $_POST['Lname'];
        $Btype  =  $_POST['Btype'];
        $Address  =  $_POST['Address'];
        $email  =  $_POST['email'];
        $Card_no  = $_POST['Card_no'];
        $User_Type = 1;
        if(strlen($TCno)==11 && strlen($Card_no)==10)
        {
            $sql = "INSERT INTO BORROWER VALUES ('$TCno','$Fname','$Lname','$Btype','$Address','$email','$Card_no','$User_Type')";

            if(mysqli_query($conn, $sql)){
                $control = 1;
            } else{
                $control = 2;
            }
            mysqli_close($conn);
        }
        else
        {
            $control = 2;
        }
    }
?>
<html lang="en">
    <div class="container2" style="margin-left:24%; margin-top:2%">
    <div class="content" style="text-align: center;">
        <div class="overlay2" style="height: 800px !important;">
            <div class="input-line2">
            <h1 style="margin-top:15px;">Add Member</h1>
            <form action="addmember.php" method="POST">
                
                <p>
                <label for="TCno ">TC Number:</label>
                <input type="text" class='w3-input' style="width:70%;border-radius: 25px;" name="TCno" id="TCno">
                </p> 
                <p>
                <label for="Fname">First Name:</label>
                <input type="text" class='w3-input' style="width:70%;border-radius: 25px;" name="Fname" id="Fname ">
                </p>
                <p>
                <label for="Lname">Last Name:</label>
                <input type="text" class='w3-input' style="width:70%;border-radius: 25px;" name="Lname" id="lastName">
                </p>
                <p>
                <label for="Btype">User Type:</label>
                <input type="text" class='w3-input' style="width:70%;border-radius: 25px;" name="Btype" id="Btype ">
                </p>
                <p>
                <label for="Address">Address:</label>
                <input type="text" class='w3-input' style="width:70%;border-radius: 25px;" name="Address" id="Address">
                </p>       
                <p>
                <label for="Lname">Email Account:</label>
                <input type="text" class='w3-input' style="width:70%;border-radius: 25px;" name="email" id="email">
                </p>           
                    <p>
                <label for="Card_no">Card number:</label>
                <input type="text" class='w3-input' style="width:62%;border-radius: 25px;" name="Card_no" id="Card_no">
                </p>           
                <input class='ghost-round2 full-width' style="width:45%;border-radius: 25px;" type="submit" name="submit" value="Submit">
                <?php
                    if($control==2) {
                        ?><p style="color#fff;"><?php echo "Tc number size has to be 11 And Card number size has to be 10 in length. Please enter correct values.";?></p><?php
                    }
                    else if($control==1){
                        ?><p style="color#fff;"><?php echo "Succed!"; ?></p><?php
                    }
                ?>
            </form>
         </div>
        </div>
</body>
</html>