<?php

require_once 'BankAccount.php';
require_once 'SavingsAccount.php';

try {
    $account = new BankAccount(100, 'USD');
    echo "Поточний баланс (звичайний рахунок): {$account->getBalance()} USD\n";

    $account->deposit(50);
    echo "Баланс після поповнення: {$account->getBalance()} USD\n";

    $account->withdraw(30);
    echo "Баланс після зняття: {$account->getBalance()} USD\n";

    $account->withdraw(200);
} catch (Exception $e) {
    echo "Помилка: " . $e->getMessage() . "\n";
}

try {
    $savingsAccount = new SavingsAccount(200, 'USD');
    echo "\nПоточний баланс (накопичувальний рахунок): {$savingsAccount->getBalance()} USD\n";

    $savingsAccount->applyInterest();
    echo "Баланс після застосування відсотків: {$savingsAccount->getBalance()} USD\n";

    $savingsAccount->withdraw(100);
    echo "Баланс після зняття: {$savingsAccount->getBalance()} USD\n";

    $savingsAccount->deposit(-50);
} catch (Exception $e) {
    echo "Помилка: " . $e->getMessage() . "\n";
}
