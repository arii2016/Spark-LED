<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Spark - LED ON / OFF</title>
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<div class="page-header">
			<h1>Spark Core LED ON/OFF</h1>
		</div>
		<form method="POST"> 
			<input class="btn btn-default btn-lg" type="submit" name="cmd" value="ON"/> 
			<input class="btn btn-default btn-lg" type="submit" name="cmd" value="OFF"/> 
		</form> 

		<?php
		if (isset($_POST['cmd']) == TRUE)
		{
			$url = "https://api.spark.io/v1/devices/0123456789abcdef01234567/led";
			$data = array(
			    'access_token' => '1234123412341234123412341234123412341234',
			    'params' => $_POST['cmd']
			);
			$content = http_build_query($data);
			$options = array('http' => array(
				'timeout'=>10,
			    'method' => 'POST',
			    'content' => $content
			));
			$contents = @file_get_contents($url, false, stream_context_create($options));
			if ($contents === FALSE)
			{
				echo '<p class="lead" style="color: red; font-size:36px;">Error!</p>';
			}
			else
			{
				echo '<p class="lead" style="color: blue; font-size:36px;">Success!</p>';
			}
		}
		?>
	</div>
</body>
</html>
