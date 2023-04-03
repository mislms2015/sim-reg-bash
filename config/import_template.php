<?php
include_once "./nav.php";


/**
 * this method is a template for importing files
 * creating this method is to apply DRY
 */
function import($conn, $title, $page, $description, $button, $state) {
    return "
        <title>Import $title</title>

        <div class='container-fluid'>
            <div class='grid'>
                <div class='row mt-10'>
                    <div class='stub'> ".
                        nav($conn, $page, $state)
                    ."</div>

                    <div class='cell'>
                        <form action='$description' method='post' enctype='multipart/form-data' class='multi-browse pos-top-center'>
                            <input type='file' data-role='file' data-mode='drop' multiple data-cls-caption='fg-black' id='multiBrowse' name='file[]' onchange='javascript:updateList()'>
                        
                            <button type='submit' name='submit' id='submitImport' class='command-button primary rounded mt-3 size-small submit-import' disabled='disabled'>
                                <span class='mif-checkmark icon'></span>
                                <span class='caption'>
                                    Yes
                                    <small>$button</small>
                                </span>
                            </button>

                            <div id='fileList' class='multi-browse pos-top-center'></div>
                        
                        </form>

                    </div>
                    
                </div>
            </div>

        </div>
    ";
}

?>