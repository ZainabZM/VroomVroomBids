<?php
session_start();

include('../../Navigation/Menu.php');
//error_reporting(E_ALL);
//ini_set('display_errors', 1);
 
require_once "../../Connexion.php";

if (isset($_SESSION['email'])) {
    $afficher_profil_statement = $bdd->prepare("SELECT * FROM users WHERE email = ?");
    $afficher_profil_statement->execute(array($_SESSION['email']));
    $afficher_profil = $afficher_profil_statement->fetch();
    // var_dump($_SESSION["users_id"]);
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_SESSION["users_id"])) {
        $utilisateur_id = $_SESSION["users_id"];
        $nom = $_POST["lastname"];
        $prenom = $_POST["firstname"];
        $email = $_POST["email"];
        $nouveau_mot_de_passe = $_POST["password"];

        $query = "UPDATE users SET firstname = :prenom, lastname = :nom, email = :email";

        // mise à jour MDP s'il veut
        if (!empty($nouveau_mot_de_passe)) {
            $query .= ", password = :mot_de_passe";
        }

        $query .= " WHERE id = :id";

        $statement = $bdd->prepare($query);
        $statement->bindValue(":nom", $nom);
        $statement->bindValue(":prenom", $prenom);
        $statement->bindValue(":email", $email);
        $statement->bindValue(":id", $utilisateur_id);

        // Ajouter MDP s'il est fourni
        if (!empty($nouveau_mot_de_passe)) {
            $hashed_password = password_hash($nouveau_mot_de_passe, PASSWORD_DEFAULT);
            $statement->bindParam(":mot_de_passe", $hashed_password);
        }

        try {
            $statement->execute();
            echo "Mise à jour réussie.";
            header("Location: /VroomVroomBids/Views/Profile/EspacePerso.php");
        } catch (PDOException $e) {
            echo "Erreur de mise à jour : " . $e->getMessage();
        }
    }
} else {
    echo "La session n'est pas correctement configurée. Erreur lors de la récupération du profil.";
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Profil</title>
</head>
<body>
</body>
</html>