<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Common style-->
    <link rel="stylesheet" href="assets/css/style.css">
    <!--character style-->
    <link rel="stylesheet" href="assets/css/character.css">
    <title>Amber</title>
</head>
<body>
    <?php include "header.php" ?>
    <main>
        <!--"Template de page" personnage illustré ici avec le personnage Amber -->
        <h1>Fiche Personnage</h1>
        <div class="container">
            <div class="img-description">
                <img src="assets/img/sheet/Characters/Card/amber.webp" alt="Amber" class="rarity4">
                <div class="description">
                    <p><b>Nom:</b> <span>Amber</span></p>
                    <p><b>Element:</b> <span>Pyro</span></p>
                    <p><b>Rareté:</b> <span>4</span></p>
                    <p><b>Type arme:</b> <span>Arc</span></p>
                    <p><b>Bonus Elévation:</b> <span>ATQ%</span></p>
                    <p><b>Jours de farm aptitudes:</b> <span>Lundi / Jeudi / Dimanche</span></p>
                </div>
            </div>
            <div class="sub-container">
                <h2>Coût de montée de niveaux</h2>
                <table>
                    <tr>
                        <th>Tranche</th>
                        <th><img src="assets/img/other/lecons_du_hero.webp" alt="leçon du héros" title="leçon du héros"></th>
                        <th><img src="assets/img/other/conseils_de_l_aventurier.webp" alt="conseils de l'aventurier" title="conseils de l'aventurier"></th>
                        <th><img src="assets/img/other/astuce_du_voyageur.webp" alt="astuce du voyageur" title="astuce du voyageur"></th>
                        <th><img src="assets/img/other/mora.webp" alt="moras" title="moras"></th>
                    </tr>
                    <tr>
                        <td>1-20</td>
                        <td>6</td>
                        <td></td>
                        <td></td>
                        <td>24 000</td>
                    </tr>
                    <tr>
                        <td>20-40</td>
                        <td>28</td>
                        <td>3</td>
                        <td>3</td>
                        <td>115 600</td>
                    </tr>
                    <tr>
                        <td>40-50</td>
                        <td>28</td>
                        <td>3</td>
                        <td>4</td>
                        <td>115 800</td>
                    </tr>
                    <tr>
                        <td>50-60</td>
                        <td>42</td>
                        <td>2</td>
                        <td>4</td>
                        <td>170 800</td>
                    </tr>
                    <tr>
                        <td>60-70</td>
                        <td>59</td>
                        <td>3</td>
                        <td></td>
                        <td>239 000</td>
                    </tr>
                    <tr>
                        <td>70-80</td>
                        <td>80</td>
                        <td>2</td>
                        <td>1</td>
                        <td>322 200</td>
                    </tr>
                    <tr>
                        <td>80-90</td>
                        <td>171</td>
                        <td></td>
                        <td>3</td>
                        <td>684 600</td>
                    </tr>
                </table>
            </div>
            <div class="sub-container">
                <h2>Coût d'élévation de personnage</h2>
                <table>
                    <tr>
                        <th>Seuil</th>
                        <th>Joyaux de personnage</th>
                        <th>Matériaux de boss</th>
                        <th>Ressource locale</th>
                        <th>Ressources de mobs</th>
                        <th><img src="assets/img/other/mora.webp" alt="moras" title="moras"></th>
                    </tr>
                    <tr>
                        <td>Niveau 20</td>
                        <td><img src="assets/img/char_jewel/eclat_d_agate_agnidus.webp" alt="Éclat d'agate agnidus" title="Éclat d'agate agnidus" class="rarity2">x1</td>
                        <td></td>
                        <td><img src="assets/img/local_material/herbe_a_lampe.webp" alt="Herbe à lampe" title="Herbe à lampe" class="rarity1">x3</td>
                        <td><img src="assets/img/mob_drop/pointe_de_fleche_robuste.webp" alt="Pointe de flèche robuste" title="Pointe de flèche robuste" class="rarity1">x3</td>
                        <td>20 000</td>
                    </tr>
                    <tr>
                        <td>Niveau 40</td>
                        <td><img src="assets/img/char_jewel/fragment_d_agate_agnidus.webp" alt="Fragment d'agate agnidus" title="Fragment d'agate agnidus" class="rarity3">x3</td>
                        <td><img src="assets/img/boss_drop/graine_de_feu.webp" alt="Graine de feu" title="Graine de feu" class="rarity4">x2</td>
                        <td><img src="assets/img/local_material/herbe_a_lampe.webp" alt="Herbe à lampe" title="Herbe à lampe" class="rarity1">x10</td>
                        <td><img src="assets/img/mob_drop/pointe_de_fleche_robuste.webp" alt="Pointe de flèche robuste" title="Pointe de flèche robuste" class="rarity1">x15</td>
                        <td>40 000</td>
                    </tr>
                    <tr>
                        <td>Niveau 50</td>
                        <td><img src="assets/img/char_jewel/fragment_d_agate_agnidus.webp" alt="Fragment d'agate agnidus" title="Fragment d'agate agnidus" class="rarity3">x6</td>
                        <td><img src="assets/img/boss_drop/graine_de_feu.webp" alt="Graine de feu" title="Graine de feu" class="rarity4">x4</td>
                        <td><img src="assets/img/local_material/herbe_a_lampe.webp" alt="Herbe à lampe" title="Herbe à lampe" class="rarity1">x20</td>
                        <td><img src="assets/img/mob_drop/pointe_de_fleche_aiguisee.webp" alt="Pointe de flèche aiguisée" title="Pointe de flèche aiguisée" class="rarity2">x12</td>
                        <td>60 000</td>
                    </tr>
                    <tr>
                        <td>Niveau 60</td>
                        <td><img src="assets/img/char_jewel/morceau_d_agate_agnidus.webp" alt="Morceau d'agate agnidus" title="Morceau d'agate agnidus" class="rarity4">x3</td>
                        <td><img src="assets/img/boss_drop/graine_de_feu.webp" alt="Graine de feu" title="Graine de feu" class="rarity4">x8</td>
                        <td><img src="assets/img/local_material/herbe_a_lampe.webp" alt="Herbe à lampe" title="Herbe à lampe" class="rarity1">x30</td>
                        <td><img src="assets/img/mob_drop/pointe_de_fleche_aiguisee.webp" alt="Pointe de flèche aiguisée" title="Pointe de flèche aiguisée" class="rarity2">x18</td>
                        <td>80 000</td>
                    </tr>
                    <tr>
                        <td>Niveau 70</td>
                        <td><img src="assets/img/char_jewel/morceau_d_agate_agnidus.webp" alt="Morceau d'agate agnidus" title="Morceau d'agate agnidus" class="rarity4">x6</td>
                        <td><img src="assets/img/boss_drop/graine_de_feu.webp" alt="Graine de feu" title="Graine de feu" class="rarity4">x12</td>
                        <td><img src="assets/img/local_material/herbe_a_lampe.webp" alt="Herbe à lampe" title="Herbe à lampe" class="rarity1">x45</td>
                        <td><img src="assets/img/mob_drop/pointe_de_fleche_usee.webp" alt="Pointe de flèche usée" title="Pointe de flèche usée" class="rarity3">x12</td>
                        <td>100 000</td>
                    </tr>
                    <tr>
                        <td>Niveau 80</td>
                        <td><img src="assets/img/char_jewel/pierre_d_agate_agnidus.webp" alt="Pierre d'agate agnidus" title="Pierre d'agate agnidus" class="rarity5">x6</td>
                        <td><img src="assets/img/boss_drop/graine_de_feu.webp" alt="Graine de feu" title="Graine de feu" class="rarity4">x20</td>
                        <td><img src="assets/img/local_material/herbe_a_lampe.webp" alt="Herbe à lampe" title="Herbe à lampe" class="rarity1">x60</td>
                        <td><img src="assets/img/mob_drop/pointe_de_fleche_usee.webp" alt="Pointe de flèche usée" title="Pointe de flèche usée" class="rarity3">x18</td>
                        <td>120 000</td>
                    </tr>
                </table>
            </div>
            <div class="sub-container">
                <h2>Coût d'élévation d'une aptitude</h2>
                <table>
                    <tr>
                        <th>Niveau</th>
                        <th>Ressource de donjon</th>
                        <th>Ressources de mobs</th>
                        <th>Matériaux de boss de monde</th>
                        <th>Ressource d'event</th>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td><img src="assets/img/dungeon_drop/enseignement_de_la_liberte.webp" alt="Enseignement de la Liberté" title="Enseignement de la Liberté" class="rarity2">x3</td>
                        <td><img src="assets/img/mob_drop/pointe_de_fleche_robuste.webp" alt="Pointe de flèche robuste" title="Pointe de flèche robuste" class="rarity1">x6</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td><img src="assets/img/dungeon_drop/guide_de_la_liberte.webp" alt="Guide de la Liberté" title="Guide de la Liberté" class="rarity3">x2</td>
                        <td><img src="assets/img/mob_drop/pointe_de_fleche_aiguisee.webp" alt="Pointe de flèche aiguisée" title="Pointe de flèche aiguisée" class="rarity2">x3</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td><img src="assets/img/dungeon_drop/guide_de_la_liberte.webp" alt="Guide de la Liberté" title="Guide de la Liberté" class="rarity3">x4</td>
                        <td><img src="assets/img/mob_drop/pointe_de_fleche_aiguisee.webp" alt="Pointe de flèche aiguisée" title="Pointe de flèche aiguisée" class="rarity2">x4</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td><img src="assets/img/dungeon_drop/guide_de_la_liberte.webp" alt="Guide de la Liberté" title="Guide de la Liberté" class="rarity3">x6</td>
                        <td><img src="assets/img/mob_drop/pointe_de_fleche_aiguisee.webp" alt="Pointe de flèche aiguisée" title="Pointe de flèche aiguisée" class="rarity2">x6</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td><img src="assets/img/dungeon_drop/guide_de_la_liberte.webp" alt="Guide de la Liberté" title="Guide de la Liberté" class="rarity3">x9</td>
                        <td><img src="assets/img/mob_drop/pointe_de_fleche_aiguisee.webp" alt="Pointe de flèche aiguisée" title="Pointe de flèche aiguisée" class="rarity2">x9</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td><img src="assets/img/dungeon_drop/philosophie_de_la_liberte.webp" alt="Philosophie de la Liberté" title="Philosophie de la Liberté" class="rarity4">x3</td>
                        <td><img src="assets/img/mob_drop/pointe_de_fleche_usee.webp" alt="Pointe de flèche usée" title="Pointe de flèche usée" class="rarity3">x4</td>
                        <td><img src="assets/img/world_boss_drop/souffle_de_stormterror.webp" alt="Souffle de Stormterror" title="Souffle de Stormterror" class="rarity5">x1</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>8</td>
                        <td><img src="assets/img/dungeon_drop/philosophie_de_la_liberte.webp" alt="Philosophie de la Liberté" title="Philosophie de la Liberté" class="rarity4">x4</td>
                        <td><img src="assets/img/mob_drop/pointe_de_fleche_usee.webp" alt="Pointe de flèche usée" title="Pointe de flèche usée" class="rarity3">x6</td>
                        <td><img src="assets/img/world_boss_drop/souffle_de_stormterror.webp" alt="Souffle de Stormterror" title="Souffle de Stormterror" class="rarity5">x1</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>9</td>
                        <td><img src="assets/img/dungeon_drop/philosophie_de_la_liberte.webp" alt="Philosophie de la Liberté" title="Philosophie de la Liberté" class="rarity4">x6</td>
                        <td><img src="assets/img/mob_drop/pointe_de_fleche_usee.webp" alt="Pointe de flèche usée" title="Pointe de flèche usée" class="rarity3">x9</td>
                        <td><img src="assets/img/world_boss_drop/souffle_de_stormterror.webp" alt="Souffle de Stormterror" title="Souffle de Stormterror" class="rarity5">x2</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>10</td>
                        <td><img src="assets/img/dungeon_drop/philosophie_de_la_liberte.webp" alt="Philosophie de la Liberté" title="Philosophie de la Liberté" class="rarity4">x9</td>
                        <td><img src="assets/img/mob_drop/pointe_de_fleche_usee.webp" alt="Pointe de flèche usée" title="Pointe de flèche usée" class="rarity3">x12</td>
                        <td><img src="assets/img/world_boss_drop/souffle_de_stormterror.webp" alt="Souffle de Stormterror" title="Souffle de Stormterror" class="rarity5">x2</td>
                        <td><img src="assets/img/other/couronne_de_la_sagesse.webp" alt="Couronne de la sagesse" title="Couronne de la sagesse" class="rarity5">x1</td><!--Ressource fixe-->
                    </tr>
                </table>
            </div>
        </div>
    </main>
    <?php include "footer.php"; ?>
    <script src="assets/js/connexion.js"></script>
</body>
</html>