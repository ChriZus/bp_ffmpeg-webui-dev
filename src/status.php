<?php include("include/config.php") ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html>
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="refresh" content="5" />
		<title>Marek - laptop - video conversion</title>
		<link rel="stylesheet" href="style/wizard_steps.css">

		<script>
			function scrollTextArea() {
				var textArea = document.getElementById('resultsTextArea');
				textArea.scrollTop = textArea.scrollHeight;
			}
		</script>
	</head>
	
	<body onload="scrollTextArea()">

		<ol class="wizard-steps">
			<li class="done"><span><a href="step1.php">File selection</a><i></i></span></li><li class="done"><span>Options<i></i></span></li><li class="done"><span>Conversion<i></i></span></li>
		</ol>

		<p>Status: </p>

		<?php
			$content = "Please wait...";
			try {
				if (file_exists($LOG_FILE_NAME)) {
					$content = htmlentities(file_get_contents($LOG_FILE_NAME));
				}
			}
			catch (Exception $e) {
			}
		?>

		<textarea id="resultsTextArea" cols="120" rows="30"><?php echo $content;?></textarea>

	</body>

</html>
