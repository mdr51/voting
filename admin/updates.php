<html>
    <head>
               <title>Request Details</title>
               <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/font-awesome.min.css" rel="stylesheet">
        <script src="../js/jquery-2.1.0.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,600;0,600;1,200&display=swap" rel="stylesheet">

 
    
    </head>
    <body>
        
     <?php include 'conn.php';  
     
       $ids=$_GET['id'];
       $select="select * from requestid where id='$ids'" ;
       $run=mysqli_query($con,$select);
       $num=mysqli_num_rows($run);
       $arr=mysqli_fetch_array($run);
    $address=$arr['address'];
      $pre="";
      $post="";
   switch($address){
        
       case "UP" :
           $pre="UP";
           $post="XYZ";
           $rand=rand(213456,895678);
           $gid=$pre.$rand.$post;
      break; 
           
      case "MP" :
           $pre="MP";
           $post="XYZ";
           $rand=rand(213456,895678);
           $gid=$pre.$rand.$post;
      break;  
    
      case "Punjab" :
           $pre="PUN";
           $post="XYZ";
           $rand=rand(213456,895678);
           $gid=$pre.$rand.$post;
      break;  
           
       case "delhi" :
           $pre="DEL";
           $post="XYZ";
           $rand=rand(213456,895678);
           $gid=$pre.$rand.$post;
      break; 
           
       default:
        $pre="EVOTE";
           $post="XYZ";
           $rand=rand(213456,895678);
           $gid=$pre.$rand.$post;
                   
     }
            
      ?>  
    
    <div class="container">
        <div class="row">
            <h3 class="text text-center text-info">Generate ID</h3>
        <br><br>
        <div  class="col-sm-4 col-sm-offset-4 "  style="background-color:aqua">
            <br>
          <form action="" method="POST"> 
              <label>Name</label>
             <input type="text" class="form-control" name="name" 
                    value="<?php echo $arr['name']  ?>" readonly>
              <br>
               <label>Email</label>
             <input type="text" class="form-control" name="email"  value="<?php echo $arr['email']  ?>" readonly>
              <br>
               <label>Address</label>
             <input type="text" class="form-control" name="address"  value="<?php echo $arr['address']  ?>" readonly> 
              
              <label>ID</label>
              <input type="text" class="form-control" name="idcard" value="<?php echo  $gid ?>" readonly>
              <center>
              <br>
              <input type="submit" value="Verfiy" name="submit" class="btn btn-danger" style="border-radius:20px;width:200px">      
              </center>
          </form>   
            </div>
        
        </div>
    </div>
       
<?php 
if(isset($_POST['submit'])){
  $name=$_POST['name'];
  $email=$_POST['email'];
  $address=$_POST['address'];
  $idcard=$_POST['idcard'];
    
 $update="update register set generateid='$idcard' where email='$email'"  ;
$fire=mysqli_query($con,$update);
 if($fire) {
     $delete="delete from requestid where email='$email'";
     $del=mysqli_query($con,$delete);
     if($del){
        ?>
        <script>
        alert('Data Updated and deleted Successfully' );
        </script>
        <?php
         header("location:request.php");
     }else{
         ?>
       <script>
     swal("Some error occured!", "please try again later!", "error");
    </script> 
        <?php
     }
     
 }else{
     ?>
       <script>
     swal("Some thing is wrong!", "please try again later!", "error");
    </script> 
        
    <?php
 }
    
    
}

?>
        </body>
</html>




