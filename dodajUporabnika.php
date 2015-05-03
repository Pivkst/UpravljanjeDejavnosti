<?php 

$outputString="";
$ime=$priimek=$geslo=$email="";
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
	//VNESI V BAZO UPORABNIKA
	$geslo=sha1($geslo);
	echo $ime.'<br>';
	echo $priimek.'<br>';
	echo $email.'<br>';
	echo $geslo;
	$outputString="Vnos uporabnika uspešen";
}


echo '<h1><b><center>'.$outputString.'</center></b></h1>';

?>
