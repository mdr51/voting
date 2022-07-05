<?php

session_start();

if(!$_SESSION['gid']){
    header("location:election.php");
}

?>
<html>
    <head>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Voting  Page</title>
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
        
      <br>
        <br>
        
    <div class="container">
        <div class="col-sm-5 col-sm-offset-4">
        <form method="post">
         <?php  include 'dbcon.php';
            
        $election_name=$_GET['election_name'] ;
   echo "<input type='text' class='form-control' value='$election_name' readonly> <br>";
        $select= "select * from add_candidate where election_name='$election_name' "; 
        $race=mysqli_query($con,$select);
        $count=mysqli_num_rows($race);
        
            if($count>0){
                
                while($row=mysqli_fetch_array($race)){
                    $vot=$row['total_votes'];
                   ?>
            <div class="form-group">
        <input type="radio" name="candidates_name" class="list-group" value="<?php echo $row['candidate_name'] ?>">
        <label><?php echo $row['candidate_name'] ?></label>
          </div>         
                  <?php
                    
                }
                
                
            }
            
            
            
            ?>
            
            
            <input type="submit" class="btn btn-success" name="submit"  value="Now caste your Vote">
        </form>    
    </div>
      </div>
        
    </body>
</html>


<?php


if(isset($_POST['submit'])){
    
   $candidate_name=$_POST['candidates_name'];
  $user_email= $_SESSION['useremail']; 
   
    
   $search="select * from result where user_email='$user_email' and election_name='$election_name' " ;
    $fire=mysqli_query($con,$search);
    $count=mysqli_num_rows($fire);
    if($count>0){
                     ?>
  <div class="col-sm-6  col-sm-offset-3">
      <h1 class="text text-center text-danger alert">you have already cast your vote against  election&nbsp;&nbsp;<?php echo $election_name  ?></h1>
    <center> <a href="userzone.php" class="text text-center alert" style="font-size:18px;">Back to Home</a></center> 
  </div>

     <?php

    
    }
    else{
   $insert="insert into result (user_email,candidate_name,election_name)
   values('$user_email','$candidate_name','$election_name')" ;
    $run=mysqli_query($con,$insert);
    if($run){
        
       $update= " update add_candidate set total_votes=`total_votes`+'1'
       where candidate_name='$candidate_name' and election_name='$election_name'" ;
     $exe=mysqli_query($con,$update);
        if($exe){
            ?>
  <div class="col-sm-6  col-sm-offset-3">
      <h1 class="text text-center text-danger alert">You have successfully voted</h1>  
  </div>
   <center> <a href="userzone.php" class="text text-center alert" style="font-size:18px;">Back to Home</a></center> 
     <?php
        }
        else{
                       ?>
  <div class="col-sm-6  col-sm-offset-3">
      <h1 class="text text-center text-danger alert">You vote has not done please try again</h1>    <center> <a href="userzone.php" class="text text-center alert" style="font-size:18px;">Back to Home</a></center>  
  </div>

     <?php

        }
       
        
    }else{
        echo "error";
    }
    
    
}

}
?>






