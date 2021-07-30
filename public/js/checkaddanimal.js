$('.btn_1').click(function() {
    var email = '<span class="error" style="color:red;">Атин жазын</span>';
    var description = '<span class="error" style="color:red;">Маглыумат жазын';
    var image = '<span class="error" style="color:red;">Сууретин киритинг</span>';
    var image2 = '<span class="error" style="color:red;">Суурет 3 ден коп болмауи керек</span>';
    var price = '<span class="error" style="color:red;">Бахасын киритин</span>';
    var telephone = '<span class="error" style="color:red;">Телефон киритин</span>';
    var limit = 3;

    if ($('#title').val().length == 0 || $('#description').val().length == 0 ||
        $('#image').val().length == 0 || $('#image')[0].files.length > limit || $('#price').val().length == 0 ||
        $('#telephone').val() == "(+998) __-___-__-__") {
        if ($('#title').val().length == 0 && $('.title_error').children().length == 0) {
            $('.title_error').append(email);
        } else if ($('#title').val().length != 0 && $('.title_error').children().length != 0) {
            $('.title_error').children().remove();
        }

        if ($('#description').val().length == 0 && $('.description_error').children().length == 0) {
            $('.description_error').append(description);
        } else if ($('#description').val().length != 0 && $('.description_error').children().length != 0) {
            $('.description_error').children().remove();
        }

        if ($('#image')[0].files.length == 0 && $('.image_error2').children().length == 0) {
            $('.image_error2').append(image);
        } else if ($('#image')[0].files.length != 0 && $('.image_error2').children().length != 0) {
            $('.image_error2').children().remove();
        }
        

        if ($('#image')[0].files.length > limit && $('.image_error').children().length == 0) {
            $('.image_error').append(image2);
        } else if ($('#image')[0].files.length <= limit && $('.image_error').children().length != 0) {
            $('.image_error').children().remove();
        }

        if ($('#price').val().length == 0 && $('.price_error').children().length == 0) {
            $('.price_error').append(price);
        } else if ($('#price').val().length != 0 && $('.price_error').children().length != 0) {
            $('.price_error').children().remove();
        }

        if ($('#telephone').val().length == 0 && $('.telephone_error').children().length == 0) {
            $('.telephone_error').append(telephone);
        } else if ($('#telephone').val().length != 0 && $('.telephone_error').children().length != 0) {
            $('.telephone_error').children().remove();
        }
    } else {
        $('.parol_error').children().remove();
        $('.btn_1').attr('type', 'submit');
    }

});