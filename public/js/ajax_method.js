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
    });

    $('.box').on('click', function() {
            $('.box').removeClass('selected'); // Remove 'selected' class from all boxes
            $(this).addClass('selected'); // Add 'selected' class to the clicked box
            var selectedItemValue = $(this).find('p').text();
            console.log(selectedItemValue)
            $('#next').on('click', function() {
     })
    });
})