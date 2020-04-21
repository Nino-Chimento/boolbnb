require('./bootstrap');
$(document).ready( function(){
  $('.search').click(()=> {
    var rooms = parseInt($('.rooms').val());
    var beds = parseInt($('.beds').val());
    var checkbox_value = [];
    var total = checkbox_value;
    $('input[name=chkbox]').each(function () {
        var ischecked = $(this).is(':checked');
        if (ischecked) {
            checkbox_value.push($(this).val());
        }
    });
    if(total.length !=0){
      $('.card .options').each(function(){
        if(checkbox_value.includes($(this).text())){
           $('.card').addClass('hidden');
           $(this).parent().show();
        }else{
           $('.card').addClass('hidden');
        }
      });
    }
      $('.card').each(function(){
        var htmlroom = parseInt($(this).find('.htmlrooms').text());
        var htmlbed = parseInt($(this).find('.htmlbeds').text());
        if(!isNaN(rooms)){
          if(rooms <= htmlroom || beds <= htmlbed){
            $(this).show();
          }else{
            $(this).hide();
          }
        }
      });
    });
    $('#pippo').click(function() {

      var name = $('.message_name').val();
      var mail = $('.message_mail').val();
      var request = $('.message_request').val();
      var id = $('.hidden').val();
      console.log(id);
      $.ajax({
          url: "http://127.0.0.1:8000/api/message",
          method:'POST',
          data: {
            name:name,
            mail:mail,
            request:request,
            id:id

          },
          success: function(data) {
            if(data) {
              $('h1').append('messaggio inviato con successo');
            }else{
              $('h1').append('messaggio non inviato');
            }
          },
          error: function(){
            alert("Chiamata fallita!!!");
          }
        });

    });
  })
