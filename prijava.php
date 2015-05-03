<?php

session_start();

if (session_status() == PHP_SESSION_NONE) 
{
    session_start();
}

$ime=$priimek=$geslo="";
$result="";

if($_SERVER["REQUEST_METHOD"]=="POST")
{
	$postIme=$_POST["ime"];
	$postPriimek=$_POST["priimek"];
	$postGeslo=sha1($_POST["geslo"]);
	
	//TI PODATKI BODO PREBRAN IZ BAZE!!!!!!!!!@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
	$ime=$postIme;//
	$priimek=$postPriimek;//
	$geslo=$postGeslo;//
	//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

	if($postGeslo!=$geslo)
	{
		$result="NAPAČNO GESLO";
	}
	else if(strtoupper($ime)!=strtoupper($postIme))
	{
		$result="NAPAČNO IME";
	}
	else if(strtoupper($priimek)!=strtoupper($postPriimek))
	{
		$result="NAPAČEN PRIIMEK";
	}
	else
	{
		$result="PRIJAVA USPEŠNA";
	}
}
	
if($ime!="" && $priimek!="")
{
	$_SESSION["ime"]=$ime;
	$_SESSION["priimek"]=$priimek;
}
else
{
	if(isset($_SESSION["ime"]))
	{
		unset($_SESSION["ime"]);
	}
	
	if(isset($_SESSION["priimek"]))
	{
		unset($_SESSION["priimek"]);
	}
}

	echo '<center><h1><b>'.$result.'</center> </h1> </b>';
	
	if(isset($ime) && $ime!="" && isset($priimek) && $priimek!="")
	{
		echo '<script type="text/javascript">
		parent.checkLogin('.json_encode($ime).','.json_encode($priimek).');
		</script>';
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<center><h1><b> PRIJAVA </center> </h1> </b>
	</head>

<body>
<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<div align="center" style="margin-top:10%">
<b> Ime: </b> <br> <input type="text" name="ime" required> <br>
<b> Priimek: </b> <br> <input type="text" name="priimek" required> <br>
<b> Geslo: </b> <br> <input type="password" name="geslo" maxlength="20" minlength="6" required> <br>
<br> <input type="submit" value="Vpis">
</div>
</form>

</body>
</html>
