<?php
 session_start();
include("connect_db.php");

$login = mysqli_real_escape_string($link, $_POST['userName']);
$psw1 = mysqli_real_escape_string($link, $_POST['password1']);
$psw2 = mysqli_real_escape_string($link, $_POST['password2']);

if($login=="" or $psw1==""){
$_SESSION['messR'] = '<font style="font-size:13px" color="#FF0000" face="Arial"><b>
               Не задан пароль или логин!</font></b><br>';
               header("Location:../registry.php");
               exit();   
   
}

if($psw1 !=  $psw2){
$_SESSION['messR'] = '<font style="font-size:13px" color="#FF0000" face="Arial"><b>
               Пароли не совпадают!</font></b><br>';
               header("Location:../registry.php");
               exit();   
   
}

$strSql = "SELECT id FROM users WHERE (username='" .$login . "') LIMIT 1";
$result = mysqli_query($link, $strSql);
if (mysqli_num_rows($result) == 1) {
$_SESSION['messR'] = '<font style="font-size:13px" color="#FF0000" face="Arial"><b>
               Такое имя уже используется!</font></b><br>';
               header("Location:../registry.php");
               exit();   
}



$strSQL = 'INSERT INTO users (UserName, Passwd ) VALUES ("'.$login.'" , "'.$psw1.'")' ;
$result = mysqli_query($link, $strSQL);

$result = mysqli_query($link, "SELECT id FROM users WHERE (username='" .$login . "') LIMIT 1");
$row = mysqli_fetch_array($result);  $idUser = $row[0];


$_SESSION['userId'] = $idUser;
$_SESSION['userName']=$login;


$strSQL= "CREATE TABLE  infotmp".$idUser." (
id INT( 11 ) NOT NULL AUTO_INCREMENT ,
 FieldName VARCHAR( 255 ) DEFAULT NULL ,
 FieldValue VARCHAR( 255 ) DEFAULT NULL ,
UNIQUE KEY  id (  id ) ,
UNIQUE KEY  FieldName (  FieldName )
) ENGINE = MYISAM DEFAULT CHARSET = utf8";
$result = mysqli_query($link, $strSQL);

$strSQL= "INSERT INTO  infotmp".$idUser." SELECT * FROM  infotmp" ;
$result = mysqli_query($link, $strSQL);

$result = mysqli_query($link, 'UPDATE infotmp'.$idUser.' SET FieldValue="'.date("Y.m.d").'" WHERE (FieldName="learnDate")');
$result = mysqli_query($link, 'UPDATE infotmp'.$idUser.' SET FieldValue="'.date("Y.m.d").'" WHERE (FieldName="vlearnDate")');





$strSQL= "CREATE TABLE  mv".$idUser." (
id INT( 11 ) NOT NULL AUTO_INCREMENT ,
 idSort DOUBLE DEFAULT  0,
 wordO VARCHAR( 255 ) NOT NULL ,
 wordE VARCHAR( 255 ) DEFAULT NULL ,
 transc VARCHAR( 50 ) DEFAULT NULL ,
 transl LONGTEXT,
 pr INT( 11 ) DEFAULT  0,
 flag INT( 11 ) DEFAULT  0,
 m TINYINT( 4 ) DEFAULT  0,
 date50 DATETIME DEFAULT NULL ,
 NP INT( 11 ) NOT NULL DEFAULT  0,
 iterationO INT( 11 ) DEFAULT NULL ,
 iterationE INT( 11 ) DEFAULT NULL ,
UNIQUE KEY  wordO (  wordO ) ,
UNIQUE KEY  id (  id )
) ENGINE = MYISAM DEFAULT CHARSET = utf8";
$result = mysqli_query($link, $strSQL);






$strSQL= "CREATE TABLE  mvedit".$idUser." (
id INT( 11 ) NOT NULL AUTO_INCREMENT ,
 wordE VARCHAR( 255 ) DEFAULT NULL ,
 transc VARCHAR( 50 ) DEFAULT NULL ,
 transl LONGTEXT,
PRIMARY KEY (  id ) ,
UNIQUE KEY  wordE (  wordE )
) ENGINE = MYISAM DEFAULT CHARSET = utf8";
$result = mysqli_query($link, $strSQL);


$strSQL= "CREATE TABLE  mveditl".$idUser." (
id INT( 11 ) NOT NULL AUTO_INCREMENT ,
 wordO VARCHAR( 255 ) DEFAULT NULL ,
 wordE VARCHAR( 255 ) DEFAULT NULL ,
PRIMARY KEY (  id ) ,
UNIQUE KEY  wordO (  wordO )
) ENGINE = MYISAM DEFAULT CHARSET = utf8";
$result = mysqli_query($link, $strSQL);


$strSQL= "CREATE TABLE  mvdel".$idUser." (
wordE VARCHAR( 255 ) DEFAULT NULL ,
UNIQUE KEY  wordE (  wordE )
) ENGINE = MYISAM DEFAULT CHARSET = utf8";
$result = mysqli_query($link, $strSQL);



 $strSQL= "CREATE TABLE mvdone".$idUser." (wordE varchar( 255 ) DEFAULT NULL ,
wordO varchar( 255 ) NOT NULL ,
transc varchar( 50 ) DEFAULT NULL ,
transl longtext,
flag int( 11 ) DEFAULT 0,
pr int( 11 ) DEFAULT 0,
date50 date DEFAULT NULL,
TimeClickTmp TIMESTAMP NULL DEFAULT NULL,
NT int( 11 ) NOT NULL DEFAULT 0,
TimeClick TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
NS int( 11 ) NOT NULL DEFAULT 0,
iterationO int( 11 ) NOT NULL DEFAULT 0,
iterationE int( 11 ) NOT NULL DEFAULT 0,
NP int( 11 ) NOT NULL DEFAULT 0,
m int( 11 ) NOT NULL DEFAULT 0,
id int( 11 ) NOT NULL DEFAULT 0,
idSort int( 11 ) NOT NULL AUTO_INCREMENT ,
PRIMARY KEY ( idSort ) ,
UNIQUE KEY wordE ( wordE ),
idLearn INT(11) NOT NULL DEFAULT 0 
) ENGINE = MYISAM DEFAULT CHARSET = utf8";
$result = mysqli_query($link, $strSQL);


 header("Location:../textchoice.php");

?>