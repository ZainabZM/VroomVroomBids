<?php
require __DIR__ . "/User.php";
class Profile extends User
{
    public int $age;
    public string $country;
    public function __construct($firstname, $lastname, $email, $password, $salesNumber, $age, $country)
    {
        parent::construct($firstname, $lastname, $email, $password, $salesNumber);
        $this->age = $age;
        $this->country = $country;
    }


    public function renderProfile()
    {
        echo "<div class='profile'>
        <p> $this->firstname</p>
        <p> $this->lastname</p>
        <p> $this->email</p>
        <p> $this->password</p>
        <p> $this->salesNumber</p>

        </div>";
    }
}
