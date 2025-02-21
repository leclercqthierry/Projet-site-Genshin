<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Common style-->
    <link rel="stylesheet" href="assets/css/style.css">
    <!--add-team style-->
    <link rel="stylesheet" href="assets/css/add-team.css">
    <title>Panneau Admin - Ajout d'une team</title>
</head>
<body>
    <?php include "template/header.php"; ?>
    <main>
        <h1>Ajout d'une team</h1>
        <div class="container">
            <form action="#" method="post" name="add-team-form">
                <div class="form-container">
                    <fieldset id="field1">
                        <legend>Personnage 1</legend>
                        <div class="form-label">
                            <label for="char1">Choix du personnage</label>
                            <select name="char" id="char1" required>
                                <option value=""></option>
                                <!--generated in js-->
                            </select>
                        </div>
                        <div class="form-label">
                            <label for="weapon1">Choix de l'arme</label>
                            <select name="weapon" id="weapon1" required>
                                <!--generated in js-->
                            </select>
                        </div>
                        <div class="form-label">
                            <label for="set1">Choix du set d'artéfacts</label>
                            <select name="artifact" id="set1" required>
                                <option value=""></option>
                                <!--generated in js-->
                            </select>
                        </div>
                        <div class="form-label">
                            <label for="note1">Complément d'information</label>
                            <textarea name="note1" id="note1" rows="5" placeholder="Sablier: Maîtrise élémentaire / ATQ% Gobelet: Bonus de DGT Dendro Coiffe: Taux CRIT / DGT CRIT" id="note"></textarea>
                        </div>
                    </fieldset>
                    <fieldset id="field2">
                        <legend>Personnage 2</legend>
                        <div class="form-label">
                            <label for="char2">Choix du personnage</label>
                            <select name="char" id="char2" required>
                                <option value=""></option>
                                <!--generated in js-->
                            </select>
                        </div>
                        <div class="form-label">
                            <label for="weapon2">Choix de l'arme</label>
                            <select name="weapon" id="weapon2" required>
                                <!--generated in js-->
                            </select>
                        </div>
                        <div class="form-label">
                            <label for="set2">Choix du set d'artéfacts</label>
                            <select name="artifact" id="set2" required>
                                <!--generated in js-->
                            </select>
                        </div>
                        <div class="form-label">
                            <label for="note2">Complément d'information</label>
                            <textarea name="note2" id="note2" rows="5" placeholder="Sablier: Maîtrise élémentaire / ATQ% Gobelet: Bonus de DGT Dendro Coiffe: Taux CRIT / DGT CRIT" id="note"></textarea>
                        </div>
                    </fieldset>
                    <fieldset id="field3">
                        <legend>Personnage 3</legend>
                        <div class="form-label">
                            <label for="char3">Choix du personnage</label>
                            <select name="char" id="char3" required>
                                <option value=""></option>
                                <!--generated in js-->
                            </select>
                        </div>
                        <div class="form-label">
                            <label for="weapon3">Choix de l'arme</label>
                            <select name="weapon" id="weapon3" required>
                                <!--generated in js-->
                            </select>
                        </div>
                        <div class="form-label">
                            <label for="set3">Choix du set d'artéfacts</label>
                            <select name="artifact" id="set3" required>
                                <!--generated in js-->
                            </select>
                        </div>
                        <div class="form-label">
                            <label for="note3">Complément d'information</label>
                            <textarea name="note3" id="note3" rows="5" placeholder="Sablier: Maîtrise élémentaire / ATQ% Gobelet: Bonus de DGT Dendro Coiffe: Taux CRIT / DGT CRIT" id="note"></textarea>
                        </div>
                    </fieldset>
                    <fieldset id="field4">
                        <legend>Personnage 4</legend>
                        <div class="form-label">
                            <label for="char4">Choix du personnage</label>
                            <select name="char" id="char4" required>
                                <option value=""></option>
                                <!--generated in js-->
                            </select>
                        </div>
                        <div class="form-label">
                            <label for="weapon4">Choix de l'arme</label>
                            <select name="weapon" id="weapon4" required>
                                <!--generated in js-->
                            </select>
                        </div>
                        <div class="form-label">
                            <label for="set4">Choix du set d'artéfacts</label>
                            <select name="artifact" id="set4" required>
                                <!--generated in js-->
                            </select>
                        </div>
                        <div class="form-label">
                            <label for="note4">Complément d'information</label>
                            <textarea name="note4" id="note4" rows="5" placeholder="Sablier: Maîtrise élémentaire / ATQ% Gobelet: Bonus de DGT Dendro Coiffe: Taux CRIT / DGT CRIT" id="note"></textarea>
                        </div>
                    </fieldset>
                </div>
                <input type="submit" value="Valider" class="btn">
            </form>
        </div>
    </main>
    <?php include "template/footer.php"; ?>
    <script src="assets/js/add-team.js"></script>
</body>
</html>