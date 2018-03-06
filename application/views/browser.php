<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8"> 
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script type="text/javascript" src="<?php echo base_url('assets/jquery.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>
	<link href="<?php echo base_url('assets/flag-icon-css-master/css/flag-icon.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
	<title>AgungDH</title>
</head>
<body>
	<div class="container">
		<center>
			<h1>IP Checker</h1>
			<div id="data"></div>	
		</center>
	</div>
	<script type="text/javascript">
	var peta;
	var ip;
	var operator;
	var negara;
	var lokasi1;
	var lokasi2;

	$.getJSON('https://ipinfo.io', function(data){
		peta = '<iframe src = "https://maps.google.com/maps?q='+data.loc+'&hl=es;z=14&amp;output=embed"></iframe><br>';
		ip = data.ip + '<br>';
		operator = data.org + '<br>';
		negara = data.country.toLowerCase();
		lokasi1 = '<span class="flag-icon flag-icon-'+negara+'"></span> '+data.city+', '+data.region;
		$(document).ready(function(){
			$.getJSON('https://restcountries.eu/rest/v2/alpha/'+negara, function(data){
				var fullnegara = data.name;
				$("#data").append(
		 			ip + operator + peta + lokasi1 + ', ' + data.name
		 		);
			});
 		});
		
	});
	</script>
</body>
</html>