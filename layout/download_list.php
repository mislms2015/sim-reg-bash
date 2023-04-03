<?php include_once '../layout/sub-head.php'; ?>
<style>
<?php include_once '../metro/css/style.css'; ?>
</style>
<?php
include_once "./nav.php";
include_once '../config/conn.php';
include_once '../config/__utils.php';

$pasaDate = $_GET['fileDate'];
$pasa_types = array('pasa_data', 'pasa_points', 'pasa_promo', 'pasa_load');
?>

<title>Download: Bashed Brand</title>

<div class="container-fluid">
    <div class="grid">
        <div class="row mt-10">
            <div class="stub">
                <?= nav($conn, 'table', ''); ?>
            </div>
            <div class="cell">
                <?php 
                for($i=0; $i < count($pasa_types); $i++) {
                    if ($pasa_types[$i] == 'pasa_data') $filename_type = 'PASADATA';
                    if ($pasa_types[$i] == 'pasa_points') $filename_type = 'PASAPOINTS';
                    if ($pasa_types[$i] == 'pasa_promo') $filename_type = 'PASAPROMO';
                    if ($pasa_types[$i] == 'pasa_load') $filename_type = 'PASALOAD';
                    $filename = $filename_type.$pasaDate.'.csv';
                ?>
                    <div class='remark info'>
                        <pre class='fg-green'><b><i><a href="./download_csv.php?pasa_type=<?=$pasa_types[$i]?>&file_name=<?=$filename?>"><?=$filename?></pre>
                    </div>
                <?php } ?>
            </div>
            
        </div>
    </div>

</div>

<?php include_once '../layout/sub-footer.php'; ?>
<script src="../metro/js/script.js"></script>