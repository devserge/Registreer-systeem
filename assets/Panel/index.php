<html>
<head>
    <title>Home || Panel</title>
</head>
<body>
<h1><?php echo calculateTime(); ?>, <?php echo getName($_GET['user']);?>!</h1>

<p><br>Klik hier om je account gegevens te veranderen.</p>
<button type="button" id="myBtn" onClick="http://localhost/School/Opdracht1/assets/Panel/change.php?user=<?php echo $_GET['user'];?>">Gegevens veranderen.</button>

<p><br>Klik hier om je account te verwijderen.</p>
<button type="button" id="delete" onClick="http://localhost/School/Opdracht1/assets/Panel/delete.php?user=<?php echo $_GET['user'];?>">Account verwijderen.</button>

<p><br>Klik hier om uit te loggen.</p>
<button type="button" id="logout" onClick="http://localhost/School/Opdracht1/index.php">Uitloggen</button>
</body>
<script>
    var btn = document.getElementById('myBtn');
    btn.addEventListener('click', function() {
        document.location.href = 'http://localhost/School/Opdracht1/assets/Panel/change.php?user=<?php echo $_GET['user'];?>';
    });

    var btn2 = document.getElementById('delete');
    btn2.addEventListener('click', function() {
        document.location.href = 'http://localhost/School/Opdracht1/assets/php/delete.php?user=<?php echo $_GET['user'];?>';
    });

    var btn3 = document.getElementById('logout');
    btn3.addEventListener('click', function() {
        document.location.href = 'http://localhost/School/Opdracht1/index.php';
    });

</script>
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