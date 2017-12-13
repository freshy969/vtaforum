<? include('tagdb.php');?>
<?php 




$sl= "select * from users where email='$email'";
 $result = $conn->query($sl);
  
  if ($result->num_rows > 0) {
      // output data of each row

   while($row = $result->fetch_assoc()) {
        $pui=$row['id'];

          }
    
     }



if (isset($_POST['content'])){

$content=$_POST['content'];

$sqln="select * from users where email='".$email."'";
  $result = $conn->query($sqln);
  
  
  if ($result->num_rows > 0) {
      // output data of each row
while($row = $result->fetch_assoc()) {

       $uid=$row['id'];

}
  } 


 $my_date = date("Y-m-d H:i:s");

 $sql = "INSERT INTO discussions(uid,user,content,datetime) VALUES ('$uid','$name','$content','$my_date')";

 if ($conn->query($sql) === TRUE) {
     
  } 

$sqln= "select * from discussions where datetime='".$my_date."'";
 $result = $conn->query($sqln);
  
  
  if ($result->num_rows > 0) {
      // output data of each row

   while($row = $result->fetch_assoc()) {
   	$disid=$row['id'];
}
}

tagd($content,$disid);
qd($content,$disid);
mdb($content,$disid);

$sqln= "select * from discussions order by datetime DESC";
 $result = $conn->query($sqln);
  
  
  if ($result->num_rows > 0) {
      // output data of each row

   while($row = $result->fetch_assoc()) {

    $us=$row["uid"];
 

    $im="select * from users where id=".$us."";
      $re = $conn->query($im);
  
  
  if ($re->num_rows > 0) {
      // output data of each row

   while($ro = $re->fetch_assoc()) {
              $pemail=$ro['email'];
        $imgurl=$ro['image_url'];

           }

    }

$st=$row['stars'];
if($st==0){
$st='';
}

$s=$row['star_users'];
$n=0;
$d=explode(",",$s);

for($i=0;$i<count($d);$i++){

if($pui==$d[$i]){
$n=1;
$i=count($d);
}
}


 
     echo"<div class='row'>
        <div class='col-sm-12' style='margin-left:18px; margin-top:20px;'>
          <div class='panel panel-default text-left' >
            <div class='panel-body'>
        <img src='$imgurl' alt='Avatar' class='w3-left w3-circle w3-margin-right' style='width:60px'>
        <span style='float:right;color:grey;'>".$row['datetime']."</span>
       <h4><a href=profile.php?id=".$us." style='color:black'> ".$row['user']."</a></h4><br>
        <hr class='w3-clear'>";
   
  $content=preg_replace($pat, $rep, $row['content']);


       echo" <p>".$content."</p>
<br />";

        
 if($n!=1){


   
  echo " <a href='like.php?did=".$row['id']."' style='color:#ffcc00;'><button type='button' class='w3-button w3-theme-d1 w3-margin-bottom'><span style='color:#ffcc00; font-size:20px; margin-bottom:10px;'>".$st."</span><i class='fa fa-thumbs-up'><img src='images/unclicked_fave.png' height=20px; style='margin-bottom:8px;'></img></i>  Like</button></a>";
     }
 else{

echo "  <button type='button' class='w3-button w3-theme-d1 w3-margin-bottom'><span style='color:#ffcc00; font-size:20px; margin-bottom:0px;'>".$st."</span>";
echo "<i class='fa fa-thumbs-up'><img src='images/clicked_fave.png' height=20px; style='margin-bottom:8px;'></img></i>  </button>";

}
     echo "   <a href='thread.php?pid=".$row['id']."'><button type='button' class='w3-button w3-theme-d2 w3-margin-bottom'><i class='fa fa-comment'></i>Thread</button></a>
         ";

          if($pemail==$email){
            echo "<a href='delete.php?id=".$row['id']."'><button name='delete' type='button' class='w3-button w3-theme-d1 w3-margin-bottom'><i class='fa fa-thumbs-up'></i>Delete</button></a>";                         
          }
    

    echo "  </div> ";
    echo "  </div> ";
    echo "  </div> ";
    echo "  </div> "; 
    echo "<br />";


}

}


}

else{



$sqln= "select * from discussions order by datetime DESC";
 $result = $conn->query($sqln);


  
  
  if ($result->num_rows > 0) {
      // output data of each row

   while($row = $result->fetch_assoc()) {

    $us=$row["uid"];

    $im="select * from users where id=".$us."";
    $res=$conn->query($im);

    if($res-> num_rows > 0){
     while($ro=$res->fetch_assoc()){
       $pemail=$ro['email'];
       $imgurl=$ro['image_url'];
       

          }
    
     }


$st=$row['stars'];
if($st==0){
$st='';
}

$s=$row['star_users'];
$n=0;
$d=explode(",",$s);

for($i=0;$i<count($d);$i++){

if($pui==$d[$i]){
$n=1;
$i=count($d);
}
}

     echo"<div class='row'>
        <div class='col-sm-12' style='margin-left:18px; margin-top:20px;'>
          <div class='panel panel-default text-left' >
            <div class='panel-body'>
        <img src='$imgurl' alt='Avatar' class='w3-left w3-circle w3-margin-right' style='width:60px'>
        <span style='float:right;color:grey;'>".$row['datetime']."</span>
        <h4 ><a href=profile.php?id=".$us." style='color:black;'>".$row['user']."</a></h4><br>
        <hr class='w3-clear'>";
   
  $content=preg_replace($pat, $rep, $row['content']);


       echo" <p>".$content."</p>
<br />";

        
 if($n!=1){


   
  echo " <a href='like.php?did=".$row['id']."' style='color:#ffcc00;'><button type='button' class='w3-button w3-theme-d1 w3-margin-bottom'><span style='color:#ffcc00; font-size:20px; margin-bottom:10px;'>".$st."</span><i class='fa fa-thumbs-up'><img src='images/unclicked_fave.png' height=20px; style='margin-bottom:8px;'></img></i>  Like</button></a>";
     }
 else{

echo "  <button type='button' class='w3-button w3-theme-d1 w3-margin-bottom'><span style='color:#ffcc00; font-size:20px; margin-bottom:0px;'>".$st."</span>";
echo "<i class='fa fa-thumbs-up'><img src='images/clicked_fave.png' height=20px; style='margin-bottom:8px;'></img></i>  </button>";

}
     echo "   <a href='thread.php?pid=".$row['id']."'><button type='button' class='w3-button w3-theme-d2 w3-margin-bottom'><i class='fa fa-comment'></i>Thread</button></a>
         ";

          if($pemail==$email){
            echo "<a href='delete.php?id=".$row['id']."'><button name='delete' type='button' class='w3-button w3-theme-d1 w3-margin-bottom'><i class='fa fa-thumbs-up'></i>Delete</button></a>";                         
          }
    

    echo "  </div> ";
    echo "  </div> ";
    echo "  </div> ";
    echo "  </div> "; 
    echo "<br />";




}


}
}
?>






