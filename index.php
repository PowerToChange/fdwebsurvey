<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<title>P2C Survey 2013</title>
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
	  <script src="js/jquery.touchSwipe.min.js"></script>
	  <script src="js/surveys.js"></script>
	  <link rel="stylesheet" type="text/css" href="css/normalize.css">
	  <link rel="stylesheet" type="text/css" href="css/grid.css">
	  <link rel="stylesheet" type="text/css" href="css/survey.css">
	  <link rel="stylesheet" type="text/css" href="css/animations.css">

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
						<div class="grid_7 size_3 push20">Sorry, you really need to turn on javascript to fill this survey online.</div>
					</noscript>
				  <div class="screens not_visible">
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
				  		<div class="grid_7 push5">
				  			My university is: <?php include('campus_dropdown.html'); ?>
				  		</div>
				  		<div class="grid_5 push10 alpha">
				  			brought to you by Power to Change &amp; myCravings.ca
				  		</div>
				  		<div id="p2clogo" class="grid_2 push10 omega max33">
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
							<div class="grid_6 indented omega">
								<input id="radio-cwf" type="radio" name="submitted[the_one_thing_i_crave_most_is]" value="key-a" />
								<span class="selector" activates="radio-cwf">fun</span>
							</div>
							<div class="grid_6 indented omega">
								<input id="radio-cwr" type="radio" name="submitted[the_one_thing_i_crave_most_is]" value="key-b" />
								<span class="selector" activates="radio-cwr">relationship</span>
							</div>
							<div class="grid_6 indented omega">
								<input id="radio-cwm" type="radio" name="submitted[the_one_thing_i_crave_most_is]" value="key-c" />
								<span class="selector" activates="radio-cwm">money</span>
							</div>
							<div class="grid_6 indented omega">
								<input id="radio-cwg" type="radio" name="submitted[the_one_thing_i_crave_most_is]" value="key-d" />
								<span class="selector" activates="radio-cwg">good grades</span>
							</div>
							<div class="grid_6 indented omega">
								<input id="radio-cwo" type="radio" name="submitted[the_one_thing_i_crave_most_is]" value="key-e" />
								<span class="selector" activates="radio-cwo">other</span>
							</div>
							<input type="hidden" name="submitted[if_other]" value="" />
				  	</div>
				  	<div class="screen">
							<div class="grid_7">I’d like a <strong>FREE MAGAZINE BY PERSONAL DELIVERY</strong> to help me explore my craving for:</div>
							<div class="grid_6 indented omega">
								<input id="radio-msc" type="checkbox" name="submitted[civicrm_1_activity_1_cg22_custom_155][magazine-spiritual]" value="magazine-spiritual" />
								<span class="selector" activates="radio-msc">spiritual connection</span>
							</div>
							<div class="grid_6 indented omega">
								<input id="radio-mj" type="checkbox" name="submitted[civicrm_1_activity_1_cg22_custom_155][magazine-justice]" value="magazine-justice" />
								<span class="selector" activates="radio-mj">a real justice</span>
							</div>
							<div class="grid_6 indented omega">
								<input id="radio-me" type="checkbox" name="submitted[civicrm_1_activity_1_cg22_custom_155][magazine-escape]" value="magazine-escape" />
								<span class="selector" activates="radio-me">escape from the dreariness of life</span>
							</div>
							<div class="grid_6 indented omega">
								<input id="radio-mss" type="checkbox" name="submitted[civicrm_1_activity_1_cg22_custom_155][magazine-success]" value="magazine-success" />
								<span class="selector" activates="radio-mss">achievement &amp; success</span>
							</div>
							<div class="grid_6 indented omega">
								<input id="radio-ml" type="checkbox" name="submitted[civicrm_1_activity_1_cg22_custom_155][magazine-love]" value="magazine-love" />
								<span class="selector" activates="radio-ml">love without conditions</span>
							</div>
							<div class="grid_6 indented omega">
								<input id="radio-mn" type="checkbox" name="submitted[civicrm_1_activity_1_cg22_custom_155][magazine-no]" value="magazine-no" />
								<span class="selector" activates="radio-mn">No, thanks</span>
							</div>
				  	</div>
				  	<div class="screen">
							<div class="grid_7"><em>Power to Change loves to help students discover Jesus.</em></div>
							<div class="grid_7">How interested are you in having a chat about how to begin a journey with Jesus Christ?</div>
							<div class="grid_1 indented">
								<input id="radio-1" type="radio" name="submitted[civicrm_1_activity_1_cg22_custom_157]" value="gauge-1" />
								<span class="selector" activates="radio-1">1<br/>not</span>
							</div>
							<div class="grid_1">
								<input id="radio-2" type="radio" name="submitted[civicrm_1_activity_1_cg22_custom_157]" value="gauge-2" />
								<span class="selector" activates="radio-2">2<br/> </span>
							</div>
							<div class="grid_1">
								<input id="radio-3" type="radio" name="submitted[civicrm_1_activity_1_cg22_custom_157]" value="gauge-3" />
								<span class="selector" activates="radio-3">3<br/>maybe</span>
							</div>
							<div class="grid_1">
								<input id="radio-4" type="radio" name="submitted[civicrm_1_activity_1_cg22_custom_157]" value="gauge-4" />
								<span class="selector" activates="radio-4">4</span>
							</div>
							<div class="grid_1">
								<input id="radio-5" type="radio" name="submitted[civicrm_1_activity_1_cg22_custom_157]" value="gauge-5" />
								<span class="selector" activates="radio-5">5<br/>very</span>
							</div>
				  	</div>
				  	<div class="screen">
							<div class="grid_7">On my spiritual journey I’d like to:</div>
							<div class="grid_6 indented">
								<input id="radio-wec" type="checkbox" name="submitted[civicrm_1_activity_1_cg22_custom_156][journey-explore]" value="journey-explore" />
								<span class="selector" activates="radio-wec">explore the deeper meaning of my cravings</span>
							</div>
							<div class="grid_6 indented">
								<input id="radio-wor" type="checkbox" name="submitted[civicrm_1_activity_1_cg22_custom_156][journey-online]" value="journey-online" />
								<span class="selector" activates="radio-wor">get connected to online resources about my cravings</span>
							</div>
							<div class="grid_6 indented">
								<input id="radio-whm" type="checkbox" name="submitted[civicrm_1_activity_1_cg22_custom_156][journey-p2c]" value="journey-p2c" />
								<span class="selector" activates="radio-whm">hear more about Power to Change</span>
							</div>
							<div class="grid_6 indented">
								<input id="radio-wg" type="checkbox" name="submitted[civicrm_1_activity_1_cg22_custom_156][journey-grow]" value="journey-grow" />
								<span class="selector" activates="radio-wg">grow in my relationship with Jesus</span>
							</div>
							<div class="grid_6 indented">
								<input id="radio-wn" type="checkbox" name="submitted[civicrm_1_activity_1_cg22_custom_156][journey-nothing]" value="journey-nothing" />
								<span class="selector" activates="radio-wn">do nothing right now</span>
							</div>
				  	</div>
				  	<div class="screen" order="last">
				  		<div class="grid_3">First Name: <input name="submitted[civicrm_1_contact_1_fieldset_fieldset][civicrm_1_contact_1_contact_first_name]" display-name="first name" type="text" /></div>
				  		<div class="grid_4">Last Name: <input name="submitted[civicrm_1_contact_1_fieldset_fieldset][civicrm_1_contact_1_contact_last_name]" display-name="last name" type="text" /></div>
							<div class="grid_7">
								<input id="radio-male" type="radio" name="submitted[civicrm_1_contact_1_fieldset_fieldset][civicrm_1_contact_1_contact_gender_id]" value="2">
								<span class="selector" activates="radio-male">Male</span>
								<input id="radio-female" type="radio" name="submitted[civicrm_1_contact_1_fieldset_fieldset][civicrm_1_contact_1_contact_gender_id]" value="1">
								<span class="selector" activates="radio-female">Female</span>
							</div>
				  		<div class="grid_7">Cell Phone: <input name="submitted[civicrm_1_contact_1_fieldset_fieldset][civicrm_1_contact_1_phone_phone]" type="tel" /></div>
				  		<div class="grid_7">Email: <input name="submitted[civicrm_1_contact_1_fieldset_fieldset][civicrm_1_contact_1_email_email]" type="email" /></div>
				  		<div class="grid_7">
							Year:
								<input id="radio-y1" type="radio" name="submitted[civicrm_1_contact_1_fieldset_fieldset][civicrm_1_contact_1_cg7_custom_57]" value="1" />
								<span class="selector" activates="radio-y1">1&nbsp;&nbsp;</span>
								<input id="radio-y2" type="radio" name="submitted[civicrm_1_contact_1_fieldset_fieldset][civicrm_1_contact_1_cg7_custom_57]" value="2" />
								<span class="selector" activates="radio-y2">2&nbsp;&nbsp;</span>
								<input id="radio-y3" type="radio" name="submitted[civicrm_1_contact_1_fieldset_fieldset][civicrm_1_contact_1_cg7_custom_57]" value="3" />
								<span class="selector" activates="radio-y3">3&nbsp;&nbsp;</span>
								<input id="radio-y4" type="radio" name="submitted[civicrm_1_contact_1_fieldset_fieldset][civicrm_1_contact_1_cg7_custom_57]" value="4" />
								<span class="selector" activates="radio-y4">4&nbsp;&nbsp;</span>
								<input id="radio-y5" type="radio" name="submitted[civicrm_1_contact_1_fieldset_fieldset][civicrm_1_contact_1_cg7_custom_57]" value="5" />
								<span class="selector" activates="radio-y5">5&nbsp;&nbsp;</span>
								<input id="radio-yg" type="radio" name="submitted[civicrm_1_contact_1_fieldset_fieldset][civicrm_1_contact_1_cg7_custom_57]" value="grad" />
								<span class="selector" activates="radio-yg">Grad</span>
								<!-- if other -->
								<input type="hidden" name="submitted[civicrm_1_contact_1_fieldset_fieldset][civicrm_1_contact_1_cg7_custom_58]" value=""/>
							</div>
				  		<div class="grid_7">Faculty/Degree: <input name="submitted[civicrm_1_contact_1_fieldset_fieldset][civicrm_1_contact_1_cg7_custom_59]" type="text" display-name="faculty or degree" /></div>
								<!-- on campus residence -->
				  		<input type="hidden" name="submitted[civicrm_1_contact_1_fieldset_fieldset][civicrm_1_contact_1_cg7_custom_60]" value="" />
							<div class="grid_7">
								<input id="international" type="checkbox" name="submitted[civicrm_1_contact_1_fieldset_fieldset][civicrm_1_contact_1_cg7_custom_61][yes]"/>
								<span class="selector" activates="international"> I am an international student</span>
							</div> 
				  	</div>
				  	<div class="screen" order="thankyou">
				  		<div class="grid_7 textcenter size_5">
				  			THANK YOU!
				  		</div>
				  		<div class="grid_5 indented">
				  			<object data="img/mycravings.svg" type="image/svg+xml">
				  				<a href="img/mycravings.svg">
				  					<!--[if lte IE 8]-->
							  			<img src="img/mycravings.gif"/>
				  					<!--[endif]-->
				  				</a>
				  			</object>
				  		</div>
				  	</div>
				  	<div class="screen" order="error-submitting">
				  		<div class="grid_7 textcenter size_3 push10">We're sorry, it looks like there was an error while trying to submit your survey.</div>
				  		<div class="grid_7 textcenter size_3 push10">Would you like to try to submit it again?</div>
				  	</div>
				  	<div class="screen" order="submitting">
				  		<div class="grid_7 textcenter size_3 push10">Submitting &hellip;</div>
				  		<div class="grid_7 textcenter original_size size_3 push10"><img src="img/submitting.gif" /></div>
				  	</div>
				  	<div class="screen" order="hidden_stuff">
							<!-- (person entering data)-->
							<input type="hidden" name="submitted[civicrm_1_activity_1_cg22_custom_159]" value="crave.mycravings.ca" /> 
							<!--(notes)-->
							<input type="hidden" name="submitted[civicrm_1_activity_1_activity_details]" value="" /> 
							<input type="hidden" name="details[sid]" value="" />
							<input type="hidden" name="details[page_num]" value="1" />
							<input type="hidden" name="details[page_count]" value="1" />
							<input type="hidden" name="details[finished]" value="0" />
							<input type="hidden" name="form_build_id" value="<?php echo file_get_contents('form_build_id.txt'); ?>" />
							<input type="hidden" name="form_id" value="<?php echo file_get_contents('form_id.txt'); ?>" />
				  	</div>
				  </div>
				  <div id="messages">
				  	
				  </div>
				  <div id="action-buttons" class="not_visible">
				  	<a id="back-button">Back</a>
				  	<a id="next-button" class="forward-button">Next</a>
				  	<a id="retry-button" class="forward-button">Try Submit Again</a>
				  	<a id="reset-button">Reset Survey</a>
				  	<a id="submit-button" class="forward-button">Submit Survey</a>
				  	<a id="visit-button" class="forward-button" href="http://mycravings.ca">Visit myCRAVINGS.ca</a>
				  </div>
				</div>
			</div>
		</div>


		
	</body>
</html>