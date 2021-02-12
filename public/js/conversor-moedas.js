
$(document).ready(function () {
    $('input').on('click', function () {
        var field_name = $(this).attr('name');
//        var field_value = $(this).val();
        var field_data = $(this).data('moeda-' + field_name);
        var moeda_name = $('#moeda_' + field_name);
        moeda_name.val(field_data);
        moeda_name.next('small').text(field_data);
        var active = $('input:checked');
        
        if(active[0].value === active[1].value){
//                active.each(function(i, el){
//                    if(field_name === 'base'){
//                        console.log($(this).siblings('input').eq(0).attr('checked', 'checked'));
//                    }
//                    if(field_name === 'result'){
//                        $(this).siblings('input').eq(0).attr('checked', 'checked');
//                    }
//                });
            
        }
    });
});


