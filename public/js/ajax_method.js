$(document).ready(function() {
    $('#qrcode_type').on('change', function() {
        var qrcode_type = $('#qrcode_type').val()
        console.log(qrcode_type);
        if(qrcode_type == 'Resturant and Bars') {
            $('#template').append(`
                <div class="d-flex"> 
                <img src="/template/res_temp.jpg" alt="res_contactless_menu" class="w-50 img-fluid me-3 res-img selected">
                <img src="/template/res_temp2.jpg" alt="res_social_media" class="w-50 img-fluid res-img">
                </div> 
            `)
        } else {
            console.log('not match ')
        }
        getPreviewTemplate('res_contactless_menu')
        selectedImage()
    });

    function selectedImage() {
        $('.res-img').on('click', function() {
            $(".res-img").not(this).removeClass("selected");
            $(this).addClass('selected');
            var alt = $(this).attr("alt");
            getPreviewTemplate(alt)
            getTempate(alt)
        })
    }

    function getPreviewTemplate(name) {
        $.ajax({
            url : `/get_preview_template/${name}`,
            method : 'GET',
            success : function(data) {
                $('.preview_template').html(data)
            },
            error : function(e) {
                console.log(e)
            }
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

})

function templateSubmit(event) {
    event.preventDefault()
    var form = document.querySelector('form')
    var formdata = new FormData(form);
    console.log(formdata)
}