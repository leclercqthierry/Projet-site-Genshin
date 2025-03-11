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
            <!-- <div class="character">
                <div class="cards-container">
                    <div class="card">
                        <img src="assets/img/gallery/Characters/Emilie.webp" alt="Emilie" class="rarity5">
                        <img src="assets/img/icons/Dendro.png" alt="Dendro">
                        <p>Emilie</p>
                    </div>
                    <div class="card">
                        <img src="assets/img/gallery/Weapons/elegie_de_lumidouce.webp" alt="élégie de lumidouce" class="rarity5">
                        <p>Elégie de lumidouce</p>
                    </div>
                    <div class="card">
                        <img src="assets/img/gallery/Artefacts_set/reverie_incomplete.webp" alt="rêverie incomplète" class="rarity5">
                        <p>Rêverie incomplète</p>
                    </div>
                </div>
            </div>
            <div class="character">
                <div class="cards-container">
                    <div class="card">
                        <img src="assets/img/gallery/Characters/Xiangling.webp" alt="Xiangling" class="rarity4">
                        <img src="assets/img/icons/Pyro.png" alt="Pyro">
                        <p>Xiangling</p>
                    </div>
                    <div class="card">
                        <img src="assets/img/gallery/Weapons/baton_des_sables_ecarlates.webp" alt="bâton des sables écarlates" class="rarity5">
                        <p>Bâton des sables écarlates</p>
                    </div>
                    <div class="card">
                        <img src="assets/img/gallery/Artefacts_set/embleme_du_destin_brise.webp" alt="emblème du destin brisé" class="rarity5">
                        <p>Emblème du destin brisé</p>
                    </div>
                </div>
            </div>
            <div class="character">
                <div class="cards-container">
                    <div class="card">
                        <img src="assets/img/gallery/Characters/Bennett.webp" alt="Bennett" class="rarity4">
                        <img src="assets/img/icons/Pyro.png" alt="Pyro">
                        <p>Bennett</p>
                    </div>
                    <div class="card">
                        <img src="assets/img/gallery/Weapons/reflet_de_tranche-brume.webp" alt="reflet de tranche-brume" class="rarity5">
                        <p>Reflet de tranche-brume</p>
                    </div>
                    <div class="card">
                        <img src="assets/img/gallery/Artefacts_set/sorciere_des_flammes_ardentes.webp" alt="sorcière des flammes ardentes" class="rarity5">
                        <p>Sorcières des flammes ardentes</p>
                    </div>
                </div>
            </div> -->
        </div>
        <button>Voter</button>
        <form action="#" method="post" class="vote">
            <label for="rating">Attribuez une note entre 0 et 10 à cette team:</label>
            <input type="number" step="1" min="0" max="10" id="rating" name="rating">
            <input type="submit" value="Valider">
        </form>
    </main>
    <?php include "templates/footer.php"; ?>
    <script src="assets/js/team.js"></script>
</body>
</html>