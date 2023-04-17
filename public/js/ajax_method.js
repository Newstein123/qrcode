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
        console.log(image_name)
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

    var code_color = $('#qrcode_color').val()
    var eye = $('#qreye_style_input').val()
    var code_bg_color = $('#qrcode_bg_color').val() 

    $('.qr-style').on('click', function() {
        $('.qr-style').not(this).removeClass('selected');
        $(this).addClass('selected');
        var qr_style = $(this).attr('alt');
        $('#qr_style_input').val(qr_style)
        changeQrStyle(eye, qr_style, code_color, code_bg_color)     
    })

    $('#qrstyle_moreoption').on('click', function() {
        $('.qr_main_design').hide();
        $('.qrstyle_option').show();   
        var qr_style_input = $('#qr_style_input').val()

        $('img').each(function() {
        var altValue = $(this).attr('alt');        
        if (altValue == qr_style_input) {
            $(this).addClass('selected');
        } else {
            $(this).removeClass('selected');
        }
        $('.qr-eye-style').on('click', function() {
            $('qr-eye-style').not(this).removeClass('selected')
            $(this).addClass('selected')
            var qr_eye_style = $(this).attr('alt');
            $('#qreye_style_input').val(qr_eye_style)
            changeQrStyle(qr_eye_style, qr_style_input, code_color, code_bg_color)
        })

        $('#qrcode_color').on('change', function() {
            var code_color = $(this).val()
            changeQrStyle(eye, qr_style_input, code_color, code_bg_color)
        })


        $('#qrcode_bg_color').on('change', function() {
            var code_bg_color = $(this).val();
            changeQrStyle(eye, qr_style_input, code_color, code_bg_color)
        })
        });

    })

    $('#qr_logo_upload').on('submit', function(e) {
        e.preventDefault()
        var formData = new FormData(this);
        $.ajax({
            url : '/get_qr_design',
            method : 'GET',
            data : formData,
            success : function(data) {
                // console.log(data)
                $('#loading').hide()
                $('.qr-design').html(data)
            },
            error : function(e) {
                console.log(e)
            }
        })
    })
      
    function changeQrStyle( eye, style, code_color, code_bg_color) {
        $('#loading').show()
        $.ajax({
            url : '/get_qr_design',
            method : 'GET',
            data : {eye : eye, style : style, code_color : code_color, code_bg_color : code_bg_color},
            success : function(data) {
                $('#loading').hide()
                $('.qr-design').html(data)
            },
            error : function(e) {
                console.log(e)
            }
        })
    }

    $('#goBackToMainDesign').on('click', function() {
        $('.qrstyle_option').hide();
        $('.qr_main_design').show();
    })

})






