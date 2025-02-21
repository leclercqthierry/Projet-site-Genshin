<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Common style-->
    <link rel="stylesheet" href="assets/css/style.css">
    <!--add-character style (same style)-->
    <link rel="stylesheet" href="assets/css/edit-character.css">
    <!--add-weapon style-->
    <link rel="stylesheet" href="assets/css/edit-weapon.css">
    <title>Panneau Admin - Edition d'une arme</title>
</head>
<body>
    <?php include "template/header.php"; ?>
    <main>
        <h1>Edition d'une arme</h1>
        <div class="container">
            <form action="#" method="post" name="select-weapon-form">
                <div class="form-label">
                    <label for="weapon">Arme à éditer</label>
                    <select name="weapon" id="weapon">
                        <option value=""></option>
                        <!--generated in js-->
                    </select>
                </div>
                <input type="submit" value="Valider" class="btn">
            </form>
            <form action="#" method="post" name="edit-weapon-form">
                <div id="group1">
                    <div class="form-label">
                        <label for="name">Nom</label>
                        <input type="text" id="name" name="name">
                    </div>
                    <div class="form-label">
                        <label for="type">Type</label>
                        <select name="type" id="type">
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
                            <label for="rarity3">3<sup><img src="assets/img/icons/1_star.png" alt="étoile"></sup></label>
                        </div>
                        <input type="radio" name="rarity" id="rarity3" value="3">
                    </div>
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
                        <label for="bonus">Sous-stat</label>
                        <select name="bonus" id="bonus">
                            <option value="atq">ATQ%</option>
                            <option value="def">DEF%</option>
                            <option value="pv">PV%</option>
                            <option value="dgt-phy">DGT Physique</option>
                            <option value="crit-rate">TC</option>
                            <option value="crit-dgt">DC</option>
                            <option value="re">RE</option>
                            <option value="me">ME</option>
                        </select>
                    </div>
                    <div class="form-label">
                        <label for="obtaining">Obtention</label>
                        <select name="obtaining" id="obtaining">
                            <option value="wish">Voeux</option>
                            <option value="shop">Boutique</option>
                            <option value="event">Evènement temporaire</option>
                            <option value="craft">Forge</option>
                            <option value="quest">Quète</option>
                            <option value="ps">Playstation</option>
                            <option value="drop">Drop</option>
                            <option value="dialog">Dialogue</option>
                            <option value="pass">Battle Pass</option>
                        </select>
                    </div>
                </div>
                <div id="group3">
                    <div class="form-label">
                        <label for="farm-days">Jours de farm élévation</label>
                        <select name="farm-days" id="farm-days">
                            <option value="mo-th-su">Lundi / Jeudi / Dimanche</option>
                            <option value="tu-fr-su">Mardi / Vendredi / Dimanche</option>
                            <option value="we-sa-su">Mercredi / Samedi / Diamnche</option>
                        </select>
                    </div>
                    <div class="form-label">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" rows="5"></textarea>
                    </div>
                </div>
                <div class="form-label-groups">
                    <div class="form-label">
                        <fieldset>
                            <legend>Miniature</legend>
                            <input type="file" name="thumbnail" id="thumbnail" accept="image/*">
                        </fieldset>
                    </div>
                    <div class="form-label">
                        <fieldset>
                            <legend>Card</legend>
                            <input type="file" name="card" id="card" accept="image/*">
                        </fieldset>
                    </div>
                </div>
                <div class="form-label-groups">
                    <div class="form-label">
                        <fieldset>
                            <legend>Mob matériel 1 rareté 1</legend>                        
                            <input type="file" name="mob-mat1-r1" id="mob-mat1-r1" accept="image/*">
                        </fieldset>
                    </div>
                    <div class="form-label">
                        <fieldset>
                            <legend>Mob matériel 1 rareté 2</legend>
                            <input type="file" name="mob-mat1-r2" id="mob-mat1-r2" accept="image/*">
                        </fieldset>
                        
                    </div>
                    <div class="form-label">
                        <fieldset>
                            <legend>Mob matériel 1 rareté 3</legend>
                            <input type="file" name="mob-mat1-r3" id="mob-mat1-r3" accept="image/*">
                        </fieldset>   
                    </div>
                </div>
                <div class="form-label-groups">
                    <div class="form-label">
                        <fieldset>
                            <legend>Mob matériel 2 rareté 2</legend>
                            <input type="file" name="mob-mat2-r2" id="mob-mat2-r2" accept="image/*">
                        </fieldset>
                    </div>
                    <div class="form-label">
                        <fieldset>
                            <legend>Mob matériel 2 rareté 3</legend>
                            <input type="file" name="mob-mat2-r3" id="mob-mat2-r3" accept="image/*">
                        </fieldset>
                    </div>
                    <div class="form-label">
                        <fieldset>
                            <legend>Mob matériel 2 rareté 4</legend>
                            <input type="file" name="mob-mat2-r4" id="mob-mat2-r4" accept="image/*">
                        </fieldset>
                    </div>
                </div>
                <div class="form-label-groups">
                    <div class="form-label">
                        <fieldset>
                            <legend>Donjon matériel rareté 1</legend>
                            <input type="file" name="dj-mat-r1" id="dj-mat-r1" accept="image/*">
                        </fieldset>
                    </div>
                    <div class="form-label">
                        <fieldset>
                            <legend>Donjon matériel rareté 2</legend>
                            <input type="file" name="dj-mat-r2" id="dj-mat-r2" accept="image/*">
                        </fieldset>
                    </div>
                    <div class="form-label">
                        <fieldset>
                            <legend>Donjon matériel rareté 3</legend>
                            <input type="file" name="dj-mat-r3" id="dj-mat-r3" accept="image/*">
                        </fieldset>
                    </div>
                    <div class="form-label">
                        <fieldset>
                            <legend>Donjon matériel rareté 4</legend>
                            <input type="file" name="dj-mat-r4" id="dj-mat-r4" accept="image/*">
                        </fieldset>   
                    </div>
                </div>
                <input type="submit" value="Valider" class="btn">
            </form>
        </div>
    </main>
    <?php include "template/footer.php"; ?>
    <script src="assets/js/edit-weapon.js"></script>
</body>
</html>