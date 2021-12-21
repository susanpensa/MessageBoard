<!-- Exercise from Ch. 6 -->
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Post Message</title>
</head>
<body>
	<?php
		if(isset($_POST["submit"])) {
			$Subject = stripslashes($_POST["subject"]);
			$Name = stripslashes($_POST["name"]);
			$Message = stripslashes($_POST["message"]);
			
			// Replace any "~" characters with "-" characters
			$Subject = str_replace("~", "-", $Subject);
			$Name = str_replace("~", "-", $Name);
			$Message = str_replace("~", "-", $Message);
			
			$MessageRecord = "$Subject~$Name~$Message\n";

			// Let's create a variable to store a new open file's data
			$MessageFile = fopen("MessageBoard/messages.txt", "ab");

			// Check that there are no issues with the file before writing the new messsage
			if($MessageFile === FALSE) {
				echo "There was an error saving your message!\n";
			}
			else {
				fwrite($MessageFile, $MessageRecord);
				fclose($MessageFile);
				echo "Your message has been saved!\n";
			}
		}
	?>
	<h1 style="color: darkslateblue;">Post New Message</h1>
	<hr/>
	<form action="PostMessage.php" method="POST">
		<label style="font-weight: bold;">Subject:</label>
		<input type="text" name="subject"/>
		<label style="font-weight: bold;">Name:</label>
		<input type="text" name="name"/><br/>
		<textarea name="message" rows="6" cols="80"></textarea><br/>
		<input type="submit" name="submit" value="Post Message"/>
		<input type="reset" name="reset" value="Reset Form"/>
	</form>
	<hr/>
	<p>
		<a href="MessageBoard.php">View Message</a>
	</p>
</body>
</html>