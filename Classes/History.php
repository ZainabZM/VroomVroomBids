<?php
class History
{
    public string $user;
    public $post;
    public $date;
    public float $price;

    public function __construct($user, $post, $date, $price)
    {
        $this->user = $user;
        $this->post = $post;
        $this->date = $date;
        $this->price = $price;
    }

    public function renderHistory()
    {
        require_once "../../Connexion.php";
        $history = $bdd->query("SELECT h. user_id, b. price, dates FROM bids b LEFT JOIN histories h ON b.id = h.bid_id LEFT JOIN users u ON u.id = b.user_id; ");
        $histories = $history->fetchAll(PDO::FETCH_ASSOC);

        echo "<div class='renderCont'>";
        foreach ($histories as $history) { ?>
            <?php echo "<div class='render'>"; ?>
            <p><?php echo "Utilisateur : ", $history['user_id'] ?></p>
            <p><?php echo "Montant enchéri : ", $history['price'] ?></p>
            <p><?php echo "Date : ", $history['dates'] ?></p>


<?php
            echo "</div>";
        }
        echo "</div>";
    }
}
