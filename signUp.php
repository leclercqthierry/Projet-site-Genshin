<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Common style-->
    <link rel="stylesheet" href="assets/css/style.css">
    <!--signUp style-->
    <link rel="stylesheet" href="assets/css/signUp.css">
    <title>S'inscrire</title>
</head>
<body>
    <?php include "header.php";?>
    <main>
        <form action="#" method="post">
            <div class="form-group">
                <label for="pseudo">Pseudo</label>
                <input type="text" id="pseudo" name="pseudo" placeholder="user887" minlength="4" pattern="[A-Za-z0-9]{4,}" title="Ne doit contenir ni espace, ni caractères spéciaux" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="ex: user887@gmail.com" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Ceci n'est pas une adresse email valide" required>
            </div>
            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" placeholder="********" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                title="Le mot de passe doit contenir au moins un nombre, une lettre majuscule et minuscule et comporter au moins 8 caractères" required>
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
    <script src="assets/js/signUp.js"></script>
</body>
</html>