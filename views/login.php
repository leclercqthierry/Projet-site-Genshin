<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php // Common style ?>
    <link rel="stylesheet" href="assets/css/style.css">
    <?php // Specific style ?>
    <link rel="stylesheet" href="assets/css/login.css">
    <title>Se connecter</title>
</head>
<body>
    <?php include_once "templates/header.php"; ?>
    <main>
        <form action="login" method="post">
            <div class="form-group">
                <label for="nickname">Pseudo</label>
                <input type="text" id="nickname" name="nickname" placeholder="user887" minlength="4" required>
            </div>
            <div class="form-group">
                <label for="password">mot de passe</label>
                <input type="password" id="password" name="password" placeholder="********" required>
            </div>
            <a href="#">mot de passe oublié</a>
            <div class="button-container">
                <a href="register" class="btn">S'inscrire</a>
                <button type="submit" class="btn">Valider</button>
            </div>
        </form>
    </main>
    <?php include_once "templates/footer.php";?>
    <script src="assets/js/validate_login.js"></script>
</body>
</html>