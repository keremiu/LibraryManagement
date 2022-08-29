<?php
  include("header.php");
  
?>

     <?php
        
         $sql= "SELECT * FROM book ORDER BY book.title ASC";
         $result=mysqli_query($link, $sql);
         while($row = mysqli_fetch_array($result)){
      ?>
        <div id="content" class="container" style="height:0px;margin-left:25%;">
            <nav id="buttons-page" class="sidebar-nav" >
                 <form method="post" action="currentBook.php" class="formmmm"> 
                    <button style="border-color:#440758; font-weight: 700;text-transform: uppercase; letter-spacing:1.5px; font-family:roboto; background-color:#e2cfe8; width:1000px; font-size:20px; font-width:50%; margin-top:-140px;" type="submit" class="btn btn-outline-secondary " name="<?php echo $row["Book_id"]?>" onclick="press()">
                        <?php echo $row["Title"];?>
                    </button>
                 </form> 
            </nav>
         </div>
    <?php
         }
         $sql= "SELECT * FROM book";
         $result=mysqli_query($link, $sql);
         while($row = mysqli_fetch_array($result)){
            if(isset($_POST[$row["Book_id"]])){
                $_SESSION['idBook'] = $row["Book_id"];
                break;
            }
         }

    ?>




<script>
    const press = () => {
        let elements = document.getElementsByClassName("formmmm")
        for (let i = 0; i < elements.length; i++) {
            elements[i].style.visibility = "hidden"
        }
    }
    document.getElementById("buttons-page").style.height = 0
</script>