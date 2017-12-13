
<?include('header.php');?>

<? if(isset($_GET['id'])) { 

$uno=$_GET['id'];

           $sqln="select * from users where id='".$uno."'";
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
  	header("location: home.php");
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
<h3> mentions: </h3>
</div>";
$sqln= "select * from mtable where userid=".$uno." order by id desc";
$result = $conn->query($sqln);
  
  
  if ($result->num_rows > 0) {
      // output data of each row

   while($row = $result->fetch_assoc()) {
   	
   	$ids=$row['did'];
$idarray=explode(",",$ids);
$count=count($idarray)-2;

for($k=$count;$k>=0;$k--) {
$sql = "SELECT * FROM discussions where id=".$idarray[$k]."";
$re = $conn->query($sql);

if ($re->num_rows > 0) {
    // output data of each row
    while($ro = $re->fetch_assoc()) {
 


   $us=$ro["uid"];

    $im="select * from users where id=".$us."";
    $res=$conn->query($im);

    if($res-> num_rows > 0){
     while($ron=$res->fetch_assoc()){
       $pemail=$ron['email'];
       $imgurl=$ron['image_url'];
       

          }
    
     }


$st=$ro['stars'];
if($st==0){
$st='';
}

$s=$ro['star_users'];
$n=0;
$d=explode(",",$s);

for($i=0;$i<count($d);$i++){

if($uno==$d[$i]){
$n=1;
$i=count($d);
}
}

    echo"<div class='row'>
        <div class='col-sm-12'>
          <div class='panel panel-default text-left'>
            <div class='panel-body'>
        <img src='$imgurl' alt='Avatar' class='w3-left w3-circle w3-margin-right' style='width:60px'>
        <span style='float:right;color:grey;'>".$ro['datetime']."</span>
        <h4><a href='profile.php?id=".$ro['id']."' style='text-decoration:none;'>".$ro['user']."</a></h4><br>
        <hr class='w3-clear'>";
   
  $content=preg_replace($pat, $rep, $ro['content']);


       echo" <p>".$content."</p>
<br />";

        
 if($n!=1){


   
  echo " <a href='like.php?did=".$ro['id']."' style='color:#ffcc00;'><button type='button' class='w3-button w3-theme-d1 w3-margin-bottom'><span style='color:#ffcc00; font-size:20px; margin-bottom:10px;'>".$st."</span><i class='fa fa-thumbs-up'><img src='images/unclicked_fave.png' height=20px; style='margin-bottom:8px;'></img></i>  Like</button></a>";
     }
 else{

echo "  <button type='button' class='w3-button w3-theme-d1 w3-margin-bottom'><span style='color:#ffcc00; font-size:20px; margin-bottom:0px;'>".$st."</span>";
echo "<i class='fa fa-thumbs-up'><img src='images/clicked_fave.png' height=20px; style='margin-bottom:8px;'></img></i>  </button>";

}
     echo "   <a href='thread.php?pid=".$ro['id']."'><button type='button' class='w3-button w3-theme-d2 w3-margin-bottom'><i class='fa fa-comment'></i>Thread</button></a>
         ";

          if($pemail==$pnemail){
            echo "<a href='delete.php?id=".$ro['id']."'><button name='delete' type='button' class='w3-button w3-theme-d1 w3-margin-bottom'><i class='fa fa-thumbs-up'></i>Delete</button></a>";                         
          }
    

    echo "  </div> ";
    echo "  </div> ";
    echo "  </div> ";
    echo "  </div> "; 
    echo "<br />";

}
}

}



}
}
else {
	echo "<div style='margin-top:70px; float:left; margin-right:30px;'>";
	echo "<h4>".$uname." haven't mentioned yet!</h4>";
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
<?include('footer.php');?>


















