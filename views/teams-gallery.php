<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php // Common style ?>
    <link rel="stylesheet" href="assets/css/style.css">
    <?php // teams gallery style ?>
    <link rel="stylesheet" href="assets/css/teams-gallery.css">
    <title>Gallerie de teams</title>
</head>
<body>
    <?php include "templates/header.php"; ?>
    <main>
        <h1>Gallerie de teams</h1>
        <div class="search">
            <input type="search" placeholder="Par personnage">
            <img src="assets/img/icons/chercher.png" class="search-icon" alt="chercher">
        </div>
        <div class="gallery">
            <?php for($i = 0; $i < count($teams); $i++): ?>
            <a href='team'>
                <div class='team-container'>
                    <h2><?= $names[$i] ?> de <?= $authors[$i] ?></h2>
                    <div class='team'>
                        <div class='card' data-rarity="<?= $characters[$i][0]['rarity'] ?>">
                            <div class='img-container'>
                                <img src="<?= $characters[$i][0]['image'] ?>" alt="<?= $characters[$i][0]['name'] ?>" class='rarity<?= $characters[$i][0]['rarity'] ?> character'>
                                <img src="<?= $elements[$i][0]['image'] ?>" class='img-element' alt="<?= $element[$i][0]['name'] ?>">
                            </div>
                            <p><?= $characters[$i][0]['name'] ?></p>
                        </div>
                        <div class='card' data-rarity="<?= $characters[$i][1]['rarity'] ?>">
                            <div class='img-container'>
                                <img src="<?= $characters[$i][1]['image'] ?>" alt="<?= $characters[$i][1]['name'] ?>" class='rarity<?= $characters[$i][1]['rarity'] ?> character'>
                                <img src="<?= $elements[$i][1]['image'] ?>" class='img-element' alt="<?= $element[$i][1]['name'] ?>">
                            </div>
                            <p><?= $characters[$i][1]['name'] ?></p>
                        </div>
                        <div class='card' data-rarity="<?= $characters[$i][2]['rarity'] ?>">
                            <div class='img-container'>
                                <img src="<?= $characters[$i][2]['image'] ?>" alt="<?= $characters[$i][2]['name'] ?>" class='rarity<?= $characters[$i][2]['rarity'] ?> character'>
                                <img src="<?= $elements[$i][2]['image'] ?>" class='img-element' alt="<?= $element[$i][2]['name'] ?>">
                            </div>
                            <p><?= $characters[$i][2]['name'] ?></p>
                        </div>
                        <div class='card' data-rarity="<?= $characters[$i][3]['rarity'] ?>">
                            <div class='img-container'>
                                <img src="<?= $characters[$i][3]['image'] ?>" alt="<?= $characters[$i][3]['name'] ?>" class='rarity<?= $characters[$i][3]['rarity'] ?> character'>
                                <img src="<?= $elements[$i][3]['image'] ?>" class='img-element' alt="<?= $element[$i][3]['name'] ?>">
                            </div>
                            <p><?= $characters[$i][3]['name'] ?></p>
                        </div>
                    </div>
                </div>
            </a>
            <?php endfor; ?>
        </div>
    </main>
    <?php include "templates/footer.php"; ?>
    <script src="assets/js/teams-gallery.js"></script>
</body>
</html>