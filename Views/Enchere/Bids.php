<?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);

    require_once "../../Connexion.php";
    
    $reponse = "SELECT id, model, brand, power, years, descriptions, min_price, date_end FROM post";
    $posts = $bdd->query($reponse);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/VroomVroombids/Views/Enchere/Bids.css">
    <title>Document</title>
</head>
<body>

<?php include ('../../Navigation/Menu/Menu.php')?>

<div class="bidouille">
        <?php foreach($posts as $post):?>
            <div class="machin">
                <ul>
                    <li>
                        <div class="truc">
                            <a href="/VroomVroombids/Views/Post/Posts.php?id=<?php echo $post['id']?>"><img src="https://cdn.discordapp.com/attachments/1171733145700282409/1173604415459037254/corvette.jpg?ex=65648f49&is=65521a49&hm=357da93e8c5ee6d8b43296801290ae29daeacd80526c45e434aaa69171ef9d1b&" class="poulet" alt=""></a>
                        </div>

                        <div class="muche">
                            <p><?php echo "Modèle : ". $post['model']."<br>"; ?>
                            <?php echo "Marque : ". $post['brand']."<br>"; ?>
                            <?php echo "Puissance : ". $post['power']."hp <br>"; ?>
                            <?php echo "Année : ". $post['years']."<br>"; ?>
                            <?php echo "Détails produit : ". $post['descriptions']."<br>"; ?>
                            <?php echo "Prix d'enchère : ". $post['min_price']."€ <br>"; ?>
                            <?php echo "Fin d'enchère : ". $post['date_end']."<br>"; ?></p>
                            <p><a href="/VroomVroombids/Views/Post/Posts.php?id=<?php echo $post['id']?>"><button class="info">En savoir plus ></button></a></p>
                        </div>

                    </li>
                </ul>
            </div>
        <?php endforeach;?>
</div>

</body>
</html>