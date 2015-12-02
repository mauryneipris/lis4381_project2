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
	<div class="container">
    
<?php

$url = "http://feeds.feedburner.com/TechCrunch/";


//simplexml_load_file(); interprets XML file into an object
$feed = simplexml_load_file($url, "SimpleXMLIterator");

//Output data from elements in xml file
echo "<h2>" . $feed->channel->description . "</h2>";

//LimitIterator() allows iteration over limited subset of items in an iterator (starting,length)
$filtered = new LimitIterator($feed->channel->item, 0, 10);
foreach ($filtered as $item) { ?>
<h4><a href="<?= $item->link; ?>" target="_blank"><?= $item->title;?></a></h4>

<?php
//set default timezone
date_default_timezone_set('America/New_York');

$date = new DateTime($item->pubDate);
$date->setTimezone(new DateTimeZone('America/New_York'));
//returns timezone offset in seconds from UTC on success or FALSE on failure
$offset = $date->getOffset();

$timezone = ($offset == -14400) ? 'EDT' : 'EST';

echo $date->format('m/d/y, g:ia') . $timezone;
?>
<div class="row">
<div class="col-md-5"><?php echo $item->description; ?></div></div>
<?php } ?>
</div>
</div>
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
