<?php
class Contact {
    private $connection; // database connection
    private $tableContact = "contacts"; // table contacts
    private $result; // result object
    public $id; // id of contact
    public $name; // name of contact
    public $phone; // phone number of contact
    public $signature; // signature of contacts
    public $latitude; // latitude of contacts
    public $longitude; // longitude of contacts

    //constructor function
    public function __construct($connection) { 
        $this->connection = $connection;
    }

    //get all contacts
    public function getContacts() {
        $sql = "SELECT * FROM ". $this->tableContact; //query for contacts
        $this->result = $this->connection->query($sql); // query the result set
        return $this->result;   // return all contacts
    }

    //get single contact
    public function getSingleContact() {
        $sql = "SELECT * FROM ". $this->tableContact . " WHERE id = '" . $this->id . "'"; // query for single contacts
        $this->result = $this->connection->query($sql); // query the result set
        return $this->result;   // return single contact
    }

    //get contact for name
    public function getContactForName(){
        $sql = "SELECT * FROM ". $this->tableContact . " WHERE name LIKE '%" . $this->name . "%'"; // query for single contacts
        $this->result = $this->connection->query($sql); // query the result set
        return $this->result;   // return contact
    }

    //create new contact
    public function createContact() {
        $this->name      = htmlspecialchars(strip_tags($this->name)); // sanitize name
        $this->phone     = htmlspecialchars(strip_tags($this->phone)); // sanitize phone
        $this->latitude  = htmlspecialchars(strip_tags($this->latitude)); // sanitize latitude
        $this->longitude = htmlspecialchars(strip_tags($this->longitude)); // sanitize longitude
        $signa = $this->convertToBase64(); // convertToBase64

        $sql = "INSERT INTO ". $this->tableContact . " (name, phone, signature, latitude, longitude) VALUES('" . $this->name . 
        "', '" . $this->phone . "', '" . $signa . "', '" . $this->latitude . "', '" . $this->longitude . "')"; 
        $this->connection->query($sql); // execute query

        return $this->connection->affected_rows > 0 ? true : false;
    }

    //update single contact
    public function updateContact(){
        $this->id        = htmlspecialchars(strip_tags($this->id)); // sanitize id
        $this->name      = htmlspecialchars(strip_tags($this->name)); // sanitize name
        $this->phone     = htmlspecialchars(strip_tags($this->phone)); // sanitize phone
        $this->latitude  = htmlspecialchars(strip_tags($this->latitude)); // sanitize latitude
        $this->longitude = htmlspecialchars(strip_tags($this->longitude)); // sanitize longitude
        if($this->signature != NULL){ // if signature is exist and not null
            return $this->updateSignature(); // update signature
        } else { // if the signature does not exist and is null
            $sql = "UPDATE " . $this->tableContact . " SET name = '" . $this->name . "', phone = '" . $this->phone . 
            "', latitude = '" . $this->latitude . "', longitude = '" . $this->longitude . "' WHERE id = '" . $this->id . "'"; // query update
            return $this->connection->query($sql); // return if the statement succeeds true or if it doesn't succeed false
        }
    }

    //remove single contact
    public function deleteContact(){
        $this->id = htmlspecialchars(strip_tags($this->id)); // sanitize id
        $sql = "DELETE FROM " . $this->tableContact . " WHERE id = '" . $this->id . "'"; // query for delete single contact
        return $this->connection->query($sql) ? true : false; // return if the statement succeeds
    }

    //update signature for single contact
    public function updateSignature(){ 
        $sql = "UPDATE " . $this->tableContact . " SET name = '" . $this->name . "', phone = '" . $this->phone . 
        "', signature = '" . $this->signature . "', latitude = '" . $this->latitude . "', longitude = '" . $this->longitude . 
        "' WHERE id = '" . $this->id . "'"; // query update
        $this->connection->query($sql); // update contact information
        return $this->connection->affected_rows > 0 ? true : false; // return false if contact information is not updated
    }

    //convertToBase64 signature
    public function convertToBase64(){
        return base64_encode($this->signature); // convertToBase64
    }
}