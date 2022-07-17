<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

try {
    require_once "../database.php"; // Database
    require_once "../contact.php"; // Contacts
    $database = new Database(); // object database
    $connection = $database->getConnection(); // database connection
    $contact = new Contact($connection); // object contact
    $response = array(); // response array

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['nombre'], $_POST['telefono'], $_POST['firma'],
            $_POST['latitude'], $_POST['longitude'])) { // if request is valid POST
            if (strlen($_POST['nombre']) > 0 && strlen($_POST['telefono']) > 0 &&
                strlen($_POST['firma']) > 0 && strlen($_POST['latitude']) > 0 && strlen($_POST['longitude']) > 0) { // if length is greater than zero
                $contact->name      = $_POST['nombre'];
                $contact->phone     = $_POST['telefono'];
                $contact->signature = $_POST['firma'];
                $contact->latitude  = $_POST['latitude'];
                $contact->longitude = $_POST['longitude'];
                if ($contact->createContact()) { // if response is true
                    $responce = array([
                        'Code: ' => '201',
                        'Message: ' => 'Contact created successfully.'
                    ]); // response message
                    $database->closeConnection(); // close connection
                    http_response_code(201); // server response
                    echo json_encode($responce, JSON_UNESCAPED_UNICODE); // responce error in format JSON
                } else {
                    $database->closeConnection(); // close connection
                    $responce = array([
                        'Code: ' => '404',
                        'Message: ' => 'An error has occurred, the contact has not been created.'
                    ]); // response error
                    http_response_code(404); // server response
                    echo json_encode($responce, JSON_UNESCAPED_UNICODE); // responce error in format JSON
                }
            } else {
                $database->closeConnection(); // close connection
                $responce = array([
                    'Error code:' => '404',
                    'Message: ' => 'There are one or more required fields that are empty.'
                ]); // response error
                http_response_code(404); // server response
                echo json_encode($responce, JSON_UNESCAPED_UNICODE); // responce error in format JSON
            }
        } else {
            $database->closeConnection(); // close connection
            $responce = array([
                'Error code:' => '404',
                'Message: ' => 'An error has occurred, the mandatory fields are required.'
            ]); // response error 
            http_response_code(404); // server response
            echo json_encode($responce, JSON_UNESCAPED_UNICODE); // responce error in format JSON
        }
    } else {
        $connection->close(); // close connection
        $response = array([
            "errorCode" => "404",
            "errorMessage" => "Invalid request method."
        ]); // response error
        echo json_encode($response, JSON_UNESCAPED_UNICODE); // response error in format JSON
        http_response_code(404); // server response
    }
} catch (\Exception $e) {
    echo json_encode(["Error: " => $e->getMessage()]); // response error
}
