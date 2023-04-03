<?php
include_once '../layout/sub-head.php';
include_once '../config/import_template.php';
include_once '../config/conn.php';

$reference = $_GET['ref'];

if ($reference == 'brand_series') {
    echo import($conn, 'Brand Series', 'import_brand_series', 'import_brand_series_query.php', 'Import Brand Series.', 'active');
} else if ($reference == 'min_metadata') {
    echo import($conn, 'Min Metadata', 'import_min_metadata', 'import_min_metadata_query.php', 'Import Min Metadata.', 'active');
} else if ($reference == 'pasa_report') {
    echo import($conn, 'Pasa Report', 'import_pasa_report', 'import_pasa_report_query.php', 'Import Pasa Report.', 'active');
} else {
    header('Location: ./error.php');
}

include_once '../layout/sub-footer.php'; ?>
<script src="../metro/js/script.js"></script>