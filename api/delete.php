<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

try {
    require_once "../database.php"; // Database 
    require_once "../contact.php"; // Contact
    $database = new Database(); // object database
    $connection = $database->getConnection(); // database connection
    $contact = new Contact($connection); // object contact
    $response = array(); // response array

    if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
        if (isset($_GET['id'])) {
            if (strlen($_GET['id']) > 0) { // if length is greater than zero
                $contact->id = $_GET['id']; // assign id to contact
                if ($contact->deleteContact()) { // if delete is successful
                    $responce = array([
                        "Code:" => "200",
                        "Message:" => "Contact deleted successfully."
                    ]); // response message
                    $database->closeConnection(); // close connection
                    http_response_code(200); // server response
                    echo json_encode($responce, JSON_UNESCAPED_UNICODE); // responce error in format JSON
                } else { // if deleted is not successfully
                    $database->closeConnection(); // close connection
                    $responce = array([
                        'Code:' => '404',
                        'Message: ' => 'An error has occurred, the contact has not been deleted.'
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
                echo json_encode($responce, JSON_UNESCAPED_UNICODE); // error response in format JSON
            }
        } else {
            $database->closeConnection(); // close connection
            $responce = array([
                'Code:' => '404',
                'Message: ' => 'The search key is required.'
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
    exit();
}
