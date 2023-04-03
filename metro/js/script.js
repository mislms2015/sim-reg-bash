$('#submitImport').on('click', function() {
    if ($('#multiBrowse').val() == 0) {
        var toast = Metro.toast.create;
        toast("No file to import!", null, 1000, "bg-red fg-white");
        $('#submitImport').prop("disabled", true);
        return false;
    }
});

updateList = () => {
    var checker = 0;
    var input = document.getElementById('multiBrowse');
    var output = document.getElementById('fileList');
    var children = "";

    for (var i = 0; i < input.files.length; ++i) {
        checker++;
        children += '<li>' + input.files.item(i).name + '</li>';
    }
    output.innerHTML = '<ul class="special_bullet">'+children+'</ul>';

    if (checker != 0) {
        $('#submitImport').prop("disabled", false);
    } else {
        $('#submitImport').prop("disabled", true);
    }
}

