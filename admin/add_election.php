<html>
    <head>
               <title>Add Election</title>
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
    
    <div class="col-sm-3 col-sm-offset-4">
        <h1 class="text text-center text-info ">Add Election</h1><br>
        <form method="post">
            <label>Election Name</label>
           <input type="text" name="e_name" class="form-control">
          <label>Election start date</label>
           <input type="date" name="e_start" class="form-control">
          <label>Election end date</label>
           <input type="date" name="e_end" class="form-control">
            <br>
       <center> <input type="submit" value="Add Election" name="submit" class="btn btn-success" style="width:200px;font-size:19px"></center>
        </form>    
    </div>
    
        
        
        <?php  include 'conn.php';
        
        if(isset($_POST['submit'])){
            
            $e_name=$_POST['e_name'] ;
            $e_start=$_POST['e_start'] ;
            $e_end=$_POST['e_end'] ;
 
  $mat="select * from add_election where election_name='$e_name'" ;
    $check=mysqli_query($con,$mat);
    $nums=mysqli_num_rows($check);
            
        if($nums>0) {
             ?>
        <script>
           swal("Election already exits!","please try again later!","error");
       </script>
              <?php
        }else{
            $insert="insert into add_election(election_name,election_start,election_end)
            values('$e_name','$e_start','$e_end')";
            $q=mysqli_query($con,$insert);
            if($q){
                ?>
        <script>
           swal("Election inserted successfully!","please add candidate also!","success");
       </script>
              <?php
            }else{
                ?>
        <script>
           swal("Connection error!","please try again later!","error");
       </script>
              <?php
            }
        }   
            
        }
        
        
        ?>
        </body>
</html>

