<?php

require 'C:\\xampp\\htdocs\\api\\db_conect.php';

$conn = Conection::create_conection('localhost', 'root', '12022008', 'api-json-real');


header('Content-Type: application/json');

$input = file_get_contents('php://input');
$data = json_decode($input, true);
if (json_last_error() !== JSON_ERROR_NONE) {
    echo json_encode(['error' => 'Invalid JSON']);
    http_response_code(400); // Error code 400 Bad Request
    exit;
}

// Prepare SQL statement
$stmt = $conn->prepare("INSERT INTO tblweavis (
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
shop) VALUES ('WEA', 'torautomation24','torautomation24','WESTD',?,?,'torautomation24',null,'Hüttenstr. 100-102','DE','50170','Kerpen',?,?,'STK',0,'api')");

if ($stmt === false) {
    echo json_encode(['error' => 'Statement preparation error']);
    http_response_code(500); // Internal server error
    exit;
}

foreach ($data["purchaseOrderItems"] as $item) {
    $stmt->bind_param("sssi", $data['purchaseOrderNumber'], $data['purchaseOrderNumber'], $item['articleNumber'], $item['quantity']);
    $stmt->execute();
}






$stmt->close();
$conn->close();
