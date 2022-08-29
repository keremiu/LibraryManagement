<?php
  include("header2.php");
  
?>	
<?php
        $sql= "SELECT * FROM employee";
        $resultall=mysqli_query($link, $sql);
        while($row = mysqli_fetch_array($resultall)){
           if(isset($_POST[$row["TCno"]])){
               if($row["usertype"] == 0){
                       $sqlin= "SELECT * FROM MANAGER WHERE ".$row['TCno']." = TCno;";
                       $query=mysqli_query($link, $sqlin);
                       if(mysqli_num_rows($query) > 0){
                               $sql_del = "DELETE FROM MANAGER WHERE ".$row['TCno']." = TCno;";
                               $query=mysqli_query($link, $sql_del);
                               $result = mysqli_fetch_array($query);
                               if($result == null)
                                       echo "error while deleting";
                       }
                       else{
                               //echo "not a manager";
                       }

                       $sqlin= "SELECT * FROM STAFF WHERE ".$row['TCno']." = TCno;";
                       $query=mysqli_query($link, $sqlin);
                       if(mysqli_num_rows($query) > 0){
                               $sql_del = "DELETE FROM STAFF WHERE ".$row['TCno']." = TCno;";
                               $query=mysqli_query($link, $sql_del);
                               $result = mysqli_fetch_array($query);
                               if($result == null){}
                                       //echo "error while deleting";
                       }
                       else{
                               //echo "not a staff";
                       }
                       $sql_del = "DELETE FROM EMPLOYEE WHERE ".$row['TCno']." = TCno;";
                       
                       if(mysqli_query($link, $sql_del)){
                               //echo "Deleting succesfullly completed";
                       }
                       else{}
                               //echo "error while deleting";
               }
           }
        }


        $sql = "SELECT * FROM Employee";
        $query = mysqli_query($link,$sql);
        $result = mysqli_fetch_array($query);
        
        if ($res = mysqli_query($link, $sql)) {
                if (mysqli_num_rows($res) > 0) {
                     while ($row = mysqli_fetch_array($res)) {
        ?>  
                       <div class="card" style="margin-left:15%; float:left; margin-top:2%;" >
                                <p style="font-weight:500;color:#fff;font-size:23px;font-family:roboto;"><?php echo "Name : ".$row['Fname']." ".$row['Lname']."<br>\n";?><p>
                                <p style="font-weight:500;color:#fff;font-size:23px;font-family:roboto;"><?php echo "TcNo : ".$row['TCno']."<br>\n";?><p>
                                <p style="font-weight:500;color:#fff;font-size:23px;font-family:roboto;"><?php echo "StaffID : ".$row['Staff_id']."<br>\n";?><p>
                        
                                <form action="showEmployees.php" method="post">
                                <button style="border-radius: 12px;margin-top:5%;margin-left:-28% ;border-color:#440758; font-weight: 700;text-transform: uppercase; letter-spacing:1.5px; font-family:roboto; background-color:#e2cfe8; font-size:20px; font-width:50%;" id="EmployeeID" type="submit" class="btn btn-outline-secondary" type="submit" name="<?php echo $row["TCno"]?>">Fire</button>
                                </form>
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