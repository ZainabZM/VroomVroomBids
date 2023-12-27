<?php

class User
{
    public string $firstname;
    public string $lastname;
    public string $email;
    protected string $password;
    public int $salesNumber;

    public function construct($firstname, $lastname, $email, $password, $salesNumber)
    {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->password = $password;
        $this->salesNumber = $salesNumber;
    }

    public function get($name)
    {
        return $this->$name;
    }
}