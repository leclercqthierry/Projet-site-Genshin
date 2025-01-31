<?php
include "base.php";
$currentArtifact = [];

// We retrieve the artifact through the link
foreach ($artifacts as $artifact) {
    if ($artifact['name'] === htmlspecialchars($_GET['name'])){
        $currentArtifact = $artifact;
        break;
    }
}

################ En attendant une page 404 ################
// If the artifact isn't found, we redirect to the artifacts gallery
if (empty($currentArtifact)) {
    header("Location: artifacts-gallery.php");
    exit;
}

// artifact was found
$name = $currentArtifact['name'];
$rarity = $currentArtifact['rarity'];
$image = $currentArtifact['image'];
$description = $currentArtifact['description'];

echo '
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Common style-->
    <link rel="stylesheet" href="assets/css/style.css">
    <!--artefact style-->
    <link rel="stylesheet" href="assets/css/artifact.css">
    <title>Set Berserker</title>
</head>
<body>';
    include "header.php";
    echo nl2br('
    <main>
        <h1>Fiche de set d\'artefact</h1>
        <div class="container">
            <div>
                <img src='.$image.' alt='.$name.' class="rarity'.$rarity.'">
                <h2>'.$name.'</h2>
            </div>
            <p>'.$description.'</p>  
        </div>
    </main>');
    include "footer.php";
    echo '
    <script src="assets/js/connexion.js"></script>
</body>
</html>';
?>