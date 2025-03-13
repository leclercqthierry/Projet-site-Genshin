<!DOCTYPE html>
<html lang='fr'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <?php // Common style ?>
    <link rel='stylesheet' href='assets/css/style.css'>
    <?php // builds style ?>
    <link rel='stylesheet' href='assets/css/builds.css'>
    <title>Builds pour <?= $chrName ?></title>
</head>
<body>
    <?php include "templates/header.php"; ?>
    <main>
        <h1>Builds pour <?= $charName ?></h1>
        <div class="info">
            <i>Un Build Free-To-Play est un build qui peut s'obtenir gratuitement ou avec très peu de primogemmes (les primo gagnées en jeu suffisent).</i>
            <i>Un Build Premium est un build qui peut s'obtenir en payant avec de l'argent réel ou au prix de très longues économies en primogemmes.</i>
            <i>Un build Hybride est un build qui peut s'obtenir en payant ou au prix d'économies de primogemmes modérées en jeu.</i>
        </div>
        <div class="container">
            <div class="builds">
                <h2>Ses builds premium</h2>
                <ul>
                <?php if(!isset($premiumBuilds)): ?>
                    <p>Aucun build premium n'a encore été créé pour <?= $charName ?></p>
                <?php else:
                    for($i = 0; $i < count($premiumBuilds); $i++): ?>
                    <li>
                        <div class="card">
                            <img src="<?= $premiumWeapons[$i]['image'] ?>" alt="<?= $premiumWeapons[$i]['name'] ?>" class='rarity<?= $premiumWeapons[$i]['rarity'] ?> weapon'>
                            <p><?= $premiumWeapons[$i]['name'] ?></p>
                        </div>
                        <div class="card">
                            <img src="<?= $premiumArtifacts[$i]['image'] ?>" alt="<?= $premiumArtifacts[$i]['name'] ?>" class='rarity<?= $premiumArtifacts[$i]['rarity'] ?> weapon'>
                            <p><?= $premiumArtifacts[$i]['name'] ?></p>
                        </div>
                    </li>
                    <?php endfor; ?>
                <?php endif;?>
                </ul>
            </div>
            <div class="builds">
            <h2>Ses builds hybrides</h2>
                <ul>
                <?php if(!isset($hybridBuilds)): ?>
                    <p>Aucun build hybride n'a encore été créé pour <?= $charName ?></p>
                <?php else:
                    for($i = 0; $i < count($hybridBuilds); $i++): ?>
                    <li>
                        <div class="card">
                            <img src="<?= $hybridWeapons[$i]['image'] ?>" alt="<?= $hybridWeapons[$i]['name'] ?>" class='rarity<?= $hybridWeapons[$i]['rarity'] ?> weapon'>
                            <p><?= $hybridWeapons[$i]['name'] ?></p>
                        </div>
                        <div class="card">
                            <img src="<?= $hybridArtifacts[$i]['image'] ?>" alt="<?= $hybridArtifacts[$i]['name'] ?>" class='rarity<?= $hybridArtifacts[$i]['rarity'] ?> weapon'>
                            <p><?= $hybridArtifacts[$i]['name'] ?></p>
                        </div>
                    </li>
                    <?php endfor;?>
                <?php endif;?>
                </ul>
            </div>
            <div class="builds">
            <h2>Ses builds Free-To-Play</h2>
                <ul>
                <?php if(!isset($f2pBuilds)): ?>
                    <p>Aucun build Free-To-Play n'a encore été créé pour <?= $charName ?></p>
                <?php else:
                    for($i = 0; $i < count($f2pBuilds); $i++): ?>
                    <li>
                        <div class="card">
                            <img src="<?= $f2pWeapons[$i]['image'] ?>" alt="<?= $f2pWeapons[$i]['name'] ?>" class='rarity<?= $f2pWeapons[$i]['rarity'] ?> weapon'>
                            <p><?= $f2pWeapons[$i]['name'] ?></p>
                        </div>
                        <div class="card">
                            <img src="<?= $f2pArtifacts[$i]['image'] ?>" alt="<?= $f2pArtifacts[$i]['name'] ?>" class='rarity<?= $f2pArtifacts[$i]['rarity'] ?> weapon'>
                            <p><?= $f2pArtifacts[$i]['name'] ?></p>
                        </div>
                    </li>
                    <?php endfor;?>
                <?php endif;?>
                </ul>
            </div>
        </div>
    </main>
    <?php include "templates/footer.php"; ?>
</body>
</html>