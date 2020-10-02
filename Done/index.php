<html xmlns:http="http://www.w3.org/1999/xhtml">
<head>
    <title>Registreren</title>

    <style src="assets/css/main.css"></style>
</head>
<body>
<h3>U bent succesvol ingeschreven!</h3>
<p>Voornaam: <?php= getData("Voornaam", $_GET['ID'])?></p>
<p>Achternaam: <?php= getData("Achternaam", $_GET['ID'])?></p>
<p>Straat: <?php= getData("Straat", $_GET['ID'])?></p>
<p>Woonplaats: <?php getData("Woonplaats", $_GET['ID'])?></p>
<p>Gebruikersnaam: <?php= getData("Gebruikersnaam", $_GET['ID'])?></p>
<p>Wachtwoord: <?php= getData("Wachtwoord", $_GET['ID'])?></p>
<br>
<p><br>Klik hier om in te loggen.</p>
<button type="button" id="myBtn" onClick="document.location.href="http://localhost/School/Opdracht1/Login/index.php";" >Inloggen</button>
</body>
<script>
    var btn = document.getElementById('myBtn');
    btn.addEventListener('click', function() {
        document.location.href = 'http://localhost/School/Opdracht1/Login/index.php';
    });</script>
</html>

<?php

$id = $_GET['ID'];

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

?>
