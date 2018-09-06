<html xmlns:http="http://www.w3.org/1999/xhtml">
<head>
    <title>Homepagina</title>
</head>
<body>
<h1>Welkom!</h1>

<p><br>Klik hier om in te loggen.</p>
<button type="button" id="login" onClick="document.location.href="http://localhost/School/Opdracht1/Login/index.php";" >Inloggen</button>

<p><br>Klik hier om te registreren.</p>
<button type="button" id="register" onClick="document.location.href="http://localhost/School/Opdracht1/Register/index.php";" >Registreren</button>
</body>
<script>
    var btn = document.getElementById('login');

    btn.addEventListener('click', function() {
        document.location.href = 'http://localhost/School/Opdracht1/Login/index.php';
    });

    var btn2 = document.getElementById('register');
    btn2.addEventListener('click', function() {
        document.location.href = 'http://localhost/School/Opdracht1/Register/index.php';
    });

</script>
</html>