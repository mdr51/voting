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
    
    <div class="container">
        <div class="row">
            <h3 class="text text-center text-info">Pending request for id verification</h3>
            <table class="table table-responsive">
                <thead>
                  <tr>
                   <th>id</th> 
                    <th>name</th>
                    <th>email</th>
                    <th>dob</th>
                    <th>address</th>
                    <th>Action</th>
                 </tr>
                </thead>
            <tbody>
               <?php include'conn.php';
          
            $select="select * from requestid";
            $query=mysqli_query($con,$select);
            $count=mysqli_num_rows($query);
            $res=mysqli_fetch_array($query);
            $total=0;
                $id=$res['id'];
                while($res=mysqli_fetch_array($query)){
                  $total=$total+1;
                    ?>
            <tr>
                <td><?php echo $total   ?></td>
                <td> <?php  echo $res['name'];  ?></td>
                <td> <?php echo $res['email'];    ?></td>
                <td> <?php  echo $res['dob'];  ?></td>
                <td> <?php  echo $res['address'];   ?></td>
                <td><a href="updates.php?id=<?php echo $res['id']; ?>" data-toggle="tooltip" data-placement="top" title="Update"><i class="fa fa-edit"></i></a></td>
            </tr>  
                        
                  <?php 
                }
            
            ?>
                </tbody>
                </table>
            </div>
        </div>
    
    
<script>
    $(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
    </script>
        </body>
</html>

