<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php // Common style ?>
    <link rel="stylesheet" href="assets/css/style.css">
    <?php // team style ?>
    <link rel="stylesheet" href="assets/css/team.css">
    <title><?= $team['name'] ?></title>
</head>
<body>
    <?php include "templates/header.php"; ?>
    <main>
        <h1><?= $team['name'] ?></h1>
        <div class="container">
            <?php for($i = 0; $i < 4; $i++): ?>
            <div class="character">
                <div class="cards-container">
                    <div class="card">
                        <img src="<?= $characters[$i]['image'] ?>" alt="<?= $characters[$i]['name'] ?>" class="rarity<?= $characters[$i]['rarity'] ?>">
                        <img src="<?= $elements[$i]['image'] ?>" alt="<?= $elements[$i]['name'] ?>">
                        <p><?= $characters[$i]['name'] ?></p>
                    </div>
                    <div class="card">
                        <img src="<?= $weapons[$i]['image'] ?>" alt="<?= $weapons[$i]['name'] ?>" class="rarity<?= $weapons[$i]['rarity'] ?>">
                        <p><?= $weapons[$i]['name'] ?></p>
                    </div>
                    <div class="card">
                        <img src="<?= $artifacts[$i]['image'] ?>" alt="<?= $artifacts[$i]['name'] ?>" class="rarity<?= $artifacts[$i]['rarity'] ?>">
                        <p><?= $artifacts[$i]['name'] ?></p>
                    </div>
                </div>
            </div>
            <?php endfor;?>
        </div>
        <button disabled>Voter</button>
        <form action="#" method="post" class="vote">
            <label for="rating">Attribuez une note entre 0 et 10 à cette team:</label>
            <input type="number" step="1" min="0" max="10" id="rating" name="rating">
            <input type="submit" value="Valider">
        </form>
    </main>
    <?php include "templates/footer.php"; ?>
    <!-- <script src="assets/js/team.js"></script> -->
</body>
</html>