<?php

require_once 'AccountInterface.php';

class BankAccount implements AccountInterface
{
    const MIN_BALANCE = 0;

    protected float $balance;
    protected string $currency;

    public function __construct(float $initialBalance, string $currency)
    {
        if ($initialBalance < self::MIN_BALANCE) {
            throw new Exception("Початковий баланс не може бути меншим за " . self::MIN_BALANCE);
        }
        $this->balance = $initialBalance;
        $this->currency = $currency;
    }

    public function deposit(float $amount): void
    {
        if ($amount <= 0) {
            throw new Exception("Сума поповнення повинна бути позитивною.");
        }
        $this->balance += $amount;
    }

    public function withdraw(float $amount): void
    {
        if ($amount <= 0) {
            throw new Exception("Сума для зняття повинна бути позитивною.");
        }
        if ($this->balance - $amount < self::MIN_BALANCE) {
            throw new Exception("Недостатньо коштів.");
        }
        $this->balance -= $amount;
    }

    public function getBalance(): float
    {
        return $this->balance;
    }
}
