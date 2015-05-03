<?php 

$outputString="";
$ime=$priimek=$geslo=$email=$username="";

if(isset($_POST["username"]))
{
	$username=$_POST["username"];
}
else
{
	$outputString="Uporabniško ime ni bilo vnešeno :error 945389043809380989";
}

if(isset($_POST["ime"]))
{
	$ime=$_POST["ime"];
}
else
{
	$outputString="Ime ni bilo vnešeno :error 3454364364363464";
}

if(isset($_POST["priimek"]))
{
	$priimek=$_POST["priimek"];
}
else
{
	$outputString="Priimek ni bil vnešen :error 549789548754907";
}
	
if(isset($_POST["geslo"]))
{
	$geslo=$_POST["geslo"];
}
else
{
	$outputString="Geslo ni bilo vnešeno :error 436938937943821111";
}

if(isset($_POST["email"]))
{
	$email=$_POST["email"];
}
else
{
	$outputString="Email ni bil vnešen :error 4398873074658655";
}

if($outputString=="")
{
	
	$geslo=sha1($geslo);
	$returnString="";
	$conn = mysqli_connect('localhost', 'root', '', 'dejavnosti');

	if (!$conn) {
		$returnString="Connection failed: " . mysqli_connect_error();
	}
	
	else {

		$sql = "INSERT INTO user(username, userIme, userPriimek, userGeslo, userStatus, userMail)
		VALUES ($username, $ime, $priimek, $geslo, 0, $email)";

		if (mysqli_query($conn, $sql)) {
			$returnString = "Dogodek uspešno dodan!";
		} else {
			$returnString = "Error: " . $sql . "<br>" . mysqli_error($conn);
		}

		mysqli_close($conn);
	}
	
	return $returnString;


	echo $username.'<br>';
	echo $ime.'<br>';
	echo $priimek.'<br>';
	echo $email.'<br>';
	echo $geslo;
	$outputString="Vnos uporabnika uspešen";
}


echo '<h1><b><center>'.$outputString.'</center></b></h1>';

?>