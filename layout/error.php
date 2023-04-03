<?php include_once '../layout/sub-head.php'; ?>
<style>
<?php include '../metro/css/style.css'; ?>
</style>
<?php include_once "./nav.php"; ?>

<!--
    404 page display
-->

<title>Error: Page Not Found!</title>

<div class="container-fluid">
    <div class="grid">
        <div class="row mt-10">
            <div class="stub">
                <?= nav('err'); ?>
            </div>

            <div class="cell">
                <div data-role="activity" data-type="square" data-style="color" class="pos-top-center"></div>
                <div class="remark danger">
                    <pre class=""><code class="hljs xml err-font">Page Not Found!</code></pre>
                </div>
            </div>
            
        </div>
    </div>

</div>

<?php include_once '../layout/sub-footer.php'; ?>
<script src="../metro/js/script.js"></script>