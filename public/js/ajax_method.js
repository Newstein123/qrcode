$(document).ready(function() {
    $('#qrcode_type').on('change', function() {
        var qrcode_type = $('#qrcode_type').val()
        console.log(qrcode_type);
        if(qrcode_type == 'Resturant and Bars') {
            $('#template').append(`
                <div class="d-flex"> 
                <img src="/template/res_temp.jpg" alt="res_contactless_menu" class="w-25 img-fluid me-3 res-img">
                <img src="/template/res_temp2.jpg" alt="res_social_media" class="w-25 img-fluid res-img">
                </div> 
            `)
        } else {
            console.log('not match ')
        }
        selectedImage()
    });

    function selectedImage() {
        $('.res-img').on('click', function() {
            $(".res-img").not(this).removeClass("selected");
            $(this).addClass('selected');
            var alt = $(this).attr("alt");
            $('#next').prop("disabled", false);
            getTempate(alt)
        })
    }

    function getTempate(image_name) {
        $('#next').on('click', function() {
            $.ajax({
                url : "/qr/getTemplate",
                method : 'GET',
                data : {image_name : image_name},
                success : function(data)  {
                    $('#main_box').hide()
                    $('#template_box').html(data)
                },
                error : function(e) {
                    console.log(e)
                }
            })
        })
    }


    $('.box').on('click', function() {
            $('.box').removeClass('selected'); // Remove 'selected' class from all boxes
            $(this).addClass('selected'); // Add 'selected' class to the clicked box
            var selectedItemValue = $(this).find('p').text();
            console.log(selectedItemValue)
            $('#next').on('click', function() {
     })
    });
})

function templateSubmit(event) {
    event.preventDefault()
    var form = document.querySelector('form')
    var formdata = new FormData(form);
    console.log(formdata)
}