<html>
    <head>
        
        <title>Registration</title>    
         <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <script src="js/jquery-2.1.0.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,600;0,600;1,200&display=swap" rel="stylesheet">
        <?php include 'style/reg.css' ?>
       
    </head>
<body>
    <?php   include 'dbcon.php';
    
   
if(isset($_POST['submit'])){
    
       $name=$_POST['name'];
       $email=$_POST['email'];
       $mobile=$_POST['mobile'];
       $gender=$_POST['gender'];
       $dob=$_POST['dob'];
       $address=$_POST['address'];
       $pass=$_POST['pass'];
       $cpass=$_POST['cpass'];
        $file=$_FILES['photo'];
       $password=password_hash($pass,PASSWORD_BCRYPT);
       $cpassword=password_hash($cpass,PASSWORD_BCRYPT);
     
    
  // print_r($file); 
    
$filename=$file['name'];
$filetmp=$file['tmp_name'];
$fileerror=$file['error'];

   
                
      $emailq="select * from register where email='$email'";
      $squery=mysqli_query($con,$emailq);
      $emailcount=mysqli_num_rows($squery);
     if($emailcount>0){
        ?>
 
<script>
    swal("Email already exits!", "You have already used this email!", "warning");
 
</script>
<?php
       
     }else{
         if($pass===$cpass){
             $destfile='upload/'.$filename;
     move_uploaded_file($filetmp,$destfile);
             $insert="insert into register(name,email,mobile,gender,dob,address,password,cpassword,image) values('$name','$email','$mobile','$gender','$dob','$address','$password','$cpassword','$destfile')";
             
             $iquery=mysqli_query($con,$insert);
             
             if($iquery){
                 ?>
    <script>
           window.location.href="login.php";  
    </script>
    
    <?php
            }else{
                  ?>
    <script>
     swal("Some error Occured!", "please try again later!", "error");
    </script>     
    <?php
             }
         }else{
              ?>
    <script>
swal("Password and confirm passwords do not match!", "please fill both password are same!", "warning");

    </script>
    <?php
             
         }
     }
       
}
    
    ?>
    
    <?php include('includes/header.php'); ?>
    <br><br>
    <div class="container-fluid">
         <div class="row">
             <br><br><br>
             <div class="col-sm-12">
                  <div class="col-sm-4"></div>
                  <div class="col-sm-4 main" style="background-color:skyblue;">
                 
                 <h2 style="font-weight:400;color:blue" class="txt txt-info">Registration</h2>
                 <p>Get started with your e-voting system</p>
                 
                  <p class="l"><a class="fa fa-Google gm">&nbsp;&nbsp;Login Via Google</a></p>
                  <p class="l" style="background-color:#707499"><a class="fa fa-facebook  fb">&nbsp;&nbsp;Login Via facebook</a></p>    
                  <br>    
                      <p class="divider">OR</p>  
                   <br>
                 <div>
                   <form  action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" class="form-inline" enctype="multipart/form-data">
    <input type="text" class="form-control" placeholder="enter your name" name="name" required>
    <input type="text" class="form-control" placeholder="enter your email address" name="email" required>
    <input type="text" class="form-control" placeholder="enter your mobile no" name="mobile" required>
    <select name="gender" class="form-control" style="width:200px;">
      <option value="male">Male</option>
      <option value="female">Female</option>
    </select>
    <input type="date" class="form-control" name="dob" required style="width:200px;">
    <input type="text" class="form-control" placeholder="enter your address" name="address" required>
    <input type="password" class="form-control" placeholder="create a password" name="pass" required>
    <input type="text" class="form-control" placeholder="confirm password" name="cpass" required>
     <center><label>Upload photo :</label>
    <input type="file" name="photo" class="form-control"></center>
                       <br><br>  <center>     <input type="submit" class="btn btn-success" value="Create Account" style="margin-top:8px; padding:10px;width:190px;border-radius:20px"name="submit"></center>
          </form>
                     <br>
            <p style="font-size:16px;">already Registered?&nbsp;&nbsp;<a href="login.php">log in</a></p> 
                 </div> 
                </div>
                  <div class="col-sm-5"></div>
             </div>
         </div>
        </div>
    <br><br>
    <div class="row">
        <div class="col-sm-12">
     <p class="text text-center bg-primary text-info alert"> This site is designed and managed by &copy;Shiva insitution</p>
       </div>
   </div> 
    </body>
</html>