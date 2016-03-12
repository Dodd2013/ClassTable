
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Log Out</title>
 </head>
 <body>
 	<?php
session_start();
session_unset();
session_destroy();
print("Log Out succeed!");
?>
 	<br>
 	<a href="index.php">Click here return to Home page!</a>
 </body>
 </html>