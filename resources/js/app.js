require('./bootstrap');

$(document).ready( function(){
  $('.search').click(()=> {
    var rooms = $('.rooms').val();
    var beds = $('.beds').val();
    var checkbox_value = [];
    $("input[name=chkbox]").each(function () {
        var ischecked = $(this).is(":checked");
        if (ischecked) {
            checkbox_value.push($(this).val());
        }
    });
    console.log(checkbox_value);
    });
  })
