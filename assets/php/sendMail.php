<?php

if ($_POST['gebruikersnaam'] == null OR $_POST['email'] == null) return;

$username = $_POST['gebruikersnaam'];
$email = $_POST['email'];

$naam = getData("Voornaam", $username);
$wachtwoord = getData("Wachtwoord", $username);

sendMail($wachtwoord, $email, $naam);

function sendMail($wachtwoord, $email, $naam) {
    $to = $email;
    $subject = "Wachtwoord vergeten?!";

    $text = str_replace("%licentie%", $wachtwoord, str_replace("%naam%", $naam, '<html>
  <body style=" font-family: "Arial", "Arial", sans-serif; color: #000000; font-size: 20px;">
  <div align="center">
  <h2 style="font-size: 24px; color: #818181;"><strong>Beste %naam%,</strong></h2>
  <br>
  <p style="font-size: 20px; color: #999999;">U hebt op onze website aangegeven dat u uw wachtwoord kwijt bent!<br>
  Dit is natuurlijk erg vervelend en daarom hebben wij u deze mail gestuurd. <br>
  U kunt met een app op uw telefoon deze qr-code scannen en dan zal u uw wachtwoord kunnen bekijken.</p>

  <br>

  <p style="font-size: 20px; color: #818181;"><strong>Wachtwoord:</strong></p>
  <img src="https://chart.googleapis.com/chart?cht=qr&chs=500x500&chl=%license%&choe=UTF-8">

  <br>
   
   
  </div>
  </body></html>'));
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
    $headers .= 'From: MLGEditz <noreply@mlgeditz.nl>' . "\r\n";
    mail($to,$subject,$text,$headers);

    echo "Je wachtwoord is verstuurd naar: " . $email . ".";
}

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

    } else return "ID CANNOT BE NULL";



}



?>
