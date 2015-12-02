<?php
//show errors: at least 1 and 4...
ini_set('display_errors', 1);
//ini_set('log_errors', 1);
//ini_set('error_log', dirname(__FILE__) . '/error_log.txt');
error_reporting(E_ALL);

//Get item ID
$pst_id_v = $_POST['pst_id'];

if (empty($pst_id_v))
{
	$error = "Invalid data. Check field and try again.";
	include('global/error.php');
}
else 
{
require_once('global/connection.php');

require_once('global/functions.php');

//call function, passing arguments that contain data values using variables
delete_petstore($pst_id_v);

//include('index.php')
header('Location: index.php');
}
?>