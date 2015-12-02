<?php
//show errors: at least 1 and 4...
ini_set('display_errors', 1);
//ini_set('log_errors', 1);
//ini_set('error_log', dirname(__FILE__) . '/error_log.txt');
error_reporting(E_ALL);

//use for inital test of form inputs
//exit(print_r($_POST));

// Get item data
// no need for pst_id when adding, uses auto-increment
$pst_name_v = $_POST['pst_name'];
$pst_street_v = $_POST['pst_street'];
$pst_city_v = $_POST['pst_city'];
$pst_state_v = $_POST['pst_state'];
$pst_zip_v = $_POST['pst_zip'];
$pst_phone_v = $_POST['pst_phone'];
$pst_email_v = $_POST['pst_email'];
$pst_url_v = $_POST['pst_url'];
$pst_ytd_sales_v = $_POST['pst_ytd_sales'];
$pst_notes_v = $_POST['pst_notes'];

//use exit() to stop processing and test variable values. Example:
//exit($pst-name_v . $pst_street_v . $pst_city_v, etc.);

//Chapter 15:Regular Expressions
//street: only letters and space character
$pattern='/^[a-zA-Z0-9,\s\.]+$/';
$valid_city = preg_match($pattern, $pst_street_v);
//echo $valid_street; //test output: should be 1(i.e., valid)

//exit($valid_street);

//city: only letters and space character
$pattern='/^[a-zA-Z\s]+$/';
$valid_city = preg_match($pattern, $pst_city_v);
//echo $valid_city; //test output: should be 1(i.e., valid)

//exit($valid_city);


//state: must include two letters(min 2, max 2)
//$pattern='/^[a-zA-Z]{2}+$/';
$pattern='/^[a-zA-Z]{2,2}+$/';
$valid_state = preg_match($pattern, $pst_state_v);
//echo $valid_state; //test output: should be 1(i.e., valid)

//zip: must include 5-9 digits
$pattern='/^\d{5,9}+$/';
$valid_zip = preg_match($pattern, $pst_zip_v);
//echo $valid_zip; //test output: should be 1(i.e., valid)

//phone: must include 10 digits
$pattern='/^\d{10}+$/';
$valid_phone = preg_match($pattern, $pst_phone_v);
//echo $valid_zip; //test output: should be 1(i.e., valid)

//ytd_sales: max 10 digits, including optional decimal point with two digits
$pattern='/^\d{1,8}(?:\.\d{0,2})?$/'; //demo: delete a parenthesis to create an error for associated else if structure below
$valid_ytd_sales = preg_match($pattern, $pst_ytd_sales_v);
//echo $valid_ytd_sales; //test output: should be 1(i.e., valid)

//validate inputs - must contain all required fields

if 
	(
		empty($pst_name_v) ||
		empty($pst_street_v) ||
		empty($pst_city_v) ||
		empty($pst_state_v) ||
		empty($pst_zip_v) ||
		empty($pst_phone_v) ||
		empty($pst_email_v) ||
		empty($pst_url_v) ||
		!isset($pst_ytd_sales_v) 
	)
{
	$error = "All fields require data, except <b>Notes</b>. Check all fields and try again.";
	include('global/error.php');
}
//YTD Sales: must contain numbers and be equal to or greater than 0
else if (!is_numeric($pst_ytd_sales_v) || $pst_ytd_sales_v <= 0)
{
	$error = 'YTD Sales can only contain numbers (other than a decimal point); and must be equal to or greater than 0.';
	include('global/error.php');
}
else if ($valid_street === false)
{
	echo "Error in pattern";
}

else if ($valid_street === 0)
{
	$error = "Street can only contain letters, numbers, commas, and periods.";
}
else if ($valid_city === false)
{
	echo 'Error in pattern!';
}

else if ($valid_city === 0)
{
	$error= 'City can only contain letters';
	include('global/error.php');
}

else if ($valid_state === false)
{
	echo 'Error in pattern!';
}

else if ($valid_state === 0)
{
	$error= 'State must contain two letters';
	include('global/error.php');
}

else if ($valid_zip === false)
{
	echo 'Error in pattern!';
}

else if ($valid_zip === 0)
{
	$error= 'Zip must contain 5-9 digits, and no other characters';
	include('global/error.php');
}

else if ($valid_phone === false)
{
	echo 'Error in pattern!';
}

else if ($valid_phone === 0)
{
	$error= 'Phone must contain 10 digits, and no other characters';
	include('global/error.php');
}

else if ($valid_ytd_sales === false)
{
	echo 'Error in pattern!';
}

else if ($valid_ytd_sales === 0)
{
	$error= 'YTD Sales  must contain no more than 10 digits, including a decimal point';
	include('global/error.php');
}

else
{
	//if valid, add the item to the database
	require_once('global/connection.php');

	require_once('global/functions.php');

	//call function, passing arguments that contain data values using variables
	add_petstore (
		$pst_name_v,
		$pst_street_v,
		$pst_city_v,
		$pst_state_v,
		$pst_zip_v,
		$pst_phone_v,
		$pst_email_v,
		$pst_url_v,
		$pst_ytd_sales_v,
		$pst_notes_v

		);


//include('index.php'); //forwarding is faster, one trip to server
header('Location: index.php'); //sometimes, redirecting is needed (two trips to server)
}
?>
