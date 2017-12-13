<? include('dbconfig.php'); ?>



<?



 $sqln = "select * from threads where did=$pid ORDER BY datetime DESC";
  $results = $conn->query($sqln);
  
  if ($results->num_rows > 0) {
      // output data of each row

   while($rows = $results->fetch_assoc()) {

    $usid=$rows["uid"];

    $ima="select * from users where id=".$usid."";
    
    $re=$conn->query($ima);

    if($re-> num_rows > 0){
     while($ro=$re->fetch_assoc()){

       $imgurl=$ro['image_url'];

       $usname=$ro['name'];
       $remail=$ro['email'];

          }
    
     }


$st=$rows['stars'];
if($st==0){
$st='';
}

$s=$rows['star_users'];
$p=0;
$d=explode(",",$s);

for($i=0;$i<count($d);$i++){

if($pui==$d[$i]){
$p=1;
$i=count($d);
}
}

    echo"
           <div class='row'>
        <div class='col-sm-12'>
          <div class='panel panel-default text-left' style='width:550px; height:300px; border-left:5px solid #3498db;' >
            <div class='panel-body' >
            
        <img src='$imgurl' alt='Avatar' class='w3-left w3-circle w3-margin-right' style='width:60px'>
        <span style='float:right;color:grey;'>".$rows['datetime']."</span>
        <h4> <a href='profile.php?id=".$us."' style='color:black'>".$usname."</h4></a><br>
        <hr class='w3-clear'>";



$content=preg_replace($pat, $rep, $rows['content']);


       echo" <p>".$content."</p>
<br />
 <hr class='w3-clear'>";
       
 if($p!=1){


   
  echo " <a href='like.php?cid=".$rows['id']."' style='color:#ffcc00;'><button type='button' class='w3-button w3-theme-d1 w3-margin-bottom'><span style='color:#ffcc00; font-size:20px; margin-bottom:10px;'>".$st."</span><i class='fa fa-thumbs-up'><img src='images/unclicked_fave.png' height=20px; style='margin-bottom:8px;'></img></i>  Like</button></a>";
     }
 else{

echo "  <button type='button' class='w3-button w3-theme-d1 w3-margin-bottom'><span style='color:#ffcc00; font-size:20px; margin-bottom:0px;'>".$st."</span>";
echo "<i class='fa fa-thumbs-up'><img src='images/clicked_fave.png' height=20px; style='margin-bottom:8px;'></img></i>  </button>";

}
    


echo "  <button id='clickme".$l."' href='javascript:;' type='button' class='w3-button w3-theme-d2 w3-margin-bottom'><i class='fa fa-comment'></i>Reply</button>";
if($remail==$email){ 
            echo "<a href='delete.php?tid=".$rows['id']."'><button name='delete' type='button' class='w3-button w3-theme-d1 w3-margin-bottom'><i class='fa fa-thumbs-up'></i>Delete</button></a>";                         
          } 







echo '


<p contenteditable="true" class="w3-border w3-padding" id="commentb'.$l.'" type="text" style="display:none">write your comment here..</p>
<form action=comments.php onsubmit="return getContents'.$l.'()" method="post">

 <textarea id="formt'.$l.'" name="formt" style="display:none"></textarea>

<input id="did" name="did" style="display:none" value='.$pid.'>
<div class="button_container">

<input id="submitit'.$l.'" class="button12" style="display:none" type="submit" value="submit"/>

</form>

';


echo '
  <script type="text/javascript">
      function getContents'.$l.'(){
  var div_var'.$l.'=document.getElementById("commentb'.$l.'").innerHTML;
          document.getElementById("formt'.$l.'").value =div_var'.$l.';
      
          }
</script>';


echo '


<script>
$(document).ready(function(){
    $("#clickme'.$l.'").click(function(){

        $("#submitit'.$l.'").toggle();
        $("#commentb'.$l.'").toggle();
    });
});
</script>


';

echo "
</div>
</div>
</div></div>";


$l=$l+1;
}
}




?>
