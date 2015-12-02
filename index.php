
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="My online portfolio that illustrates skills acquired while working through various project requirements.">
	<meta name="author" content="Maury Neipris">
	<link rel="icon" href="favicon.ico">

	<title>LIS4381 - Project 2</title>

<!-- Include FontAwesome CSS to use feedback icons provided by FontAwesome -->
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" />

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
<link href="css/starter-template.css" rel="stylesheet">
<link rel="stylesheet" href="../css/mainnav.css">

<!-- jQuery DataTables: http://www.datatables.net/ //-->
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.5/css/jquery.dataTables.min.css"/>
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/responsive/1.0.4/css/dataTables.responsive.css"/>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body>

	<?php include_once("../global/nav_global.php"); ?>
	
	<div class="container-fluid">
		 <div class="starter-template">
						<div class="page-header">
							<?php include_once("global/header.php"); ?>	
						</div>

						<h2>Pet Stores</h2>

<a href="add_petstore.php">Add Pet Store</a>
<br/>
<a href="rss.php">RSS Feed</a>
<br />

<!-- Placeholder for responsive table if needed.  -->
<table id="myTable" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">

		<thead>	
		<tr>
			<th>Name</th>
			<th>Street</th>
			<th>City</th>
			<th>State</th>
			<th>Zip</th>
			<th>Phone</th>
			<th>Email</th>
			<th>URL</th>
			<th>YTD Sales</th>
			<th>Notes</th>
			<th>&nbsp</th>
			<th>&nbsp</th>
		</tr>
	</thead>
	<tbody>
<?php
//database connection code goes here...
require_once("global/connection.php");

//Pull in function library
require_once("global/functions.php");

//call UDF
$results = get_all_petstores();

//for testing
//print_r($result);
//exit();

foreach($results as $result) :

		/*
		Call htmlspecialchars() when echoing data into HTML.
		However, don't store escaped HTML in your database.
		The database should store actual data, not its HTML representation.
		Also, helps protect against cross-site scripting (XSS).
		XSS enables attackers to inject client-side script into Web pages viewed by other users
		*/
	?>

	<!-- Include petstore info here-->
	<tr>
		<td><?php echo htmlspecialchars($result['pst_name']); ?></td>
		<td><?php echo htmlspecialchars($result['pst_street']); ?></td>
		<td><?php echo htmlspecialchars($result['pst_city']); ?></td>
		<td><?php echo htmlspecialchars($result['pst_state']); ?></td>
		<td><?php echo htmlspecialchars($result['pst_zip']); ?></td>
		<td><?php echo htmlspecialchars($result['pst_phone']); ?></td>
		<td><?php echo htmlspecialchars($result['pst_email']); ?></td>
		<td><?php echo htmlspecialchars($result['pst_url']); ?></td>
		<td><?php echo htmlspecialchars($result['pst_ytd_sales']); ?></td>
		<td><?php echo htmlspecialchars($result['pst_notes']); ?></td>
<!-- Create form button and hidden input fields to pass petstore info to delete petstore. -->
<td>
<form
onsubmit="return confirm('Do you really want to delete record?');" 
action="delete_petstore.php"
method="post" 
id="delete_petstore">
<input type="hidden" name="pst_id" value="<?php echo $result['pst_id']; ?>" />
<input type="submit" value="Delete" />
</form>
</td>

<!--create form button and hidden input fields to pass petstore and category info. to edit petstore. -->

<td>
		<form action="edit_petstore.php" method="post" id="edit_petstore">

			<input type="hidden" name="pst_id" value="<?php echo $result['pst_id']; ?>"/>
			<input type="submit" value="Edit" />
		</form>
	</td>
</tr>

<?php 
endforeach;
$db = null;
?>
	</tbody>
</table>
 	
<?php
include_once "global/footer.php";
?>

		</div> <!-- starter-template -->
  </div> <!-- end container -->

	<!-- Bootstrap JavaScript
	================================================== -->
	<!-- Placed at end of document so pages load faster -->
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script type="text/javascript" src="//cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="//cdn.datatables.net/1.10.9/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="//cdn.datatables.net/responsive/1.0.7/js/dataTables.responsive.min.js"></script>

	<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
	<script src="js/ie10-viewport-bug-workaround.js"></script>

	<script src="../js/jquery.navgoco.js"></script>
<script src="../js/main.js"></script>
    
    <script>
    $(document).ready(function(){												
       
       //Navigation Menu Slider
        $('#nav-expander').on('click',function(e){
      		e.preventDefault();
      		$('body').toggleClass('nav-expanded');
      	});
      	$('#nav-close').on('click',function(e){
      		e.preventDefault();
      		$('body').removeClass('nav-expanded');
      	});
      	
      	
      	// Initialize navgoco with default options
        $(".main-menu").navgoco({
            caret: '<span class="caret"></span>',
            accordion: false,
            openClass: 'open',
            save: true,
            cookie: {
                name: 'navgoco',
                expires: false,
                path: '/'
            },
            slide: {
                duration: 300,
                easing: 'swing'
            }
        });
  
        	
      });
      </script>


	<script>
	 $(document).ready(function(){
    $('#myTable').DataTable();
});
	</script>

</body>
</html>
