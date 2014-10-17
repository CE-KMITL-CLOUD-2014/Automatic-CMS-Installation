<?php
$server = "tcp:dh96f1a9t7.database.windows.net,1433";
$user = "CMS-South-Asia-Server@dh96f1a9t7";
$pwd = "LazPe%Zg3MqjHVs*z4=bJX(W#-Br3eGRMg/m";
$db = "nfcmsservice";

try{
    $conn = new PDO( "sqlsrv:Server= $server ; Database = $db ", $user, $pwd);
    $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
}
catch(Exception $e){
    die(print_r($e));
}
?>