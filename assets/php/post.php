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

function getUUID($gebruikersnaam) {

    $servername = "localhost";
    $username = "root";
    $password = "password";
    $dbname = "Schooldb";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($gebruikersnaam != null) {
        $res = $conn->query("SELECT ID FROM Personen WHERE gebruikersnaam='" . $gebruikersnaam . "'");
        if (mysqli_num_rows($res) > 0) {

            while ($row = mysqli_fetch_assoc($res)) {
                return $row["ID"];
            }

        } else return "NO RESULTS FOUND";
    } else return "ID CANNOT BE NULL";



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

        if ($type == "Voornaam") {
            $res = $conn->query("SELECT Voornaam FROM Personen WHERE id='" . $id . "'");
            if (mysqli_num_rows($res) > 0) {

                while ($row = mysqli_fetch_assoc($res)) {
                    return $row["Voornaam"];
                }

            } else return "NO RESULTS FOUND";
        }

        if ($type == "Achternaam") {
            $res = $conn->query("SELECT Achternaam FROM Personen WHERE id='" . $id . "'");
            if (mysqli_num_rows($res) > 0) {

                while ($row = mysqli_fetch_assoc($res)) {
                    return $row["Achternaam"];
                }

            } else return "NO RESULTS FOUND";
        }

        if ($type == "Straat") {
            $res = $conn->query("SELECT Straat FROM Personen WHERE id='" . $id . "'");
            if (mysqli_num_rows($res) > 0) {

                while ($row = mysqli_fetch_assoc($res)) {
                    return $row["Straat"];
                }

            } else return "NO RESULTS FOUND";
        }

        if ($type == "Woonplaats") {
            $res = $conn->query("SELECT Woonplaats FROM Personen WHERE id='" . $id . "'");
            if (mysqli_num_rows($res) > 0) {

                while ($row = mysqli_fetch_assoc($res)) {
                    return $row["Woonplaats"];
                }

            } else return "NO RESULTS FOUND";
        }

        if ($type == "Gebruikersnaam") {
            $res = $conn->query("SELECT Gebruikersnaam FROM Personen WHERE id='" . $id . "'");
            if (mysqli_num_rows($res) > 0) {

                while ($row = mysqli_fetch_assoc($res)) {
                    return $row["Gebruikersnaam"];
                }

            } else return "NO RESULTS FOUND";
        }

        if ($type == "Wachtwoord") {
            $res = $conn->query("SELECT Wachtwoord FROM Personen WHERE id='" . $id . "'");
            if (mysqli_num_rows($res) > 0) {

                while ($row = mysqli_fetch_assoc($res)) {
                    return $row["Wachtwoord"];
                }

            } else return "NO RESULTS FOUND";
        }

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