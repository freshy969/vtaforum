<?
include('dbconfig.php');


if(isset($_GET['t'])) {

  $sql = "SELECT * FROM tags where tag='#".$_GET['t']."</a'";
$result = $conn->query($sql);



if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

      header("location: tagps.php?id=".$row['id']."");
}
}
}



if(isset($_GET['q'])) {

  $sql = "SELECT * FROM qtable where tag='%".$_GET['q']."</a'";
$result = $conn->query($sql);



if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

      header("location: qtagps.php?id=".$row['id']."");
}
}
}


if(isset($_GET['m'])) {

  $sql = "SELECT * FROM mtable where tag='@".$_GET['m']."</a'";
$result = $conn->query($sql);



if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

      header("location: profile.php?id=".$row['userid']."");
}
}
}












?>