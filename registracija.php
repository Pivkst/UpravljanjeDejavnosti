<!DOCTYPE html>
<html>
<head>
<center><h1><b> REGISTRACIJA </center> </h1> </b>
</head>


<body>

<form method="POST" action="dodajUporabnika.php">
<div align="center" style="margin-top:10%">
<b>Ime: </b> <br> <input type="text" name="ime" required><br>
<b>Priimek: </b> <br> <input type="text" name="priimek" required><br>
<b>E-Pošta: </b> <br> <input type="email" name="email" required><br>
<b>Geslo: </b> <br> <input type="password" name="geslo" maxlength="20" minlength="6" required> <br> <i style="color:#505050">*dolzina med 6 in 20 znaki </i><br>
<br>
<input type="submit" value="Potrdi registracijo">
</div>
</form>

</body>
</html>