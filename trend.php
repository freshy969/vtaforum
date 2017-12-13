<?

include('dbconfig.php');





?>
  <div class="well" style="background-color: white; width:190px;">
    
     
        <? echo "<p style=' font-weight: bold;'>questions: </p>";
        $sql = "SELECT * FROM qtable order by number desc LIMIT 20";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<a href='qtagps.php?id=".$row['id']."'  style='color:red; font-weight: bold;'>".$row['tag']."</a>"."<br />";
    }
}
   
   echo "<br />";     
        
?>

</div>
<br />
  <div class="well" style="background-color: white; width:190px;">
    
     
        <? echo "<p style='color:black;  font-weight: bold;'>tags: </p>";
        $sql = "SELECT * FROM tags order by number desc LIMIT 20";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<a href='tagps.php?id=".$row['id']."' style='font-weight:bold;'>".$row['tag']."</a>"."<br />";
    }
}
        echo "<br />"; 
        
?>
</div>
