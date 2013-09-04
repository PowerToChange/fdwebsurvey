<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<title>P2C Survey 2013</title>
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
	  <script src="js/campus_link.js"></script>
	  <link rel="stylesheet" type="text/css" href="css/normalize.css">
	  <link rel="stylesheet" type="text/css" href="css/grid.css">
	  <link rel="stylesheet" type="text/css" href="css/survey.css">

		<!-- typekit -->
		<script type="text/javascript" src="//use.typekit.net/tvn8qzj.js"></script>
		<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
		<!-- /typekit -->
	  
	  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
	</head>
	<body>
		<div class="wrapper">
			<div class="container">
				<div id="viewer" class="tk-nimbus-sans">
					<noscript>
						<div class="grid_7 size_3 push20">Sorry, you really need to turn on javascript to view this content.</div>
					</noscript>
				  <div class="screens not_visible">
				  	<div class="screen" order="first">
				  		<div class="grid_7">
				  			Get the link to access to the survey with your campus pre-selected.
				  		</div>
				  		<div class="grid_7 push5">
				  			My university is: <?php include('campus_dropdown.html'); ?>
				  		</div>
				  		<div id="result" class="grid_7 push10 original_size">
				  			
				  		</div>
				  	</div>

				  </div>
				  <div id="messages">
				  	
				  </div>
				</div>
			</div>
		</div>



	</body>
</html>