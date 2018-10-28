<?php

///connection variables
$host = 'localhost';
$user = 'root';

$pass = '';
$db='project';

$con = mysqli_connect($host,$user,$pass,$db);

if($con)
{
    echo"Connected ";
    
}
else
{
    echo " No connection ";
}

mysqli_select_db($con,'project');


