<?php

$server='localhost';
$username="root";
$password="";
$db='vote';

$con=mysqli_connect($server,$username,$password,$db);
if($con)
{
    ?>
<script>
alert('Connection successfull');
</script>
<?php
}else{
    ?>
<script>
alert('No Connection');
</script>
<?php
}


?>