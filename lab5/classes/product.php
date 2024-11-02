<?php

class product
{
    public $name;
    protected $price;
    public $description;

    public function __construct($name, $price, $description)
    {
        $this->name = $name;
        $this->setPrice($price);
        $this->description = $description;
    }

    public function getInfo()
    {
        return "Назва: {$this->name}\nЦіна: {$this->price}\nОпис: {$this->description}\n";
    }

    public function setPrice($price)
    {
        if ($price < 0)
        {
            throw new Exception("Ціна не може бути від'ємною");
        }
        $this->price = $price;
    }

    public function getPrice()
    {
        return $this->price;
    }
}

?>
