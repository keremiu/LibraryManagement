<?php
  include("header2.php");
  $mgrtc = $_SESSION['tcno'];
  $control=0;
    if(isset($_POST["submit"])){
        $conn = mysqli_connect("localhost", "root", "", "librarymanagement");
        if($conn === false){
            die("ERROR: Could not connect. "
                . mysqli_connect_error());
        }
        $Tcno =  $_POST['TcNo'];
        $Fname =  $_POST['Fname'];
        $StaffID =  $_POST['Staff_id'];
        $Lname = $_POST['Lname'];
        $usertype = 0;
        
        if(strlen($Tcno)==11 && strlen($StaffID)==10)
        {
            $sql1 = "INSERT INTO employee VALUES ('$Tcno','$Fname','$StaffID','$Lname','$usertype')";
            $sql2 = "INSERT INTO staff VALUES ('$Tcno','$mgrtc')";
            if(mysqli_query($conn, $sql1)){
                $control=1;
            } else{
                $control=2;
            }
            if(mysqli_query($conn, $sql2)){
                $control=1;
            } else{
                $control=2;
                
            }
            mysqli_close($conn);
        }
        else
        {
            $control=2;
        }
    }
?>
<html lang="en">
    <div class="container2" style="margin-left:24%; margin-top:2%">
    <div class="content" style="text-align: center;">
        <div class="overlay2">
            <div class="input-line2">
            <h1 style="margin-top:15px;">Add Employee</h1>
            <form action="addEmployee.php" method="POST">
                
                <p>
                <label for="Fname">First Name:</label>
                <input type="text" class='w3-input' style="width:70%;border-radius: 25px;" name="Fname" id="firstName">
                </p>        
                <p>
                <label for="Lname">Last Name:</label>
                <input type="text" class='w3-input' style="width:70%;border-radius: 25px;" name="Lname" id="lastName">
                </p>           
                <p>
                <label for="Id">Tc Number:</label>
                <input type="text" class='w3-input' style="width:62%;border-radius: 25px;" name="TcNo" id="TcNo">
                </p>
                <p>
                <label for="Id">Staff ID:</label>
                <input type="text" class='w3-input' style="width:62%;border-radius: 25px;" name="Staff_id" id="Id">
                </p>            
                <input class='ghost-round2 full-width' style="width:45%;border-radius: 25px;" type="submit" value="Submit" name="submit">
                <?php
                    if($control==2) {
                        ?><p style="color#fff;"><?php echo "Tc number size has to be 11 And Staff ID size has to be 10 in length. Please enter correct values.";?></p><?php
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
