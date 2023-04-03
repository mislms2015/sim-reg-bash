<?php
// this method is to display popover
function popOver($description) {
    return "data-role='popover' data-popover-text='$description' data-popover-hide='1500'";
}

// this method is to validate filemimes type
function fileMimes() {
    return array(
        'text/x-comma-separated-values',
        'text/comma-separated-values',
        'application/octet-stream',
        'application/vnd.ms-excel',
        'application/x-csv',
        'text/x-csv',
        'text/csv',
        'application/csv',
        'application/excel',
        'application/vnd.msexcel',
        'text/plain',
        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
    );
}

// this is a specific declaration of filemimes for excel
function fileMimesExcel() {
    return array(
        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
    );
}

// this method is a header validation for brand series
function checkHeaderBrandSeries() {
    return array('_id', 'brand_description', 'brand_id', 'brand_name', 'creation_timestamp', 'is_active', 'last_update_timestamp', 'series');
}

// this method is a header validation for min metadata
function checkHeaderMinMetadata() {
    return array('_id', 'brand_description', 'brand_id', 'brand_name', 'creation_timestamp', 'is_active', 'last_update_timestamp', 'min');
}

// this method is a header validation for pasa report
function checkHeaderPasaReport() {
    return array('id', 'number', 'control_number', 'status', 'simreg_token', 'created_at', 'updated_at');
}


?>