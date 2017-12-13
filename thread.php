<?include('header.php'); ?>

<? include('tagdb.php'); ?>

<?
if(isset($_GET['pid'])){
$pid=$_GET['pid'];
$sl= "select * from users where email='$email'";
 $result = $conn->query($sl);
  
  if ($result->num_rows > 0) {
      // output data of each row

   while($row = $result->fetch_assoc()) {
        $pui=$row['id'];

          }
    
     }




?>

 <div class="col-sm-7">


<?




$sqln= "select * from discussions where id=$pid";
 $result = $conn->query($sqln);
  
  if ($result->num_rows > 0) {
      // output data of each row

   while($row = $result->fetch_assoc()) {

    $us=$row["uid"];


    $im="select * from users where id=".$us."";
    $res=$conn->query($im);

    if($res-> num_rows > 0){
     while($ro=$res->fetch_assoc()){
       $imgurl=$ro['image_url'];
       $pemail=$ro['email'];

          }
    
     }




    echo"<div class='row'>
        <div class='col-sm-12'>
          <div class='panel panel-default text-left' style='margin-left:50px;'>
            <div class='panel-body' id='thread'>
        <img src='$imgurl' alt='Avatar' class='w3-left w3-circle w3-margin-right' style='width:60px'>
        <span style='float:right;color:grey;'>".$row['datetime']."</span>
      <h4><a href='profile.php?id=".$us."' style='text-decoration:none;color:black;'>".$row['user']."</a></h4><br>
        <hr class='w3-clear'>";
   



$content=preg_replace($pat, $rep, $row['content']);


       echo" <p>".$content."</p>
<br />
        
 <hr class='w3-clear'>
";

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


 if($n!=1){


   
  echo " <a href='like.php?did=".$pid."' style='color:#ffcc00;'><button type='button' class='w3-button w3-theme-d1 w3-margin-bottom'><span style='color:#ffcc00; font-size:20px; margin-bottom:10px;'>".$st."</span><i class='fa fa-thumbs-up'><img src='images/unclicked_fave.png' height=20px; style='margin-bottom:8px;'></img></i>  Like</button></a>";
     }
 else{

echo "  <button type='button' class='w3-button w3-theme-d1 w3-margin-bottom'><span style='color:#ffcc00; font-size:20px; margin-bottom:0px;'>".$st."</span>";
echo "<i class='fa fa-thumbs-up'><img src='images/clicked_fave.png' height=20px; style='margin-bottom:8px;'></img></i>  </button>";

}
 echo " <button id='click' href='javascript:;' type='button' class='w3-button w3-theme-d2 w3-margin-bottom'><i class='fa fa-comment'></i>Comment</button> ";
if($pemail==$email){

            echo "<a href='delete.php?id=".$row['id']."'><button name='delete' type='button' class='w3-button w3-theme-d1 w3-margin-bottom'><i class='fa fa-thumbs-up'></i>Delete</button></a>";                         
          }



echo '


<p contenteditable="true" class="w3-border w3-padding" id="com" type="text" style="display:none">write your comment here..</p>
<form action=comments.php onsubmit="return getContent()" method="post">

 <textarea id="formtextarea" name="formtext" style="display:none"></textarea>

<input id="did" name="did" style="display:none" value='.$pid.'>
<div class="button_container">
<input class="button12" id="submitme" style="display:none" type="submit" value="submit"/>

</form>
</div></div></div></div>
';

$l=0;
echo '
  <script type="text/javascript">
      function getContent(){
  var div_val=document.getElementById("com").innerHTML;
          document.getElementById("formtextarea").value =div_val;
      
          }
</script>';


echo '


<script>
$(document).ready(function(){
    $("#click").click(function(){
        $("#submitme").toggle();
        $("#com").toggle();
    });
});
</script>

';




}
}
?>

<h2 style="margin-left: 65px;">comments:</h2>


<div class="w3-col m3" style="margin-top:20px; margin-left: 63px; width: 50px;">
<?
include('showcomments.php');

?>
</div>
</div>
</body>

<?}?>
