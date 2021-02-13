
$(document).ready(function () {
    $('input').on('click', function () {
        var field_name = $(this).attr('name');
        var field_data = $(this).data('moeda-' + field_name);
        var moeda_name = $('#moeda_' + field_name);
        moeda_name.val(field_data);
        moeda_name.next('small').text(field_data);
        
    });
});


