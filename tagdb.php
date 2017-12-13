

<? 



function tags($msg,$did){

include('email.php');
include('dbconfig.php');

$pat = array('/#(\w+)/');
$rep = array('<a>#$1</a>');

$new_msg = preg_replace($pat, $rep, $msg);
$msgs=explode(">",$new_msg);

$n=0;
$j=0;
$s=0;
for($i=0;$i<count($msgs);$i++){



if(substr($msgs[$i], 0, 1)=='#'){
       $s=1;

      $tags[$n]=$msgs[$i];
    $n++;
  }





}


$g=0;


if($s==1){
$h=0;
for($k=0;$k<count($tags);$k++){


$sql = "SELECT * FROM tags";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

     if($row["tag"]==$tags[$k]){
  $st[$h]=$k;
  $number=$row["number"];

 $g=$g-1;
 $h++;
}
        
    }


}
}

if($g==0){

for($k=0;$k<count($tags);$k++){

$num=1;

$sqln = "INSERT INTO tags(tag,number)
VALUES ('".$tags[$k]."',".$num.")";

if ($conn->query($sqln) === TRUE) {
   
}


}



}



if($g!=0){




for($k=0;$k<count($tags);$k++){








$sl = "SELECT * FROM tags";
$result = $conn->query($sl);



if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {



if($row['tag']==$tags[$k]){


$id=$row['id'];

$number=$row['number'];
$number=$number+1;


$n = "update tags set number=".$number." where id='".$row['id']."'";
if ($conn->query($n) === TRUE) {
    
}

}
else{
	$num=1;
$sqn = "INSERT into tags(tag,number)
VALUES ('".$tags[$k]."',".$num.")";

if ($conn->query($sqn) === TRUE) {
 
}

}





        
    }


}



}


}



}










}


function tagd($msg,$disid){
include('email.php');
include('dbconfig.php');

$sql = "SELECT * FROM users where email='$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
   
   $userid=$row['id'];
      
    }


}


$pat = array('/#(\w+)/');
$rep = array('<a">#$1</a>');

$new_msg = preg_replace($pat, $rep, $msg);
$msgs=explode(">",$new_msg);

$n=0;
$j=0;
$s=0;
for($i=0;$i<count($msgs);$i++){



if(substr($msgs[$i], 0, 1)=='#'){
       $s=1;

      $tags[$n]=$msgs[$i];
    $n++;
  }





}


$g=0;


if($s==1){
$h=0;
for($k=0;$k<count($tags);$k++){


$sql = "SELECT * FROM tags";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

     if($row["tag"]==$tags[$k]){
  $st[$h]=$k;
  $number=$row["number"];

 $g=$g-1;
 $h++;
}
        
    }


}
}

if($g==0){

for($k=0;$k<count($tags);$k++){


$num=1;
$sqln = "INSERT INTO tags(tag,number,did,uid)
VALUES ('".$tags[$k]."',".$num.",'".$disid.",','".$userid.",')";

if ($conn->query($sqln) === TRUE) {
   
}


}



}



if($g!=0){




for($k=0;$k<count($tags);$k++){








$sl = "SELECT * FROM tags";
$result = $conn->query($sl);



if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {



if($row['tag']==$tags[$k]){


$id=$row['id'];

$number=$row['number'];
$number=$number+1;
$diod=$row['did'];
$uiod=$row['uid'];

$n = "update tags set number=".$number.",did='".$diod.$disid.",',uid='".$uiod.$userid.",' where id='".$row['id']."'";
if ($conn->query($n) === TRUE) {
    
}

}
else{
	$num=1;
$sqn = "INSERT into tags(tag,number,did,uid)
VALUES ('".$tags[$k]."',".$num.",'".$disid.",','".$userid.",')";

if ($conn->query($sqn) === TRUE) {
  }

}





        
    }


}



}


}



}










}

/*                                                                                    */


function qts($msg,$did){
include('dbconfig.php');

include('email.php');
$pat = array('/%(\w+)/');
$rep = array('<a>%$1</a>');

$new_msg = preg_replace($pat, $rep, $msg);
$msgs=explode(">",$new_msg);

$n=0;
$j=0;
$s=0;
for($i=0;$i<count($msgs);$i++){



if(substr($msgs[$i], 0, 1)=='%'){
       $s=1;

      $tags[$n]=$msgs[$i];
    $n++;
  }





}


$g=0;


if($s==1){
$h=0;
for($k=0;$k<count($tags);$k++){


$sql = "SELECT * FROM tags";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

     if($row["tag"]==$tags[$k]){
  $st[$h]=$k;
  $number=$row["number"];

 $g=$g-1;
 $h++;
}
        
    }


}
}

if($g==0){

for($k=0;$k<count($tags);$k++){

$num=1;

$sqln = "INSERT INTO tags(tag,number)
VALUES ('".$tags[$k]."',".$num.")";

if ($conn->query($sqln) === TRUE) {
   
}


}



}



if($g!=0){




for($k=0;$k<count($tags);$k++){








$sl = "SELECT * FROM qtable";
$result = $conn->query($sl);



if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {



if($row['tag']==$tags[$k]){


$id=$row['id'];

$number=$row['number'];
$number=$number+1;


$n = "update qtable set number=".$number." where id='".$row['id']."'";
if ($conn->query($n) === TRUE) {
    
}

}
else{
	$num=1;
$sqn = "INSERT into qtable(tag,number)
VALUES ('".$tags[$k]."',".$num.")";

if ($conn->query($sqn) === TRUE) {
  
}

}





        
    }


}



}


}



}










}


function qd($msg,$disid){
include('email.php');
include('dbconfig.php');


$sql = "SELECT * FROM users where email='$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
   
   $userid=$row['id'];
      
    }


}



$pat = array('/%(\w+)/');
$rep = array('<a>%$1</a>');

$new_msg = preg_replace($pat, $rep, $msg);
$msgs=explode(">",$new_msg);

$n=0;
$j=0;
$s=0;
for($i=0;$i<count($msgs);$i++){



if(substr($msgs[$i], 0, 1)=='%'){
       $s=1;

      $tags[$n]=$msgs[$i];
    $n++;
  }





}


$g=0;


if($s==1){
$h=0;
for($k=0;$k<count($tags);$k++){


$sql = "SELECT * FROM qtable";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

     if($row["tag"]==$tags[$k]){
  $st[$h]=$k;
  $number=$row["number"];

 $g=$g-1;
 $h++;
}
        
    }


}
}

if($g==0){

for($k=0;$k<count($tags);$k++){


$num=1;
$sqln = "INSERT INTO qtable(tag,number,did,uid)
VALUES ('".$tags[$k]."',".$num.",'".$disid.",','".$userid.",')";

if ($conn->query($sqln) === TRUE) {
   
}


}



}



if($g!=0){




for($k=0;$k<count($tags);$k++){








$sl = "SELECT * FROM qtable";
$result = $conn->query($sl);



if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {



if($row['tag']==$tags[$k]){


$id=$row['id'];

$number=$row['number'];
$number=$number+1;
$diod=$row['did'];
$uiod=$row['uid'];
$n = "update qtable set number=".$number.",did='".$diod.$disid.",',uid='".$uiod.$userid.",' where id='".$row['id']."'";
if ($conn->query($n) === TRUE) {
    
}

}
else{
	$num=1;
$sqn = "INSERT into qtable(tag,number,did,uid)
VALUES ('".$tags[$k]."',".$num.",'".$disid.",','".$userid.",')";

if ($conn->query($sqn) === TRUE) {
   
}

}





        
    }


}



}


}



}










}




function mtags($msg,$did){

include('email.php');
include('dbconfig.php');

$pat = array('/@(\w+)/');
$rep = array('<a>@$1</a>');

$new_msg = preg_replace($pat, $rep, $msg);
$msgs=explode(">",$new_msg);

$n=0;
$j=0;
$s=0;
for($i=0;$i<count($msgs);$i++){



if(substr($msgs[$i], 0, 1)=='@'){
       $s=1;

      $tags[$n]=$msgs[$i];
    $n++;
  }





}


$g=0;


if($s==1){
$h=0;
for($k=0;$k<count($tags);$k++){


$sql = "SELECT * FROM mtable";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

     if($row["tag"]==$tags[$k]){
  $st[$h]=$k;
  $number=$row["number"];

 $g=$g-1;
 $h++;
}
        
    }


}
}

if($g==0){

for($k=0;$k<count($tags);$k++){

$num=1;

$sqln = "INSERT INTO mtable(tag,number)
VALUES ('".$tags[$k]."',".$num.")";

if ($conn->query($sqln) === TRUE) {
   
}


}



}



if($g!=0){




for($k=0;$k<count($tags);$k++){








$sl = "SELECT * FROM mtable";
$result = $conn->query($sl);



if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {



if($row['tag']==$tags[$k]){


$id=$row['id'];

$number=$row['number'];
$number=$number+1;


$n = "update mtable set number=".$number." where id='".$row['id']."'";
if ($conn->query($n) === TRUE) {
    
}

}
else{
	$num=1;
$sqn = "INSERT into mtable(tag,number)
VALUES ('".$tags[$k]."',".$num.")";

if ($conn->query($sqn) === TRUE) {
 
}

}





        
    }


}



}


}



}
header('location:thread.php?pid='.$did.'');









}


function mdb($msg,$disid){
include('email.php');
include('dbconfig.php');



$sql = "SELECT * FROM users where email='$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
   
   $userid=$row['id'];
      
    }


}


$pat = array('/@(\w+)/');
$rep = array('<a>@$1</a>');

$new_msg = preg_replace($pat, $rep, $msg);
$msgs=explode(">",$new_msg);

$n=0;
$j=0;
$s=0;
for($i=0;$i<count($msgs);$i++){



if(substr($msgs[$i], 0, 1)=='@'){
       $s=1;

      $tags[$n]=$msgs[$i];
    $n++;
  }





}


$g=0;


if($s==1){
$h=0;
for($k=0;$k<count($tags);$k++){


$sql = "SELECT * FROM mtable";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

     if($row["tag"]==$tags[$k]){
  $st[$h]=$k;
  $number=$row["number"];

 $g=$g-1;
 $h++;
}
        
    }


}
}

if($g==0){

for($k=0;$k<count($tags);$k++){

	$usname = ltrim($tags[$k], '@');
	$usname=rtrim($usname,'</a');
	
	$sql = "SELECT * FROM users where username='".$usname."'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
 
    $un=$row['id'];
    
}
        
    }
    else {$un=0;}



$num=1;
$sqln = "INSERT INTO mtable(tag,number,did,uid,userid)
VALUES ('".$tags[$k]."',".$num.",'".$disid.",','".$userid.",',".$un.")";

if ($conn->query($sqln) === TRUE) {
   
}



}



}



if($g!=0){




for($k=0;$k<count($tags);$k++){








$sl = "SELECT * FROM mtable";
$result = $conn->query($sl);



if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {



if($row['tag']==$tags[$k]){


$id=$row['id'];

$number=$row['number'];
$number=$number+1;
$diod=$row['did'];
$uiod=$row['uid'];

$n = "update mtable set number=".$number.",did='".$diod.$disid.",',uid='".$uiod.$userid.",' where id='".$row['id']."'";
if ($conn->query($n) === TRUE) {
    
}

}
else{
	
	$usname = ltrim($tags[$k], '@');
	$usname=rtrim($usname,'</a');
	
	$sql = "SELECT * FROM users where username='".$usname."'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
 
    $un=$row['id'];
    
}
        
    }
    else {$un=0;}

	$num=1;
$sqn = "INSERT into mtable(tag,number,did,uid,userid)
VALUES ('".$tags[$k]."',".$num.",'".$disid.",','".$userid.",',".$un.")";

if ($conn->query($sqn) === TRUE) {
  
}

}





        
    }


}



}


}



}
//header('location:discussions.php');









}





?>
