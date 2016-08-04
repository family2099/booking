$(document).ready(function() {
    $('input[name$="Date"]').datepicker({
        dateFormat: 'yy/mm/dd',
        beforeShow: function() {
            if ($(this).attr('maxDate')) {
                var dateItem = $('#' + $(this).attr('maxDate'));
                if (dateItem.val() !== "") {
                    $(this).datepicker('option', 'maxDate', dateItem.val());
                }
            }

            if ($(this).attr('minDate')) {
                var dateItem = $('#' + $(this).attr('minDate'));
                if (dateItem.val() !== "") {
                    $(this).datepicker('option', 'minDate', dateItem.val());
                }
            }
        }
    });
});