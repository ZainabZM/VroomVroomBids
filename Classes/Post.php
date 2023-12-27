<?php
        require_once "../../Connexion.php";
        class Post
{
    public string $model;
    public string $brand;
    public int $power;
    public $years;
    public string $descriptions;
    public float $minPrice;
    public $dateEnd;

    public function __construct($model, $brand, $power, $years, $descriptions, $minPrice, $dateEnd)
    {
        $this->model = $model;
        $this->brand = $brand;
        $this->power = $power;
        $this->years = $years;
        $this->descriptions = $descriptions;
        $this->minPrice = $minPrice;
        $this->dateEnd = $dateEnd;
    }

    public function savePost()
    {

        //FONCTION POUR QUE LA DATE FONCTIONNE AU BON FORMAT 
        global $bdd;
        $formattedYears =date("Y-m-d", strtotime($this->years));
        $formattedDate = date("Y-m-d", strtotime($this->dateEnd));
         require_once "../../Connexion.php";
        $post = $bdd->prepare("INSERT INTO post (`model`, `brand`, `power`, `years`, `descriptions`, `min_price`, `date_end` ) VALUES (? , ?, ?, ?, ?, ?, ?)");
        $post->execute([$this->model, $this->brand, $this->power, $this->years, $this->descriptions, $this->minPrice, $this->dateEnd]); // MODIF POUR LA FONCTION 
        echo "Votre post a été sauvegardé dans la base de données";
    }

    public function renderPost()
    {
        require_once "../../Connexion.php";
        $post = $dbh->query("SELECT * FROM posts");
        $posts = $post->fetchAll(PDO::FETCH_ASSOC);

        echo "<div class='renderCont'>";
        foreach ($posts as $post) { ?>
            <?php echo "<div class='render'>"; ?>
            <p><?php echo "Modèle : ", $post['model'] ?></p>
            <p><?php echo "Marque : ", $post['brand'] ?></p>
            <p><?php echo "Puissance : ", $post['power'] ?></p>
            <p><?php echo "Date : ", $post['years'] ?></p>
            <p><?php echo "Description : ", $post['descriptions'] ?></p>
            <p><?php echo "Min Price : ", $post['min_price'] ?></p>
            <p><?php echo "Date End : ", $post['date_end'] ?></p>

<?php
            echo "</div>";
        }
        echo "</div>";
    }
}