<?php define('ROOT_PATH', './'); ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VroomVroomBids</title>
</head>
<?php
require_once "../../Connexion.php";

session_start();

// Détruit toutes variables de session
$_SESSION = array();

// Détruit la session
session_destroy();
echo "Vous êtes  déconnecté";

// Redirige page de connexion
header("Location: /VroomVroomBids/Views/Login/Login.php");
exit;
?>
