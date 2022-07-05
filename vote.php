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
            <label>Election Name</label>
           <select class="form-control" name="post">
               <option>Select Election</option>
            <?php   include "dbcon.php";
              $gid=$_SESSION['gid'];


               $elect="select * from add_election ";
               $query=mysqli_query($con,$elect);
               $nums=mysqli_num_rows($elect);
               
               while($res=mysqli_fetch_array($query)){
                    $election=$res['election_name'];
                   ?>
               <option><?php echo $election ?></option>
                  <?php 
               }
               
               ?>
            </select> 
            <br>
        <input type="submit" value="Search Candidate" name="submit" class="btn btn-success">
        </form>    
    </div>
      </div>
        
    </body>
</html>


<?php

date_default_timezone_set("Asia/Kolkata");

if(isset($_POST['submit'])){
    
   $elections=$_POST['post'];
   $select="select * from add_election where election_name='$elections'";
    $run=mysqli_query($con,$select);
    $num=mysqli_num_rows($run);
    
    if($num>0){
        while($res=mysqli_fetch_array($run)){
           $election_start=$res['election_start'];
           $election_end=$res['election_end'];
        }
    }
    
  $current_ts=time();
   $election_start_ts=strtotime($election_start);
   $election_end_ts=strtotime($election_end);
    
   if( $election_start_ts>$current_ts) {
       ?>
 <div class="col-sm-6 col-sm-offset-3">
     <h1 class="text text-center text-info alert bg-info">Election did not started please wait....</h1>
</div>
<?php
   }else if($current_ts>$election_end_ts){
       ?>
 <div class="col-sm-6 col-sm-offset-3">
     <h1 class="text text-center text-info alert bg-info">Election process has been ended you have not caste your vote....</h1>
</div>
<?php
   }else{
    ?>

     <div class="col-sm-6 col-sm-offset-3">
     <h3  class="text text-center text-info alert bg-info"> you can caste your vote....<a href="votecaste.php?election_name=<?php echo $elections ?>">Click here</a>  </h3>
</div>


     <?php   
    
   }
 
    
    
    
    
}


?>









