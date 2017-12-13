<?include('header.php');?>

<?



if(isset($_GET['cid'])){

$cid=$_GET['cid'];

$sqls="select * from users where email='$email'";
 $resul = $conn->query($sqls);
  
  if ($resul->num_rows > 0) {
      // output data of each row

   while($ro = $resul->fetch_assoc()) {

       $uid=$ro['id'];

}
}


$sqln= "select * from threads where id=$cid";
 $result = $conn->query($sqln);
  
  if ($result->num_rows > 0) {
      // output data of each row

   while($row = $result->fetch_assoc()) {

       $stars=$row['stars'];
       $s=$row['star_users'];
       $did=$row['did'];

}
}

$stars=$stars+1;



$sql = "UPDATE threads SET stars=".$stars." WHERE id=$cid";

if ($conn->query($sql) === TRUE) {
    
}

$sql = "UPDATE threads SET star_users='".$s.$uid.",' WHERE id=$cid";

if ($conn->query($sql) === TRUE) {
    
}

header("location:thread.php?pid=".$did."");

}

if(isset($_GET['did'])){

$did=$_GET['did'];

$sqls="select * from users where email='$email'";
 $resul = $conn->query($sqls);
  
  if ($resul->num_rows > 0) {
      // output data of each row

   while($ro = $resul->fetch_assoc()) {

       $uid=$ro['id'];

}
}


$sqln= "select * from discussions where id=$did";
 $result = $conn->query($sqln);
  
  if ($result->num_rows > 0) {
      // output data of each row

   while($row = $result->fetch_assoc()) {

       $stars=$row['stars'];
       $s=$row['star_users'];

}
}

$stars=$stars+1;



$sql = "UPDATE discussions SET stars=".$stars." WHERE id=$did";

if ($conn->query($sql) === TRUE) {
    
}

$sql = "UPDATE discussions SET star_users='".$s.$uid.",' WHERE id=$did";

if ($conn->query($sql) === TRUE) {
    
}

header("location:thread.php?pid=".$did."");

}


?>
