$(document).ready(function() {

    $('#form input').keydown(function(e) {
        if (e.keyCode == 13) {
            $('#form').submit();
        }
    });

    $('#getkey').click(function() {
        
        var user = $('input[name=\'username\']').val();
        var token = $(this).attr('token');

        $.ajax({
            url: 'index.php?route=common/login/keygenerator',
            dataType: 'json',
            type: 'POST',
            data: 'user=' + user,
            beforeSend: function() {
            },
            complete: function() {

            },
            success: function(json) {
                if (json.status){
                    alert(json.success);
                } else {
                    alert(json.error);
                }
            },
            error : function(){
                alert('Error');
            }
        });
    });
});