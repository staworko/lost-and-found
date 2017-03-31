<html>
<head>
   <meta charset="utf-8"/>
     <title>Voilà ce qu&apos;on trouve</title>
</head>
<body>
<h1> Voilà ce qu&apos;on trouve</h1>
<ol>
<?php
if (array_key_exists('gare', $_POST)) {
    $uic=$_POST['gare'];
} else {
    $uic=NULL;
}

if (array_key_exists('descr', $_POST)) {
    $description=$_POST['descr'];
} else{
    $description=NULL;
}

$f = fopen("objets-trouves-restitution.csv","r");
$entete = fgetcsv($f, 0, ";");

while ($ligne = fgetcsv($f, 0, ";")) {
    if ($uic and $ligne[4] != $uic) {
        continue;
    }
    if ($description and 
        stripos($ligne[5], $description) === false and 
        stripos($ligne[6], $description) === false){
        continue;
    }

    echo "<li>", $ligne[1], " ", $ligne[3], " ";
    echo $ligne[5], " ", $ligne[6], "</li>";
}

?>
<ol>
</body>
</html>
