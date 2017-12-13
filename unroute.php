<? include('dbconfig.php');?>
<?

if(isset($_GET['uid']) && isset($_GET['pid'])){
	$uid=$_GET['uid'];$pid=$_GET['pid'];
           $sqln="select * from users where id='".$_GET['pid']."'";
  $result = $conn->query($sqln);
  
  
  if ($result->num_rows > 0) {
      // output data of each row
while($row = $result->fetch_assoc()) {
	$rt=$row['routers'];
	
    
}
  } 
  $do=explode(",",$rt);

for($i=0;$i<count($do);$i++) {
if($do[$i]==$uid){
$do[$i]='';
$t=$i;
}

}
$n=-1;
$con=implode (",",$do);
echo $con;
$con=explode(",", $con);
for($i=0;$i<count($con);$i++) {
$n++;
if($con[$i]!='') {
	$sd[$n]=$con[$i];
	echo "<br />";
	
}

}
$con=implode (",",$sd);

$sql = "UPDATE users SET routers='".$con."' WHERE id=".$pid."";

if ($conn->query($sql) === TRUE) {
    
} 



header("location:profile.php?id=".$pid."");








}








?>