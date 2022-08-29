<?php
  include("header2.php");
  $control=0;
  if(isset($_POST["submit"])){
      $conn = mysqli_connect("localhost", "root", "", "librarymanagement");
      if($conn === false){
            die("ERROR: Could not connect. "
               . mysqli_connect_error());
      }
      $ISBN  =  $_POST['ISBN'];
      $Book_id  =  $_POST['Book_id'];
      $Title  =  $_POST['Title'];
      $Author_id  =  $_POST['Author_id'];
      $Content  =  $_POST['Content'];
      $Category  =  $_POST['Category'];
      $Language  =  $_POST['Language'];
      $Publisher_name  =  $_POST['Publisher_name'];
      $Pub_date  =  $_POST['Pub_date'];
      $edition  =  $_POST['edition'];
      $Page_num  =  $_POST['Page_num'];


      if(strlen($Book_id)==12 && strlen($ISBN)==13 && strlen($Author_id)==10 && strlen($Publisher_name)>0)
      {
            $sql = "INSERT INTO BOOK VALUES ('$ISBN','$Book_id','$Title','$Author_id','$Content','$Category','$Language','$Publisher_name','$Pub_date','$edition','$Page_num')";
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
<div class="container2" style="margin-left:24%; margin-top:1%;">
    <div class="content" style="text-align: center;">
        <div class="overlay2 " style="height: 700px !important;">
            <div class="input-line2" style="margin-top:2% !important">
            <h1 style="margin-top:10px; font-size: 22px">Add Book</h1>
            <form action="addBook.php" method="post">
            <p>
               <label style="margin-left:-3% !important" for="ISBN">ISBN:</label>
               <input type="text" style="width:30%;border-radius: 25px;"name="ISBN" id="ISBN">
               <label for="Book_id ">Book id:</label>
               <input type="text"style="width:30%;border-radius: 25px;"name="Book_id" id="Book_id">
            </p> 
            <p>
               <label style="margin-left:-1% !important" for="Title ">Title:</label>
               <input type="text" style="width:30%;border-radius: 25px;" name="Title" id="Title">
               <label for="Author_id ">Author id:</label>
               <input type="text" style="width:30%;border-radius: 25px;"name="Author_id" id="Author_id">
            </p> 
            <p>
               <label style="margin-left:-4% !important" for="Content">Content:</label>
               <input type="text" style="width:30%;border-radius:25px;"name="Content" id="Content">
               <label for="Category ">Category:</label>
               <input type="text"style="width:30%;border-radius: 25px;" name="Category" id="Categoryy">
            </p> 
            <p>
               <label style="margin-left:-2% !important" for="Language ">Language:</label>
               <input type="text"style="width:30%;border-radius: 25px;" name="Language" id="Language">
               <label for="Pub_date">Publish Date:</label>
               <input type="text" style="width:30%;border-radius: 25px;"name="Pub_date" id="Pub_date">
            </p> 
            <p>
               <label style="margin-left:-13% !important" for="Publisher_name">Publisher_name:</label>
               <input type="text" style="width:30%;border-radius: 25px;"name="Publisher_name" id="Publisher_name">
               <label for="edition">Edition:</label>
               <input type="text" style="width:30%;border-radius: 25px;"name="edition" id="edition">
            </p>        
             <p>
               <label style="margin-left:-20% !important" for="Page_num">Number Of Pages:</label>
               <input type="text" style="width:30%;border-radius: 25px;"name="Page_num" id="Page_num">
            </p>
            <input class='ghost-round2 full-width' type="submit" style="width:45%;border-radius: 25px;" value="Submit" name="submit">
            <?php
               if($control==2) {
                  ?><p style="color#fff;"><?php echo "ISBN size has to be 13 And Book_id size has to be 12 in length. Please enter correct values.";?></p><?php
                  }
                  else if($control==1){
                     ?><p style="color#fff;"><?php echo "Succed!"; ?></p><?php
                  }
                ?>
         </form>
   </body>
</html>