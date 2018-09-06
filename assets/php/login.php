<?php

$gebruikersnaam = $_POST['gebruikersnaam'];
$wachtwoord = $_POST['wachtwoord'];

if (isDataValid($gebruikersnaam, $wachtwoord)) {
    header("Location: http://localhost/School/Opdracht1/assets/Panel/?user=" . $gebruikersnaam);
} else header("Location: http://localhost/School/Opdracht1/Login");


function isDataValid($gebruikersnaam, $wachtwoord) {

        $servername = 'localhost';
        $username   = 'root';
        $password   = 'password';
        $dbname     = 'Schooldb';

        $link = new mysqli($servername, $username, $password, $dbname);
        $res = $link->query("SELECT * FROM `Personen` WHERE Gebruikersnaam='".$gebruikersnaam."'");
        if (mysqli_num_rows($res) > 0) {

            while($row = mysqli_fetch_assoc($res)) {
                if ($row["Wachtwoord"] == $wachtwoord) {
                    return true;
                } else {return false;}
            }

        } else {return false;}



}



?>