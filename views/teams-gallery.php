<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Common style-->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- teams gallery style-->
    <link rel="stylesheet" href="assets/css/teams-gallery.css">
    <title>Gallerie de teams</title>
</head>
<body>
    <?php include "header.php"; ?>
    <main>
        <h1>Gallerie de teams</h1>
        <div class="search">
            <input type="search" placeholder="Par personnage">
            <img src="assets/img/icons/chercher.png" class="search-icon" alt="chercher">
        </div>
        <div class="gallery">
            <!--Generated in php-->
            <?php
            include "base.php";
            foreach($teams as $team) {
                $chars = []; 
                $characters_element_image = [];
                // for each slot of the team
                for ($i = 0; $i < 4; $i++) {
                    //we recover the character
                    foreach($characters as $character){
                        if($character['name']===$team['slot'][$i]['character']){
                            $chars[$i] = $character;
                        }
                    }
                    //and his element image
                    foreach($elements as $element){
                        if($element['name']===$chars[$i]['element']){
                            $characters_element_image[$i] = $element['element_image'];
                        }
                    }
                }
                // Display
                $item = "
                <a href='team.php'>
                    <div class='team-container'>
                        <h2>".$team['name']." de ".$team['author']."</h2>
                        <div class='team'>
                            <div class='card' data-rarity=".$chars[0]['rarity'].">
                                <div class='img-container'>
                                    <img src=".$chars[0]['image']." alt=".$chars[0]['name']." class='rarity".$chars[0]['rarity']." character'>
                                    <img src=".$characters_element_image[0]." class='img-element'>
                                </div>
                                <p>".$chars[0]['name']."</p>
                            </div>
                            <div class='card' data-rarity=".$chars[1]['rarity'].">
                                <div class='img-container'>
                                    <img src=".$chars[1]['image']." alt=".$chars[1]['name']." class='rarity".$chars[1]['rarity']." character'>
                                    <img src=".$characters_element_image[1]." class='img-element'>
                                </div>
                                <p>".$chars[1]['name']."</p>
                            </div>
                            <div class='card' data-rarity=".$chars[2]['rarity'].">
                                <div class='img-container'>
                                    <img src=".$chars[2]['image']." alt=".$chars[2]['name']." class='rarity".$chars[2]['rarity']." character'>
                                    <img src=".$characters_element_image[2]." class='img-element'>
                                </div>
                                <p>".$chars[2]['name']."</p>
                            </div>
                            <div class='card' data-rarity=".$chars[3]['rarity'].">
                                <div class='img-container'>
                                    <img src=".$chars[3]['image']." alt=".$chars[3]['name']." class='rarity".$chars[3]['rarity']." character'>
                                    <img src=".$characters_element_image[3]." class='img-element'>
                                </div>
                                <p>".$chars[3]['name']."</p>
                            </div>
                        </div>
                    </div>
                </a>";
                echo $item;
            };
            ?>
        </div>
    </main>
    <?php include "footer.php"; ?>
    <script src="assets/js/connexion.js"></script>
    <script src="assets/js/teams-gallery.js"></script>
</body>
</html>