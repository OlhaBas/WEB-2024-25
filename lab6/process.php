<?php

require_once 'BankAccount.php';
require_once 'SavingsAccount.php';

session_start();
if (!isset($_SESSION['account'])) {
    $_SESSION['account'] = new SavingsAccount(100, 'USD');
}

$account = $_SESSION['account'];

try {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $action = $_POST['action'] ?? null;
        $amount = isset($_POST['amount']) && is_numeric($_POST['amount']) ? (float)$_POST['amount'] : null;

        switch ($action) {
            case 'deposit':
                if ($amount === null || $amount <= 0) {
                    throw new Exception("Введіть коректну суму для поповнення.");
                }
                $account->deposit($amount);
                $message = "Рахунок поповнено на {$amount} USD. Баланс: {$account->getBalance()} USD.";
                break;
            case 'withdraw':
                if ($amount === null || $amount <= 0) {
                    throw new Exception("Введіть коректну суму для зняття.");
                }
                $account->withdraw($amount);
                $message = "Знято {$amount} USD. Баланс: {$account->getBalance()} USD.";
                break;
            case 'balance':
                $message = "Поточний баланс: {$account->getBalance()} USD.";
                break;
            case 'interest':
                if ($account instanceof SavingsAccount) {
                    $account->applyInterest();
                    $message = "Відсотки застосовано. Баланс: {$account->getBalance()} USD.";
                } else {
                    $message = "Ця функція доступна лише для накопичувального рахунку.";
                }
                break;
            default:
                $message = "Невідома дія.";
        }
    }

    $_SESSION['account'] = $account;
} catch (Exception $e) {
    $message = "Помилка: " . $e->getMessage();
}
header("Location: index.html?message=" . urlencode($message));
exit;
