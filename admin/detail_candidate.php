<html>
    <head>
               <title>Add Candidate</title>
               <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/font-awesome.min.css" rel="stylesheet">
        <script src="../js/jquery-2.1.0.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,600;0,600;1,200&display=swap" rel="stylesheet">
    <style>
        
        .form-control{
            border: 1px solid black;
        }
        
        </style>
    
    </head>
    <body>
    
    <div class="container">
        <div class="col-sm-5 col-sm-offset-4">
        <form method="POST" >
        
        <?php include 'conn.php';
            
           $election_name=$_GET['post'];
           $totalcandidate=$_GET['total'];
        ?>
            
           <input type="text"  name="election_name" class="form-control" value="<?php echo $election_name ?>" readonly> 
            <br>
            <?php
            
          for($i=1;$i<=$totalcandidate;$i++) {
             
             ?> 
        
           <div class="form-group">
            
            <label>Candidate Name <?php echo $i; ?></label>
            
            <input type="text" name="candidate_name<?php echo $i;?>" class="form-control">
            
            </div> 
            
            <?php  
          } 
            
            
         ?>
            
        <input type="submit" value="AddCandidate" name="submit" class="btn btn-success">
        </form>    
    </div>
      </div>
    
        
        </body>
</html>



<?php


if(isset($_POST['submit'])){
  $election_name=$_POST['election_name'];
  $totalcandidate=$_GET['total'];
    
   for($i=1;$i<=$totalcandidate;$i++) {
       
  $candidates_name[]=$_POST['candidate_name'.$i] ;
       
   }
    
    
  for($i=0;$i<$totalcandidate;$i++){
      
      $insert="insert into add_candidate(candidate_name,election_name)
      values('$candidates_name[$i]','$election_name') ";
      $run=mysqli_query($con,$insert);
      if($run){
         
          ?>
  <script>
 
      window.location.href="add_candidate.php";
      
</script>
<?php
      }else{
                 ?>
  <script>
 
     swal("Server error!","please try again later!","error");
      
</script>
<?php
      }
      
  }  
    
    
    }


?>










