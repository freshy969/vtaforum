<? include('header.php'); ?>


 <!-- Header -->
  <div class="w3-container" style="margin-top:170px; margin-left:800px; " id="showcase" >
    <?php if(isset($email)){
          echo '<h1><b>  Welcome, </b>'.$name.'</h1>';
            
     }   
     else{  
    echo '<h1 class="w3-jumbo"><b>Welcome to</b></h1>';

 }?>  
 <h1 class="w3-xxxlarge w3-text-red"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;VTA FORUM</b></h1>
 <br />
  <br />
<?
if(isset($authUrl))
        {

print "<a class='login' href='javascript:void(0);'><img alt='Signin in with Google' src='images/google.png' height=50px width=300px/></a>";

} ?>
</div>

 
</body>



<?

if(isset($email)){

  $sqln = "select * from users where email=$email";
  $result = $conn->query($sqln);
  
  
  if ($result->num_rows > 0) {
      // output data of each row

    header('location:home.php');

  } 

else {
      
     
 $sql = "INSERT INTO users(name,email,image_url) VALUES ('$name','$email','$img')";

 if ($conn->query($sql) === TRUE) {
     
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }
  
 header('location:home.php');

}



}


?>

<?include('footer.php');?>
