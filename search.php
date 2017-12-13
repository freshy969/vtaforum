<? include('header.php'); ?>


<?


if(isset($_POST['search'])){

$sqls="select * from users where email='$email'";
 $result = $conn->query($sqls);
  
  echo "<h4 style='margin-left:100px;'>searched Users query:</h4>";
  echo "<br />";
  if ($result->num_rows > 0) {
      // output data of each row

   while($row = $result->fetch_assoc()) {
   	
   	
   	if($row['username']!='') 
   	{$so=$row['username'];
   	}else 
   	{$so=false;}
   	if(strtolower($row['name'])==strtolower($_POST['search']) or strtolower($so)==strtolower($_POST['search'] ) or strtolower($row['email'])==strtolower($_POST['search']) ) {
   	
            	
            	 echo"<div class='row'>
        <div class='col-sm-12'>
          <div class='panel panel-default text-left' style='width:440px; margin-left:100px;'>
            <div class='panel-body'>
            
            <img src=".$row['image_url']." alt='Avatar' class='w3-left w3-circle w3-margin-right' style='width:60px'>
            <h4 ><a href=profile.php?id=".$row['id']." style='color:black;'>".$row['name']."</a></h4>";
            
            if($row['email']==$email) {
            	echo "<p style='magin-left:40px;'>it's you :)</p>";
            	
            }
            echo "</div></div></div></div>";
   	
   	echo "<br />";
   	
   }
}




}
else {


echo "<h4> 0 results</h4>";


}





}




include('footer.php');




?>