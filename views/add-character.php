<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Common style-->
    <link rel="stylesheet" href="assets/css/style.css">
    <!--add-character style-->
    <link rel="stylesheet" href="assets/css/add-character.css">
    <title>Panneau Admin - Ajout de personnage</title>
</head>
<body>
    <?php include "header.php"; ?>
    <main>
        <h1>Ajout de personnage</h1>
        <div class="container">
            <form action="#" method="post" name="add-character-form">
                <div id="group1">
                    <div class="form-label">
                        <label for="name">Nom</label>
                        <input type="text" id="name" name="name" title="Uniquement des lettres et commence par une majuscule" required>
                    </div>
                    <div class="form-label">
                        <label for="element">Elément</label>
                        <select name="element" id="element">
                            <option value="anemo">Anemo</option>
                            <option value="geo">Geo</option>
                            <option value="electro">Electro</option>
                            <option value="dendro">Dendro</option>
                            <option value="hydro">Hydro</option>
                            <option value="pyro">Pyro</option>
                            <option value="cryo">Cryo</option>
                        </select>
                    </div>
                    <div class="form-label">
                        <label for="weapon">Arme</label>
                        <select name="weapon" id="weapon">
                            <option value="sword">Epée à une main</option>
                            <option value="claymore">Epée à deux mains</option>
                            <option value="bow">Arc</option>
                            <option value="polearm">Arme d'hast</option>
                            <option value="catalyst">Catalyseur</option>
                        </select>
                    </div>
                </div>
                <div id="group2">
                    <span>Rareté</span>
                    <div class="rarity">
                        <div>
                            <label for="rarity4">4<sup><img src="assets/img/icons/1_star.png" alt="étoile"></sup></label>
                        </div>
                        <input type="radio" name="rarity" id="rarity4" value="4">
                    </div>
                    <div class="rarity">
                        <div>
                            <label for="rarity5">5<sup><img src="assets/img/icons/1_star.png" alt="étoile"></sup></label>
                        </div>
                        <input type="radio" name="rarity" id="rarity5" value="5">
                    </div>
                    <div class="form-label">
                        <label for="bonus">Bonus type</label>
                        <select name="bonus" id="bonus">
                            <option value="atq">ATQ%</option>
                            <option value="def">DEF%</option>
                            <option value="pv">PV%</option>
                            <option value="dgt-anemo">DGT% Anemo</option>
                            <option value="dgt-geo">DGT% Geo</option>
                            <option value="dgt-electro">DGT% Electro</option>
                            <option value="dgt-dendro">DGT% Dendro</option>
                            <option value="dgt-hydro">DGT% Hydro</option>
                            <option value="dgt-pyro">DGT% Pyro</option>
                            <option value="dgt-cryo">DGT% Cryo</option>
                            <option value="dgt-phy">DGT% Physique</option>
                            <option value="crit-rate">TC</option>
                            <option value="crit-dgt">DC</option>
                            <option value="re">RE</option>
                            <option value="me">ME</option>
                            <option value="heal">%Soins</option>
                        </select>
                    </div>
                    <div class="form-label">
                        <label for="farm-days">Jours de farm aptitudes</label>
                        <select name="farm-days" id="farm-days">
                            <option value="mo-th-su">Lundi / Jeudi / Dimanche</option>
                            <option value="tu-fr-su">Mardi / Vendredi / Dimanche</option>
                            <option value="we-sa-su">Mercredi / Samedi / Diamnche</option>
                        </select>
                    </div>
                </div>
                <div class="form-label-groups">
                    <div class="form-label">
                        <fieldset>
                            <legend>Miniature</legend>
                            <input type="file" name="thumbnail" id="thumbnail" accept="image/*" required>
                        </fieldset>
                    </div>
                    <div class="form-label">
                        <fieldset>
                            <legend>Card</legend>
                            <input type="file" name="card" id="card" accept="image/*" required>
                        </fieldset>
                    </div>
                </div>
                <div class="form-label-groups">
                    <div class="form-label">
                        <fieldset>
                            <legend>Boss matériel</legend>
                            <input type="file" name="boss-mat" id="boss-mat" accept="image/*" required>
                        </fieldset>
                    </div>
                    <div class="form-label">
                        <fieldset>
                            <legend>Local matériel</legend>
                            <input type="file" name="local-mat" id="local-mat" accept="image/*" required>
                        </fieldset>
                    </div>
                    <div class="form-label">
                        <fieldset>
                            <legend>World Boss matériel</legend>
                            <input type="file" name="wb-mat" id="wb-mat" accept="image/*" required>
                        </fieldset>
                    </div>
                </div>
                <div class="form-label-groups">
                    <div class="form-label">
                        <fieldset>
                            <legend>Mob matériel rareté 1</legend>
                            <input type="file" name="mob-mat-r1" id="mob-mat-r1" accept="image/*" required>
                        </fieldset>
                    </div>
                    <div class="form-label">
                        <fieldset>
                            <legend>Mob matériel rareté 2</legend>
                            <input type="file" name="mob-mat-r2" id="mob-mat-r2" accept="image/*" required>
                        </fieldset>
                    </div>
                    <div class="form-label">
                        <fieldset>
                            <legend>Mob matériel rareté 3</legend>
                            <input type="file" name="mob-mat-r3" id="mob-mat-r3" accept="image/*" required>
                        </fieldset>
                    </div>
                </div>
                <div class="form-label-groups">
                    <div class="form-label">
                        <fieldset>
                            <legend>Donjon matériel rareté 2</legend>
                            <input type="file" name="dj-mat-r2" id="dj-mat-r2" accept="image/*" required>
                        </fieldset>
                    </div>
                    <div class="form-label">
                        <fieldset>
                            <legend>Donjon matériel rareté 3</legend>
                            <input type="file" name="dj-mat-r3" id="dj-mat-r3" accept="image/*" required>
                        </fieldset>
                    </div>
                    <div class="form-label">
                        <fieldset>
                            <legend>Donjon matériel rareté 4</legend>
                            <input type="file" name="dj-mat-r4" id="dj-mat-r4" accept="image/*" required>
                        </fieldset>
                    </div>
                </div>
                <input type="submit" value="Valider" class="btn">
            </form>
        </div>
    </main>
    <?php include "footer.php"; ?>
    <script src="assets/js/connexion.js"></script>
</body>
</html>