$('.btn_1').click(function() {

    var name_error = '<span class="error" style="color:red;">Кетекше бос қалмасин!</span>';
    var email_error = '<span class="error" style="color:red;">Кетекше бос қалмасин!</span>';
    var comment_error = '<span class="error" style="color:red;">Кетекше бос қалмасин!</span>';
    if ($('#name').val().length == 0 || $('#email').val().length == 0 || $('#comment').val().length == 0) {

       
        if ($('#name').val().length == 0 && $('.name_error').children().length == 0) {
            $('.name_error').append(name_error);
        } else if ($('#name').val().length != 0 && $('.name_error').children().length != 0) {
            $('.name_error').children().remove();
        }
        if ($('#email').val().length == 0 && $('.email_error').children().length == 0) {
            $('.email_error').append(email_error);
        } else if ($('#email').val().length != 0 && $('.email_error').children().length != 0) {
            $('.email_error').children().remove();
        }
        if ($('#comment').val().length == 0 && $('.comment_error').children().length == 0) {
            $('.comment_error').append(comment_error);
        } else if ($('#comment').val().length != 0 && $('.comment_error').children().length != 0) {
            $('.comment_error').children().remove();
        }
    } else {
        $('.parol_error').children().remove();
        $('.btn_1').attr('type', 'submit');
    }


});