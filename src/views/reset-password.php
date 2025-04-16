<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php // Common style ?>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/login.css">
    <?php // Specific style ?>
    <link rel="stylesheet" href="assets/css/register.css">
    <meta name="description" content="Formulaire de changement de mot de passe">
    <title>Changer son mot de passe</title>
</head>
<body>
    <?php include_once "templates/header.php";?>
    <main>
        <h1>Changer son mot de passe</h1>
        <form action="reset-password" method="post">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="ex: user887@gmail.com" aria-required="true">
            </div>
            <div class="form-group">
                <label for="password">Nouveau mot de passe</label>
                <input type="password" id="password" name="password" placeholder="********" aria-required="true">
            </div>
            <div class="form-group">
                <label for="confirm-password">Confirmez votre nouveau mot de passe</label>
                <input type="password" id="confirm-password" name="confirm-password" placeholder="********" aria-required="true">
            </div>
            <div class="btn-container">
            <button type="submit" class="btn">Valider</button>
            </div>
        </form>
    </main>
    <?php include_once "templates/footer.php";?>
    <script src="assets/js/validate.js"></script>
    <script src="assets/js/validate_reset-password.js"></script>
</body>
</html>