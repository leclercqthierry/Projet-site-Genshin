<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Common style-->
    <link rel="stylesheet" href="assets/css/style.css">
    <!--register style-->
    <link rel="stylesheet" href="assets/css/register.css">
    <title>S'inscrire</title>
</head>
<body>
    <?php include "header.php";?>
    <main>
        <form action="register" method="post">
            <div class="form-group">
                <label for="nickname">Pseudo</label>
                <input type="text" id="nickname" name="nickname" placeholder="user887" minlength="4" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="ex: user887@gmail.com" required>
            </div>
            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" placeholder="********" required>
            </div>
            <div class="form-group">
                <label for="confirm-password">Confirmez votre mot de passe</label>
                <input type="password" id="confirm-password" name="confirm-password" placeholder="********" required>
            </div>
            <div class="btn-container">
            <button type="submit" class="btn">Valider</button>
            </div>
        </form>
    </main>
    <?php include "footer.php";?>
    <script src="assets/js/validate_register.js"></script>
</body>
</html>