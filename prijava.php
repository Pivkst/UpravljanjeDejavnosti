<?php

session_start();

if (session_status() == PHP_SESSION_NONE) 
{
    session_start();
}

$user=$geslo="";
$result="";

if($_SERVER["REQUEST_METHOD"]=="POST")
{
	$postUser=$_POST["username"];
	$postGeslo=sha1($_POST["geslo"]);
	
	//TI PODATKI BODO PREBRAN IZ BAZE!!!!!!!!!@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
	$user=$postUser;
	$geslo=$postGeslo;//
	//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

	if($postGeslo!=$geslo)
	{
		$result="NAPAČNO GESLO";
	}
	else if(strtoupper($user)!=strtoupper($postUser))
	{
		$result="NAPAČNO IME";
	}
	
	else
	{
		$result="PRIJAVA USPEŠNA";
	}
}
	
if($ime!="" && $priimek!="")
{
	$_SESSION["username"]=$user;
}
else
{
	if(isset($_SESSION["username"]))
	{
		unset($_SESSION["username"]);
	}

}

	echo '<center><h1><b>'.$result.'</center> </h1> </b>';
	
	if(isset($user) && $ime!="")
	{
		echo '<script type="text/javascript">
		parent.checkLogin(json_encode($ime));
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
<b> Uporabniško ime: </b> <br> <input type="text" name="username" required> <br>
<b> Geslo: </b> <br> <input type="password" name="geslo" maxlength="20" minlength="6" required> <br>
<br> <input type="submit" value="Vpis">
</div>
</form>

</body>
</html>
