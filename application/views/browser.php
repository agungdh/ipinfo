<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript" src="<?php echo base_url('assets/jquery.js'); ?>"></script>
	<link href="<?php echo base_url('assets/flag-icon-css-master/css/flag-icon.css'); ?>" rel="stylesheet">
	<title>AgungDH</title>
</head>
<body>
	<h1>IP Checker</h1>
	<div id="data"></div>
	<script type="text/javascript">
	var peta;
	var ip;
	var operator;
	var negara;
	var lokasi1;
	var lokasi2;

	$.getJSON('https://ipinfo.io', function(data){
		peta = '<iframe src = "https://maps.google.com/maps?q='+data.loc+'&hl=es;z=14&amp;output=embed"></iframe>';
		ip = '<p>IP: '+data.ip+'</p>';
		operator = '<p>Operator: '+data.org+'</p>';
		negara = data.country.toLowerCase();
		lokasi1 = '<p>Lokasi: <span class="flag-icon flag-icon-'+negara+'"></span> '+data.city+', '+data.region;
		lokasi2 = '</p>';
		$(document).ready(function(){
			$.getJSON('https://restcountries.eu/rest/v2/alpha/'+negara, function(data){
				var fullnegara = data.name;
				$("#data").append(
		 			peta + ip + operator + lokasi1 + ', ' + data.name + lokasi2
		 		);
			});
 		});
		
	});
	</script>
</body>
</html>