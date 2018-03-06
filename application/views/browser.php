<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript" src="<?php echo base_url('assets/jquery.js'); ?>"></script>
	<link href="<?php echo base_url('assets/flag-icon-css-master/css/flag-icon.css'); ?>" rel="stylesheet">
	<title>AgungDH</title>
</head>
<body>
	<div id="data"></div>
	<script type="text/javascript">
	$(document).ready(function(){
		$.getJSON('https://ipinfo.io', function(data){
			var peta = '<iframe src = "https://maps.google.com/maps?q='+data.loc+'&hl=es;z=14&amp;output=embed"></iframe>';
			var ip = '<p>IP: '+data.ip+'</p>';
			var operator = '<p>Operator: '+data.org+'</p>';
			var lokasi = '<p>Lokasi: <span class="flag-icon flag-icon-'+data.country.toLowerCase()+'"></span> '+data.city+', '+data.region+'</p>';

	 		$("#data").append(
	 			peta + ip + operator + lokasi
	 		);
			
		});
	});
	</script>
</body>
</html>