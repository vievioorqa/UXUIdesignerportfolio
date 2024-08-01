<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elektroniczny dziennik ocen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="custom.css">
	<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>

<?php	
	include 'autoryzacja.php';

	$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)	
	or die('Bład połączenia z serwerem: '.mysqli_connect_error($conn));		


	session_start();
		
		//zmienna dla GET dla nr_klasy
		if(isset($_GET['nr_klasy']))
			$_SESSION['nr_klasy'] = $_GET['nr_klasy'];	

?>
	
	

	<body class="background-klasa">
	
	
	<!--powrót-->
	<div class="containter">
		<div class="row header-index align-items-center">
			<div class="col-1">	
				<a href="index.php" class="btn btn-info bold" role="button">powrót</a>
			</div>
			<div class="col-11">
				<?php 
				$result=mysqli_query($conn, "SELECT nr_klasy FROM `Uczen` WHERE nr_klasy='".$_SESSION['nr_klasy']."';");
					if($row=mysqli_fetch_array($result)){
								echo '<h1 class="text-center col-12">klasa '.$row['nr_klasy'].'</h1>';
							  }
				?>
			</div>	
		</div>
	</div>
	
	<!---
	<div class="col-2">
					<a href="ocena.php?pesel_ucznia='.$row['pesel_ucznia'].'" class="btn btn-info align-items-left" role="button">powrót</a>
				</div>

				<?php /*
				$result=mysqli_query($conn, "SELECT nr_klasy FROM `Uczen` WHERE nr_klasy='".$_SESSION['nr_klasy']."';");
					if($row=mysqli_fetch_array($result)){
								echo '<h1>klasa '.$row['nr_klasy'].'</h1>';
							  }*/
				?>
			</div>
			--->
	
	<!--WYSZUKIWANIE ucznia-->
	<div class="container">
	<div class="row gy-5 mb-3 pb-3">
	<div class="form-inline">
		<form action="klasa.php" method="POST">
			<div class="col-sm-4 ciemny italic">
				<h5>wpisz imię lub nazwisko ucznia:</h5>
			</div>
			<div class="col-sm-4">
				<input type="name" class="form-control" name="imie_nazwisko"><br>
			</div>
			<div class="col-sm-4">
			<button type="submit" class="btn btn-dark mb-2">Szukaj</button>
			</div>
		</form>
	</div>
	</div>
	</div>
	

<?php
		//TABELA z uczniami
	if(isset($_POST['imie_nazwisko']))
	{
		$result=mysqli_query($conn,
		"SELECT imie, nazwisko, pesel_ucznia, nr_klasy FROM Uczen 
		WHERE (imie LIKE '%".$_POST['imie_nazwisko']."%' OR nazwisko LIKE '%".$_POST['imie_nazwisko']."%') AND nr_klasy='".$_SESSION['nr_klasy']."';")			
		or die("Nie ma takiego ucznia w tej klasie");
		

		echo '<div class="container overflow-hidden">';
		echo '<div class="row gy-5 my-3 py-3">';
		  echo '<table class="table">';
		  echo '<thead>';
			echo '<tr>';
			  echo '<th scope="col">imię i nazwisko</th>';
			  echo '<th scope="col"></th>';
			  echo '<th scope="col"></th>';
			echo '</tr>';
		  echo '</thead>';
		
			while($row = mysqli_fetch_array($result)){
		echo '<tbody>';
		echo '<tr>';
		echo '<td>'.$row['imie'].' '.$row['nazwisko'].'</td>';
		echo '<td><a href="ocena.php?pesel_ucznia='.$row['pesel_ucznia'].'" class="btn btn-dark" role="button">wyświetl oceny</a></td>';
		echo '<td><a href="uwaga.php?pesel_ucznia='.$row['pesel_ucznia'].'" class="btn btn-dark" role="button">wyświetl uwagi</a></td>';
		echo '<td></td>';	
		echo "</tr>";
		echo "</tbody>";
	}
	}else{
?>
<div class="container overflow-hidden">
	<div class="row gy-5">
		  <table class="table">
		  <thead>
			<tr>
			  <th scope="col">imię i nazwisko</th>
			  <th scope="col"></th>
			  <th scope="col"></th>
			</tr>
		  </thead>
<?php
	//"SELECT Uczen.imie, Uczen.nazwisko, Uczen.nr_klasy, Uczen.pesel_ucznia, Uwaga.pesel_ucznia 
	//FROM Uczen LEFT JOIN Uwaga 
	//ON Uczen.pesel_ucznia=Uwaga.pesel_ucznia WHERE Uczen.nr_klasy='".$_SESSION['nr_klasy']."';"
	
	$result1 = mysqli_query($conn,
	"SELECT imie, nazwisko, nr_klasy, pesel_ucznia FROM Uczen WHERE Uczen.nr_klasy='".$_SESSION['nr_klasy']."';")
	or die("Błąd w zapytaniu do tabeli Uczeń");
	
	
	while($row1 = mysqli_fetch_array($result1)){
		echo "<tbody>";
		echo "<tr>";
		echo "<td>".$row1['imie']." ".$row1['nazwisko']."</td>";
		echo '<td><a href="ocena.php?pesel_ucznia='.$row1['pesel_ucznia'].'" class="btn btn-dark" role="button">wyświetl oceny</a></td>';
		echo '<td><a href="uwaga.php?pesel_ucznia='.$row1['pesel_ucznia'].'" class="btn btn-dark" role="button">wyświetl uwagi</a></td>';
		echo '<td></td>';	
		echo '<td></td>';
		echo "</tr>";
		echo "</tbody>";
	}}
?>

	


      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" 
            crossorigin="anonymous"></script>
</body>
</html>