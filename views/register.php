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
    <title>S'inscrire</title>
</head>
<body>
    <?php include_once "templates/header.php";?>
    <main>
        <h1>S'inscrire</h1>
        <form action="register" method="post">
            <div class="form-group">
                <label for="nickname">Pseudo</label>
                <input type="text" id="nickname" name="nickname" placeholder="user887">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="ex: user887@gmail.com">
            </div>
            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" placeholder="********">
            </div>
            <div class="form-group">
                <label for="confirm-password">Confirmez votre mot de passe</label>
                <input type="password" id="confirm-password" name="confirm-password" placeholder="********">
            </div>
            <div class="btn-container">
            <button type="submit" class="btn">Valider</button>
            </div>
        </form>
    </main>
    <?php include_once "templates/footer.php";?>
    <script src="assets/js/validate_register.js"></script>
</body>
</html>