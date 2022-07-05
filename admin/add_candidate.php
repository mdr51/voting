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
        <form method="GET" action="detail_candidate.php">
            <label>Election Name</label>
           <select class="form-control" name="post">
            <?php   include "conn.php";
              
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
        <label>No. of candidate</label>    
     <input type="text" class="form-control" name="total" >
            <br>
        <input type="submit" value="Add Candidate" name="submit" class="btn btn-success">
        </form>    
    </div>
      </div>
    
        
        </body>
</html>

