$(document).ready(function () {
    var url = $('#url').val();
    $('#id_dosen').on('change', function () {
        $.ajax({
            url: url + 'UserController/getDosen/' + $(this).val(),
            method: 'get',
            dataType: 'json',
            success: function (data) {
                $('#nip').val(data['NIP']);
            }
        });
    });

    var toggle = true;

    $('.menu-dropdown').on('click', function () {
        if (toggle) {
            $('.menu-my-dropdown').addClass('show');
            $('.menu-menu').addClass('show');
            toggle = false;
        } else {
            $('.menu-my-dropdown').removeClass('show');
            $('.menu-menu').removeClass('show');
            toggle = true;
        }
    });
});