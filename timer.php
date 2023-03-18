<?php
date_default_timezone_set('Europe/Istanbul');
echo date("H:i:s");
?>
<script>
$(document).ready(function(e) {
    setTimeout(function() { 
	$("#times").load('timer.php');
	},1000);
});
</script>