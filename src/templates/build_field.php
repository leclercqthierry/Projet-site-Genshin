<?php

function buildField($number){
    $html ='
    <fieldset id="field'.$number.'">
        <legend>Personnage '.$number.'</legend>
        <div class="form-label">
            <label for="char'.$number.'">Choix du personnage</label>
            <select name="char" id="char'.$number.'">
                <option value=""></option>
                <!--generated in php-->
            </select>
        </div>
        <div class="form-label">
        <label for="weapon'.$number.'">Choix de l\'arme</label>
            <select name="weapon" id="weapon'.$number.'">
                <!--generated in php-->
            </select>
        </div>
        <div class="form-label">
            <label for="set'.$number.'">Choix du set d\'artéfacts</label>
            <select name="artifact" id="set'.$number.'">
                <option value=""></option>
                <!--generated in php-->
            </select>
        </div>
        <div class="form-label">
        <label for="note'.$number.'">Complément d\'information</label>
            <textarea name="note'.$number.'" id="note'.$number.'" rows="5" placeholder="Sablier: Maîtrise élémentaire / ATQ% Gobelet: Bonus de DGT Dendro Coiffe: Taux CRIT / DGT CRIT" id="note'.$number.'"></textarea>
        </div>
    </fieldset>';
    return $html;
}