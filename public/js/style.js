$(document).ready(function() {
    $('.template_design_box').on('click', function() {
      $(".template_design_box").not(this).removeClass("selected");
      $(this).addClass('selected');
      var primary_color = $(this).data('primary_color')
      var button_color = $(this).data('button_color')
      var primary_text_color = $(this).data('primary_text_color')
      var button_text_color = $(this).data('button_text_color')
      var design_id = $(this).data('design_id')
      $('#design_id').val(design_id);
      $('#primary_color').val(primary_color)
      $('#button_color').val(button_color)
      $('.preview_header').css('background-color', primary_color);
      $('.preview_header').css('color', primary_text_color);
      $('.preview_button_color').css('background-color', button_color);
      $('.preview_button_color').css('color', button_text_color);
    });


    $('#primary_color').on('change', function() {
      $(".template_design_box").removeClass("selected");
      var primary_color = $('#primary_color').val()
      $('.preview_header').css('background-color', primary_color);
    })

    $('#button_color').on('change', function() {
      var button_color = $('#button_color').val()
      $('.preview_button_color').css('background-color', button_color);
    })

    $('#preview_image_file').on('change',function() {
        var input = this;
        if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function(e) {
            $('#preview_image').attr('src', e.target.result);
          }
          reader.readAsDataURL(input.files[0]);
        }
    });

    $('#preview_template').on('click', function(e) {
        e.preventDefault()
        $('.preview_qr').hide()
        $('.preview_box').show();
      })

    $('#preview_qr').on('click', function(e) {
        e.preventDefault()
        $('.preview_box').hide();
        $('.preview_qr').show()
    })
});