<?php
// Oppkoblingsparametre (må byttes ut for testing )
$tjener = 'localhost';
$bruker = 'root';
$pass = '';
$db = 'Hobbyhuset';
// Åpner forbindelse til databasen .
$link = mysqli_connect($tjener, $bruker, $pass, $db);
if (!$link) {
    // Enkel feilhåndtering , bare avslutter med melding.
    exit(' Feil : Fikk ikke kontakt med databasen.');
}
//mysqli_set_charset($link, ' utf8 ');
// Henter inndata fra brukeren
$kunde = 'D'; // Inndata bør sjekkes , se avsnitt 12.4.3
// Bygger opp en SQL-spørring basert på inndata fra brukeren .
$sql = "SELECT * FROM Kunde WHERE Fornavn LIKE '$kunde%'";
// Sender SQL􀀀spørringen til databasen for utførelse
$resultat = mysqli_query($link, $sql);
// Behandler spørreresultatet og skriver ut ny nettside (HTML).
print(' <table border="1">');
$rad = mysqli_fetch_assoc($resultat);
while ($rad) {
    $Knr = $rad['KNr'];
    $Fornavn = $rad['Fornavn'];
    print("<tr><td>$Knr</td><td>$Fornavn</td></tr>");
    $rad = mysqli_fetch_assoc($resultat);
}
print('</table>');
// Lukker forbindelsen til databasen .
mysqli_close($link);
