<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8"> 
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style type="text/css">
		.modal {
		    display:    none;
		    position:   fixed;
		    z-index:    1000;
		    top:        0;
		    left:       0;
		    height:     100%;
		    width:      100%;
		    background: rgba( 255, 255, 255, .8 ) 
		                url('<?php echo base_url("assets/loading.gif"); ?>') 
		                50% 50% 
		                no-repeat;
		}

		body.loading {
		    overflow: hidden;   
		}

		body.loading .modal {
		    display: block;
		}
	</style>
	<script type="text/javascript" src="<?php echo base_url('assets/jquery.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>
	<link href="<?php echo base_url('assets/flag-icon-css-master/css/flag-icon.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
	<title>AgungDH</title>
</head>
<body class="loading">
	<div class="container">
		<center>
			<h1>IP Checker</h1>
			<div id="data"></div>	
		</center>
	</div>
	<div class="modal"></div>
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
		 		$("body").attr("class", "");
			});
 		});
		
	});
	</script>
</body>
</html>