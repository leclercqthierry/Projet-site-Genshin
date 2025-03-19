<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php // Common style ?>
    <link rel="stylesheet" href="assets/css/style.css">
    <?php // Specific style ?>
    <link rel="stylesheet" href="assets/css/member.css">
    <title>Mon profil</title>
</head>
<body>
    <?php include_once "templates/header.php"; ?>
    <main>
        <h1>Mes teams</h1>
        <div class="gallery">
        <?php if (count($myTeams) === 0): ?>
            <p>Vous n'avez pas encore créé de team.</p>
        <?php else:
            for($i = 0; $i < count($myTeams); $i++): ?>
            <div class='team-container'>
                <a href='team.php?id=<?= $myTeams[$i]['team_id'] ?>'>
                    <h2><?= $names[$i] ?></h2>
                    <div class='team'>
                        <div class='card' data-rarity="<?= $characters[$i][0]['rarity'] ?>">
                            <div class='img-container'>
                                <img src="<?= $characters[$i][0]['image'] ?>" alt="<?= $characters[$i][0]['name'] ?>" class='rarity<?= $characters[$i][0]['rarity'] ?> character'>
                                <img src="<?= $elements[$i][0]['image'] ?>" class='img-element' alt="<?= $elements[$i][0]['name'] ?>">
                            </div>
                            <p><?= $characters[$i][0]['name'] ?></p>
                        </div>
                        <div class='card' data-rarity="<?= $characters[$i][1]['rarity'] ?>">
                            <div class='img-container'>
                                <img src="<?= $characters[$i][1]['image'] ?>" alt="<?= $characters[$i][1]['name'] ?>" class='rarity<?= $characters[$i][1]['rarity'] ?> character'>
                                <img src="<?= $elements[$i][1]['image'] ?>" class='img-element' alt="<?= $elements[$i][1]['name'] ?>">
                            </div>
                            <p><?= $characters[$i][1]['name'] ?></p>
                        </div>
                        <div class='card' data-rarity="<?= $characters[$i][2]['rarity'] ?>">
                            <div class='img-container'>
                                <img src="<?= $characters[$i][2]['image'] ?>" alt="<?= $characters[$i][2]['name'] ?>" class='rarity<?= $characters[$i][2]['rarity'] ?> character'>
                                <img src="<?= $elements[$i][2]['image'] ?>" class='img-element' alt="<?= $elements[$i][2]['name'] ?>">
                            </div>
                            <p><?= $characters[$i][2]['name'] ?></p>
                        </div>
                        <div class='card' data-rarity="<?= $characters[$i][3]['rarity'] ?>">
                            <div class='img-container'>
                                <img src="<?= $characters[$i][3]['image'] ?>" alt="<?= $characters[$i][3]['name'] ?>" class='rarity<?= $characters[$i][3]['rarity'] ?> character'>
                                <img src="<?= $elements[$i][3]['image'] ?>" class='img-element' alt="<?= $elements[$i][3]['name'] ?>">
                            </div>
                            <p><?= $characters[$i][3]['name'] ?></p>
                        </div>
                    </div>
                </a>
                <div class="btn-container1">
                    <form action="member" method="post">
                        <button type="submit" class="btn">Editer
                            <input type="hidden" name="edit-team" value="<?= $myTeams[$i]['team_id'] ?>">
                        </button>
                    </form>
                    <form action="member" method="post">
                        <button type="submit" class="btn">Supprimer
                            <input type="hidden" name="delete-team" value="<?= $myTeams[$i]['team_id'] ?>">
                        </button>
                    </form>
                </div>
            </div>
                <?php endfor; ?>
        <?php endif; ?>
        </div>
        <div class="btn-container2">
            <a href="add-build" class="btn">Créer un nouveau build</a>
            <a href="add-team" class="btn">Créer une nouvelle team</a>
            <button class="btn" disabled>Supprimer mon compte</button>
        </div>
    </main>
    <?php include_once "templates/footer.php"; ?>
    <script src="assets/js/member.js"></script>
</body>
</html>