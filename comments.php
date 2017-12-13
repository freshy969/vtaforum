
<? include('dbconfig.php');
   include('header.php');
?>







<? include('tagdb.php');?>


<?


if(isset($_POST['formtext'] ) and isset($_POST['did'])){

$content=$_POST['formtext'];


$did=$_POST['did'];

$sqln = "select * from users where email='".$email."'";
  $results = $conn->query($sqln);
  
  if ($results->num_rows > 0) {
      // output data of each row

   while($rows = $results->fetch_assoc()) {

    $uid=$rows["id"];
          }
    
     }


$my_date = date("Y-m-d H:i:s");
 $sql = "INSERT INTO threads(did,uid,content,datetime) VALUES ('$did','$uid','$content','$my_date')";

if ($conn->query($sql) === TRUE) {
     
  }  

header('location:thread.php?pid='.$did.'');

tags($content,$did);
}

if(isset($_POST['formt'] )){

$content=$_POST['formt'];

$did=$_POST['did'];

$sqln = "select * from users where email='".$email."'";
  $results = $conn->query($sqln);
  
  if ($results->num_rows > 0) {
      // output data of each row

   while($rows = $results->fetch_assoc()) {

    $uid=$rows["id"];
          }
    
     }
echo $uid;

$my_date = date("Y-m-d H:i:s");
 $sql = "INSERT INTO threads(did,uid,content,datetime) VALUES ('$did','$uid','$content','$my_date')";

if ($conn->query($sql) === TRUE) {
     
  }  

header('location:thread.php?pid='.$did.'');

tags($content,$did);


}



?>







