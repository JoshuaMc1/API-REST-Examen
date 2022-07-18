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

    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        if (isset($_GET['id'])) { // request is true
            if (strlen($_GET['id']) > 0) { // if length is greater than zero
                $contact->id = $_GET['id']; // get id from request
                $data = $contact->getSingleContact(); // get data from single contact
                $count = $data->num_rows; // number of contacts
    
                if ($count > 0) { // number of contacts is greater than zero
                    while ($row = $data->fetch_assoc()) { 
                        $information = array(
                            'id'        => $row['id'],
                            'nombre'    => $row['name'],
                            'telefono'  => $row['phone'],
                            'firma'     => base64_encode($row['signature']),
                            'latitude'  => $row['latitude'],
                            'longitude' => $row['longitude']
                        ); // get contacts
                        array_push($response, $information); // add contacts for array
                    }
                    $connection->close(); // close connection
                    http_response_code(200); // server response
                    echo json_encode($response, JSON_UNESCAPED_UNICODE); // all contacts in format JSON
                } else {
                    $connection->close(); // close connection
                    $response = array([
                        "Code" => "204",
                        "Message" => "No query content"
                    ]); // response error
                    echo json_encode($response, JSON_UNESCAPED_UNICODE); // error response in format JSON
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
        } else if (isset($_GET['nombre'])) { // request is true
            if (strlen($_GET['nombre']) > 0) { // if length is greater than zero
                $contact->name = htmlspecialchars(strip_tags($_GET['nombre'])); // get name from request
                $data = $contact->getContactForName(); // get contact data
                $count = $data->num_rows; // number of contacts
    
                if ($count > 0) { // number of contacts is greater than zero
                    while ($row = $data->fetch_assoc()) {
                        $information = array(
                            'id'        => $row['id'],
                            'nombre'    => $row['name'],
                            'telefono'  => $row['phone'],
                            'firma'     => base64_encode($row['signature']),
                            'latitude'  => $row['latitude'],
                            'longitude' => $row['longitude']
                        ); // get contacts
                        array_push($response, $information); // add contacts for array
                    }
                    $connection->close(); // close connection
                    http_response_code(200); // server response
                    echo json_encode($response, JSON_UNESCAPED_UNICODE); // all contacts in format JSON
                } else {
                    $connection->close(); // close connection
                    $response = array([
                        "errorCode" => "204",
                        "errorMessage" => "No query content"
                    ]); // response error
                    echo json_encode($response, JSON_UNESCAPED_UNICODE); // response error in format JSON
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
