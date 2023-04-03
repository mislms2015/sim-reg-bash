<?php
include_once './layout/head.php';
include_once './config/__utils.php';
include_once './config/conn.php';
?>
<script>
function runToast(msg, indicator) {
    var toast = Metro.toast.create;
    toast(msg, null, 10000, indicator);
}
</script>
<title>Sim Reg</title>

    <div class="container-fluid start-screen h-100" id="mainContainer">
        <h1 class="start-screen-title">Sim Reg <i style="font-size: 22px;">(Extract v1.0)</i></h1>
        
        <span class="mif-spinner ani-spin mif-5x fg-teal" id="spinner"></span>

        <div class="tiles-area clear">
            <!-- Brand Series: START -->
            <div class="tiles-grid tiles-group size-2 fg-white" data-group-title="Brand Series">
                <a href="./layout/import.php?ref=brand_series" data-role="tile" data-cover="./images/brand_series.jpg" data-size="wide">
                </a>
                <?php
                $brand_series_counter = 0;
                $brand_series_list = mysqli_query($conn, "SELECT * FROM file_uploaded WHERE file_type = 'brand_series' ORDER BY banner ASC");
                while ($row_brand_series = mysqli_fetch_object($brand_series_list)) {
                    $brand_series_counter++;
                ?>
                    <a href="./layout/table.php?file_type=brand_series&type=date&date_del=<?=$row_brand_series->banner?>" data-role="tile" class="bg-green fg-white">
                        <span class="mif-calendar icon"></span>
                        <span class="branding-bar pt-1">Delete</span>
                        <span class="badge-bottom"><?=$row_brand_series->banner?></span>
                    </a>
                <?php } if ($brand_series_counter > 0) { ?>
                    <a href="./layout/table.php?file_type=brand_series&type=table" data-role="tile" class="bg-red fg-white">
                        <span class="mif-database icon"></span>
                        <span class="branding-bar pt-1">Truncate</span>
                        <span class="badge-bottom"><?=$brand_series_counter. ' log(s)'?></span>
                    </a>
                <?php } ?>
            </div>
            <!-- Brand Series: END -->

            <!-- Min Metadata: START -->
            <div class="tiles-grid tiles-group size-2 fg-white" data-group-title="Min Metadata">
                <a href="./layout/import.php?ref=min_metadata" data-role="tile" data-cover="./images/min_metadata.jpg" data-size="wide">
                </a>
                <?php
                $min_metadata_counter = 0;
                $min_metadata_list = mysqli_query($conn, "SELECT * FROM file_uploaded WHERE file_type = 'min_metadata' ORDER BY banner ASC");
                while ($row_min_metadata = mysqli_fetch_object($min_metadata_list)) {
                    $min_metadata_counter++;
                ?>
                    <a href="./layout/table.php?file_type=min_metadata&type=date&date_del=<?=$row_min_metadata->banner?>" data-role="tile" class="bg-teal fg-white">
                        <span class="mif-calendar icon"></span>
                        <span class="branding-bar pt-1">Delete</span>
                        <span class="badge-bottom"><?=$row_min_metadata->banner?></span>
                    </a>
                <?php } if ($min_metadata_counter > 0) { ?>
                    <a href="./layout/table.php?file_type=min_metadata&type=table" data-role="tile" class="bg-red fg-white">
                        <span class="mif-database icon"></span>
                        <span class="branding-bar pt-1">Truncate</span>
                        <span class="badge-bottom"><?=$min_metadata_counter. ' log(s)'?></span>
                    </a>
                <?php } ?>
            </div>
            <!-- Min Metadata: END -->

            <!-- Sim Reg Extract: START -->
            <div class="tiles-grid tiles-group size-2 fg-white" data-group-title="Sim Reg Extract">
                <a href="./layout/import.php?ref=pasa_report" data-role="tile" data-cover="./images/pasa_report.jpg" data-size="wide">
                </a>
                <?php
                $pasa_report_counter = 0;
                $pasa_report_list = mysqli_query($conn, "SELECT * FROM file_uploaded WHERE file_type = 'pasa_report' ORDER BY banner ASC");
                while ($row_pasa_report = mysqli_fetch_object($pasa_report_list)) {
                    $pasa_report_counter++;
                ?>
                    <a href="./layout/table.php?file_type=pasa_report&type=date&date_del=<?=$row_pasa_report->banner?>" data-role="tile" class="bg-violet fg-white">
                        <span class="mif-calendar icon"></span>
                        <span class="branding-bar pt-1">Delete</span>
                        <span class="badge-bottom"><?=$row_pasa_report->banner?></span>
                    </a>
                <?php } if ($pasa_report_counter > 0) { ?>
                    <a href="./layout/table.php?file_type=pasa_report&type=table" data-role="tile" class="bg-red fg-white">
                        <span class="mif-database icon"></span>
                        <span class="branding-bar pt-1">Truncate</span>
                        <span class="badge-bottom"><?=$pasa_report_counter. ' log(s)'?></span>
                    </a>
                <?php } ?>
            </div>
            <!-- Sim Reg Extract: END -->

            <!-- DATABASE SETTINGS: START -->
            <div class="tiles-grid tiles-group size-1 fg-white" data-group-title="Settings">
                <div id="investigate" data-role="tile" data-size="small" class="bg-teal">
                    <img src="./images/magnifying.png" class="icon" <?=popOver('Bash Brand')?>>
                </div>
                <!-- <div id="investigate_postman" data-role="tile" data-size="small" class="bg-violet">
                    <img src="./images/postman.png" class="icon" <?=popOver('Bash Brand Postman')?>>
                </div> -->
                <a href="./layout/download.php" data-role="tile" data-size="small" class="bg-blue">
                    <img src="./images/download.png" class="icon" <?=popOver('Download Bashed Data')?>>
                </a>
                <a href="./layout/truncate.php" data-role="tile" data-size="small" class="bg-black">
                    <img src="./images/truncate.png" class="icon" <?=popOver('Truncate Tables')?>>
                </a>
            </div>
            <!-- DATABASE SETTINGS: END -->

            <audio id='success'>
                <source src='./asset/sound/chime.mp3'>
            </audio>
        </div>

    </div>

<?php include_once './layout/footer.php'; ?>

<script>
    $(document).ready(function() {
        const audio = new Audio("./asset/sound/chime.mp3" );

        //investigate variance ajax
        $("#investigate").click(function() {
            $('#spinner').css('visibility','visible');
            $('#mainContainer').attr('disabled', true);
            
            $.ajax({
                method: "GET",
                url: "./layout/investigate.php"
            }).then(
                function(response){ //success
                    if (response == 'success'){
                        $('#spinner').css('visibility','hidden');
                        $('#mainContainer').removeAttr("disabled");
                        audio.play();
                        runToast("Bashing of brand successful!", "bg-green fg-white");
                    } else {
                        console.log('fail');
                    }
                },
                function(xhr){console.log('error')} // error
            );
        });

        $("#investigate_postman").click(function() {
            $('#spinner').css('visibility','visible');
            $('#mainContainer').attr('disabled', true);
            
            $.ajax({
                method: "GET",
                url: "./layout/investigate_postman.php"
            }).then(
                function(response){ //success
                    if (response == 'success'){
                        $('#spinner').css('visibility','hidden');
                        $('#mainContainer').removeAttr("disabled");
                        audio.play();
                        runToast("Bashing of brand successful!", "bg-green fg-white");
                    } else {
                        console.log('fail');
                    }
                },
                function(xhr){console.log('error')} // error
            );
        });

    });
    
</script>