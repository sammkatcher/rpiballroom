<?PHP

    include_once("./CAS-1.3.2/CAS.php");
    phpCAS::client(CAS_VERSION_2_0,'cas-auth.rpi.edu',443,'/cas/');
    // SSL!
    phpCAS::setCasServerCACert("./CACert.pem");//this is relative to the cas client.php file
        
    if (phpCAS::isAuthenticated())
    {
        echo "User:" . phpCAS::getUser();
        echo "<a href='./logout.php'>Logout</a>";
    }else{
        echo "<a href='./login.php'>Login</a>";
    }

?>