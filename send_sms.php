<!DOCTYPE html>
<html>
  <head>
    
  </head>
  <body>
<?php
require('lib/twilio-php/Services/Twilio.php'); 
require('civi_constants.php'); 

$client = new Services_Twilio(TWILIO_ACCOUNT_SID, TWILIO_AUTH_TOKEN); 

$firstname = 'T';
if(isset($_POST['submitted']['civicrm_1_contact_1_fieldset_fieldset']['civicrm_1_contact_1_contact_first_name']))
{
  $firstname = $_POST['submitted']['civicrm_1_contact_1_fieldset_fieldset']['civicrm_1_contact_1_contact_first_name'] . ', t';  
}

if(isset($_POST['submitted']['civicrm_1_contact_1_fieldset_fieldset']['civicrm_1_contact_1_phone_phone']))
{
  $phone = '+1' . $_POST['submitted']['civicrm_1_contact_1_fieldset_fieldset']['civicrm_1_contact_1_phone_phone'];
    
  $client->account->messages->create(array( 
    'To' => $phone, 
    'From' => "+12267800039", 
    'Body' => "{$firstname}hanks for completing a Power to Change survey @ the Fellowship Dinner!  Explore our website and blogs at: http://p2c.com/students",   
  ));

}

?>
  </body>
</html>
