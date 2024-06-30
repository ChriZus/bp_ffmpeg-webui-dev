<?php include("include/files.php") ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html>
	<head>
		<meta charset="UTF-8">
		<title>Marek - laptop - file selection/title>
		<link rel="stylesheet" href="style/wizard_steps.css">

		<script>
			function validateForm() {
				var form = document.forms["mainForm"];

				var name1 = form["input_file"];
				if (name1 == null || name1.value == null || name1.value == "") {
					alert("Please select an input file!");
					return false;
				}

				var name2 = form["output_file"];
				if (name2 == null || name2.value == null || name2.value == "") {
					alert("Please provide an output file name!");
					return false;
				}
			}
		</script>

	</head>
	
	<body>

		<ol class="wizard-steps">
			<li class="done"><span>File selection<i></i></span></li><li><span>Parameters<i></i></span></li><li><span>Conversion<i></i></span></li>
		</ol>

		<h1>Converter video</h1>

		<form action="step1.php" method="post">

			<h2>Working directory:</h2>

			<select name="folder" onchange="this.form.submit();">
				<option disabled selected> -- select directory -- </option>
				<?php echo generateFolderOptions(stripslashes($_POST['folder'])); ?>
			</select>

		</form>

		<form name="mainForm" action="step2.php" method="post" onsubmit="return validateForm()">

			<input type="hidden" name="folder" value="<?php echo stripslashes($_POST['folder']); ?>" />

			<h2>Input file:</h2>

			<?php
			try {
				$listOfFiles = generateListOfFiles(stripslashes($_POST['folder']));
			?>

			<select name="input_file" size="5">
				<?php echo $listOfFiles; ?>
			</select>

			<?php
				} catch (Exception $e) { echo "<font color='red'>Failed to read directory!</font>\n"; }
			?>
			
			<h2>Output file:</h2>

			<p><input type="text" name="output_file" /></p>

			<p><input type="submit" value="Next >" /></p>

		</form>

	</body>

</html>
