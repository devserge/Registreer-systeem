<html>
<head>
    <title>Registreren</title>

    <style src="assets/css/main.css"></style>
</head>
<body>
<h3>U bent succesvol ingeschreven!</h3>
<p>Voornaam: <?php echo getData("Voornaam", $_GET['ID'])?></p>
<p>Achternaam: <?php echo getData("Achternaam", $_GET['ID'])?></p>
<p>Straat: <?php echo getData("Straat", $_GET['ID'])?></p>
<p>Woonplaats: <?php echo getData("Woonplaats", $_GET['ID'])?></p>
<p>Gebruikersnaam: <?php echo getData("Gebruikersnaam", $_GET['ID'])?></p>
<p>Wachtwoord: <?php echo getData("Wachtwoord", $_GET['ID'])?></p>
</body>
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

        if ($type == "Voornaam") {
            $res = $conn->query("SELECT * FROM Personen WHERE ID='" . $id . "'");
            if (mysqli_num_rows($res) > 0) {

                while ($row = mysqli_fetch_assoc($res)) {
                    return $row["Voornaam"];
                }

            } else return "NO RESULTS FOUND";
        }

        if ($type == "Achternaam") {
            $res = $conn->query("SELECT * FROM Personen WHERE ID='" . $id . "'");
            if (mysqli_num_rows($res) > 0) {

                while ($row = mysqli_fetch_assoc($res)) {
                    return $row["Achternaam"];
                }

            } else return "NO RESULTS FOUND";
        }

        if ($type == "Straat") {
            $res = $conn->query("SELECT * FROM Personen WHERE ID='" . $id . "'");
            if (mysqli_num_rows($res) > 0) {

                while ($row = mysqli_fetch_assoc($res)) {
                    return $row["Straat"];
                }

            } else return "NO RESULTS FOUND";
        }

        if ($type == "Woonplaats") {
            $res = $conn->query("SELECT * FROM Personen WHERE ID='" . $id . "'");
            if (mysqli_num_rows($res) > 0) {

                while ($row = mysqli_fetch_assoc($res)) {
                    return $row["Woonplaats"];
                }

            } else return "NO RESULTS FOUND";
        }

        if ($type == "Gebruikersnaam") {
            $res = $conn->query("SELECT * FROM Personen WHERE ID='" . $id . "'");
            if (mysqli_num_rows($res) > 0) {

                while ($row = mysqli_fetch_assoc($res)) {
                    return $row["Gebruikersnaam"];
                }

            } else return "NO RESULTS FOUND";
        }

        if ($type == "Wachtwoord") {
            $res = $conn->query("SELECT * FROM Personen WHERE ID='" . $id . "'");
            if (mysqli_num_rows($res) > 0) {

                while ($row = mysqli_fetch_assoc($res)) {
                    return $row["Wachtwoord"];
                }

            } else return "NO RESULTS FOUND";
        }

    } else return "ID CANNOT BE NULL";



}

?>