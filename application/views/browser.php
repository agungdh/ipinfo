<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript" src="<?php echo base_url('assets/jquery.js'); ?>"></script>
	<title>AgungDH</title>
</head>
<body>
	<div id="data"></div>
	<script type="text/javascript">
	$(document).ready(function(){
		$.getJSON('https://ipinfo.io', function(data){
	 		$.each(data, function(index, value) {
	 			$("#data").append(index + ' = ' + value + '<br>');
			}); 
		});
	});
	</script>
</body>
</html>