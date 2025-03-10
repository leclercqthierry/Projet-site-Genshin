<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Common style-->
    <link rel="stylesheet" href="assets/css/style.css">
    <!--team style-->
    <link rel="stylesheet" href="assets/css/team.css">
    <title>Meilleure équipe pour Emilie</title>
</head>
<body>
    <?php include "template/header.php"; ?>
    <main>
        <h1>Meilleure équipe pour Emilie</h1>
        <div class="container">
            <div class="character">
                <div class="cards-container">
                    <div class="card">
                        <img src="assets/img/gallery/Characters/Alhaitham.webp" alt="Alhaitham" class="rarity5">
                        <img src="assets/img/icons/Dendro.png" alt="Dendro">
                        <p>Alhaitham</p>
                    </div>
                    <div class="card">
                        <img src="assets/img/gallery/Weapons/lumiere_d_incision_foliaire.webp" alt="lumiere d'incision foliaire" class="rarity5">
                        <p>lumière d'incision foliaire</p>
                    </div>
                    <div class="card">
                        <img src="assets/img/gallery/Artefacts_set/reve_dore.webp" alt="rêve doré" class="rarity5">
                        <p>Rêve doré</p>
                    </div>
                </div>
                <p><u>Sablier</u>: Maîtrise élémentaire / ATQ%<br><br>
                <u>Gobelet</u>: Bonus de DGT Dendro<br><br>
                <u>Coiffe</u>: Taux CRIT / DGT CRIT</p>
            </div>
            <div class="character">
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
                <p><u>Sablier</u>: ATQ%<br><br>
                <u>Gobelet</u>: Bonus de DGT Dendro<br><br>
                <u>Coiffe</u>: Taux CRIT / DGT CRIT</p>
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
                <p><u>Sablier</u>: Recharge d'énergie / ATQ% /Maîtrise élémentaire<br><br>
                <u>Gobelet</u>: Bonus de DGT Pyro<br><br>
                <u>Coiffe</u>: Taux CRIT / DGT CRIT</p>
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
                <p><u>Sablier</u>: Maîtrise élémentaire / ATQ%<br><br>
                <u>Gobelet</u>: Bonus de DGT Pyro<br><br>
                <u>Coiffe</u>: Taux CRIT / DGT CRIT</p>
            </div>
        </div>
        <button>Voter</button>
        <form action="#" method="post" class="vote">
            <label for="rating">Attribuez une note entre 0 et 10 à cette team:</label>
            <input type="number" step="1" min="0" max="10" id="rating" name="rating">
            <input type="submit" value="Valider">
        </form>
    </main>
    <?php include "template/footer.php"; ?>
    <script src="assets/js/team.js"></script>
</body>
</html>