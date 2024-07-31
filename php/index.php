<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Case study</title>
</head>

<?php	
	include 'authorization.php';
	$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)	
	or die('Bład połączenia z serwerem: '.mysqli_connect_error($conn));		
?>


<body>
    <h1>HI!</h1>
</body>
</html>