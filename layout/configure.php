<?php
include_once '../layout/sub-head.php';
include_once "./nav.php";

/**
 * view file when configuring database and tables
 */

?>
<script>
// toaster for pop-up notification
function runToast(msg, indicator) {
    var toast = Metro.toast.create;
    toast(msg, null, 1500, indicator);
}
</script>
<title>Configure Database</title>

<div class="container-fluid">
    <div class="grid">
        <div class="row mt-10" id="mainContainer">
            
            <span class="mif-spinner ani-spin mif-5x fg-teal" id="spinner" style="font-size: 45px;"></span>

            <div class="cell pos-fixed pos-center">
                <button class="command-button success outline rounded" id="create-db">
                    <span class="mif-database icon"></span>
                    <span class="caption">
                        Create Database
                        <small>Click to create database.</small>
                    </span>
                </button>
                &nbsp;&nbsp;&nbsp;
                <button class="command-button warning outline rounded create-table" id="create-table" style="display: none;">
                    <span class="mif-table icon"></span>
                    <span class="caption">
                        Create Table
                        <small>Click to generate database table.</small>
                    </span>
                </button>
            </div>
            
        </div>
    </div>

</div>

<?php include_once '../layout/sub-footer.php'; ?>
<script src="../metro/js/script.js"></script>

<script>
    $(document).ready(function() {
        //create database ajax
        $("#create-db").click(function() {
            $('#spinner').css('visibility','visible');
            $('#mainContainer').attr('disabled', true);
            
            $.ajax({
                method: "GET",
                url: "./config_database.php",
                dataType: "JSON"
            }).then(
                function(response){ //success
                    // var parsed_data = JSON.parse(response);

                    if (response.res == 'success'){
                        $('#spinner').css('visibility','hidden');
                        $('#create-table').css('display','inline-flex');
                        $('#mainContainer').removeAttr("disabled");
                        runToast(response.msg, "bg-" + response.msg_clr + " fg-white");
                    } else {
                        console.log(response.msg);
                    }
                },
                function(xhr){console.log('error')} // error
            );
        });

        //generate table ajax
        $("#create-table").click(function() {
            $('#spinner').css('visibility','visible');
            $('#mainContainer').attr('disabled', true);
            
            $.ajax({
                method: "GET",
                url: "./config_table.php",
                dataType: "JSON"
            }).then(
                function(response){ //success
                    // var parsed_data = JSON.parse(response);

                    if (response.res == 'success'){
                        $('#spinner').css('visibility','hidden');
                        $('#create-table').css('display','inline-flex');
                        $('#mainContainer').removeAttr("disabled");
                        runToast("Table successfully generated.", "bg-" + response.msg_clr + " fg-white");
                        window.setTimeout(function() {
                            window.location.href = response.rdrct;
                        }, 1500);
                    } else {
                        console.log(response.msg);
                    }
                },
                function(xhr){console.log('error')} // error
            );
        });
    });
    
</script>