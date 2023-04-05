$(document).ready(function() {
    $('#qrcode_type').on('change', function() {
        var qrcode_type = $('#qrcode_type').val()
        $.ajax({
            url : "/qr/getTemplate",
            method : 'GET',
            data : {type : qrcode_type},
            success : function(data) {
                $('#template').html(data)
            },
            error : function(e) {
                console.log(e)
            }
        })
    })
})