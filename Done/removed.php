<html xmlns:http="http://www.w3.org/1999/xhtml">
<head>
    <title>Verwijdert</title>

    <style src="assets/css/main.css"></style>
</head>
<body>
<h2>Uw account is succesvol verwijderd!</h2>

<p><br>Klik hier om terug te gaan naar de home pagina.</p>
<button type="button" id="home" onClick="document.location.href="http://localhost/School/Opdracht1/index.php";" >Home</button>
</body>
<script>
    var btn = document.getElementById('home');

    btn.addEventListener('click', function() {
        document.location.href = 'http://localhost/School/Opdracht1/index.php';
    });
</script>
</html>