<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<title>P2C Survey 2013</title>
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
	  <script src="js/surveys.js"></script>
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

		<div class="container">
			<div id="viewer" class="tk-nimbus-sans">
			  <div class="screens">
			  	<div class="screen" order="first">
			  		<div class="grid_3 alpha">
			  			<object data="img/mycravings.svg" type="image/svg+xml">
			  				<a href="img/mycravings.svg">
			  					<!--[if lte IE 8]-->
						  			<img src="img/mycravings.gif"/>
			  					<!--[endif]-->
			  				</a>
			  			</object>
			  		</div>
			  		<div class="grid_4 omega">
			  			We want to know what you want. Take this survey to join the cravings conversation on your campus.
			  		</div>
			  		<div class="grid_7 size_3">
			  			My university is: <?php include('campus_dropdown.html'); ?>
			  		</div>
			  		<div class="grid_5 alpha">
			  			brought to you by Power to Change &amp; myCravings.ca
			  		</div>
			  		<div class="grid_2 omega">
			  			<object data="img/p2c.svg" type="image/svg+xml">
			  				<a href="img/p2c.svg">
			  					<!--[if lte IE 8]-->
						  			<img src="img/p2c.gif"/>
			  					<!--[endif]-->
			  				</a>
			  			</object>
			  		</div>
			  	</div>
			  	<div class="screen size_2">
			  		
			      <div class="grid_7">The one thing I crave most is:</div>
			      <div class="grid_6 indented omega"><input type="radio" name="cravemost" value="warmup-fun">fun</input></div>
			      <div class="grid_6 indented omega"><input type="radio" name="cravemost" value="warmup-relationship">relationship</input></div>
			      <div class="grid_6 indented omega"><input type="radio" name="cravemost" value="warmup-money">money</input></div>
			      <div class="grid_6 indented omega"><input type="radio" name="cravemost" value="warmup-grades">good grades</input></div>
			      <div class="grid_6 indented omega"><input type="radio" name="cravemost" value="warmup-other">other</input></div>
			  	</div>
			  	<div class="screen">
						<p>I’d like a <strong>FREE MAGAZINE BY PERSONAL DELIVERY</strong> to help me explore my craving for:</p>
						<div>
							<input type="radio" name="magazine" value="spiritual-connection">spiritual connection</input>
							<input type="radio" name="magazine" value="justice">a real justice</input>
							<input type="radio" name="magazine" value="escape">escape from the dreariness of life</input>
							<input type="radio" name="magazine" value="success">achievement &amp; success</input>
							<input type="radio" name="magazine" value="love">love without conditions</input>
							<input type="radio" name="magazine" value="no">No, thanks</input>
						</div>
			  	</div>
			  	<div class="screen">
						<em>Power to Change loves to help students discover Jesus.</em>
						<p>How interested are you in having a chat about how to begin a journey with Jesus Christ?</p>
						<div>
							<input type="radio" name="interested" value="1">1 - not</input>
							<input type="radio" name="interested" value="2">2 - </input>
							<input type="radio" name="interested" value="3">3 - maybe</input>
							<input type="radio" name="interested" value="4">4 - </input>
							<input type="radio" name="interested" value="5">5 - very</input>
						</div>
			  	</div>
			  	<div class="screen">
						<p>On my spiritual journey I’d like to:</p>
						<div>
							<input type="radio" name="wouldliketo" value="explore-cravings">explore the deeper meaning of my cravings</input>
							<input type="radio" name="wouldliketo" value="online- resources">get connected to online resources about my cravings</input>
							<input type="radio" name="wouldliketo" value="hear-more">hear more about Power to Change</input>
							<input type="radio" name="wouldliketo" value="grow">grow in my relationship with Jesus</input>
							<input type="radio" name="wouldliketo" value="nothing">do nothing right now</input>
						</div>
			  	</div>
			  	<div class="screen" order="last">
			  		<div class="form_label">First Name:</div>
						<div class="form_input"><input name="first_name" display-name="first name" type="text" /></div>
			  		<div class="form_label">Last Name:</div>
						<div class="form_input"><input name="last_name" display-name="last name" type="text" /></div>
						<div>
							<input type="radio" name="gender" value="male">Male</input>
							<input type="radio" name="gender" value="female">Female</input>
						</div>
			  		<div class="form_label">Cell Phone:</div>
						<div class="form_input"><input name="cellphone" type="tel" /></div>
			  		<div class="form_label">Email:</div>
						<div class="form_input"><input name="email" type="email" /></div>
						Year
						<div>
							<input type="radio" name="year" value="1">1</input>
							<input type="radio" name="year" value="2">2</input>
							<input type="radio" name="year" value="3">3</input>
							<input type="radio" name="year" value="4">4</input>
							<input type="radio" name="year" value="5">5</input>
							<input type="radio" name="year" value="Grad">Grad</input>
						</div>
			  		<div class="form_label">Faculty/Degree:</div>
						<div class="form_input"><input name="faculty" type="text" display-name="faculty or degree" /></div>
			  		<div class="form_label">On Campus Residence:</div>
						<div class="form_input"><input name="residence" type="text" is-required="false" /></div>
						<input type="checkbox" name="international"/> I am an international student 
			  	</div>
			  	<div class="screen" order="thankyou">
			  		THANK YOU!
			  		[myCravings img]
			  		
			  	</div>
			  	<div class="screen" order="error-submitting">
			  		We're sorry, it looks like there was an error while trying to submit your survey. 
			  		
			  		Would you like to try to submit it again?
			  		
			  	</div>
			  </div>
			  <div id="messages">
			  	
			  </div>
			  <div id="action-buttons">
			  	<a id="back-button">Back</a>
			  	<a id="next-button" class="forward-button">Next</a>
			  	<a id="retry-button">Retry</a>
			  	<a id="reset-button">Restart</a>
			  	<a id="submit-button" class="forward-button">Submit</a>
			  </div>
			</div>
		</div>



		
	</body>
</html>