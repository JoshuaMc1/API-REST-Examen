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

    $data = $contact->getContacts(); // array of contacts
    $count = $data->num_rows; // number of contacts
    $response = array(); // response

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
        echo json_encode($response, JSON_UNESCAPED_UNICODE); // response error in format JSON
    }
} catch (\Exception $e) {
    echo json_encode(["Error: " => $e->getMessage()]); // response error
    exit();
}
