<?PHP

    include_once($ADMIN_FILEPATH."CAS-1.3.2/CAS.php");
    phpCAS::client(CAS_VERSION_2_0,'cas-auth.rpi.edu',443,'/cas/');
    // SSL!
    phpCAS::setCasServerCACert($ADMIN_FILEPATH."CACert.pem");//this is relative to the cas client.php file
    
    if (phpCAS::isAuthenticated())
    {
        phpCAS::logout();
		header('location: ./index.php');
    }else{
        header('location: ./index.php');
    }
?>