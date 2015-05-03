<?php
   session_start();
?>
<!DOCTYPE html>
<html>

<head> 
<style>

ul 
{
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
	float: right;
	color: #000000;
}

li:hover
{
	background-color: #00ffff;
	transition-duration: 10s;
	transform: rotate(10080deg);
}

iframe:hover
{
	transition-duration: 10s;
}

li 
{
    float: left;
	padding: 10px;
	background-color: #ffff00;
}


</style>

<h2>
<ul style="float:left">
	<div>
		<li onclick="openPrijava();" id="prijava">  
			PRIJAVA
		</li>
	</div>
</ul>
<ul>
	<div>
		<li onclick="openVnos();" id="vnos" >  
			VNOS 
		</li>
		<li onclick="openPogled();" id="pogled"> 
			POGLED 
		</li>
		<li onclick="openRegister();" id="registracija"> 
			REGISTRACIJA 
		</li>
	</div>
</ul>
</h2>

</head>

<body style="background-color:#ff00ff;" >
<div>

<iframe src="prijava.php" style="background-color:#00ff00; width:100%; height:1500px;" seamless id="frame"> </iframe>

</div>

<script type="text/javascript">

	var loggedIn;
	document.onload=checkLogin("");
	
	function checkLogin(ime)
	{
		//var ime = <?php   $ime=false; if(isset($_SESSION["ime"]) && $_SESSION["ime"]!="") $ime=$_SESSION["ime"]; echo (json_encode($ime)); ?>;
		//var priimek = <?php  $priimek=false; if(isset($_SESSION["priimek"]) && $_SESSION["priimek"]!="") $priimek=$_SESSION["priimek"]; echo (json_encode($priimek)); ?>;
		if( ime != false )
		{
			alert("jej burek!");
			document.getElementById('frame').src='vnos.html';
			document.getElementById('prijava').innerHTML="Prijavljen/-a kot "+ime;
			document.getElementById('registracija').innerHTML="ODJAVA";
			loggedIn=true;
		}
		else
		{
			odjava();
		}
	}
	
	function odjava()
	{
		loggedIn=false;
		document.getElementById('frame').src='prijava.php';
		document.getElementById('prijava').innerHTML="PRIJAVA";
		document.getElementById('registracija').innerHTML="REGISTRACIJA";
		<?php session_destroy(); ?>;
	}
	
	function openRegister()
	{
		var name= document.getElementById('registracija').innerHTML;
		
		if(name=="REGISTRACIJA")
		{
			document.getElementById('frame').src='registracija.php';
		}
		else
		{
			if (confirm("Potrdi odjavljanje!") == true) 
			{
				odjava();
			}
		}
	}
	
	function openVnos()
	{
		if(loggedIn)
		{
			document.getElementById('frame').src='vnos.html';
		}
		else
		{
			alert("Za dodajanje dogodkov se moraš prijaviti!");
		}
	}
	
	function openPogled()
	{
		if(loggedIn)
		{
			document.getElementById('frame').src='pogled.php';
		} 
		else
		{
			alert("Za pregled dogodkov se moraš prijaviti!");
		}
	}
	
	function openPrijava()
	{
		if(loggedIn)
		{
			document.getElementById('frame').src='vnos.html';
		} 
		else
		{
			document.getElementById('frame').src='prijava.php';
		}
	}

</script>

</body>
</html>