

$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
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

    $('.qr-style').on('click', function() {
        $('.qr-style').not(this).removeClass('selected');
        $(this).addClass('selected');
        var qr_style = $(this).attr('alt');
        $('#qr_style_input').val(qr_style)
        changeQrStyle()   
    })

    $('#qrstyle_moreoption').on('click', function() {
        $('.qr_main_design').hide();
        $('.qrstyle_option').show();   
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
            var [style, code_color, code_bg_color, eye, image] = getQrOptionValue();
            changeQrStyle(eye, style, code_color, code_bg_color, image)
        })

        $('#qrcode_color').on('change', function() {
            var [style, code_color, code_bg_color, eye, image] = getQrOptionValue();
            changeQrStyle(eye, style, code_color, code_bg_color, image)
        })

        $('#qrcode_bg_color').on('change', function() {
            var [style, code_color, code_bg_color, eye, image] = getQrOptionValue();
            changeQrStyle(eye, style, code_color, code_bg_color, image)
        })
        });

    })

    function getQrOptionValue() {
        var style = $('#qr_style_input').val()
        var code_color = $('#qrcode_color').val()
        var code_bg_color = $('#qrcode_bg_color').val() 
        var eye = $('#qreye_style_input').val()
        var image = $('#imageInput').prop('files')[0]
        var frame = $('#qr_frame_input').val()
        var formData = new FormData();
        formData.append('image', image);
        formData.append('code_color', code_color);
        formData.append('code_bg_color', code_bg_color);
        formData.append('eye', eye);
        formData.append('style', style);
        formData.append('frame', frame);
        return formData;
    }

    $('#qr_logo_upload').on('submit', function(e) {
        e.preventDefault()
        changeQrStyle()
    })

    $('#goBackToMainDesign').on('click', function() {
        $('.qrstyle_option').hide();
        $('.qr_main_design').show();
    })

    $('.qr-frame').on('click', function() {
        $('.qr-frame').not(this).removeClass('selected')
        $(this).addClass('selected')
        var frame = $(this).attr('alt')
        $('#qr_frame_input').val(frame)
        changeQrStyle()
    })

    function changeQrStyle() {
        var formData = getQrOptionValue()
        $('#loading').show()
        $.ajax({
            url : '/get_qr_design',
            method : 'POST',
            data : formData,
            contentType: false,
            processData: false,
            success : function(data) {
                // console.log(data)
                $('#loading').hide()
                $('.qr-design').html(data)
            },
            error : function(e) {
                console.log(e)
            }
        })
    }


    $('#save_qrcode').on('click', function() {
        var formData = new FormData;
        var [style, code_color, code_bg_color, eye, image] = getQrOptionValue();
        formData.append('image', image);
        formData.append('code_color', code_color);
        formData.append('code_bg_color', code_bg_color);
        formData.append('eye', eye);
        formData.append('style', style);
        $.ajax({
            url : '/save_qrcode',
            method : 'POST',
            data : formData,
            contentType: false,
            processData: false,
            success : function(data) {
                console.log(data)
            },
            error : function(e) {
                console.log(e)
            }
        })
    })
})






