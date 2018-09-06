<?php

if ($_POST['voornaam'] == null OR $_POST['achternaam'] == null OR $_POST['straat'] == null OR $_POST['woonplaats'] == NULL OR $_POST['gebruikersnaam'] == null OR $_POST['wachtwoord'] == null) {
    echo "SOMETHING IS NULL!";
    return;
}

$voornaam = $_POST['voornaam'];
$achternaam = $_POST['achternaam'];
$straat = $_POST['straat'];
$woonplaats = $_POST['woonplaats'];
$id = calculateId();
$gebruikersnaam = $_POST['gebruikersnaam'];
$wachtwoord = $_POST['wachtwoord'];


postData($voornaam, $achternaam, $straat, $woonplaats, $id, $gebruikersnaam, $wachtwoord);

function postData($voornaam, $achternaam, $straat, $woonplaats, $id, $gebruikersnaam, $wachtwoord) {

    $servername = "localhost";
    $username = "root";
    $password = "password";
    $dbname = "Schooldb";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    if(!($stmt = $conn->prepare("INSERT INTO Personen (Voornaam, Achternaam, Straat, Woonplaats, ID, Gebruikersnaam, Wachtwoord)  VALUES (
". "'". $voornaam . "'" .',
'. "'". $achternaam . "'" .',
'. "'". $straat . "'" .',
'. "'". $woonplaats . "'" .',
'. "'". $id . "'" .',
'. "'". $gebruikersnaam . "'" .',
'. "'". $wachtwoord . "'".")"))); {
        echo "Error preparing: (" .$conn->errno . ") " . $conn->error;
    }

    if (!($stmt->bind_param('ssssss',$voornaam, $achternaam, $straat, $woonplaats, $id, $gebruikersnaam, $wachtwoord))) {
        echo "Error in bind_param: (" .$conn->errno . ") " . $conn->error;
    }
    $stmt->execute();
    $stmt->close();
    header("Location: http://localhost/School/Opdracht1/Done/?ID=" . $id);
}

function getData($type, $id) {

    $servername = "localhost";
    $username = "root";
    $password = "password";
    $dbname = "Schooldb";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($id != null) {

        if (!($type == "Voornaam" OR
            $type == "Achternaam" OR
            $type == "Straat" OR
            $type == "Woonplaats" OR
            $type == "Gebruikersnaam" OR
            $type == "Wachtwoord")) return;

        $res = $conn->query("SELECT " . $type . " FROM Personen WHERE ID='" . $id . "'");
        if (mysqli_num_rows($res) > 0) {

            while ($row = mysqli_fetch_assoc($res)) {
                return $row[$type];
            }

        } else return "NO RESULTS FOUND";

    } else return "ID CANNOT BE NULL";



}

function isDataValid($gebruikersnaam, $wachtwoord) {

}

function calculateId() {
    $tokens = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $num_segments = 6;
    $key_string = '';
    for ($i = 0; $i < $num_segments; $i++) {
        $segment = '';
        for ($j = 0; $j < 1; $j++) {
            $segment .= $tokens[rand(0, 35)];
        }
        $key_string .= $segment;
        if ($i < ($num_segments - 1)) {
            $key_string;
        }
    }
    return $key_string;

}


?>