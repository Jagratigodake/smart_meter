<?php

function OpenCon()
 {
 $dbhost = "sl-us-south-1-portal.49.dblayer.com";
 $dbuser = "admin";
 $dbpass = "SKZDTJWCQNPIRIFO";
 $db = "smart_meter";
 $port = "15620";


 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db,$port) or die("Connect failed: %s\n". $conn->error);

 
 return $conn;
 }
 
function CloseCon($conn)
 {
 $conn->close();
 }
   
?>