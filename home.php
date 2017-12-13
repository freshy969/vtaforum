<?include('header.php');?>

<div class="container text-center">    
  <div class="row">
   <div class="col-sm-3 well" style="background-color:white;">
    
      <div class="well" style="background-color:white;">
        

           <?$sqln="select * from users where email='".$email."'";
  $result = $conn->query($sqln);
  
  
  if ($result->num_rows > 0) {
      // output data of each row
while($row = $result->fetch_assoc()) {
       $uno=$row['id'];
       $im=$row['image_url'];
       $uname=$row['name'];
       $username=$row['username'];
       $description=$row['description'];
}
  } 

?>

            <img src=<?php echo $im; ?> class='img-circle' height="75" width="75" alt='Avatar'>
            <br />
            <br />
<p><b><? echo $uname; ?></b></p>
   <? echo '<a href="routers.php?pid='.$uno.'"><button class="btn btn-success">routers</button></a>';?>   
      </div>
      
     
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

          <div><a style="text-decoration:none;" href="qtagps.php?id=<? echo $row['id']; ?>"><span class="label label-danger"><? echo $row['tag'];?></span></a></div>
          
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
     <form action="description.php" onsubmit="return getContent()" method="post">   
            


 <textarea id="formtextarea" name="formtext" style="display:none"></textarea>
              <?
          if($description=='') { echo '<p contenteditable="true" class="w3-border w3-padding" id="com" type="text" >describe yourself!</p>';}    
              else {
               echo '<p contenteditable="true" class="w3-border w3-padding" id="com" type="text" style="">'.$description.'</p>'; }?> </p>
               <input name="un" style="display:none;" value=<? echo $uno; ?> /> 
         <input type="submit" class="btn btn-default btn-sm" value="submit"/>
           
         </form>
          <script type="text/javascript">
      function getContent(){
  var div_val=document.getElementById("com").innerHTML;
          document.getElementById("formtextarea").value =div_val;
      
          }
</script>
 
            </div>
          </div>
        </div>
      </div>
      
          
    
<?

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
echo "<div style='float:left; margin-left:20px;'>
<h3> mentions: </h3>
</div>";
echo "<br />";
    echo"<div class='row'>
        <div class='col-sm-12'>
          <div class='panel panel-default text-left'>
            <div class='panel-body'>
        <img src='$imgurl' alt='Avatar' class='w3-left w3-circle w3-margin-right' style='width:60px'>
        <span style='float:right;color:grey;'>".$ro['datetime']."</span>
        <h4>".$ro['user']."</h4><br>
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

          if($pemail==$email){
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




?>    
 
  </div>
      
    
    
   <div class="col-sm-2 well" style="background-color: white;">
   <div class="well" style="border:none; background-color: white;" >
<form action="username.php" onsubmit="return getContents()"  method="post" >      
   <?    if($username=='') {echo '   <p><b>set a unique username so others can mention you!</b></p>
 <input name="username" placeholder="username" style="width:120px; margin-right:10px;"/>
 
 <input name="uno" style="display:none;" value='.$uno.' /> ';
echo "<br />
      <br />";   
   
   }
   
       else { echo '<p><b>your username is: </b></p>';
       	 	 echo '<p contenteditable="true" id="commentb" >'.$username.'</p>';
       }
   ?>   
    
   <?    if($username=='') {echo ' <button type="submit" class="btn btn-default btn-sm">submit</button>';}
   
       else {
       	 echo ' <button type="submit" class="btn btn-default btn-sm">set new</button>';
       	 echo "<br />"; echo "<br />";
       	 echo '<p style="font-size:10px;">click on the username to set new username</p>';
         
       	 echo '<input id="formt" name="username" placeholder="username" style="display:none;"/>
 <input name="uno" style="display:none;" value='.$uno.' /> ';
       }
   ?>  
   

      </form>  
  <?    
echo '
  <script type="text/javascript">
      function getContents(){
  var div_var=document.getElementById("commentb").innerHTML;
          document.getElementById("formt").value =div_var;
      
          }
</script>';?>
   
        
      </div>
    </div>
  </div>
</div>


<?include('footer.php');?>
