<?php
$preselected_campus = "";
if(isset($_GET['s'])) $preselected_campus = $_GET['s'];
?>
<input type="hidden" name="preselected_campus" value="<?php echo $preselected_campus; ?>"/>
