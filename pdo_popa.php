<?php
require 'auth.php';
$config = require 'config.php';

$host = $config['main_database']['host'];
$username_db = $config['main_database']['username'];
$password_db = $config['main_database']['password'];
$database = $config['main_database']['database'];

header('Content-Type: application/json');

$headers = getallheaders();






$token = isset($headers['Authorization']) ? str_replace('Bearer ', '', $headers['Authorization']) : '';
$username = isset($headers['Username']) ? $headers['Username'] : '';
$password = isset($headers['Password']) ? $headers['Password'] : '';

// Define your valid token, username, and password
$auth = new Auth($config);




if (!$auth->check_login($token, $username, $password)) {
    echo json_encode(['error' => 'Unauthorized']);
    http_response_code(401); // Error code 401 Unauthorized
    exit;
}





$input = file_get_contents('php://input');
$data = json_decode($input, true);
if (json_last_error() !== JSON_ERROR_NONE) {
    echo json_encode(['error' => 'Invalid JSON']);
    http_response_code(400); // Error code 400 Bad Request
    exit;
}



try {
    $pdo = new PDO("mysql:host=$host;dbname=$database", $username_db, $password_db);
} catch (PDOException $e) {
    var_dump($e->errorInfo . "\n" . $e->getMessage());
    exit();
}

$sql_get = "SELECT * FROM tblweavis WHERE mandant = :mandant AND bestellnr = :bestellnr";

$sql_insert = "INSERT INTO tblweavis (
                       aktionskennzeichen, mandant, abteilung, weart, bestellnr, kundenreferenz, lieferantenname1,
lieferantenname2,
lstrasse,
llaenderkennzeichen,
lplz,
lort,
artikel,
bestellmenge,
meeinheit,
liefermenge,
shop) VALUES ('WEA', 'torautomation24','torautomation24','WESTD',:bestellnr,:kundenreferenz,'torautomation24',null,'Hüttenstr. 100-102','DE','50170','Kerpen',:artikel ,:bestellmenge ,'STK',0,'api')";

$stmt = $pdo->prepare($sql_get);
$stmt->execute([
    'mandant' => 'torautomation24',
    'bestellnr' => $data['purchaseOrderNumber']
]);




if ($stmt->rowCount() > 0) {
    $stmt->closeCursor();
    throw new Exception('Alrady exist in db');
}





$stmt = $pdo->prepare($sql_insert);
foreach ($data["purchaseOrderItems"] as $item) {
    try {
        $stmt->execute([
            'bestellnr' => $data['purchaseOrderNumber'],
            'kundenreferenz' => $data['purchaseOrderNumber'],
            'artikel' => $item['articleNumber'],
            'bestellmenge' => $item['quantity']
        ]);
        echo "success";
    } catch (PDOException $e) {
        var_dump($e->errorInfo . "\n" . $e->getMessage());
    }
}
$stmt->closeCursor();
