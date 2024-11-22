<?php

require_once 'BankAccount.php';

class SavingsAccount extends BankAccount
{
    public static float $interestRate = 0.03; // 3%

    public function applyInterest(): void
    {
        $this->balance += $this->balance * self::$interestRate;
    }
}
