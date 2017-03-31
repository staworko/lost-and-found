<html>
<head>
   <meta charset="utf-8"/>
     <title>T&apos;as perdu quelque chose ?</title>
</head>
<body>
<h1> T&apos;as perdu quelque chose ?</h1>
<form method="POST" action="found.php">
<select name="gare">
<option value="" selected></option>
<?php
$f = fopen("objets-trouves-restitution.csv","r");
$entete = fgetcsv($f, 0, ";");

$gare = array();

while ($ligne = fgetcsv($f, 0, ";")) {
    if ($ligne[3]) {
        $gare[$ligne[3]] = $ligne[4];
    }
}

foreach ($gare as $nom => $uic) {
    echo "<option value='$uic'>", $nom, "</option>\n";
}
?>
</select>
<p>Déscription d&apos;objet : </p> 
<input type="text" name="descr"/></br>
<input type="submit" name="Go" value="Trouve mon tresor"/>
</form>
</body>
</html>
