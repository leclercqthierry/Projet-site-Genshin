<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php // Common style ?>
    <link rel="stylesheet" href="assets/css/style.css">
    <?php // add-team style ?>
    <link rel="stylesheet" href="assets/css/add-team.css">
    <title>Panneau Admin - Ajout d'une team</title>
</head>
<body>
    <?php include "templates/header.php"; ?>
    <main>
        <h1>Ajout d'une team</h1>
        <div class="container">
            <form action="#" method="post" name="add-team-form">
                <div class="form-container">
                <?php
                for ($i = 1 ; $i < 5; $i++){
                    echo buildField($i);
                }
                ?>
                </div>
                <input type="submit" value="Valider" class="btn">
            </form>
        </div>
    </main>
    <?php include "templates/footer.php"; ?>
    <script src="assets/js/add-team.js"></script>
</body>
</html>