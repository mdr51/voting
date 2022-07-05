<html>

<head>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> 
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
    swal("Good job!", "You clicked the button!", "success");
   
</script>
<?php
         header('location:register.php');
     }else{
         if($pass===$cpass){
             $destfile='upload/'.$filename;
     move_uploaded_file($filetmp,$destfile);
             $insert="insert into register(name,email,mobile,gender,dob,address,password,cpassword,image) values('$name','$email','$mobile','$gender','$dob','$address','$password','$cpassword','$destfile')";
             
             $iquery=mysqli_query($con,$insert);
             
             if($iquery){
                 echo "register success";
             }else{
                 echo "not registered";
             }
         }else{
             echo "passwords are not matching";
         }
     }
       
}
    
    ?>
</body>
</html>