<html>
<body>
<h1><?php echo calculateTime(); ?>, <?php echo getName($_GET['user']);?>!</h1>
</body>
</html>

<?php


function calculateTime() {
    $tijd = date('G');

    if ($tijd <= 6){
        return 'Goedenacht';
    }elseif ($tijd > 6 && $tijd <= 12){
        return 'Goedemorgen';
    }elseif ($tijd > 12 && $tijd <= 18){
        return 'Goedemiddag';
    }elseif ($tijd > 18 && $tijd <= 23){
        return 'Goedeavond';
    }else{
        return 'Welkom';
    }

}

function getName($gebruikersnaam) {
    $servername = "localhost";
    $username = "root";
    $password = "password";
    $dbname = "Schooldb";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($gebruikersnaam != null) {
        $res = $conn->query("SELECT * FROM Personen WHERE gebruikersnaam='" . $gebruikersnaam . "'");
        if (mysqli_num_rows($res) > 0) {

            while ($row = mysqli_fetch_assoc($res)) {
                return $row["Voornaam"];
            }

        } else return "NO RESULTS FOUND";
    } else return "ID CANNOT BE NULL";
}

?>