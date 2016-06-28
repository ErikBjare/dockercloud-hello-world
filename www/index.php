<html>
<head>
	<title>Hello world!</title>
	<link href='//fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
	<style>
	body {
		background-color: white;
		text-align: center;
		padding: 50px;
		font-family: "Open Sans","Helvetica Neue",Helvetica,Arial,sans-serif;
	}

	#logo {
		margin-bottom: 40px;
	}
	</style>
</head>
<body>
	<img id="logo" src="logo.png" />
	<h1><?php echo "Hello ".($_ENV["NAME"]?$_ENV["NAME"]:"world")."!"; ?></h1>
	<?php if($_ENV["HOSTNAME"]) {?><h3>My hostname is <?php echo $_ENV["HOSTNAME"]; ?></h3><?php } ?>
	<?php
	$links = [];
	foreach($_ENV as $key => $value) {
		if(preg_match("/^(.*)_PORT_([0-9]*)_(TCP|UDP)$/", $key, $matches)) {
			$links[] = [
				"name" => $matches[1],
				"port" => $matches[2],
				"proto" => $matches[3],
				"value" => $value
			];
		}
	}
	if($links) {
	?>
		<h3>Links found</h3>
		<?php
		foreach($links as $link) {
			?>
			<b><?php echo $link["name"]; ?></b> listening in <?php echo $link["port"]+"/"+$link["proto"]; ?> available at <?php echo $link["value"]; ?><br />
			<?php
		}
		?>
	<?php
	}

	if($_ENV["DOCKERCLOUD_AUTH"]) {
		?>
		<h3>I have Docker Cloud API powers!</h3>
		<?php
	}
	?>
	
	<h2>Some social links</h2>
	<p>Useful in crawler testing</p>
	<ul>
		<li><a href="http://twitter.com/spacex">Twitter</a>
		<li><a href="http://linkedin.com/company/spacex">LinkedIn</a>
		<li><a href="http://facebook.com/spacex">Facebook</a>
		<li><a href="http://plus.google.com/+SpaceX">Google+</a>
		<li><a href="https://www.youtube.com/user/spacexchannel">YouTube</a>
		<li><a href="http://reddit.com/r/spacex">Reddit</a>
	</ul>
</body>
</html>
