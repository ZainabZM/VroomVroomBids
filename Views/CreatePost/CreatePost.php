<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer une enchère/Mettre en vente</title>
    <link rel="stylesheet" type="text/css" href="CreatePost.css" />
</head>

<body>
 
<div class="MenuWrapper">
<?php
    include('../../Navigation/Menu/Menu.php');
    ?>
</div>
    <?php $currentDate = date('d-m-Y'); ?>

    <div class="CreatePostContainer">
        <form class="CreatePostForm" action="../CreatePost/CreatePost.php" method="post">
            <h2>Créer une enchère</h2>
            <div class="cont">
                <label for="model">Modèle de la voiture:</label>
                <input type="text" name="model" placeholder="Corolla" />
                <label for="brand">Constructeur de la voiture:</label>
                <input type="text" name="brand" placeholder="Toyota" />
                <label for="power">Puissance:</label>
                <input type="text" name="power" placeholder="140" />
                <label for="years">Année:</abel>
                    <input type="date" name="years" />
                    <label for="descriptions">Description:</label>
                    <input type="text" name="descriptions" placeholder="Toyota Corolla Toyota Corolla Toyota Corolla Toyota Corolla" />
                    <label for="min_price">Prix minimum:</label>
                    <input type="number" name="min_price" step="0.01" min="1" placeholder="8000" />
                    <label for="date_end">Date de fin de l'enchère:</label>
                    <input type="date" name="date_end" min="<?php echo $currentDate; ?>" />
                    <input type="submit" />
            </div>
        </form>

</body>

</html>

<?php
require_once '../../Classes/Post.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $myAuction = new Post(
        $_POST["model"],
        $_POST["brand"],
        $_POST["power"],
        $_POST["years"],
        $_POST["descriptions"],
        $_POST["min_price"],
        $_POST["date_end"]
    );
    $myAuction->savePost();
}

?>