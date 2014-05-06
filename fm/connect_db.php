<?php

	
if (date_default_timezone_get()=="EST5EDT")
{
        $host="myvocaborg.ipagemysql.com"; // Your Host Name
        $user_name="vocab";  // username
        $password="#like@des!"; // Password
        $db="vocab"; // Database Name
//        $mySqlTZ=-5*60*60; //winter

        $mySqlTZ=-4*60*60; // summer
}
else
{   
    	$host="localhost"; // Your Host Name
        $user_name="root";  // username
        $password="#like@des!"; // Password
		$db="vocab"; // Database Name
 //       $mySqlTZ=2*60*60;
        $mySqlTZ=3*60*60;

}
        $NW=25;

        define("C_DB_HOST",$host);
        define("C_DB_USER",$user_name);
        define("C_DB_PASS",$password);
        define("C_DB_NAME",$db);

		$link = mysqli_connect($host, $user_name, $password, $db);
if (!$link)
{
    $error = 'Unable to connect to the database server.';
    include 'error.html.php';
    exit();
}

if (!mysqli_set_charset($link, 'utf8'))
{
    $output = 'Unable to set database connection encoding.';
    include 'output.html.php';
    exit();
}

//$StrSQL = "SET time_zone='+2:00'";
//$result = mysqli_query($link, $strSQL);

/*if (!mysqli_select_db($link, $db))
{
    $error = 'Unable to locate the words database.';
    include 'error.html.php';
    exit();
}    */
        
        
        
        
        
?>