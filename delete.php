<?
include('dbconfig.php');



if(isset($_GET['id'])){

$did=$_GET['id'];

$sql = "DELETE FROM discussions WHERE id=".$did."";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
}
$sqln = "DELETE FROM threads WHERE did=".$did."";

if ($conn->query($sqln) === TRUE) {
    echo "Record deleted successfully";
}


$sql = "SELECT * FROM tags";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
 
$ids=$row['did'];

 

$idarray=explode(",",$ids);

if(count($idarray)==2) {
	
	
	if($idarray[0]==$did){
		echo $idarray[0];
	$snt = "DELETE FROM tags WHERE id=".$row['id']."";
	if ($conn->query($snt) === TRUE) {
    //echo "Record deleted successfully";
	}
}

}
else {

$count=count($idarray)-2;



for($po=$count;$po>=0;$po--) {

 if($idarray[$count]==$did) {
 	$idarray[$count]=='';
 
 }
 
 
 }
 
 for($po=$count;$po>=0;$po--) {
 	
 	
 
 $n = "update tags set did='".$idarray[$po].",' where id='".$row['id']."'" ;
if ($conn->query($n) === TRUE) {
    
}
}

}

}
}

$sql = "SELECT * FROM qtable";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
 
$ids=$row['did'];

 

$idarray=explode(",",$ids);

if(count($idarray)==2) {
	
	
	if($idarray[0]==$did){
		echo $idarray[0];
	$snt = "DELETE FROM qtable WHERE id=".$row['id']."";
	if ($conn->query($snt) === TRUE) {
    //echo "Record deleted successfully";
	}
}

}
else {

$count=count($idarray)-2;



for($po=$count;$po>=0;$po--) {

 if($idarray[$count]==$did) {
 	$idarray[$count]=='';
 
 }
 
 
 }
 
 for($po=$count;$po>=0;$po--) {
 	
 	
 
 $n = "update qtable set did='".$idarray[$po].",' where id='".$row['id']."'" ;
if ($conn->query($n) === TRUE) {
    
}
}

}

}
}

$sql = "SELECT * FROM mtable";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
 
$ids=$row['did'];

 

$idarray=explode(",",$ids);

if(count($idarray)==2) {
	
	
	if($idarray[0]==$did){
		echo $idarray[0];
	$snt = "DELETE FROM mtable WHERE id=".$row['id']."";
	if ($conn->query($snt) === TRUE) {
    echo "Record deleted successfully";
	}
}

}
else {

$count=count($idarray)-2;



for($po=$count;$po>=0;$po--) {

 if($idarray[$count]==$did) {
 	$idarray[$count]=='';
 
 }
 
 
 }
 
 for($po=$count;$po>=0;$po--) {
 	
 	
 
 $n = "update mtable set did='".$idarray[$po].",' where id='".$row['id']."'" ;
if ($conn->query($n) === TRUE) {
    
}
}

}

}
}

header('location:discussions.php');

}


if(isset($_GET['tid'])){

$tid=$_GET['tid'];
echo $tid;

$s="select * from threads where id=".$tid."";
 $result = $conn->query($s);
  
  if ($result->num_rows > 0) {
      // output data of each row

   while($row = $result->fetch_assoc()) {

    $did=$row["did"];


          }
    
     }

$sqln = "DELETE FROM threads WHERE id=".$tid."";

if ($conn->query($sqln) === TRUE) {
    echo "Record deleted successfully";
}






header('location:thread.php?pid='.$did.'');
}


?>
