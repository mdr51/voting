<?php

session_start();


?>
<html>
<head>
    <title>Login</title>    
         <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <script src="js/jquery-2.1.0.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,600;0,600;1,200&display=swap" rel="stylesheet">
        <?php include 'style/reg.css' ?>
    <body>
        
    <?php  include 'dbcon.php';  
        
    if(isset($_POST['submit'])){
        
       $email=$_POST['email'];
       $password=$_POST['password'];
        
       $emailsearch= "select * from register where email='$email'";
       $equery=mysqli_query($con,$emailsearch);
       $emailcount=mysqli_num_rows($equery);
     if($emailcount){
        $emailpass=mysqli_fetch_assoc($equery);
        $dbpass=$emailpass['password'];
        $_SESSION['username']=$emailpass['name'];
        $_SESSION['useremail']=$emailpass['email'];
        $pass_check=password_verify($password,$dbpass);
         if($pass_check){
             header('location:userzone.php');
         }else{
               ?>
    <script>
     swal("Wrong password!", "please try again later!", "error");
    </script>
    <?php
         }
            
     }else{
           ?>
    <script>
     swal("Invalid Email!", "please try again later!", "error");
    </script>
    <?php
     }
        
        
    }     
      ?>
        
        
        
    <?php include 'includes/header.php'?>
        
    <div class="container-fluid">
         <div class="row">
             <br><br><br>
             <div class="col-sm-12">
                  <div class="col-sm-5"></div>
                  <div class="col-sm-3 main" style="background-color:skyblue">
                 
               <center> <h2 style=" ">Login your account</h2></center> 
                 <p>Get started with your free account</p>
                 
                  <p class="l"><a class="fa fa-Google gm">&nbsp;&nbsp;Login Via Google</a></p>
                  <p class="l" style="background-color:#707499"><a class="fa fa-facebook  fb">&nbsp;&nbsp;Login Via facebook</a></p>    
                  <br>    
                      <p class="divider">OR</p>  
                   <br>
                 <div>
                   <form  action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
    <input type="text" class="form-control" placeholder="enter your email" name="email" required>
    <input type="password" class="form-control" placeholder="enter your password" name="password" required>
   
                       <center>     <input type="submit" class="btn btn-info" value="Login now" style="margin-top:8px;border-radius:20px;" name="submit"></center>
          </form>
                     <br>
            <p>don't have account?<a href="register.php">Sign up here</a></p> 
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
    </head>
</html>