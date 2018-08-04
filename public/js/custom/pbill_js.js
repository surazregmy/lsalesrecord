$(function(){
    $('body').on('keyup','.quantity,.rate,.total',function(){  
      var tr=$(this).parent().parent();  
      var qty=tr.find('.quantity').val();  
      var price=tr.find('.rate').val();  
      var amt =(qty * price);  
      tr.find('.total').val(amt);  
      grandtotal();  
    });
     
  })

  function grandtotal()  {  
    var t=0;  
    $('.total').each(function(i,e)   
    {  
    var amt =$(this).val()-0;  
    t+=amt;  
    });  
    $('.grandtotal').val(t);  
    $('#total_amount').val(t);
    } 

   