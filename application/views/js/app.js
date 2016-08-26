jQuery(document).ready(function($) {

    $('#sortName').click(function () {
        var url = "index_desc";
        $.post( url,
            function (result) {

                if (result.type == 'error') {
                    alert('error');
                    return(false);
                }
            });
    })
});
