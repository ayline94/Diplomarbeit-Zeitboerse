<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Zeitbörse Gemeinschaft Rheintal</title>
    <link rel="stylesheet" type="text/css" href="css/foundation.min.css">
    <link rel="stylesheet" type="text/css" href="css/app.css">
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script src="mitglieder.js"></script>

</head>

<body>

<div class="row">

    <div class="column small-12">
        <h2>Login</h2>



            <div id="box">
                <br />
             <form method="post">

                       <label for="email">Email</label>
                       <input type="text" name="email" id="email" />

                       <label for="passwort">Passwort</label>
                       <input type="password" name="passwort" id="passwort" />


                       <input type="button" name="login" id="login" class="success button" value="Anmelden" />

                 <div id="error" class="alert callout">
                     <p>Anmeldedaten sind falsch.</p>
                 </div>

             </form>
                <br />
            </div>

    </div>

    <div class="column small-12">
        <a href="registrieren.php"><h2>Registrieren</h2></div>
    </div>

<script>
    $(document).ready(function(){

    });
</script>

<?php include('footer.php'); ?>



