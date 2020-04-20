require('./bootstrap');

$(document).ready( function(){
  $('.search').click(()=> {
    var rooms = parseInt($('.rooms').val());
    var beds = parseInt($('.beds').val());
    var checkbox_value = [];
    var total = checkbox_value;
    $("input[name=chkbox]").each(function () {
        var ischecked = $(this).is(":checked");
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
  })
