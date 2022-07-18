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
    $response = array(); // response

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['id'], $_POST['nombre'], $_POST['telefono'], $_POST['firma'],
        $_POST['latitude'], $_POST['longitude'])) { // if request is valid POST
            if (strlen($_POST['id']) > 0 && strlen($_POST['nombre']) > 0 && strlen($_POST['telefono']) > 0 && 
            strlen($_POST['longitude']) > 0 && strlen($_POST['latitude']) > 0){ // if length is greater than zero
                $contact->id        = $_POST['id'];
                $contact->name      = $_POST['nombre'];
                $contact->phone     = $_POST['telefono'];
                $contact->latitude  = $_POST['latitude'];
                $contact->longitude = $_POST['longitude'];
                
                if(strlen($_POST['firma']) > 0) $contact->signature = $_POST['firma']; // if length is greater than zero
                else $contact->signature = NULL; // if not the signature field is equal to null
                if($contact->updateContact()) { // if update if successful
                    $responce = array([
                        'Code: ' => '201',
                        'Message: ' => 'Contact updated successfully.'
                    ]); // response message
                    $database->closeConnection(); // close connection
                    http_response_code(201); // server response
                    echo json_encode($responce, JSON_UNESCAPED_UNICODE); // encoding response in format JSON
                } else { // if update is not successfully
                    $database->closeConnection(); // close connection
                    $responce = array([
                        'Code: ' => '404',
                        'Message: ' => 'An error has occurred, the contact has not been updated.'
                    ]); // response error
                    http_response_code(404); // server response
                    echo json_encode($responce, JSON_UNESCAPED_UNICODE); // responce error in format JSON
                }
            } else { 
                $database->closeConnection(); // close connection
                $responce = array([
                    'Code:' => '404',
                    'Message: ' => 'There are one or more required fields that are empty.'
                ]); // response error
                http_response_code(404); // server response
                echo json_encode($responce, JSON_UNESCAPED_UNICODE); // responce error in format JSON
            }
        } else {
            $database->closeConnection(); // close connection
            $responce = array([
                'Code:' => '404',
                'Message: ' => 'An error has occurred, the mandatory fields are required.'
            ]); // response error 
            http_response_code(404); // server response
            echo json_encode($responce, JSON_UNESCAPED_UNICODE); // responce error in format JSON
        }
    } else {
        $connection->close(); // close connection
        $response = array([
            "Code" => "404",
            "Message" => "Invalid request method."
        ]); // response error
        echo json_encode($response, JSON_UNESCAPED_UNICODE); // response error in format JSON
        http_response_code(404); // server response
    }
} catch (\Exception $e) {
    echo json_encode(["Error: " => $e->getMessage()]); // response error
}
