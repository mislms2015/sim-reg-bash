<?php include_once '../layout/sub-head.php'; ?>
<style>
<?php include_once '../metro/css/style.css'; ?>
</style>
<?php
include_once "./nav.php";
include_once '../config/conn.php';
include_once '../config/__utils.php';

$del_date = '';
$del_type = $_GET['type'];
$file_type = $_GET['file_type'];

if ($del_type == 'date') {
    $del_date = $_GET['date_del'];
}

switch($file_type) {
    case 'brand_series':
        $table = 'brand_series';
        $nav = '';
    break;
    case 'min_metadata':
        $table = 'min_metadata';
        $nav = '';
    break;
    case 'pasa_report':
        $table = 'sim_reg_extract';
        $nav = '';
    break;
    default:
        $table = '';
        $nav = '';
}

function delDate($conn, $type, $date, $table) {
    $query = mysqli_query($conn, "SELECT * FROM file_uploaded WHERE file_type = '$type' AND banner = '$date'");
    $res = mysqli_fetch_object($query);
    $global_id = $res->id;

    mysqli_query($conn, "DELETE FROM `".$table."` WHERE `id` = '$global_id'");
    mysqli_query($conn, "DELETE FROM `file_uploaded` WHERE id = '$global_id'");

    if ($type == 'gigalife') {
        mysqli_query($conn, "DELETE FROM `raw_gigalife_formatted`");
    }

    return true;
}

function delTable($conn, $type, $date, $table) {
    mysqli_query($conn, "TRUNCATE TABLE `".$table."`");
    mysqli_query($conn, "DELETE FROM `file_uploaded` WHERE file_type = '$type'");

    if ($type == 'gigalife') {
        mysqli_query($conn, "TRUNCATE TABLE `raw_gigalife_formatted`");
    }

    return true;
}
?>

<title>Table: Delete Data</title>

<div class="container-fluid">
    <div class="grid">
        <div class="row mt-10">
            <div class="stub">
                <?= nav($conn, $nav, 'active'); ?>
            </div>
            <div class="cell">
                <form action="#" method="post" class="multi-browse pos-top-center">
                    
                    <button type="submit" name="truncateTable" id="truncateTable" class="command-button primary rounded mt-3 size-small submit-import">
                        <span class="mif-checkmark icon"></span>
                        <span class="caption">
                            Yes
                            <small>Truncate Table?</small>
                        </span>
                    </button>


                    <div id="fileList" class="multi-browse pos-top-center"></div>
                
                </form>

                <?php
                if (isset($_POST['truncateTable'])) {
                    if ($del_type == 'date') {
                        delDate($conn, $file_type, $del_date, $table);
                        $msg = 'deleted';
                    } else if ($del_type == 'table') {
                        delTable($conn, $file_type, $del_date, $table);
                        $msg = 'truncated';
                    }
                ?>
                    <div class='remark info'>
                        <pre class='fg-green'><i><?=$table?> - <?=$del_date?></i> successfully <?=$msg?>. </pre>
                    </div>
                <?php } ?>
            </div>
            
        </div>
    </div>

</div>

<?php include_once '../layout/sub-footer.php'; ?>
<script src="../metro/js/script.js"></script>