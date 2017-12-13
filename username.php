<? include('dbconfig.php'); ?>
<?


if(isset($_POST['username']) && isset($_POST['uno'])) {
	
	$usnam=$_POST['username'];
	$uno=$_POST['uno'];
	$usnam = str_replace(array('<br/>', '&', '"',' '), '', $usnam);

 $sqln = "select * from users";
  $results = $conn->query($sqln);
  
  if ($results->num_rows > 0) {
      // output data of each row

   while($rows = $results->fetch_assoc()) {
if($rows['username']==$usnam) {

	exit(header("location:home.php"));

	
	
}

}
}
$n = "update users set username='".$usnam."' where id=".$uno."";
if ($conn->query($n) === TRUE) {
 
//echo "<script>document.location = 'home.php';</script>";
}

}

header("location:home.php");




?>