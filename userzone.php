<?php
session_start();

if(!isset($_SESSION['username'])){
   header('location:login.php'); 
}

?>


<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Welcome Page</title>
        <?php  include 'includes/links.php'; ?>
        <?php include 'style/indexs.css';  ?>
        
        <style>
            .img-responsive{
                width:80%;
                height:60%;
            }
        </style>
    </head>
    <body>
    
    <?php   include 'includes/header.php';  ?> 
        
      <div class="row" >
        <nav class="navbar navbar-default" style="background-color:lightgray">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">
        <img alt="Brand" src="image/vote.png" class="img img-responsive">
      </a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav" style="color:blue">
        <li class="active"><a href="userzone.php">Hi!<?php echo $_SESSION['username'] ?> <span class="sr-only">(current)</span></a></li>
        <li><a href="#" style="color:black" class="hvr hvr-push">Parties</a></li>
        <li><a href="generate.php" style="color:black">ID Generator</a></li>
        <li><a href="election.php" style="color:black">Election</a></li>
        <li><a href="result.php" style="color:black">Result</a></li>
        <li><a href="logout.php" style="color:black">Logout</a></li>
      </ul>
     
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
          
       <div class="row">
           <div class="col-sm-8 col-sm-offset-2">
               <center>
              <img src="image/vote.png" class="img-responsive">
                </center>    
           </div>
          </div>
          
     </div>       
       <div class="row">
          
          <div class="col-sm-1"></div>
          <div class="col-sm-5">
           <h1 class="text text-center text-info bg-primary alert">How to caste Your Vote</h1>
           <ul style="color:black;font-weight:500;font-size:17px">
           <li>First select <b>"ID Generate"</b> From navigation bar</li>
           <li>Then request to admin for<b> ID</b> genrate</li>
           <li>Admin will <b>approve your request</b> you will get a unique ID</li>
           <li><b>Copy and note  your ID </b> for cast vote vote</li>
           <li>Go to Election panel and <b>login with your ID and password</b></li>
           <li>you will redirect to voting panel </li>
            <li>Select election name and complete your vote</li>
           </ul>
           </div>
           <div class="col-sm-5">
           <center>
              <img src="image/votes.jpg" class="img-responsive" style="width:100%;height:300px">
                </center>    
           
           </div>
          <div class="col-sm-1"></div>
           
          </div>   
          
          
           <br><br>
       <br><br>
    <div class="row">
        <div class="col-sm-12">
     <p class="text text-center bg-primary text-info alert"> This site is designed and managed by &copy;Shiva insitution</p>
       </div>
   </div>     
          
          
      
    </body> 
</html>















