<?php include_once '../layout/sub-head.php'; ?>
<style>
<?php include_once '../metro/css/style.css'; ?>
</style>
<?php
include_once "./nav.php";
include_once '../config/conn.php';
include_once '../config/__utils.php';

$table_list = array('file_uploaded', 'brand_series', 'min_metadata', 'pasa_extract', 'sim_reg_extract');
?>

<title>Table: Truncate</title>

<div class="container-fluid">
    <div class="grid">
        <div class="row mt-10">
            <div class="stub">
                <?= nav($conn, 'table', ''); ?>
            </div>
            <div class="cell">
                <form action="#" method="post" class="multi-browse pos-top-center">
                
                    <button type="submit" name="truncateTable" id="truncateTable" class="command-button primary rounded mt-3 size-small submit-import">
                        <span class="mif-checkmark icon"></span>
                        <span class="caption">
                            Yes
                            <small>Truncate Tables?</small>
                        </span>
                    </button>


                    <div id="fileList" class="multi-browse pos-top-center"></div>
                
                </form>
                <?php
                if (isset($_POST['truncateTable'])) {
                    $count = 0;
                    for ($i = 0; $i < count($table_list); $i++) {
                        $table = $table_list[$i];
                        $query = "TRUNCATE TABLE $table";
                    
                        // if (mysqli_multi_query($conn, $query)) {
                        //     echo "Truncated Successfully";
                        // } else {
                        // echo "Error:" . mysqli_error($conn);
                        // }
                    
                        if (mysqli_query($conn, $query)) {
                            echo "
                                <div class='remark info'>
                                    <pre class='fg-green'><i>$table_list[$i]</i> successfully truncated.</pre>
                                </div>
                            ";
                        } else {
                            echo "
                                <div class='remark warning'>
                                    <pre class='fg-red'><i>$table_list[$i]</i> truncate failed.</pre>
                                </div>
                            ";
                        }

                        $count++;
                    
                        //close the connection
                        //mysqli_close($conn);
                    }

                    if (count($table_list) == $count) {
                        $files_gigalife = glob('../storage/gigalife/*.xlsx'); // get all file names
                        foreach($files_gigalife as $file) { // iterate files
                            if(is_file($file)) {
                                unlink($file); // delete file
                            }
                        }

                        $files_gigalife_validated = glob('../storage/gigalife-validated/*.xlsx'); // get all file names
                        foreach($files_gigalife_validated as $file) { // iterate files
                            if(is_file($file)) {
                                unlink($file); // delete file
                            }
                        }
                    }
                }
                ?>
            </div>
            
        </div>
    </div>

</div>

<?php include_once '../layout/sub-footer.php'; ?>
<script src="../metro/js/script.js"></script>