<?php

require_once 'config.php';
require_once 'lib/Google_Client.php';
require_once 'lib/Google_Oauth2Service.php';
include 'dbconfig.php';

$client = new Google_Client();
$client->setApplicationName("Google UserInfo PHP Starter Application");

$client->setClientId(CLIENT_ID);
$client->setClientSecret(CLIENT_SECRET);
$client->setRedirectUri(REDIRECT_URI);
$client->setApprovalPrompt(APPROVAL_PROMPT);
$client->setAccessType(ACCESS_TYPE);

$oauth2 = new Google_Oauth2Service($client);

if (isset($_GET['code'])) {
  $client->authenticate($_GET['code']);
  $_SESSION['token'] = $client->getAccessToken();
  echo '<script type="text/javascript">window.close();</script>'; exit;
}

if (isset($_SESSION['token'])) {
 $client->setAccessToken($_SESSION['token']);
}

if (isset($_REQUEST['error'])) {
 echo '<script type="text/javascript">window.close();</script>'; exit;
}

if ($client->getAccessToken()) {
  $user = $oauth2->userinfo->get();

  // These fields are currently filtered through the PHP sanitize filters.

  $email = filter_var($user['email'], FILTER_SANITIZE_EMAIL);
  $img = filter_var($user['picture'], FILTER_VALIDATE_URL);
  $name=$user['name'];
  $personMarkup = "$email<div><img src='$img?sz=50'></div>";

  // The access token may have been updated lazily.
  $_SESSION['token'] = $client->getAccessToken();

} else {
  $authUrl = $client->createAuthUrl();
}
?>


<!DOCTYPE html>
<html>
<head>
<title>VTA FORUM</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="css/styles.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }


</style>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript" src="js/oauthpopup.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	
	 $('a.login').oauthpopup({
            path: '<?php if(isset($authUrl)){echo $authUrl;}else{ echo '';}?>',
			width:650,
			height:350,
        });
		$('a.logout').googlelogout({
			redirect_url:'<?php echo $base_url; ?>logout.php'
		});

});
</script>
</head>

<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
     
      <a class="navbar-brand" href="home.php">VTA FORUM</a>

    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
<?php
if(basename($_SERVER['PHP_SELF'])=="home.php"){
 echo ' <li class="active"><a href="home.php">Home</a></li>';

}
else{
 echo ' <li><a href="home.php">Home</a></li>';

}
if(basename($_SERVER['PHP_SELF'])=="discussions.php" or basename($_SERVER['PHP_SELF'])=="thread.php")
{
 echo   ' <li class="active"><a href="discussions.php">Discussions</a></li>';
 
}
else{

echo   ' <li><a href="discussions.php">Discussions</a></li>';
}
  echo '  

 
     </ul>
      

  <form class="navbar-form navbar-right" action="search.php" method="post" role="search">
        <div class="form-group input-group">
          <input type="text" class="form-control" name="search" placeholder="Search..">
 
         <span class="input-group-btn">
            <button class="btn btn-default" type="submit">
              <span class="glyphicon glyphicon-search"></span>
            </button>
          </span>        
        </div>
      </form>';
?>
      <ul class="nav navbar-nav navbar-right ">
<? if(isset($authUrl))
        {

print "<a class='login' href='javascript:void(0);'><img alt='Signin in with Google' src='images/google-plus-logo.png' width=50 height=50 style='float:right;'/></a>";

}
      

else
{ echo '

        <li><a href="home.php"><span class="glyphicon glyphicon-user ">
                 </span>'.$name.'</a></li>
<li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>';
}

?>
      </ul>
    </div>
  </div>
</nav>
 
<?



$pat = array('/%(\w+)/','/#(\w+)/', '/@(\w+)/');
$rep = array('<a class="qstyle" href="midtag.php?q=$1">%$1</a>','<a class="tagstyle" href="midtag.php?t=$1" style="font-weight:bold;">#$1</a>', 
             '<a class="mentionstyle" href="midtag.php?m=$1" style="font-weight:bold;">@$1</a>');





?>
