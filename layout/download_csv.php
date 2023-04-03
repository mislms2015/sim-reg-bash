<?php
include_once "../config/conn.php";

$filename = 'Sim Reg.csv';
$query = mysqli_query($conn, "SELECT * FROM sim_reg_extract"); 

if($query->num_rows > 0){ 
    $delimiter = ","; 
    
    // Create a file pointer 
    $f = fopen('php://memory', 'w'); 
    // Set column headers 
    $fields = array('id', 'number', 'brand', 'brand_name', 'control_number', 'status', 'simreg_token', 'created_at', 'updated_at'); 
    fputcsv($f, $fields, $delimiter); 
    
    // Output each row of the data, format line as csv and write to file pointer 
    while($row = $query->fetch_assoc()){

        $lineData = array($row['file_id'], $row['min'], $row['brand'], $row['brand_name'], $row['control_number'], $row['status'], $row['simreg_token'], $row['created_at'], $row['updated_at']);

        fputcsv($f, $lineData, $delimiter);
    }
    
    // Move back to beginning of file 
    fseek($f, 0);
    
    // Set headers to download file rather than displayed 
    header('Content-Type: text/csv'); 
    header('Content-Disposition: attachment; filename="' . $filename . '";'); 
    
    //output all remaining data on a file pointer 
    fpassthru($f);
    
} 
exit;


?>