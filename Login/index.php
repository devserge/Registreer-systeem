<html>
<head>
    <title>Inloggen</title>

    <style src="assets/css/main.css"></style>
</head>
<body>
<form action="http://localhost/School/Opdracht1/assets/php/login.php" method="post">
    Gebruikersnaam:<br>
    <input type="text" name="gebruikersnaam"><br>
    Wachtwoord:<br>
    <input type="password" name="wachtwoord"><br>
    <button type="button" id="myBtn" onClick="http://localhost/School/Opdracht1/Login/forgot.php">Wachtwoord vergeten?</button><br><br>
    <input type="submit" value="Submit">
</form>
</body>
<script>
    var btn = document.getElementById('myBtn');
    btn.addEventListener('click', function() {
        document.location.href = 'http://localhost/School/Opdracht1/Login/forgot.php';
    });
</script>
</html>