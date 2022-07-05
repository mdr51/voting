<?php
 session_start();
?>
<html>
    <head>
        <?php include 'includes/links.php'; ?>
        <?php include 'style/reg.css'; ?>
        <style>
            .img-responsive{
                width:80%;
                height:20%;
            }
        </style>
    </head>
<body>
    
    <?php  include 'dbcon.php';
    
    $user_email=$_SESSION['useremail'];
        
$check="select * from requestid where email='$user_email'";
$qu=mysqli_query($con,$check);
$nums=mysqli_num_rows($qu);
 
if($nums>0){
    ?>
    <center>
    <h1 class="text text-center text-info  alert">You have already submitted</h1>
    </center>
    <?php
    
}
    else
{
    $select="select * from register where email='$user_email'";
    $equery=mysqli_query($con,$select);
    $data=mysqli_fetch_array($equery);
    
    
   ?> 
    
    <?php  include 'includes/header.php';  ?> 
    <div class="row">
           <div class="col-sm-8 col-sm-offset-2">
               <center>
              <img src="image/vote.png" class="img-responsive" style="height:300px;width:60%">
                </center> 
         </div>
    </div>
    
    <div class="container-fluid">
         <div class="row">
             <br><br><br>
             <div class="col-sm-12">
                  <div class="col-sm-5"></div>
                  <div class="col-sm-3 main" style="background-color:skyblue">
                 
               <center> <h2 style="color:red">Submit a Request for ID</h2></center> 
                 <p>for getting ID card </p>
                 
                 <div>
                   <form  action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
    <label for="name">Name</label>
    <input type="text" class="form-control"  name="name" required value="<?php echo $data['name']; ?>" readonly>
    <label for="name">Email</label>
   <input type="text" class="form-control"  name="email" required value="<?php echo $data['email'];?>" readonly>
    <label for="name">Dob</label>
     <input type="text" class="form-control" name="dob" required value="<?php echo $data['dob'];$udob ?>" readonly>
   <label for="name">Address</label>
    <input type="text" class="form-control"  name="address" required value="<?php echo $data['address']; ?>" readonly>
                       <center><input type="submit" class="btn btn-success" value="Request ID" style="margin-top:8px;border-radius:20px;width:80%" name="submit"></center>
          </form>
                     <br>
            
                 </div> 
                </div>
                  <div class="col-sm-5"></div>
             </div>
         </div>
        </div>

   ?>    
}
    
  <br><br>
       <br><br>
    <div class="row">
        <div class="col-sm-12">
     <p class="text text-center bg-primary text-info alert"> This site is designed and managed by &copy;Shiva insitution</p>
       </div>
   </div>
 
    </body>
</html>            
         
   
<?php

if(isset($_POST['submit'])){
$user_email=$_SESSION['useremail'];    
$name=$_POST['name'];    
$email=$_POST['email'];     
$dob=$_POST['dob'];     
$address=$_POST['address']; 
    
   $insert="insert into requestid(name,email,dob,address)
   values('$name','$email','$dob','$address')";
  $fire=mysqli_query($con,$insert);
    if($fire){
        ?>
     <script>
  alert('submit success');
   </script>
<?php
    }else{
         ?>
     <script>
  alert('server error');
   </script>
  <?php
    }
}
    

?>
    
      








