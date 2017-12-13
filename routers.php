
<?include('header.php');?>

<? if(isset($_GET['pid'])) { 

$uno=$_GET['pid'];

           $sqln="select * from users where id=".$uno."";
  $result = $conn->query($sqln);
  
  
  if ($result->num_rows > 0) {
      // output data of each row
while($row = $result->fetch_assoc()) {
       $pnemail=$row['email'];
       $im=$row['image_url'];
       $uname=$row['name'];
       $username=$row['username'];
       $description=$row['description'];
       $rt=$row['routers'];
}
  } 
  
  if($pnemail==$email) {
  	header("location: myrouters.php");
  }


$skn="select * from users where email='".$email."'";
  $result = $conn->query($skn);

  if ($result->num_rows > 0) {
      // output data of each row
while($row = $result->fetch_assoc()) {
 $userno=$row['id'];
}
}
?>
<div class="container text-center">    
  <div class="row">
   <div class="col-sm-3 well" style="background-color:white;">
    
      <div class="well" style="background-color:white;">
        


            <img src=<?php echo $im; ?> class='img-circle' height="75" width="75" alt='Avatar'>
            <br />
            <br />
<p><b><? echo $uname; ?></b></p>
      
<?
 $do=explode(",",$rt);
$pn=0;
for($i=0;$i<count($do);$i++) {
if($do[$i]==$userno){
$pn=1;
}

}

if($pn==0){

    echo '<a href="route.php?pid='.$uno.'&&uid='.$userno.'" style="text-decoration:none;"><button class="btn btn-warning">route</button></a>';
    
    }
    else {
   echo '<a href="unroute.php?pid='.$uno.'&&uid='.$userno.'"><button id="routed" class="btn btn-primary">routed</button></a>';    
}



?>

<? echo '<a href="routers.php?pid='.$uno.'"><button class="btn btn-success">routers</button></a>';?>

      </div>
      
   <script>
   
$("#routed").hover(function() {

   $(this).html("unroute").addClass("btn btn-danger");
}, function() {
	 $(this).html("routed").removeClass("btn btn-danger");
  $(this).html("routed").addClass("btn btn-primary");
  
})   
   </script>   
     
      <div class="well">
        <p><b>my question tags</b></p>
  
 <?      $sql = "SELECT * FROM qtable";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
$uidrow= $row['uid'];

$uids=explode(',', $uidrow);

for($g=0;$g<count($uids);$g++) {

       if($uids[$g]==$uno) {


?>

          <div><a style="text-decoration:none;" href="tagps.php?id=<? echo $row['id']; ?>"><span class="label label-danger"><? echo $row['tag'];?></span></a></div>
          
<? 

$g=count($uids);
}
} 
}
}    ?>    
       
      </div>
     
      <div class="well">
        <p><b>my subject tags</b></p>
  
 <?      $sql = "SELECT * FROM tags";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
$uidrow= $row['uid'];

$uids=explode(',', $uidrow);

for($g=0;$g<count($uids);$g++) {

       if($uids[$g]==$uno) {


?>

         <div><a style="text-decoration:none;" href="tagps.php?id=<? echo $row['id']; ?>"><span class="label label-primary"><? echo $row['tag'];?></span></a></div>
           
<? 

$g=count($uids);
}
} 
}
}    ?>    
       
      </div>
     
     
     
    </div>
    <div class="col-sm-7">

    
      <div class="row">
        <div class="col-sm-12">
          <div class="panel panel-default text-left">
            <div class="panel-body">
              <p><?
          if($description=='') { echo "user haven't described himself";}    
              else {
               echo $description; }?></p>
              
            </div>
          </div>
        </div>
      </div>
      
          
    
<?
echo "<div style='float:left; margin-left:20px;'>
<h3> routers : </h3>
</div>";


$d=explode(",",$rt);

$count=count($d)-1;

if($count>=1) {
for($i=0;$i<$count;$i++) {

$l=0;
if($d[$i]!=''){

$sqln= "select * from users where id=".$d[$i]."";
$result = $conn->query($sqln);
  
  
  if ($result->num_rows > 0) {
      // output data of each row

   while($row = $result->fetch_assoc()) {
   	
    echo"<div class='row'>
        <div class='col-sm-12'>
          <div class='panel panel-default text-left' style='width:440px;'>
            <div class='panel-body'>
            
            <img src=".$row['image_url']." alt='Avatar' class='w3-left w3-circle w3-margin-right' style='width:60px'>
            <h4 ><a href=profile.php?id=".$row['id']." style='color:black;'>".$row['name']."</a></h4>";
            
            if($row['email']==$email) {
            	echo "<p style='magin-left:40px;'>it's you :)</p>";
            	
            }
            else{
 $do=explode(",",$row['routers']);
$pn=0;
for($j=0;$j<count($do);$j++) {


if($do[$j]==$userno){
$pn=1;
}

}

if($pn==0){

    echo '<a href="route.php?pid='.$row['id'].'&&uid='.$userno.'" style="text-decoration:none;"><button class="btn btn-warning">route</button></a>';
    
    }
    else {
   echo '<a href="unroute.php?pid='.$row['id'].'&&uid='.$userno.'"><button id="routed'.$l.'" class="btn btn-primary">routed</button></a>';    
}



?>

<? echo '

      
   <script>
   
$("#routed'.$l.'").hover(function() {

   $(this).html("unroute").addClass("btn btn-danger");
}, function() {
	 $(this).html("routed").removeClass("btn btn-danger");
  $(this).html("routed").addClass("btn btn-primary");
  
})   
   </script>   ';
            
            
            
            }
            
 echo    '</div></div></div></div>';


$l++;
}
}
}
}
}


else {
	echo "<div style='margin-top:70px; float:left; margin-right:30px;'>";
	echo "<h4>".$uname." don't have any routers!</h4>";
	echo "</div>";
	}



?>    
 
  
      </div>     
   
     <div class="col-sm-2 well" style="background-color: white;">
   <div class="well" style="border:none; background-color: white;" >
  
   <?    if($username=='') {echo "  <p><b>user haven't set unique username</b></p>";
 
echo "<br />
      <br />";   
   
   }
   
       else { echo '<p><b>username is: </b></p>';
       	 echo ' <p contenteditable="true">'.$username.'</p>';
       }
   ?>   
     
      </form>  
    </div>
    
  </div>
</div>

</div>


<?



}
?>
<? include('footer.php');?>

