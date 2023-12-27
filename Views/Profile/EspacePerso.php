<?php
require_once "../../Connexion.php";

session_start();

// verification connexion avant $_SESSION["users_id"]
if (isset($_SESSION["users_id"])) {
    $user_id = $_SESSION["users_id"];

    // Récup enchères remportées par users
    $stmt = $bdd->prepare("SELECT * FROM post WHERE winner_id = :users_id");
    $stmt->bindParam(":users_id", $user_id);
    $stmt->execute();
    $encheres_remportees = $stmt->fetchAll(PDO::FETCH_ASSOC);
} else {
    // si non connecté
    header("Location: /VroomVroomBids/Views/Login/Login.php");
    exit;
}
// Récup infos profil de users
$stmtProfil = $bdd->prepare("SELECT * FROM users WHERE id = :users_id");
$stmtProfil->bindParam(":users_id", $user_id);
$stmtProfil->execute();
$afficher_profil = $stmtProfil->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="EspacePerso.css">
    <title>Espace personnel</title>
</head>

<body>

    <?php
    require_once __DIR__ . "/../../Navigation/Menu/Menu.php";
    ?>
    <div class="espaceperso">
        <h1>Espace personnel</h1>

        <div class="encheres">
            <h2>Enchères remportées</h2>
            <ul>
                <?php foreach ($encheres_remportees as $enchere) : ?>
                    <li class="cardencheres">
                        <!-- détails enchère remportée -->
                        Marque : <?php echo $enchere["brand"]; ?><br>
                        Modèle : <?php echo $enchere["model"]; ?><br>
                        Puissance : <?php echo $enchere["power"]; ?><br>
                        Date d'achat : <?php echo $enchere["years"]; ?><br>
                        Montant : <?php echo $enchere["min_price"]; ?> €<br>
                        Description : <?php echo $enchere["descriptions"]; ?><br>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>

        <div class="modifs">
            <h2>Modifier le profil:</h2>
            <form action="ModifierProfile.php" method="post">
                <label for="lastname">Nom :</label>
                <input type="text" name="lastname" value="<?php echo $afficher_profil['firstname']; ?>" required><br>
                <label for="firstname">Prénom :</label>
                <input type="text" name="firstname" value="<?php echo $afficher_profil['lastname']; ?>" required><br>
                <label for="email">Email :</label>
                <input type="email" name="email" value="<?php echo $afficher_profil['email']; ?>" required><br>
                <label for="password">Nouveau mot de passe :</label>
                <input type="password" name="password"><br>
                <input type="submit" value="Modifier le profil">
            </form>
            <form action="/VroomVroomBids/Views/Logout/Logout.php" method="post">
                <input type="submit" value="Déconnexion">
            </form>
        </div>
    </div>
</body>

</html>