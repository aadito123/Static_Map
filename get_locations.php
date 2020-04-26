<?php
/*
 * Queries database for location data and encodes it in JSON for front-end use.
 * TODO:
 * x test for correct formatting when sending.
 * x test for correct query
 * x implement better handling of exceptions
*/
require 'config.php';

try {
    
    // get database variable from paramaters in configuration file
    $db = new PDO($dsn, $username, $password);

    // modify database error mode attribute to throw exceptions
    $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

    // query location data from database
    $sth = $db->query("SELECT * FROM others");

    // fetch all queried data
    $locations = $sth->fetchAll();

    // encode and output all data as JSON
    echo json_encode( $locations );

} catch (Exception $e) {
    
    // unsuccessful query
    echo $e->getMessage();

}