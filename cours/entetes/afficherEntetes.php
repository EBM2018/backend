<h1>De quelle page vient-on ? </h1>

<?php
echo $_SERVER["HTTP_REFERER"];

echo "<table border=\"1\"><tr><td>Indice</td><td>Valeur</td></tr>";

foreach ($_SERVER as $cle => $val)
{
	echo "<tr><td>$cle</td><td>$val</td></tr>";
}

echo "</table>";

?>

