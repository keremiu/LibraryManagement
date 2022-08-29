<?php
  include("header2.php");
  $control=0;
    if(isset($_POST["submit"])){
        $conn = mysqli_connect("localhost", "root", "", "librarymanagement");
        if($conn === false){
            die("ERROR: Could not connect. "
                . mysqli_connect_error());
        }
        $Pname =  $_POST['Pname'];
        $Plocation =  $_POST['Plocation'];
        
        if(strlen($Pname)>0 )
        {
            $sql = "INSERT INTO publisher VALUES ('$Pname','$Plocation')";
            if(mysqli_query($conn, $sql)){
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
            <h1 style="margin-top:15px;">Add Publisher</h1>
            <form action="addpublisher.php" method="POST">
                
                <p>
                <label for="Pname ">Publisher Name:</label>
                <input type="text" class='w3-input' style="width:70%;border-radius: 25px;" name="Pname" id="Pname">
                </p>        
                <p>
                <label for="Plocation">Publisher location:</label>
                <input type="text" class='w3-input' style="width:70%;border-radius: 25px;" name="Plocation" id="Plocation">
                </p>                    
                <input class='ghost-round2 full-width' style="width:45%;border-radius: 25px;" type="submit" value="Submit" name="submit">
                <?php
                    if($control==2) {
                        ?><p style="color#fff;"><?php echo "Publisher name size has to be more than 0 length. Please enter the correct values.";?></p><?php
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