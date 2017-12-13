<?include('header.php')?>


        <div class="w3-col m12" >

 
        
          <div class="w3-card w3-round w3-white" style="width:1140px; margin-left:18px; ">
             


            <div class="w3-container w3-padding" >



<form action="discussions.php" method="post">
              <h6 class="w3-opacity">Start a Discussion</h6>
              <textarea class="w3-border w3-padding" name="content" contenteditable="true" rows="4" cols="90" >Start a Discussion...</textarea>


 <hr class='w3-clear'>
              <button type="submit" class="w3-button w3-theme"><i class="fa fa-pencil"></i>  Post</button> 
</form>





            </div>
          </div>
        </div>
      </div>




<div class="w3-col m3" style="width:500px;">
<? if(isset($_GET['id'])) {      ?>
<?


$sl= "select * from users where email='$email'";
 $result = $conn->query($sl);
  
  if ($result->num_rows > 0) {
      // output data of each row

   while($row = $result->fetch_assoc()) {
        $pui=$row['id'];

          }
    
     }










?>



<?

$stn= "select * from tags where id=".$_GET['id']."";
 $result = $conn->query($stn);
  
  
  if ($result->num_rows > 0) {
      // output data of each row

   while($row = $result->fetch_assoc()) {

    $ids=$row['did'];

  }}

$idarray=explode(",",$ids);

$count=count($idarray)-2;



for($po=$count;$po>=0;$po--) {
	

$sqln= "select * from discussions where  id=".$idarray[$po]."";
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
  echo"
       <div class='w3-container w3-card w3-white w3-round w3-margin' style='width:800px;'><br>
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

  }
  
  }







}

/*


$sqln= "select * from discussions order by datetime DESC";
 $result = $conn->query($sqln);
  
  
  if ($result->num_rows > 0) {
      // output data of each row

   while($row = $result->fetch_assoc()) {

  }}

*/

?>

<? } ?>
</div>
</body>

</html>