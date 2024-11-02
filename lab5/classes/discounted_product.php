<?php

require_once 'product.php';

class discounted_product extends product
{
    public $discount;

    public function __construct($name, $price, $description, $discount)
    {
        parent::__construct($name, $price, $description);
        $this->discount = $discount;
    }

    public function getDiscountedPrice()
    {
        return $this->price * (1 - $this->discount / 100);
    }

    public function getInfo()
    {
        $originalPrice = $this->price;
        $discountedPrice = $this->getDiscountedPrice();
        return "Назва: {$this->name}\nОригінальна ціна: {$originalPrice}\nЦіна зі знижкою: {$discountedPrice}\nОпис: {$this->description}\nЗнижка: {$this->discount}%\n";
    }
}

?>
