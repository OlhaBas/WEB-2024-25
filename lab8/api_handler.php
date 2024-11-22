<?php
require 'config.php';

header('Content-Type: application/json');
$apiKey = 'ee26cc2453028422dd6f16b264a229e4';

if ($_GET['action'] === 'getCities') {
    $response = file_get_contents("https://api.novaposhta.ua/v2.0/json/", false, stream_context_create([
        'http' => [
            'method' => 'POST',
            'header' => 'Content-Type: application/json',
            'content' => json_encode([
                'apiKey' => $apiKey,
                'modelName' => 'Address',
                'calledMethod' => 'getCities'
            ])
        ]
    ]));
    echo $response;
} elseif ($_GET['action'] === 'getBranches') {
    $cityRef = $_GET['city'];
    $type = ($_GET['type'] === 'postomat') ? 'Postomat' : 'Branch';

    $response = file_get_contents("https://api.novaposhta.ua/v2.0/json/", false, stream_context_create([
        'http' => [
            'method' => 'POST',
            'header' => 'Content-Type: application/json',
            'content' => json_encode([
                'apiKey' => $apiKey,
                'modelName' => 'AddressGeneral',
                'calledMethod' => 'getWarehouses',
                'methodProperties' => [
                    'CityRef' => $cityRef,
                    'TypeOfWarehouseRef' => $type
                ]
            ])
        ]
    ]));
    echo $response;
} elseif ($_GET['action'] === 'saveOrder') {
    try {
        $pdo = getDatabaseConnection();
        $stmt = $pdo->prepare('INSERT INTO orders (order_number, weight, city, delivery_type, branch) VALUES (?, ?, ?, ?, ?)');
        $stmt->execute([
            $_POST['orderNumber'],
            $_POST['weight'],
            $_POST['city'],
            $_POST['deliveryType'],
            $_POST['branch']
        ]);

        echo json_encode(['message' => 'Замовлення збережено!']);
    } catch (Exception $e) {
        echo json_encode(['error' => 'Помилка при збереженні замовлення: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['error' => 'Невідома дія']);
}
