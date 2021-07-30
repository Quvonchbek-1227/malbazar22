$('.btn_1').click(function() {

    var parol8 = '<span class="error" style="color:red;">Парол 8 симболдан коп болиў керек!</span>';
    var tel_error = '<span class="error" style="color:red;">Телефониңизде жазиң</span>';
    var name_error = '<span class="error" style="color:red;">Атиңизди жазиң</span>';
    var i = 0;
    if ($('#password_in_2').val().length < 8 || $('#name').val().length == 0 || $('#telephone').val() == "(+998) __-___-__-__") {

        if (($('#password_in_2').val().length < 8) && $('.parol_error').children().length == 0) {
            $('.parol_error').append(parol8);
        } else if (($('#password_in_2').val().length > 7) && $('.parol_error').children().length != 0) {
            $('.parol_error').children().remove();
        }

        if ($('#name').val().length == 0 && $('.name_error').children().length == 0) {
            $('.name_error').append(name_error);
        } else if ($('#name').val().length != 0 && $('.name_error').children().length != 0) {
            $('.name_error').children().remove();
        }
        if ($('#telephone').val() == '(+998) __-___-__-__' && $('.tel_error').children().length == 0) {
            $('.tel_error').append(tel_error);
        } else if ($('#telephone').val() != '(+998) __-___-__-__' && $('.tel_error').children().length != 0) {
            $('.tel_error').children().remove();
        }
    } else {
        $('.parol_error').children().remove();
        $('.btn_1').attr('type', 'submit');
    }


});