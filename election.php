<?php 

session_start();

?>
<html>
    <head>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Election Page</title>
        <?php  include 'includes/links.php'; ?>
        <?php include 'style/indexs.css';  ?>
        
        <style>
            .img-responsive{
                width:50%;
                height:30%;
            }
        </style>
    </head>
    <body>
    
    <?php   include 'includes/header.php';  ?> 
     <div class="row">
           <div class="col-sm-8 col-sm-offset-2">
               <center>
              <img src="image/vote.png" class="img-responsive">
                </center>    
           </div>
          </div>   
      
       <div class="container-fluid">
         <div class="row">
             <br><br><br>
             <div class="col-sm-12">
                  <div class="col-sm-5"></div>
                  <div class="col-sm-3 main" style="background-color:skyblue">
                 
               <center> <h2 style=" ">Cast Your Vote</h2></center> 
                
                 <div>
                   <form  action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
    <input type="text" class="form-control" placeholder="enter your ID" name="user_id" required>
   <br> <input type="password" class="form-control" placeholder="enter your password" name="user_password" required>
   <br>
                       <center>     <input type="submit" class="btn btn-success" value="Enter Voting Area" style="margin-top:8px;border-radius:20px;" name="submit"></center>
          </form>
                     <br>
             
                 </div> 
                </div>
                  <div class="col-sm-5"></div>
             </div>
         </div>
        </div> 
        
      <br><br><br>
        <div class="row">
        <div class="col-sm-12">
     <p class="text text-center bg-primary text-info alert"> This site is designed and managed by &copy;Shiva insitution</p>
       </div>
   </div>    
        
    </body>
</html>


<?php  include 'dbcon.php';

if(isset($_POST['submit']))
{
   $uid=$_POST['user_id'] ;
   $upass=$_POST['user_password'] ; 
 
  $mat="select * from register where generateid	='$uid'" ;
    $check=mysqli_query($con,$mat);
    $nums=mysqli_num_rows($check);
  
    if($nums){
           $emailpass=mysqli_fetch_array($check);
           $_SESSION['gid']=$emailpass['generateid'];
          $dbpass=$emailpass['password'];
            $pass_check=password_verify($upass,$dbpass);
            if($pass_check){
                ?>
        <script>
           window.location.href="vote.php";
       </script>
              <?php
            }else{
                   ?>
    <script>
     swal("Incorrect password!", "please try again later!", "error");
    </script>
    <?php

            }
        }
    else{
        ?>
    <script>
     swal("Invalid Id!", "please try again later!", "error");
    </script>
    <?php
    }
    
}


?>














