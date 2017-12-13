<?php

session_start();

$base_url= filter_var('Your domain path', FILTER_SANITIZE_URL);

// Visit https://code.google.com/apis/console to generate your
// oauth2_client_id, oauth2_client_secret, and to register your oauth2_redirect_uri.
define('CLIENT_ID','client_id');
define('CLIENT_SECRET','client_secret');
define('REDIRECT_URI','redirect_url');
define('APPROVAL_PROMPT','auto');
define('ACCESS_TYPE','offline');





?>
