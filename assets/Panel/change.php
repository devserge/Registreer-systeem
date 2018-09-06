<?php

$username = $_GET['user'];

$voornaam = getData("Voornaam", $username);
$achternaam = getData("Achternaam", $username);
$straat = getData("Straat", $username);
$woonplaats = getData("Woonplaats", $username);
$id = getData("ID", $username);
$wachtwoord = getData("Wachtwoord", $username);



function getData($type, $gebruikersnaam) {

    $servername = "localhost";
    $username = "root";
    $password = "password";
    $dbname = "Schooldb";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($gebruikersnaam != null) {

        if (!($type == "Voornaam" OR
            $type == "Achternaam" OR
            $type == "Straat" OR
            $type == "Woonplaats" OR
            $type == "ID" OR
            $type == "Wachtwoord")) return;

            $res = $conn->query("SELECT " . $type . " FROM Personen WHERE Gebruikersnaam='" . $gebruikersnaam . "'");
            if (mysqli_num_rows($res) > 0) {

                while ($row = mysqli_fetch_assoc($res)) {
                    return $row[$type];
                }

            } else return "NO RESULTS FOUND";

    } else return "VALUE CANNOT BE NULL";


}
?>

<html>
<head><title>Gegevens veranderen.</title></head>

<body>
<form action="../php/change.php?user=<?php echo $username?>" method="post">
    Voornaam:<br>
    <input type="text" name="voornaam" value="<?php echo $voornaam?>"><br>
    Achternaam:<br>
    <input type="text" name="achternaam" value="<?php echo $achternaam?>"><br>
    Straat:<br>
    <input type="text" name="straat" value="<?php echo $straat?>"><br>
    Woonplaats:<br>
    <input type="text" name="woonplaats" value="<?php echo $woonplaats?>"><br>
    Gebruikersnaam:<br>
    <input type="text" name="gebruikersnaam" value="<?php echo $username?>"><br>
    Wachtwoord:<br>
    <input type="text" name="wachtwoord" value="<?php echo $wachtwoord?>"><br>
    <input type="submit" value="Submit">
</form>
</body>

</html>
