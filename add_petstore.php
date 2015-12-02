<!DOCTYPE html>
<html lang="en">
<head>
<!--
"Time-stamp: <Thu, 10-08-15, 18:48:04 Eastern Daylight Time>"
//-->
<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="My online portfolio that illustrates skills acquired while working through various project requirements.">
	<meta name="author" content="Maury Neipris">
	<link rel="icon" href="favicon.ico">

	<title>LIS4381 - P2: Add Petstore</title>

<!-- Include FontAwesome CSS to use feedback icons provided by FontAwesome -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

<!-- Bootstrap for responsive, mobile-first design. -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

<!-- Note: following file is for form validation. -->
<link rel="stylesheet" href="css/formValidation.min.css"/>

<!-- Starter template for your own custom styling. -->
<link href="css/starter-template.css" rel="stylesheet">
<link rel="stylesheet" href="../css/mainnav.css">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body>

	<?php include_once("../global/nav_global.php"); ?>

	<div class="container">
		<div class="starter-template">
			<div class="row">
				<div class="col-sm-8 col-sm-offset-2">
					
					<div class="page-header">
						<?php include_once("global/header.php"); ?>	
					</div>

					<h2>Pet Stores</h2>

						<form id="defaultForm" method="post" class="form-horizontal" action="add_petstore_process.php">
								<div class="form-group">
										<label class="col-sm-3 control-label">Name:</label>
										<div class="col-sm-5">
												<input type="text" class="form-control" maxlength="30" name="pst_name" placeholder="Pet Store"/>
										</div>
								</div>


								<div class="form-group">
										<label class="col-sm-3 control-label">Street:</label>
										<div class="col-sm-5">
												<input type="text" class="form-control" maxlength="30" name="pst_street" placeholder="123 Main Street"/>
										</div>
								</div>
								<div class="form-group">
										<label class="col-sm-3 control-label">City:</label>
										<div class="col-sm-5">
												<input type="text" class="form-control" maxlength="30" name="pst_city" placeholder="City"/>
										</div>
								</div>
								<div class="form-group">
										<label class="col-sm-3 control-label">State:</label>
										<div class="col-sm-5">
												<input type="text" class="form-control" maxlength="2" name="pst_state" placeholder="AZ"/>
										</div>
								</div>
								<div class="form-group">
										<label class="col-sm-3 control-label">Zip:</label>
										<div class="col-sm-5">
												<input type="text" class="form-control" maxlength="9" name="pst_zip" placeholder="12345"/>
										</div>
								</div>
								<div class="form-group">
										<label class="col-sm-3 control-label">Phone:</label>
										<div class="col-sm-5">
												<input type="tel" class="form-control" maxlength="10" name="pst_phone" placeholder="1234567890"/>
										</div>
								</div>
								<div class="form-group">
										<label class="col-sm-3 control-label">Email:</label>
										<div class="col-sm-5">
												<input type="email" class="form-control" maxlength="100" name="pst_email" placeholder="example@domain.com"/>
										</div>
								</div>
								<div class="form-group">
										<label class="col-sm-3 control-label">URL:</label>
										<div class="col-sm-5">
												<input type="url" class="form-control" maxlength="100" name="pst_url" placeholder="http://www.domain.com"/>
										</div>
								</div>
								<div class="form-group">
										<label class="col-sm-3 control-label">YTD Sales:</label>
										<div class="col-sm-5">
												<input type="text" class="form-control" maxlength="11" name="pst_ytd_sales" placeholder="123456.78"/>
										</div>
								</div>
								<div class="form-group">
										<label class="col-sm-3 control-label">Notes:</label>
										<div class="col-sm-5">
												<input type="text" class="form-control" maxlength="255" name="pst_notes" placeholder="Notes"/>
										</div>
								</div>
								<div class="form-group">
										<div class="col-sm-12">
												<button type="submit" class="btn btn-primary center-block" name="signup" value="Sign up">Submit</button>
										</div>
								</div>
						</form>
					</div>
			</div>

			<?php include_once "global/footer.php"; ?>
			
		</div> <!-- end starter-template -->
 </div> <!-- end container -->

	
	<!-- Bootstrap JavaScript
	================================================== -->
	<!-- Placed at end of document so pages load faster -->
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<!-- Turn off client-side validation, in order to test server-side validation. -->
 
<!-- Note the following bootstrap.min.js file is for form validation, different from the one above. -->
<!--<script type="text/javascript" src="js/formValidation/bootstrap.min.js"></script>-->
<script type="text/javascript" src="js/formValidation/formValidation.min.js"></script>



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

<script type="text/javascript">
$(document).ready(function() {

	$('#defaultForm').formValidation({
			message: 'This value is not valid',
			icon: {
					valid: 'fa fa-check',
					invalid: 'fa fa-times',
					validating: 'fa fa-refresh'
			},
			fields: {
					pst_name: {
							validators: {
									notEmpty: {
											message: 'Name is required'
									},
									stringLength: {
											min: 1,
											max: 30,
											message: 'Name must be less than 30 characters long'
									},
									regexp: {
										//alphanumeric, hyphens, underscores, and spaces
										//regexp: /^[a-zA-Z0-9\-_\s]+$/,										
										//similar to: (though, \w supports other Unicode characters)
											regexp: /^[\w\-\s]+$/,
										message: 'Name can only contain letters, numbers, hyphens, and underscore'
									},									
							},
					},

					pst_street: {
						validators: {
							notEmpty: {
								message: 'Street required'
							},
							stringLength: {
								min: 1,
								max: 30,
								message: 'Street no more than 30 characters'
							},
						regexp: {
							regexp: /^[a-zA-Z0-9\s]+$/,
							message: 'Street can only contain letters or numbers'
							},
						},
					},
					city: {
						validators: {
							notEmpty: {
								message: 'City required'
							},
							stringLength: {
								min: 1,
								max: 30,
								message: 'City no more than 30 characters'
					
						},
						regexp: {
							regexp: /^[a-zA-Z\s]+$/,
							message: 'City can only contain letters or numbers'
							},
						},
					},
					pst_state: {
						validators: {
							notEmpty: {
								message: 'State required'
							},
							stringLength: {
								min: 2,
								max: 2,
								message: 'State must be two characters'
							
						},
						regexp: {
							regexp: /^[a-zA-Z]+$/,
							message: 'State can only contain letters'
							},
						},
					},
					pst_zip: {
						validators: {
							notEmpty: {
								message: 'Zip required, only numbers'
							},
							stringLength: {
								min: 5,
								max: 9,
								message: 'Zip must be 5, and no more than 9 digits'
							
						},
						regexp: {
							regexp: /^[0-9]+$/,
							message: 'Zip can only contain numbers'
							},
						},
					},
					pst_phone: {
						validators: {
							notEmpty: {
								message: 'Phone required, including area code, only numbers'
							},
							stringLength: {
								min: 10,
								max: 10,
								message: 'Phone must be 10 digits'
							
						},
						regexp: {
							regexp: /^[0-9]+$/,
							message: 'Phone can only contain numbers'
							},
						},
					},

					pst_email: {
							validators: {
									notEmpty: {
											message: 'Email address is required'
									},
									emailAddress: {
											message: 'Must include valid email address'
									},
									stringLength: {
											min: 1,
											max: 100,
											message: 'Email no more than 100 characters'
									},
							},
					},
					pst_url: {
						validators: {
							notEmpty: {
								message: 'URL required'
							},
							stringLength: {
								min: 1,
								max: 100,
								message: 'URL no more than 100 characters'
							},
						},			
					},

					pst_ytd_sales: {
						validators: {
							notEmpty: {
								message: 'YTD Sales is required'
							},
							stringLength: {
								min: 1,
								max: 30,
								message: 'YTD Sales can be no more than 10 digits, including decimal point'
							
						},
						regexp: {
							regexp: /^[0-9\.]+$/,
							message: 'YTD Sales can only contain numbers and decimal point'
							},
						},
					},
				}
 
	});
});
</script>

</body>
</html>
