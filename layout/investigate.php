<?php
include_once "../config/conn.php";

$pasa_initial = array();
$brand_series_initial = array();


####get all brand_series and bash to pasa extract
$investigate_brand_series = mysqli_query($conn, "SELECT brand_id, brand_name, series FROM brand_series");

while ($row = mysqli_fetch_object($investigate_brand_series)) {
    array_push($brand_series_initial, array($row->brand_id, $row->brand_name, $row->series. '%'));
}

$query_series = "UPDATE sim_reg_extract SET brand = ?, brand_name = ? WHERE min LIKE ?";
$stmt_update = $conn->prepare($query_series);
$stmt_update->bind_param("sss", $brand_id, $brand_name, $series);

foreach($brand_series_initial as $bsi):
        
        $conn->query("START TRANSACTION");
        $brand_id = $bsi[0];
        $brand_name = $bsi[1];
        $series = $bsi[2];
        $stmt_update->execute();
    
endforeach;

$stmt_update->close();
$conn->query("COMMIT");

//------------------------------------------------------------------------------------------------------

####get all pasa extract and bash to min_metadata
$investigate = mysqli_query($conn, "SELECT file_id, min FROM sim_reg_extract");

while ($row = mysqli_fetch_object($investigate)) {
    array_push($pasa_initial, array($row->file_id, $row->min));
}

$stmt = $conn->prepare("SELECT
brand_id, brand_name
FROM
min_metadata
    WHERE
    min = ?");
$stmt->bind_param('s', $min);

$query = "UPDATE sim_reg_extract SET brand = ?, brand_name = ? WHERE file_id = ?";
$stmt_update = $conn2->prepare($query);
$stmt_update->bind_param("sss", $brand, $brand_name, $file_id);

foreach($pasa_initial as $pasa):
    $min = $pasa[1];
    $stmt->execute();

    $stmt->bind_result($col1, $col2);

    while ($stmt->fetch()) {
        $brand_temp = $col1;
        $brand_nm = $col2;
        $sequence_number_temp = $pasa[0];
        
        $conn2->query("START TRANSACTION");
        $brand = $brand_temp;
        $brand_name = $brand_nm;
        $file_id = $sequence_number_temp;
        $stmt_update->execute();
    }
    
endforeach;

$stmt->close();
$conn->query("COMMIT");
$stmt_update->close();
$conn2->query("COMMIT");

echo 'success';
?>