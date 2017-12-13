<?include('dbconfig.php');?>



<?

if(isset($_POST['formtext']) && isset($_POST['un'])) {

	//$formtext = str_replace(array('<br/>'), '', $_POST['un']);
	
	
$n = "update users set description='".$_POST['formtext']."' where id=".$_POST['un']."";
if ($conn->query($n) === TRUE) {
 
//echo "<script>document.location = 'home.php';</script>";
}


	
}

header("location:home.php");









?>