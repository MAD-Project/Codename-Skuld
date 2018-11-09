<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

<form id="login" name="flogin" method="post">

    <label for="emailLogin">Email</label>
    <input type="email" id="emailLogin" name="emailLogin" required /><br><br>
    <label for="password">Password</label>
    <input type="password" id="passwordLogin" name="passwordLogin" required /><br><br>

    <input type="submit" value="Login" />

</form>

    <a href="paginas/paginaRegistro.php"><p>Crear una cuenta</p></a>

<?php include 'paginas/login.php' ?> <!-- login -->

</body>
</html>