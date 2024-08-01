<!DOCTYPE html>
<html lang="pl">
<head>
  <title>Elektroniczny dziennik ocen</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="custom.css">
</head>


<?php	
	include 'autoryzacja.php';

	$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)	
	or die('Bład połączenia z serwerem: '.mysqli_connect_error($conn));		
?>


<body class="background-index">

<div class="header-index text-center">
  <h1>Elektroniczny dziennik ocen i uwag</h1>
</div>

<div class="container overflow-hidden">
	<div class="row gy-5">
		<div class="col-md-12 biały italic text-center py-2 mb-4">
		  <p><h2>wybierz klasę:</h2></p> 
		</div>
	 </div>

<?php	
	$result = mysqli_query($conn,
	"SELECT DISTINCT nr_klasy FROM Uczen ORDER BY nr_klasy;")
	or die("Błąd w zapytaniu do tabeli Uczeń");
	
	while($row = mysqli_fetch_array($result)){
		echo '<div class="col-md-12 text-center p-3">';
			echo '<a class="btn btn-info btn-lg" href="klasa.php?nr_klasy='.$row['nr_klasy'].'" role="button">klasa '.$row['nr_klasy'].'</a>';
		echo "</div>";
	}
?>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
