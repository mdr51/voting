<?php

session_start();

?>
<html>
    <head>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Election result</title>
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
            <h1 class="text text-center text-info" >Result Portion</h1>
        <p style="color:red;font-size:16px">here you can check result  those elections  are  closed</p>
        <form method="post" action="">
         <label>Election Name</label>
        <select class="form-control" name="election_name">
          <option value="" selected>Select Election</option>  
            
           <?php   include "dbcon.php";
            $currents=time();
               $elect="select * from add_election ";
               $query=mysqli_query($con,$elect);
               $nums=mysqli_num_rows($query);
               
               if($nums>0){
                  while($res=mysqli_fetch_array($query)){
                      $election_name=$res['election_name'];
                       $election_start=$res['election_start'];
                    $election_end=$res['election_end'];
                   ?>
            <?php    
            
              $election_end_ts=strtotime($election_end);
                      if($election_end_ts< $currents){
                        
                          ?>
            <option value="<?php  echo $election_name ?>"><?php  echo $election_name; ?></option>
            
                  <?php
                      }
            
            
                  
                  }
                   
               }
              
               ?>
            </select>    
          <br>
            <input type="submit"  name="submit" class="btn btn-success" value="Search Result">
        </form> 
            
            <br>
         <table class="table table-responsive table-hover table-bordered text-center">
            
            <tr>
            <th>#</th>
            <th>Candidate Name</th>
            <th>Obtain Votes</th>
            <th>Winning status</th>
            
             </tr>
             
               <?php
            
           if(isset($_POST['submit'])) {
               
               $election=$_POST['election_name'];
               $check="select * from result where election_name='$election'";
               $run=mysqli_query($con,$check);
               $row=mysqli_num_rows($run);
              $data=mysqli_fetch_array($run);
               
               if($row>0){
                   $votes=0;
                   while( $data=mysqli_fetch_array($run)){
                       
                    $votes=$votes+1;
                                    
                   }
                      
               }
               
            $select1="select * from add_candidate where election_name='$election'" ;
             $query=mysqli_query($con,$select1);
            $nums=mysqli_num_rows($query);
            $fetch=mysqli_fetch_array($query);
               
               if($nums>0){
                   
                   while( $fetch=mysqli_fetch_array($query)){
                       
                       $candidates=$fetch['candidate_name'];
                       $totalvotes=$fetch['total_votes'];
                       $per=(($totalvotes/$votes)*100);
                      ?>
             <tr>
             
             <td></td>
              <td><?php echo $candidates   ?></td>
             <td><?php echo   $totalvotes  ?></td>
            <td><?php  echo $per."%" ?></td>
             
             </tr>
             
               <?php
                       
                   }
               }
               
               
                     
           }
            
            
            
            
            
            ?>
            </table>   
          
    </div>
      </div>
        
    </body>
</html>








