<?php
include_once "../config/env.php";

/**
 * after creating of database, creating table is mandatory in order to start the application
 */

$sql = file_get_contents('../__DB/sim_reg.sql');

$mysqli = new mysqli($servername, $username, $password, $database);

$check_table = mysqli_query($mysqli, "SELECT * FROM brand_series");

if ($check_table) {
    $msg = "Error creating table: Can't create tables; table exists";
    $msg_clr = "red";
} else {
    /* execute multi query */
    $mysqli->multi_query($sql);
    $msg = 'Table successfully created!';
    $msg_clr = "green";
}


echo json_encode(
    array(
        "res" => "success",
        "rdrct" => "../index.php",
        "msg" => $msg,
        "msg_clr" => $msg_clr
        )
);
?>